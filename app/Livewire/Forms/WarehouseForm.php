<?php

namespace App\Livewire\Forms;

use App\Models\Warehouse;
use Livewire\Attributes\Validate;
use Livewire\Form;

class WarehouseForm extends Form
{
    public ?Warehouse $warehouse;
    #[Validate('required')]
    public $name = '';
    #[Validate('required')]
    public $location = '';
    public $isActive = true;
    public function setWarehouse(Warehouse $warehouse)
    {

        $this->warehouse = $warehouse;
        $this->name = $warehouse->name;
        $this->location = $warehouse->location;

    }
    public function store()
    {
        try {
            $this->validate();
            Warehouse::create($this->all());
            infoLog('Warehouse store', $this->name);
            return true;
        } catch (\Exception $e) {
            errorLog('Warehouse store', $e);
            return false;
        }
    }
    public function update()
    {
        try {
            $this->warehouse->update([
                'name' => $this->name,
                'location' => $this->location,
            ]);
            infoLog('Warehouse update', $this->name);
            return true;
        } catch (\Exception $e) {
            errorLog('Warehouse update', $e);
            return false;
        }
    }
    public function destroy($id)
    {
        try {
            $warehouse = Warehouse::find($id);
            $warehouse->delete();
            infoLog('Warehouse deleted', $warehouse->name);
            return true;
        } catch (\Exception $e) {
            errorLog('Warehouse deleted', $e);
            return false;
        }
    }
    public function estado($id)
    {

        try {
            $warehouse = Warehouse::find($id);
            $warehouse->isActive = !$warehouse->isActive;
            $warehouse->save();
            infoLog('Warehouse estado ' . $warehouse->isActive, $warehouse->name);
            return true;
        } catch (\Exception $e) {
            errorLog('Warehouse estado', $e);
            return false;
        }
    }
    public function export()
    {
        //return Excel::download(new WarehousesExport, 'warehouses.xlsx');
    }
}
