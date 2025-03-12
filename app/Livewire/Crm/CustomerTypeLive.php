<?php

namespace App\Livewire\Crm;

use App\Livewire\Forms\CustomerTypeForm;
use App\Models\Crm\CustomerType;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class CustomerTypeLive extends Component
{
    use WithPagination, WithoutUrlPagination;
    use LivewireAlert;
    public CustomerTypeForm $customerTypeForm;
    public $search = '';
    public $num = 10;
    public $isOpenModal = false;
    public $isOpenModalExport = false;
    #[Computed]
    public function customerTypes()
    {
        return CustomerType::where('name', 'LIKE', '%' . $this->search . '%')->paginate($this->num, '*', 'page');
    }
    public function render()
    {
        return view('livewire.crm.customer-type-live');
    }
    public function create()
    {
        $this->customerTypeForm->reset();
        $this->isOpenModal = true;
    }
    public function update(CustomerType $customerType)
    {
        $this->customerTypeForm->fill($customerType);
        $this->isOpenModal = true;
    }
    public function delete(CustomerType $customerType)
    {
        $customerType->delete();
        $this->message('success', 'En hora buena!', 'Registro eliminado correctamente!');
    }
    public function estado(CustomerType $customerType)
    {
        $customerType->isActive = !$customerType->isActive;
        $customerType->save();
        $this->message('success', 'En hora buena!', 'Registro actualizado correctamente!');
    }
    public function createCustomerType()
    {
        if ($this->customerTypeForm->store()) {
            $this->message('success', 'En hora buena!', 'Registro creado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }
    public function updateCustomerType()
    {
        if ($this->customerTypeForm->update()) {
            $this->message('success', 'En hora buena!', 'Registro actualizado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }
    public function exportCustomerType()
    {
        $this->isOpenModalExport = false;
        return $this->customerTypeForm->export();
    }
    public function updatedSearch($value)
    {
        $this->resetPage();
    }
    private function message($tipo, $tittle, $message)
    {
        $this->alert($tipo, $tittle, [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => false,
            'text' => $message,
            'timerProgressBar' => true,
        ]);
    }

}
