<?php
namespace App\Livewire\Crm;

use App\Livewire\Forms\CustomerForm;
use App\Livewire\Forms\NegocioForm;
use App\Models\Crm\CustomerType;
use App\Models\Customer;
use App\Models\Negocio;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class NegocioLive extends Component
{
    use WithPagination, WithoutUrlPagination, LivewireAlert, WithFileUploads;

    public NegocioForm $negocioForm;
    public CustomerForm $customerForm;
    public $search = '';
    public $num    = 10;
    public $isActive;
    public $isOpenModal       = false;
    public $isOpenModalExport = false;
    public $dateNow;
    public $selectedOption;
    public $estadoFilter;
    public $typeFilter;
    public $isOpenCustomer;
    protected $listeners = ['select2Changed' => 'handleSelect2Changed'];

    public function handleSelect2Changed($value)
    {
        $this->selectedOption = $value;
    }

    public function mount()
    {
        $this->dateNow = Carbon::now('GMT-5')->format('Y-m-d');
    }

    #[Computed]
    public function negocios()
    {
        // Initialize base query with eager loading
        $query = Negocio::with(['customer', 'user']);

        // Apply search filters if search term exists
        if ($this->search) {
            $searchTerm = '%' . trim($this->search) . '%';
            $query->where(function ($q) use ($searchTerm) {
                // Search in negocios table
                $q->where('code', 'LIKE', $searchTerm)
                  ->orWhere('name', 'LIKE', $searchTerm)
                  // Search in related customer records
                  ->orWhereHas('customer', function ($customerQuery) use ($searchTerm) {
                      $customerQuery->where('code', 'LIKE', $searchTerm)
                                  ->orWhere('first_name', 'LIKE', $searchTerm);
                  })
                  // Search in related user records
                  ->orWhereHas('user', function ($userQuery) use ($searchTerm) {
                      $userQuery->where('name', 'LIKE', $searchTerm)
                               ->orWhere('email', 'LIKE', $searchTerm);
                  });
            });
        }

        // Apply stage filter
        if ($this->estadoFilter) {
            $query->where('stage', $this->estadoFilter);
        }

        // Apply type filter
        if ($this->typeFilter) {
            $query->where('type', $this->typeFilter);
        }

        // Apply active status filter
        if ($this->isActive) {
            $query->where('isActive', $this->isActive);
        }

        // Get paginated results
        $negocios = $query->latest('created_at')
                         ->paginate($this->num);

        return $negocios;
    }

    public function render()
    {
        $customers     = Customer::where('isActive', 1)->latest()->get();
        $users         = User::where('isActive', 1)->latest()->get();
        $customerTypes = CustomerType::where('isActive', 1)->get();
        return view('livewire.crm.negocio-live', compact('customers', 'users', 'customerTypes'));
    }

    public function detail(Negocio $id)
    {
        return Redirect::route('crm.detail', [$id]);
    }

    public function create()
    {
        $this->negocioForm->reset();
        $this->isOpenModal = true;
    }

    public function createNegocio()
    {

        if ($this->negocioForm->store()) {
            $this->message('success', 'En hora buena!', 'Registro creado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }

    public function update(Negocio $negocio)
    {
        $this->negocioForm->setNegocio($negocio);
        $this->isOpenModal = true;
    }

    public function updateNegocio()
    {
        if ($this->negocioForm->update()) {
            $this->message('success', 'En hora buena!', 'Registro actualizado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }

    public function delete(Negocio $negocio)
    {
        if ($this->negocioForm->destroy($negocio->id)) {
            $this->message('success', 'En hora buena!', 'Registro eliminado correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo eliminar el registro!');
        }
    }

    public function estado(Negocio $negocio)
    {
        if ($this->negocioForm->estado($negocio->id)) {
            $this->message('success', 'En hora buena!', 'Registro actualiza correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo actualizar el registro!');
        }
    }

    public function exportNegocio()
    {
        $this->isOpenModalExport = false;
        return $this->negocioForm->export();
    }

    public function updatedSearch($value)
    {
        $this->resetPage();
    }

    public function createCustomer()
    {
        $this->customerForm->reset();
        $this->isOpenCustomer = true;
    }
    public function createCustomerForm()
    {
        $customer = $this->customerForm->storeId();
        if ($customer) {
            $this->message('success', 'En hora buena!', 'Registro creado correctamente!');
            $this->negocioForm->setCustomerId($customer);
            $this->isOpenCustomer = false;
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
                    $this->customerForm->address    = $data['data']->direccion;
                }
                $this->message('success', 'En hora buena!', 'Documento encontrado correctamente!');
            } else {
                $this->message('error', 'Error!', 'Verifique los datos ingresados!');
            }
        } catch (\Throwable $th) {
            $this->message('error', 'Fatal!', $data['data_resp']);
        }
    }
    private function message($tipo, $tittle, $message)
    {
        $this->alert($tipo, $tittle, [
            'position'         => 'top-end',
            'timer'            => 3000,
            'toast'            => true,
            'text'             => $message,
            'timerProgressBar' => true,
        ]);
    }
}
