<?php

namespace App\Livewire\Forms;

use App\Models\Crm\CustomerType;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CustomerTypeForm extends Form
{
    public ?CustomerType $customerType;
    #[Validate('required|min:5|unique:customer_types')]
    public $name = '';
    public $isActive = true;
    public function setCustomerType(CustomerType $customerType)
    {
        $this->customerType = $customerType;
        $this->name = $customerType->name;
        $this->isActive = $customerType->isActive;
    }
    public function store()
    {
        $this->validate();
        CustomerType::create($this->all());
        infoLog('CustomerType store', $this->name);
        return true;
    }
    public function update()
    {
        $this->customerType->update($this->all());
        infoLog('CustomerType update', $this->name);
        return true;
    }
    public function destroy($id)
    {
        $customerType = CustomerType::find($id);
        $customerType->delete();
        infoLog('CustomerType deleted', $customerType->name);
        return true;
    }
    public function estado($id)
    {
        $customerType = CustomerType::find($id);
        $customerType->isActive = !$customerType->isActive;
        $customerType->save();
        infoLog('CustomerType estado', $customerType->name);
        return true;
    }
    public function export()
    {
        //return Excel::download(new CustomerTypesExport, 'customer-types.xlsx');
    }
}
