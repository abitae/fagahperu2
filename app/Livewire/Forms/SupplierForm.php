<?php

namespace App\Livewire\Forms;

use App\Exports\SuppliersExport;
use App\Models\Supplier;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Maatwebsite\Excel\Facades\Excel;


class SupplierForm extends Form
{
    public ?Supplier $supplier;
    #[Validate('required|min:3|max:3')]
    public $type_code;
    #[Validate('required|numeric|digits_between:8,11|unique:suppliers')]
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
    public function setSupplier(Supplier $supplier)
    {
        $this->supplier = $supplier;
        $this->type_code = $supplier->type_code;
        $this->code = $supplier->code;
        $this->first_name = $supplier->first_name;
        $this->phone = $supplier->phone;
        $this->email = $supplier->email;
        $this->address = $supplier->address;
        $this->archivo = $supplier->archivo;
    }
    public function store()
    {
        $this->validate();

        try {
            if (gettype($this->archivo) != 'string') {
                $this->archivo = $this->archivo->store('supplier/pdf');
            }
            Supplier::create([
                'type_code' => $this->type_code,
                'code' => $this->code,
                'first_name' => $this->first_name,
                'phone' => $this->phone,
                'email' => $this->email,
                'address' => $this->address,
                'archivo' => $this->archivo,
            ]);
            infoLog('Supplier store', $this->code);
            return true;
        } catch (\Exception $e) {
            errorLog('Supplier store', $e);
            return false;
        }
    }
    public function update()
    {
        try {
            if (gettype($this->archivo) != 'string') {
                Storage::delete($this->supplier->archivo);
                $this->archivo = $this->archivo->store('supplier/pdf');
            }
            $this->supplier->update([
                'type_code' => $this->type_code,
                'code' => $this->code,
                'first_name' => $this->first_name,
                'phone' => $this->phone,
                'email' => $this->email,
                'address' => $this->address,
                'archivo' => $this->archivo,
            ]);
            infoLog('Supplier update', $this->code);
            Storage::delete('public/tmp');
            return true;
        } catch (\Exception $e) {
            errorLog('Supplier update', $e);
            return false;
        }
    }
    public function destroy($id)
    {
        try {
            $supplier = Supplier::find($id);
            $supplier->delete();
            infoLog('Supplier deleted', $supplier->code);
            return true;
        } catch (\Exception $e) {
            errorLog('Supplier deleted', $e);
            return false;
        }
    }
    public function estado($id)
    {
        try {
            $supplier = Supplier::find($id);
            $supplier->isActive = !$supplier->isActive;
            $supplier->save();
            infoLog('Supplier estado ' . $supplier->isActive, $supplier->code);
            return true;
        } catch (\Exception $e) {
            errorLog('Supplier estado', $e);
            return false;
        }
    }
    public function export()
    {
        return Excel::download(new SuppliersExport, 'suppliers.xlsx');
    }
}
