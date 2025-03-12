<?php
namespace App\Livewire\Almacen;

use App\Exports\ProductsExport;
use App\Imports\ProductsCatalogoImport;
use App\Livewire\Forms\ProductForm;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Line;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class ProductLive extends Component
{
    use WithPagination, WithoutUrlPagination;
    use LivewireAlert;
    use WithFileUploads;
    public ProductForm $productForm;
    public $search = '';
    public $num = 100;
    public $isActive = true;
    public $isOpenModal = false;
    public $isOpenModalExport = false;

    public $stockFilter;
    public $categoryFilter;
    public $lineFilter;
    public $brandFilter;

    //product form
    public $product_brand_id;
    public $product_category_id;
    public $product_line_id;
    public $product_code;
    public $product_code_fabrica;
    public $product_code_peru;
    public $product_price_compra;
    public $product_price_venta;
    public $product_stock;
    public $product_dias_entrega = 0;
    public $product_description; //
    public $product_tipo;
    public $product_color;
    public $product_garantia = '';
    public $product_observaciones;
    public $product_image;
    public $product_archivo;
    public $product_archivo2;
    public $isOpenModalImport = false;
    public $file;
    #[Computed]
    public function brands()
    {
        return Brand::where('isActive', true)->get();
    }
    #[Computed]
    public function categories()
    {
        return Category::where('isActive', true)->get();
    }
    #[Computed]
    public function lines()
    {
        return Line::where('isActive', true)->get();
    }
    #[Computed]
    public function products()
    {
        return Product::query()
            ->when($this->lineFilter, function ($query) {
                $query->where('line_id', $this->lineFilter);
            })
            ->when($this->categoryFilter, function ($query) {
                $query->where('category_id', $this->categoryFilter);
            })
            ->when($this->brandFilter, function ($query) {
                $query->where('brand_id', $this->brandFilter);
            })
            ->when($this->search, function ($query) {
                $query->where('code', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('code_fabrica', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('code_peru', 'LIKE', '%' . $this->search . '%');
            })
            ->when($this->stockFilter, function ($query) {
                $query->where('stock', '>=', $this->stockFilter);
            })
            ->where('isActive', $this->isActive)
            ->latest()
            ->paginate($this->num, '*', 'page');
    }
    public function render()
    {
        return view('livewire.almacen.product-live');
    }
    public function create()
    {
        $this->productForm->reset();
        $this->isOpenModal = true;
    }
    public function update(Product $product)
    {
        $this->productForm->setProduct($product);
        $this->isOpenModal = true;
    }
    public function delete(Product $product)
    {
        if ($this->productForm->destroy($product->id)) {
            $this->message('success', 'En hora buena!', 'Registro eliminado correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo eliminar el registro!');
        }
    }
    public function estado(Product $product)
    {
        if ($this->productForm->estado($product->id)) {
            $this->message('success', 'En hora buena!', 'Registro actualiza correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo actualizar el registro!');
        }
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
    public function updateProduct()
    {
        if ($this->productForm->update()) {
            $this->message('success', 'En hora buena!', 'Registro actualizado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }

    public function exportProduct()
    {
        $this->isOpenModalExport = false;
        return $this->productForm->export();
    }
    public function updatedLineFilter($value)
    {
        $this->resetPage();
    }
    public function updatedCategoryFilter($value)
    {
        $this->resetPage();
    }
    public function updatedBrandFilter($value)
    {
        $this->resetPage();
    }
    public function updatedSearch($value)
    {
        $this->resetPage();
    }
    private function message($tipo, $tittle, $message)
    {
        $this->alert($tipo, $tittle, [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => $message,
            'showConfirmButton' => true,
            'confirmButtonText' => 'Aceptar',
            'confirmButtonColor' => '#3085d6',
        ]);
    }
    public function caracteristicas(Product $id)
    {
        return redirect()->route('almacen.caracteristicas', $id);
    }
    public function export()
    {
        return Excel::download(new ProductsExport, 'product.xlsx');
    }
    public function modalImport()
    {
        $this->isOpenModalImport = true;
    }
    public function import()
    {
        if ($this->file->getClientOriginalExtension() !== 'xlsx') {
            $this->message('error', 'Error!', 'El archivo debe ser un Excel (.xlsx)');
            return;
        }
        try {
            $product = Excel::import(new ProductsCatalogoImport, $this->file);
            //dd($product);
            $this->message('success', 'En hora buena!', 'Archivo procesado correctamente!');
            $this->file = null;
            infoLog('Import product catalogo', Auth::user()->name);
        } catch (\Exception $e) {
            $this->message('error', 'Error!', 'No se pudo procesar el archivo! /n '.$e);
            $this->file = null;
            errorLog('Import product catalogo '.Auth::user()->name, $e);
        }
        $this->isOpenModalImport = false;
    }
    public function exportPdf(Product $product)
    {
        dd($product);

        $pdf = Pdf::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
            ->setPaper('a4', 'portrait')
            ->loadView('livewire.almacen.report.cotizacion', compact('product'))
            ->output();
        return response()
            ->streamDownload(
                fn() => print ($pdf),
                "export.pdf"
            );
    }

    public function createProducto()
    {
        $rules = [
            'product_brand_id' => 'required|exists:brands,id',
            'product_category_id' => 'required|exists:categories,id',
            'product_line_id' => 'required|exists:lines,id',
            'product_code' => 'required|string|max:100',
            'product_code_fabrica' => 'required|string|max:100',
            'product_code_peru' => 'required|string|max:100',
            'product_price_compra' => 'required|numeric|min:0',
            'product_price_venta' => 'required|numeric|min:0',
            'product_stock' => 'required|integer|min:0',
            'product_dias_entrega' => 'required|integer|min:1',
            'product_description' => 'required|string',
            'product_tipo' => 'string|max:100',
            'product_color' => 'string|max:50',
            'product_garantia' => 'integer|min:0',
            'product_observaciones' => 'string',
            'product_image' => 'nullable|image|max:2048',
            'product_archivo' => 'nullable|mimes:pdf|max:10240',
            'product_archivo2' => 'nullable|mimes:pdf|max:10240',
        ];

        $message = [
            'product_brand_id.required' => 'La marca es obligatoria',
            'product_brand_id.exists' => 'La marca seleccionada no existe',
            'product_category_id.required' => 'La categoría es obligatoria',
            'product_category_id.exists' => 'La categoría seleccionada no existe',
            'product_line_id.required' => 'La línea es obligatoria',
            'product_line_id.exists' => 'La línea seleccionada no existe',
            'product_code.required' => 'El código es obligatorio',
            'product_code_fabrica.required' => 'El código de fábrica es obligatorio',
            'product_code_peru.required' => 'El código de Perú es obligatorio',
            'product_price_compra.required' => 'El precio de compra es obligatorio',
            'product_price_compra.numeric' => 'El precio de compra debe ser un número',
            'product_price_compra.min' => 'El precio de compra debe ser mayor o igual a 0',
            'product_price_venta.required' => 'El precio de venta es obligatorio',
            'product_price_venta.numeric' => 'El precio de venta debe ser un número',
            'product_price_venta.min' => 'El precio de venta debe ser mayor o igual a 0',
            'product_stock.required' => 'El stock es obligatorio',
            'product_stock.integer' => 'El stock debe ser un número entero',
            'product_stock.min' => 'El stock debe ser mayor o igual a 0',
            'product_dias_entrega.required' => 'Los días de entrega son obligatorios',
            'product_dias_entrega.integer' => 'Los días de entrega deben ser un número entero',
            'product_dias_entrega.min' => 'Los días de entrega deben ser al menos 1',
            'product_description.required' => 'La descripción es obligatoria',
            'product_garantia.required' => 'La garantía es obligatoria',
            'product_image.image' => 'El archivo debe ser una imagen',
            'product_image.max' => 'La imagen no debe superar los 2MB',
            'product_archivo.mimes' => 'El archivo debe ser un PDF',
            'product_archivo.max' => 'El archivo no debe superar los 10MB',
            'product_archivo2.mimes' => 'El segundo archivo debe ser un PDF',
            'product_archivo2.max' => 'El archivo no debe superar los 10MB',
            'product_observaciones.string' => '',

        ];
        //dd($this->product_code,$this->product_category_id,$this->product_line_id);
        dd($this->validate($rules, $message));

        // Crear un nuevo producto o actualizar uno existente
        $product = new Product();

        // Asignar valores básicos
        $product->brand_id = $this->product_brand_id;
        $product->category_id = $this->product_category_id;
        $product->line_id = $this->product_line_id;
        $product->code = $this->product_code;
        $product->code_fabrica = $this->product_code_fabrica;
        $product->code_peru = $this->product_code_peru;
        $product->price_compra = $this->product_price_compra;
        $product->price_venta = $this->product_price_venta;
        $product->stock = $this->product_stock;
        $product->dias_entrega = $this->product_dias_entrega;
        $product->description = $this->product_description;
        $product->tipo = $this->product_tipo;
        $product->color = $this->product_color;
        $product->garantia = $this->product_garantia;
        $product->observaciones = $this->product_observaciones;
        $product->isActive = true;

        // Manejar la imagen si se proporciona
        if ($this->product_image) {
            // Eliminar imagen anterior si existe y estamos actualizando
            if (isset($product->image) && file_exists(storage_path('app/public/' . $product->image))) {
                unlink(storage_path('app/public/' . $product->image));
            }

            // Guardar nueva imagen
            $imageName = time() . '_' . $this->product_image->getClientOriginalName();
            $imagePath = $this->product_image->storeAs('products/images', $imageName, 'public');
            $product->image = $imagePath;
        }

        // Manejar el primer archivo PDF si se proporciona
        if ($this->product_archivo) {
            // Eliminar archivo anterior si existe y estamos actualizando
            if (isset($product->archivo) && file_exists(storage_path('app/public/' . $product->archivo))) {
                unlink(storage_path('app/public/' . $product->archivo));
            }

            // Guardar nuevo archivo
            $archivoName = time() . '_' . $this->product_archivo->getClientOriginalName();
            $archivoPath = $this->product_archivo->storeAs('products/pdf', $archivoName, 'public');
            $product->archivo = $archivoPath;
        }

        // Manejar el segundo archivo PDF si se proporciona
        if ($this->product_archivo2) {
            // Eliminar archivo anterior si existe y estamos actualizando
            if (isset($product->archivo2) && file_exists(storage_path('app/public/' . $product->archivo2))) {
                unlink(storage_path('app/public/' . $product->archivo2));
            }

            // Guardar nuevo archivo
            $archivo2Name = time() . '_' . $this->product_archivo2->getClientOriginalName();
            $archivo2Path = $this->product_archivo2->storeAs('products/pdf2', $archivo2Name, 'public');
            $product->archivo2 = $archivo2Path;
        }
        //dd($product);
        // Guardar el producto
        if ($product->save()) {
            $this->message('success', '¡En hora buena!', 'Producto guardado correctamente');
            $this->isOpenModal = false;
            $this->reset([
                'product_brand_id',
                'product_category_id',
                'product_line_id',
                'product_code',
                'product_code_fabrica',
                'product_code_peru',
                'product_price_compra',
                'product_price_venta',
                'product_stock',
                'product_dias_entrega',
                'product_description',
                'product_tipo',
                'product_color',
                'product_garantia',
                'product_observaciones',
                'product_image',
                'product_archivo',
                'product_archivo2',
            ]);
            return true;
        } else {
            $this->message('error', 'Error', 'No se pudo guardar el producto');
            return false;
        }
    }
    public function deleteFilter()
    {
        $this->stockFilter = null;
        $this->categoryFilter = null;
        $this->lineFilter = null;
        $this->brandFilter = null;
        $this->search = null;
    }
}
