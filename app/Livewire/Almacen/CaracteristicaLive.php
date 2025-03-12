<?php

namespace App\Livewire\Almacen;

use App\Livewire\Forms\CaracteristicaForm;
use App\Livewire\Forms\MedidaForm;
use App\Models\Almacen\Medida;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CaracteristicaLive extends Component
{
    use LivewireAlert;
    public $product;
    public CaracteristicaForm $form;
    public MedidaForm $medidaForm;
    public function mount(Product $product)
    {
        if(!is_null($product->caracteristicas->first())){
            $this->form->setCaracteristica($product->caracteristicas->first());
        }
        if(!is_null($product->medidas->first())){
            $this->medidaForm->setMedida($product->medidas->first());
        }
    }
    public function render()
    {
        $product = $this->product;
        return view('livewire.almacen.caracteristica-live', compact('product'));
    }
    public function saveCaracteristicas()
    {

        if ($this->form->store($this->product)) {
            $this->message('success', 'En hora buena!', 'Registro actualizado correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo actualizar el registro!');
        }
    }
    public function saveMedidas()
    {
        if ($this->medidaForm->store($this->product)) {
            $this->message('success', 'En hora buena!', 'Registro actualizado correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo actualizar el registro!');
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
