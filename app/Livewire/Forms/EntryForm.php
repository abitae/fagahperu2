<?php

namespace App\Livewire\Forms;


use App\Models\Inventory;
use App\Models\InventoryEntry;
use App\Models\ProductStore;
use Livewire\Attributes\Validate;
use Livewire\Form;


class EntryForm extends Form
{
    public ?InventoryEntry $entry;
    #[Validate('required')]
    public $inventory_id = '';
    #[Validate('required')]
    public $brand_id = '';
    #[Validate('')]
    public $description = '';
    #[Validate('required|min:5|unique:brands')]
    public $entry_code = '';
    #[Validate('required|numeric|min:0')]
    public $quantity = '';
    #[Validate('numeric|min:0')]
    public $unit_price = '';

    public function store($warehouse, $product, $brand)
    {
        try {

            $inventario = Inventory::where('warehouse_id', $warehouse->id)
                ->where('product_id', $product)->first();

            if (!$inventario) {
                $inventario = new Inventory();
                $inventario->warehouse_id = $warehouse->id;
                $inventario->product_id = $product;
                $inventario->quantity = $this->quantity;
                $inventario->save();
            }else{
                $inventario->quantity += $this->quantity;
                $inventario->save();
            }

            InventoryEntry::create([
                'inventory_id' => $inventario->id,
                'brand_id' => $brand,
                'description' => $this->description,
                'entry_code' => ProductStore::find($product)->code_entrada,
                'quantity' => $this->quantity,
                'unit_price' => $this->unit_price
            ]);
            infoLog('InventoryEntry store', $this->entry_code);
            return true;
        } catch (\Exception $e) {
            errorLog('InventoryEntry store', $e);
            return false;
        }
    }
    public function update()
    {
        try {
            $this->validate();
            $this->entry->update($this->all());
            infoLog('InventoryEntry update', $this->entry_code);
            return true;
        } catch (\Exception $e) {
            errorLog('InventoryEntry update', $e);
            return false;
        }
    }
    public function destroy($id)
    {
        try {
            $entry = InventoryEntry::find($id);
            $entry->delete();
            infoLog('InventoryEntry deleted', $entry->entry_code);
            return true;
        } catch (\Exception $e) {
            errorLog('InventoryEntry deleted', $e);
            return false;
        }
    }
    public function estado($id)
    {
        try {
            $entry = InventoryEntry::find($id);
            $entry->isActive = !$entry->isActive;
            $entry->save();
            infoLog('InventoryEntry estado ' . $entry->isActive, $entry->name);
            return true;
        } catch (\Exception $e) {
            errorLog('InventoryEntry estado', $e);
            return false;
        }
    }
    public function export()
    {
        //return Excel::download(new InventoryEntrysExport, 'entrys.xlsx');
    }
}
