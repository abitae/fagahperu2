<?php

namespace App\Livewire\Forms;

use App\Exports\ProductStoresExport;
use App\Models\CodeExit;
use App\Models\ProductStore;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProductStoreForm extends Form
{
    public ?ProductStore $product;
    #[Validate('required|min:5|unique:product_stores')]
    public $code_entrada = '';
    public $code_salida = [];
    public $price_compra = 0;
    public $price_venta = 0;
    public $isActive = true;
    public function setProductStore(ProductStore $product)
    {
        $this->product = $product;
        $this->code_entrada = $product->code_entrada;
        $this->price_compra = $product->price_compra;
        $this->price_venta = $product->price_venta;
        $this->code_salida = $product->code_salida;
    }
    public function store()
    {
        try {
            $this->validate();
            ProductStore::create($this->all());
            infoLog('ProductStore store', $this->code_entrada);
            return true;
        } catch (\Exception $e) {
            errorLog('ProductStore store', $e);
            return false;
        }
    }
    public function update()
    {
        try {
            $this->product->update([
                'code_entrada' => $this->code_entrada,
                'price_compra' => $this->price_compra,
                'price_venta' => $this->price_venta,
                'code_salida' => $this->code_salida,
            ]);
            infoLog('ProductStore update', $this->code_entrada);
            return true;
        } catch (\Exception $e) {
            errorLog('ProductStore update', $e);
            return false;
        }
    }
    public function destroy($id)
    {
        try {
            $product = ProductStore::find($id);
            $product->delete();
            infoLog('ProductStore deleted', $product->code_entrada);
            return true;
        } catch (\Exception $e) {
            errorLog('ProductStore deleted', $e);
            return false;
        }
    }
    public function destroyExit($id)
    {
        try {
            $codeExit = CodeExit::find($id);
            $codeExit->delete();
            infoLog('ProductStore deleted', $codeExit->name);
            return true;
        } catch (\Exception $e) {
            errorLog('ProductStore deleted', $e);
            return false;
        }
    }
    public function estado($id)
    {
        try {
            $product = ProductStore::find($id);
            $product->isActive = !$product->isActive;
            $product->save();
            infoLog('ProductStore estado ' . $product->isActive, $product->code_entrada);
            return true;
        } catch (\Exception $e) {
            errorLog('ProductStore estado', $e);
            return false;
        }
    }
    public function export()
    {
        //return Excel::download(new ProductStoresExport, 'products.xlsx');
    }
}
