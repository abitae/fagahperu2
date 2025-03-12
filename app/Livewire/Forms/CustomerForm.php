<?php

namespace App\Livewire\Forms;

use App\Exports\CustomersExport;
use App\Models\Customer;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Maatwebsite\Excel\Facades\Excel;


class CustomerForm extends Form
{
    public ?Customer $customer;
    #[Validate('required')]
    public $type_id = '';
    #[Validate('required|min:3|max:3')]
    public $type_code;
    #[Validate('required|numeric|digits_between:8,11|unique:customers')]
    public $code = '';
    #[Validate('required')]
    public $first_name = '';
    #[Validate('')]
    public $phone = '';
    #[Validate('email')]
    public $email = '';
    #[Validate('')]
    public $address = '';
    #[Validate('nullable|sometimes|mimes:pdf|max:10960|extensions:pdf')] // 1MB Max
    public $archivo = '';
    public $isActive = false;
    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;
        $this->type_id = $customer->type_id;
        $this->type_code = $customer->type_code;
        $this->code = $customer->code;
        $this->first_name = $customer->first_name;
        $this->phone = $customer->phone;
        $this->email = $customer->email;
        $this->address = $customer->address;
        $this->archivo = $customer->archivo;
    }
    public function store()
    {
        $this->validate();

        try {
            if (gettype($this->archivo) != 'string') {
                $this->archivo = $this->archivo->store('customer/pdf');
            }
            Customer::create([
                'type_id' => $this->type_id,
                'type_code' => $this->type_code,
                'code' => $this->code,
                'first_name' => $this->first_name,
                'phone' => $this->phone,
                'email' => $this->email,
                'address' => $this->address,
                'archivo' => $this->archivo,
            ]);
            infoLog('Customer store', $this->code);
            return true;
        } catch (\Exception $e) {
            errorLog('Customer store', $e);
            return false;
        }
    }
    public function storeId()
    {
        $this->validate();

        try {
            if (gettype($this->archivo) != 'string') {
                $this->archivo = $this->archivo->store('customer/pdf');
            }
            $customer = Customer::create([
                'type_id' => $this->type_id,
                'type_code' => $this->type_code,
                'code' => $this->code,
                'first_name' => $this->first_name,
                'phone' => $this->phone,
                'email' => $this->email,
                'address' => $this->address,
                'archivo' => $this->archivo,
            ]);
            infoLog('Customer store', $this->code);
            return $customer;
        } catch (\Exception $e) {
            errorLog('Customer store', $e);
            return null;
        }
    }
    public function update()
    {
        try {
            if (gettype($this->archivo) != 'string') {
                Storage::delete($this->customer->archivo);
                $this->archivo = $this->archivo->store('customer/pdf');
            }
            $this->customer->update([
                'type_id' => $this->type_id,
                'type_code' => $this->type_code,
                'code' => $this->code,
                'first_name' => $this->first_name,
                'phone' => $this->phone,
                'email' => $this->email,
                'address' => $this->address,
                'archivo' => $this->archivo,
            ]);
            infoLog('Customer update', $this->code);
            Storage::delete('public/tmp');
            return true;
        } catch (\Exception $e) {
            errorLog('Customer update', $e);
            return false;
        }
    }
    public function destroy($id)
    {
        try {
            $customer = Customer::find($id);
            $customer->delete();
            infoLog('Customer deleted', $customer->code);
            return true;
        } catch (\Exception $e) {
            errorLog('Customer deleted', $e);
            return false;
        }
    }
    public function estado($id)
    {
        try {
            $customer = Customer::find($id);
            $customer->isActive = !$customer->isActive;
            $customer->save();
            infoLog('Customer estado ' . $customer->isActive, $customer->code);
            return true;
        } catch (\Exception $e) {
            errorLog('Customer estado', $e);
            return false;
        }
    }
    public function export()
    {
        return Excel::download(new CustomersExport, 'customers.xlsx');
    }
}
