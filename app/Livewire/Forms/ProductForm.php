<?php
namespace App\Livewire\Forms;

use App\Exports\ProductsExport;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Maatwebsite\Excel\Facades\Excel;

class ProductForm extends Form
{
    public ?Product $product;
    #[Validate('required|min:1')]
    public $brand_id = '';
    #[Validate('required|min:1')]
    public $category_id = '';
    #[Validate('required|min:1')]
    public $line_id = '';
    #[Validate('required|min:5|unique:products')]
    public $code = '';
    #[Validate('required')]
    public $code_fabrica = '';
    #[Validate('required')]
    public $code_peru = '';
    #[Validate('required|numeric|min:0')]
    public $price_compra = '';
    #[Validate('required|numeric|min:0')]
    public $price_venta = '';
    public $porcentaje = 0;
    #[Validate('required')]
    public $stock = '';
    public $dias_entrega = 0;
    #[Validate('required')]
    public $description = ''; //
    public $tipo = '';
    public $color = '';
    public $garantia = '';
    public $observaciones = '';
    #[Validate('nullable|sometimes|image|max:10960|mimes:jpeg,jpg,png|extensions:jpeg,jpg,png')]
    public $image = '';
    #[Validate('nullable|sometimes|mimes:pdf|max:20960|extensions:pdf')] // 1MB Max
    public $archivo = '';
    #[Validate('nullable|sometimes|mimes:pdf|max:20960|extensions:pdf')] // 1MB Max
    public $archivo2 = '';
    public $isActive = false;

    public function setProduct(Product $product)
    {
        $this->product = $product;
        $this->fill($product->toArray());
    }

    public function store()
    {
        try {
            $this->validate();
            $this->handleFileUploads();
            Product::create($this->getProductData());
            infoLog('Product store form', $this->code);

            return true;
        } catch (\Exception $e) {
            errorLog('Product store form', $e);
            return false;
        }
        $this->reset();
    }

    public function update()
    {
        try {
            $this->handleFileUploads(true);
            $this->product->update($this->getProductData());
            infoLog('Product update form', $this->code);
            return true;
        } catch (\Exception $e) {
            errorLog('Product update form', $e);
            return false;
        }
        $this->reset();
    }

    public function destroy($id)
    {
        try {
            $product = Product::find($id);
            $product->delete();
            infoLog('Product deleted form', $product->code);
            return true;
        } catch (\Exception $e) {
            errorLog('Product deleted form', $e);
            return false;
        }
    }

    public function estado($id)
    {
        try {
            $product           = Product::find($id);
            $product->isActive = ! $product->isActive;
            $product->save();
            infoLog('Product estado ' . $product->isActive, $product->code);
            return true;
        } catch (\Exception $e) {
            errorLog('Product estado form', $e);
            return false;
        }
    }

    public function export()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    private function handleFileUploads($isUpdate = false)
    {
        if ($isUpdate) {
            $this->deleteOldFiles();
        }

        if (gettype($this->image) != 'string' && $this->image != null) {
            $this->image = $this->image->store('product/image');
        }
        if (gettype($this->archivo) != 'string' && $this->archivo != null) {
            $this->archivo = $this->archivo->store('product/pdf');
        }
        if (gettype($this->archivo2) != 'string' && $this->archivo2 != null) {
            $this->archivo2 = $this->archivo2->store('product/pdf2');
        }
    }

    private function deleteOldFiles()
    {
        if ($this->product->image && gettype($this->image) != 'string') {
            Storage::delete($this->product->image);
        }
        if ($this->product->archivo && gettype($this->archivo) != 'string') {
            Storage::delete($this->product->archivo);
        }
        if ($this->product->archivo2 && gettype($this->archivo2) != 'string') {
            Storage::delete($this->product->archivo2);
        }
    }

    private function getProductData()
    {
        return [
            'brand_id'      => $this->brand_id,
            'category_id'   => $this->category_id,
            'line_id'       => $this->line_id,
            'code'          => $this->code,
            'code_fabrica'  => $this->code_fabrica,
            'code_peru'     => $this->code_peru,
            'price_compra'  => $this->price_compra,
            'price_venta'   => $this->price_venta,
            'porcentaje'    => $this->porcentaje,
            'stock'         => $this->stock,
            'dias_entrega'  => $this->dias_entrega,
            'description'   => $this->description,
            'tipo'          => $this->tipo,
            'color'         => $this->color,
            'garantia'      => $this->garantia,
            'observaciones' => $this->observaciones,
            'image'         => $this->image,
            'archivo'       => $this->archivo,
            'archivo2'      => $this->archivo2,
        ];
    }
}
