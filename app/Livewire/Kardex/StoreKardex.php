<?php

namespace App\Livewire\Kardex;

use App\Livewire\Forms\StoreForm;
use App\Models\Store;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class StoreKardex extends Component
{
    use WithPagination, WithoutUrlPagination;
    use LivewireAlert;
    public StoreForm $storeForm;
    public $search = '';
    public $num = 10;
    public $isOpenModal = false;
    public $isOpenModalExport = false;
    #[Computed]
    public function stores()
    {
        //return Store::where('name', 'LIKE', '%' . $this->search . '%')
        //    ->paginate($this->num, '*', 'page');
    }
    public function render()
    {
        return view('livewire.kardex.store-kardex');
    }
    public function create()
    {
        $this->storeForm->reset();
        $this->isOpenModal = true;
    }
    public function update(Store $store)
    {
        $this->storeForm->reset();
        $this->storeForm->setStore($store);
        $this->isOpenModal = true;
    }
    public function delete(Store $store)
    {
        
        if ($this->storeForm->destroy($store->id)) {
            $this->message('success', 'En hora buena!', 'Registro eliminado correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo eliminar el registro!');
        }
    }
    public function estado(Store $store)
    {
        if ($this->storeForm->estado($store->id)) {
            $this->message('success', 'En hora buena!', 'Registro actualiza correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo actualizar el registro!');
        }
    }
    public function createStore()
    {
        if ($this->storeForm->store()) {
            $this->message('success', 'En hora buena!', 'Registro creado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }
    public function updateStore()
    {
        if ($this->storeForm->update()) {
            $this->message('success', 'En hora buena!', 'Registro actualizado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }
    public function exportStore()
    {
        $this->isOpenModalExport = false;
        return $this->storeForm->export();
    }
    public function updatedSearch($value)
    {
        $this->resetPage();
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
