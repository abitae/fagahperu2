<?php

namespace App\Livewire\Inventario;

use App\Models\Inventory;
use App\Models\ProductStore;
use App\Models\Supplier;
use App\Models\Warehouse;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class InventoryLive extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $warehouse_id;
    public $search = '';
    public $verLive = false;
    public $salida = false;
    public function render()
    {
        $suppliers = Supplier::all();
        $products = ProductStore::all();
        $warehouses = Warehouse::where('isActive', true)->get();
        $inventories = Inventory::where('warehouse_id', $this->warehouse_id)
            ->whereHas('product', function ($q) {
                $q->where('code_entrada', 'LIKE', '%' . $this->search . '%');
            })
            ->paginate(10);
        return view('livewire.inventario.inventory-live', compact('warehouses', 'inventories'));
    }
    public function updatedSearch($value)
    {
        $this->resetPage();
    }
    public function updatedWarehouseId($value)
    {
        $this->verLive = false;
    }
}
