<?php

namespace App\Livewire\Inventario;

use App\Livewire\Forms\CodeExitForm;
use App\Livewire\Forms\ProductStoreForm;
use App\Models\CodeExit;
use App\Models\Inventory;
use App\Models\ProductStore;
use App\Models\Supplier;
use App\Models\Warehouse;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class InventoryLive extends Component
{
    use WithPagination, WithoutUrlPagination;
    use LivewireAlert;
    public $warehouse_id;
    public $search = '';
    public $verLive = false;
    public $salida = false;
    public $isOpenModal = false;
    public ProductStoreForm $productForm;
    public CodeExitForm $codeExitForm;
    public $isOpenModalExit = false;
    public function render()
    {
        $suppliers = Supplier::all();
        $products = ProductStore::all();
        $warehouses = Warehouse::where('isActive', true)->get();
        $inventories = Inventory::query();
        if($this->warehouse_id){
            $inventories = $inventories->where('warehouse_id', $this->warehouse_id);
        }
        if($this->search){
            $inventories = $inventories->whereHas('product', function ($q) {
                $q->where('code_entrada', 'LIKE', '%' . $this->search . '%');
            });
        }
        $inventories = $inventories->paginate(10);
        return view('livewire.inventario.inventory-live', compact('warehouses', 'inventories', 'suppliers', 'products'));
    }

    public function updatedSearch($value)
    {
        $this->resetPage();
    }
    public function updatedWarehouseId($value)
    {
        $this->verLive = false;
    }
    public function create()
    {
        $this->productForm->reset();
        $this->isOpenModal = true;
    }
    public function createProduct()
    {
        if ($this->productForm->store()) {
            $this->message('success', 'En hora buena!', 'Registro creado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }
    public function deleteExit(CodeExit $codeExit)
    {
        if ($this->productForm->destroyExit($codeExit->id)) {
            $this->message('success', 'En hora buena!', 'Registro eliminado correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo eliminar el registro!');
        }
    }
    public function addCodeExit(ProductStore $product)
    {
        $this->codeExitForm->reset();
        $this->codeExitForm->product_store_id = $product->id;
        $this->isOpenModalExit = true;
    }
    public function createCodeExit()
    {
        if ($this->codeExitForm->store()) {
            $this->message('success', 'En hora buena!', 'Registro creado correctamente!');
            $this->isOpenModalExit = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }
    public function update(ProductStore $product)
    {
        $this->productForm->reset();
        $this->productForm->setProductStore($product);
        $this->isOpenModal = true;
    }
    public function updateProduct()
    {
        if ($this->productForm->update()) {
            $this->message('success', 'En hora buena!', 'Registro actualizado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }
    public function delete(ProductStore  $product)
    {

        if ($this->productForm->destroy($product->id)) {
            $this->message('success', 'En hora buena!', 'Registro eliminado correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo eliminar el registro!');
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
