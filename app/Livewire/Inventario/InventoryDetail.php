<?php

namespace App\Livewire\Inventario;

use Livewire\Component;

class InventoryDetail extends Component
{
    public $warehouse_id;
    public function render()
    {
        return view('livewire.inventario.inventory-detail');
    }
}
