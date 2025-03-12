<?php

namespace App\Livewire\Convenio;

use App\Models\ProductData;
use Livewire\Component;

class DetailCmLive extends Component
{
    public ProductData $product;
    public $productos;
    public function mount(ProductData $id)
    {
        $this->product = $id;
        $this->productos = ProductData::where('orden_electronica',$this->product->orden_electronica)->get();
    }
    public function render()
    {
        return view('livewire.convenio.detail-cm-live');
    }
}
