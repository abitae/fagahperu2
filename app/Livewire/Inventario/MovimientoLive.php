<?php

namespace App\Livewire\Inventario;

use App\Models\Inventory;
use App\Models\ProductStore;
use App\Models\Warehouse;
use Livewire\Component;

class MovimientoLive extends Component
{
    public $search = '';
    public function render()
    {

        $inventories = Inventory::whereHas('product', function ($q) {
            $q->where('code_entrada', 'LIKE', '%' . $this->search . '%');
        })->latest()
            ->paginate(10);
        return view('livewire.inventario.movimiento-live', compact('inventories'));
    }
}
