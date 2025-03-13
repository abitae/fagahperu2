<?php

namespace App\Livewire\Crm;

use App\Exports\CustomersExport;
use App\Livewire\Forms\CustomerForm;
use App\Models\Crm\CustomerType;
use App\Models\Customer;
use App\Models\Line;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class CustomerLive extends Component
{
    use WithPagination, WithoutUrlPagination;
    use LivewireAlert;
    use WithFileUploads;
    public CustomerForm $customerForm;
    public $search = '';
    public $num = 10;
    public $isOpenModal = false;
    public $isOpenModalExport = false;
    public $isOpenModalAutorization = false;
    public $dateNow;
    public $tipoClienteFilter;
    public $line_atutorization = 1;
    public function mount()
    {
        $this->dateNow = Carbon::now('GMT-5')->format('Y-m-d');
    }
    #[Computed]
    public function customers()
    {
        $customer = Customer::query();
        $customer->when($this->search, function ($query) {
            $query->where('code', 'LIKE', '%' . $this->search . '%')
                ->orWhere('first_name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('email', 'LIKE', '%' . $this->search . '%');
        });
        if ($this->tipoClienteFilter) {
            $customer->where('type_id', $this->tipoClienteFilter);
        }
        return $customer->paginate($this->num, '*', 'page');
    }
    public function render()
    {
        $lines = Line::where('isActive', true)->get();
        $customerTypes = CustomerType::where('isActive', true)->get();
        return view('livewire.crm.customer-live', compact('lines', 'customerTypes'));
    }
    public function create()
    {
        $this->customerForm->reset();
        $this->isOpenModal = true;
    }
    public function update(Customer $customer)
    {
        $this->customerForm->setCustomer($customer);
        $this->isOpenModal = true;
    }
    public function delete(Customer $customer)
    {
        if ($this->customerForm->destroy($customer->id)) {
            $this->message('success', 'En hora buena!', 'Registro eliminado correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo eliminar el registro!');
        }
    }
    public function estado(Customer $customer)
    {
        if ($this->customerForm->estado($customer->id)) {
            $this->message('success', 'En hora buena!', 'Registro actualiza correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo actualizar el registro!');
        }
    }
    public function createCustomer()
    {
        if ($this->customerForm->store()) {
            $this->message('success', 'En hora buena!', 'Registro creado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }
    public function buscarDocumento()
    {
        $data = buscar_documento_h($this->customerForm->type_code, $this->customerForm->code);
        try {
            if ($data['respuesta'] == 'ok') {
                if ($this->customerForm->type_code == 'dni') {
                    $this->customerForm->first_name = $data['data']->nombre;
                } else {
                    $this->customerForm->first_name = $data['data']->razon_social;
                    $this->customerForm->address = $data['data']->direccion;
                }
                $this->message('success', 'En hora buena!', 'Documento encontrado correctamente!');
            } else {
                $this->message('error', 'Error!', 'Verifique los datos ingresados!');
            }
        } catch (\Throwable $th) {
            $this->message('error', 'Fatal!', $data['data_resp']);
        }
    }
    public function updateCustomer()
    {
        if ($this->customerForm->update()) {
            $this->message('success', 'En hora buena!', 'Registro actualizado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }
    public function exportCustomer()
    {
        $this->isOpenModalExport = false;
        return $this->customerForm->export();
    }
    public function updatedSearch($value)
    {
        $this->resetPage();
    }
    public function export()
    {
        return Excel::download(new CustomersExport, 'customers.xlsx');
    }
    private function message($tipo, $tittle, $message)
    {
        $this->alert($tipo, $tittle, [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => $message,
            'timerProgressBar' => true,
        ]);
    }
    public function pdf(Customer $customer)
    {
        //dd($customer->archivo);
        if (Storage::disk('public')->exists($customer->archivo) && $customer->archivo != '') {
            return Storage::download($customer->archivo);
        } else {
            $this->message('error', 'Error!', 'El archivo no existe!');
        }
    }
    public function getAutorizationModal(Customer $customer)
    {
        $this->customerForm->setCustomer($customer);
        $this->isOpenModalAutorization = true;
    }
    public function getAutorization()
    {
        $fecha = \Carbon\Carbon::now()->locale("es_PE")->isoFormat('D \d\e MMMM \d\e\l Y');

        $line = Line::find($this->line_atutorization);
        $customer = $this->customerForm->customer;
        $pdf = Pdf::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
            ->setPaper('a4', 'portrait')
            ->loadView('livewire.almacen.report.autorization', compact('line', 'customer','fecha'))
            ->output();
        return response()
            ->streamDownload(
                fn() => print($pdf),
                "autorizacion.pdf"
            );
    }
}
