<?php

namespace App\Livewire\Inventario;

use App\Livewire\Forms\EntryForm;
use App\Models\ProductStore;
use App\Models\Supplier;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class EntryLive extends Component
{
    use LivewireAlert;
    public $warehouse;
    public $product = 1; //select2
    public $supplier = 1; //select2
    public EntryForm $entryForm;
    public function mount($id)
    {

        $this->warehouse = Warehouse::find($id);

    }
    public function render()
    {
        $suppliers = Supplier::all();
        $products = ProductStore::all();
        return view('livewire.inventario.entry-live', compact('suppliers', 'products'));
    }
    public function createEntry()
    {
        if ($this->entryForm->store($this->warehouse, $this->product, $this->supplier)) {
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
