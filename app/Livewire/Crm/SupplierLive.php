<?php

namespace App\Livewire\Crm;

use App\Exports\SuppliersExport;
use App\Livewire\Forms\SupplierForm;
use App\Models\Supplier;
use Carbon\Carbon;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class SupplierLive extends Component
{
    use WithPagination, WithoutUrlPagination;
    use LivewireAlert;
    use WithFileUploads;
    public SupplierForm $supplierForm;
    public $search = '';
    public $num = 10;
    public $isOpenModal = false;
    public $isOpenModalExport = false;

    public $dateNow;

    public function mount()
    {
        $this->dateNow = Carbon::now('GMT-5')->format('Y-m-d');
    }
    #[Computed]
    public function suppliers()
    {

        return Supplier::where(
            fn($query)
            => $query->orWhere('code', 'LIKE', '%' . $this->search . '%')
                ->orWhere('first_name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('email', 'LIKE', '%' . $this->search . '%')
        )
            ->paginate($this->num, '*', 'page');
    }
    public function render()
    {
        return view('livewire.crm.supplier-live');
    }
    public function create()
    {
        $this->supplierForm->reset();
        $this->isOpenModal = true;
    }
    public function update(Supplier $supplier)
    {
        $this->supplierForm->setSupplier($supplier);
        $this->isOpenModal = true;
    }
    public function delete(Supplier $supplier)
    {
        if ($this->supplierForm->destroy($supplier->id)) {
            $this->message('success', 'En hora buena!', 'Registro eliminado correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo eliminar el registro!');
        }
    }
    public function estado(Supplier $supplier)
    {
        if ($this->supplierForm->estado($supplier->id)) {
            $this->message('success', 'En hora buena!', 'Registro actualiza correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo actualizar el registro!');
        }
    }
    public function createSupplier()
    {
        if ($this->supplierForm->store()) {
            $this->message('success', 'En hora buena!', 'Registro creado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }
    public function buscarDocumento()
    {
        $data = buscar_documento_h($this->supplierForm->type_code, $this->supplierForm->code);
        try {

            //dd($data);
            if ($data['respuesta'] == 'ok') {
                if ($this->supplierForm->type_code == 'dni') {
                    $this->supplierForm->first_name = $data['data']->nombre;
                } else {
                    $this->supplierForm->first_name = $data['data']->razon_social;
                    $this->supplierForm->address = $data['data']->direccion;
                }
                $this->message('success', 'En hora buena!', 'Documento encontrado correctamente!');
            } else {
                $this->message('error', 'Error!', 'Verifique los datos ingresados!');
            }
        } catch (\Throwable $th) {
            $this->message('error', 'Fatal!', $data['data_resp']);
        }
    }
    public function updateSupplier()
    {
        if ($this->supplierForm->update()) {
            $this->message('success', 'En hora buena!', 'Registro actualizado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }
    public function exportSupplier()
    {
        $this->isOpenModalExport = false;
        return $this->supplierForm->export();
    }
    public function updatedSearch($value)
    {
        $this->resetPage();
    }
    public function export()
    {
        return Excel::download(new SuppliersExport, 'suppliers.xlsx');
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
    public function pdf(Supplier $supplier)
    {
        if (Storage::disk('public')->exists($supplier->archivo)) {
            return Storage::download($supplier->archivo);
        }else{
            $this->message('error', 'Error!', 'El archivo no existe!');
        }
    }
}
