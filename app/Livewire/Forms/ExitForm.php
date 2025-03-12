<?php
namespace App\Livewire\Forms;

use App\Models\Inventory;
use App\Models\InventoryExit;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ExitForm extends Form
{
    public ?InventoryExit $entry;
    #[Validate('required')]
    public $inventory_id = '';
    #[Validate('required')]
    public $customer_id = '';
    #[Validate('required')]
    public $description = '';
    #[Validate('required|min:5|unique:brands')]
    public $exit_code = '';
    #[Validate('required|numeric|min:0')]
    public $quantity = '';
    #[Validate('required|numeric|min:0')]
    public $unit_price = '';

    public function store($warehouse, $product, $customer)
    {
        try {
            $inventario = Inventory::where('warehouse_id', $warehouse->id)
                ->where('product_id', $product)->first();
            if (! $inventario) {
                return false;
            } else {
                //dd($inventario->quantity,$this->quantity);
                $inventario->quantity -= $this->quantity;
                if ($inventario->quantity < 0) {
                    return false;
                }
                $inventario->save();
            }

            InventoryExit::create([
                'inventory_id' => $inventario->id,
                'customer_id'  => $customer,
                'description'  => $this->description,
                'exit_code'    => $this->exit_code,
                'quantity'     => $this->quantity,
                'unit_price'   => $this->unit_price,
            ]);
            infoLog('InventoryExit store', $this->exit_code);
            return true;
        } catch (\Exception $e) {
            errorLog('InventoryExit store', $e);
            return false;
        }
    }
    public function update()
    {
        try {
            $this->validate();
            $this->entry->update($this->all());
            infoLog('InventoryExit update', $this->exit_code);
            return true;
        } catch (\Exception $e) {
            errorLog('InventoryExit update', $e);
            return false;
        }
    }
    public function destroy($id)
    {
        try {
            $entry = InventoryExit::find($id);
            $entry->delete();
            infoLog('InventoryExit deleted', $entry->exit_code);
            return true;
        } catch (\Exception $e) {
            errorLog('InventoryExit deleted', $e);
            return false;
        }
    }
    public function estado($id)
    {
        try {
            $entry           = InventoryExit::find($id);
            $entry->isActive = ! $entry->isActive;
            $entry->save();
            infoLog('InventoryExit estado ' . $entry->isActive, $entry->name);
            return true;
        } catch (\Exception $e) {
            errorLog('InventoryExit estado', $e);
            return false;
        }
    }
    public function export()
    {
        //return Excel::download(new InventoryExitsExport, 'entrys.xlsx');
    }
}
