<?php

namespace App\Livewire\Inventario;

use App\Livewire\Forms\EntryForm;
use App\Models\Brand;
use App\Models\ProductStore;

use App\Models\Warehouse;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class EntryLive extends Component
{
    use LivewireAlert;
    public $warehouse;
    public $product = 1; //select2
    public $brand = 1; //select2
    public EntryForm $entryForm;
    public function mount($id)
    {

        $this->warehouse = Warehouse::find($id);

    }
    public function render()
    {
        $brands = Brand::where('isActive', true)->get();
        $products = ProductStore::where('isActive', true)->get();
        return view('livewire.inventario.entry-live', compact('brands', 'products'));
    }
    public function createEntry()
    {
        if ($this->entryForm->store($this->warehouse, $this->product, $this->brand)) {
            $this->message('success', 'En hora buena!', 'Registro creado correctamente!');
            $this->entryForm->reset();
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }
    private function message($tipo, $tittle, $message)
    {
        $this->alert($tipo, $tittle, [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => false,
            'text' => $message,
            'timerProgressBar' => true,
        ]);
    }
}
