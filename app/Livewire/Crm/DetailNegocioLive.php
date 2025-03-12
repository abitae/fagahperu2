<?php

namespace App\Livewire\Crm;

use App\Livewire\Forms\ActionForm;
use App\Livewire\Forms\NegocioForm;
use App\Models\ActionNegocio;
use App\Models\Contact;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Negocio;
use App\Models\User;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class DetailNegocioLive extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    public NegocioForm $negocioForm;
    public ActionForm $actionForm;
    public $customer;
    public $user;
    public $contact;
    public function mount(Negocio $id)
    {
        if (isset($id)) {
            $this->negocioForm->setNegocio($id);
        }
    }
    public function render()
    {
        $customers = Customer::all();
        $users = User::all();
        $contacts = Contact::all();
        $actions = ActionNegocio::where('negocio_id', $this->negocioForm->negocio->id)->latest()->get();
        return view('livewire.crm.detail-negocio-live', compact('customers', 'users', 'contacts', 'actions'));
    }
    public function updateNegocio()
    {
        if ($this->negocioForm->update()) {
            $this->message('success', 'En hora buena!', 'Registro actualizado correctamente!');
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }
    public function createAction()
    {
        $this->actionForm->negocio_id = $this->negocioForm->negocio->id;
        $this->actionForm->date = Carbon::now()->timezone('America/Lima');
        if ($this->actionForm->store()) {
            $this->message('success', 'En hora buena!', 'Registro creado correctamente!');
            $this->actionForm->reset();
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }
    public function delete(ActionNegocio $action)
    {
        if ($this->actionForm->destroy($action->id)) {
            $this->message('success', 'En hora buena!', 'Registro eliminado correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo eliminar el registro!');
        }
    }
    public function updatedCustomer()
    {
        $this->negocioForm->customer_id = $this->customer;
    }
    public function updatedUser()
    {
        $this->negocioForm->user_id = $this->user;
    }
    public function updatedContact()
    {
        $this->actionForm->contact_id = $this->contact;
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
}
