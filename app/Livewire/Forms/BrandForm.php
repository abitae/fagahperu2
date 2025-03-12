<?php

namespace App\Livewire\Forms;

use App\Exports\BrandsExport;
use App\Models\Brand;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Maatwebsite\Excel\Facades\Excel;

class BrandForm extends Form
{
    public ?Brand $brand;
    #[Validate('required|min:5|unique:brands')]
    public $code = '';
    public $name = '';
    public $isActive = false;
    public function setBrand(Brand $brand)
    {
        $this->brand = $brand;
        $this->code = $brand->code;
        $this->name = $brand->name;
    }
    public function store()
    {
        try {
            $this->validate();
            Brand::create($this->all());
            infoLog('Brand store', $this->name);
            return true;
        } catch (\Exception $e) {
            errorLog('Brand store', $e);
            return false;
        }
    }
    public function update()
    {
        try {
            $this->brand->update([
                'code' => $this->code,
                'name' => $this->name,
            ]);
            infoLog('Brand update', $this->name);
            return true;
        } catch (\Exception $e) {
            errorLog('Brand update', $e);
            return false;
        }
    }
    public function destroy($id)
    {
        try {
            $brand = Brand::find($id);
            $brand->delete();
            infoLog('Brand deleted', $brand->name);
            return true;
        } catch (\Exception $e) {
            errorLog('Brand deleted', $e);
            return false;
        }
    }
    public function estado($id)
    {
        try {
            $brand = Brand::find($id);
            $brand->isActive = !$brand->isActive;
            $brand->save();
            infoLog('Brand estado ' . $brand->isActive, $brand->name);
            return true;
        } catch (\Exception $e) {
            errorLog('Brand estado', $e);
            return false;
        }
    }
    public function export()
    {
        return Excel::download(new BrandsExport, 'brands.xlsx');
    }
}
