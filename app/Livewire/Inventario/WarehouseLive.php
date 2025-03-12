<?php

namespace App\Livewire\Inventario;

use App\Livewire\Forms\WarehouseForm;
use App\Models\Warehouse;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

class WarehouseLive extends Component
{
    use WithPagination, WithoutUrlPagination;
    use LivewireAlert;
    public WarehouseForm $warehouseForm;
    public $search = '';
    public $num = 10;
    public $isOpenModal = false;
    public $isOpenModalExport = false;
    #[Computed]
    public function warehauses()
    {
        return Warehouse::where('name', 'LIKE', '%' . $this->search . '%')
            ->paginate($this->num, '*', 'page');
    }
    public function render()
    {
        return view('livewire.inventario.warehouse-live');
    }
    public function create()
    {
        $this->warehouseForm->reset();
        $this->isOpenModal = true;
    }
    public function update(Warehouse $warehouse)
    {
        $this->warehouseForm->reset();
        $this->warehouseForm->setWarehouse($warehouse);
        $this->isOpenModal = true;
    }
    public function delete(Warehouse $warehouse)
    {

        if ($this->warehouseForm->destroy($warehouse->id)) {
            $this->message('success', 'En hora buena!', 'Registro eliminado correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo eliminar el registro!');
        }
    }
    public function estado(Warehouse $warehouse)
    {

        if ($this->warehouseForm->estado($warehouse->id)) {
            $this->message('success', 'En hora buena!', 'Registro actualiza correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo actualizar el registro!');
        }
    }
    public function createWarehause()
    {

        if ($this->warehouseForm->store()) {
            $this->message('success', 'En hora buena!', 'Registro creado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }
    public function updateWarehause()
    {
        if ($this->warehouseForm->update()) {
            $this->message('success', 'En hora buena!', 'Registro actualizado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }
    public function exportWarehouse()
    {
        $this->isOpenModalExport = false;
        return $this->warehouseForm->export();
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
            'toast' => true,
            'text' => $message,
            'timerProgressBar' => true,
        ]);
    }
}
