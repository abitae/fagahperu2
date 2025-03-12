<?php

namespace App\Livewire\Almacen;

use App\Livewire\Forms\BrandForm;
use App\Models\Brand;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class BrandLive extends Component
{
    use WithPagination, WithoutUrlPagination;
    use LivewireAlert;
    public BrandForm $brandForm;
    public $search = '';
    public $num = 10;
    public $isOpenModal = false;
    public $isOpenModalExport = false;
    #[Computed]
    public function brands()
    {
        return Brand::where('code', 'LIKE', '%' . $this->search . '%')
            ->orWhere('name', 'LIKE', '%' . $this->search . '%')
            ->paginate($this->num, '*', 'page');
    }
    public function render()
    {
        return view('livewire.almacen.brand-live');
    }
    public function create()
    {
        $this->brandForm->reset();
        $this->isOpenModal = true;
    }
    public function update(Brand $brand)
    {
        $this->brandForm->reset();
        $this->brandForm->setBrand($brand);
        $this->isOpenModal = true;
    }
    public function delete(Brand $brand)
    {
        
        if ($this->brandForm->destroy($brand->id)) {
            $this->message('success', 'En hora buena!', 'Registro eliminado correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo eliminar el registro!');
        }
    }
    public function estado(Brand $brand)
    {
        if ($this->brandForm->estado($brand->id)) {
            $this->message('success', 'En hora buena!', 'Registro actualiza correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo actualizar el registro!');
        }
    }
    public function createBrand()
    {
        if ($this->brandForm->store()) {
            $this->message('success', 'En hora buena!', 'Registro creado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }
    public function updateBrand()
    {
        if ($this->brandForm->update()) {
            $this->message('success', 'En hora buena!', 'Registro actualizado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }
    public function exportBrand()
    {
        $this->isOpenModalExport = false;
        return $this->brandForm->export();
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
