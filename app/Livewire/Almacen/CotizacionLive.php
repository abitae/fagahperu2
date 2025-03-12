<?php

namespace App\Livewire\Almacen;

use App\Models\CotizacionDetalle;
use App\Models\Customer;
use App\Models\Line;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CotizacionLive extends Component
{
    public $customer; //id cliente seleccionado por select2
    public $product; //id producto seleccionado por select2

    public $customerSelect; //Cliente seleccionado por select2
    public $productSelect; //Producto seleccionado por select2

    public $productos_cotizados = []; //lista de productos cotizados

    public $line_id = 1; // select linea o marca
    public $cotizacionNew;
    public $cantitad_detalle = 1;
    public $price_cotizacion = 0;

    public $forma_pago;
    public $time_entrega;
    public $valido_coti;

    public $mensage01;
    public $mensage02;
    public $mensage03;
    public $cuerpo = 'Reciba un cordial saludo en representación de la marca [Marca]. A continuación, adjuntamos nuestras propuestas a susrequerimientos según el catálogo electrónico de PERÚ COMPRAS enmarcadas en el CONVENIO EXT-CE-2023-11 MOBILIARIO ENGENERAL.';
    public $num_coti;
    public function mount()
    {

        $this->customerSelect = Customer::first();
        $this->line_id = Line::first()->id;
    }

    public function render()
    {
        //Cart::destroy();
        $items = Cart::content();
        $total = Cart::subtotal();
        $igv = (float)filter_var($total, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION) / 1.18;
        $sub_total = (float)filter_var($total, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION)  - $igv;
        $customers = Customer::all();
        $products = Product::all();
        $lines = Line::all();
        return view('livewire.almacen.cotizacion-live', compact('customers', 'products', 'lines', 'items', 'total', 'igv', 'sub_total'));
    }
    public function updatedCustomer()
    {
        $this->customerSelect = Customer::find($this->customer);
    }
    public function updatedProduct()
    {
        $this->productSelect = Product::find($this->product);
        $this->price_cotizacion = $this->productSelect->price_venta;
    }
    public function AddProductCotizacion()
    {
        if (isset($this->productSelect)) {
            Cart::add([
                'id' => $this->productSelect->id,
                'name' => $this->productSelect->code,
                'qty' => $this->cantitad_detalle,
                'price' => $this->price_cotizacion,
                'weight' => 0
            ]);
        }
    }
    public function delete($rowId)
    {
        Cart::remove($rowId);
    }
    public function exportar()
    {

        $fecha = \Carbon\Carbon::now()->locale("es_PE")->isoFormat('D \d\e MMMM \d\e\l Y');
        $forma_pago = $this->forma_pago;
        $time_entrega = $this->time_entrega;
        $valido_coti = $this->valido_coti;

        $mensage01 = $this->mensage01;
        $mensage02 = $this->mensage02;
        $mensage03 = $this->mensage03;
        $cuerpo = $this->cuerpo;
        $num_coti = $this->num_coti;
        $items = Cart::content();
        $line = Line::find($this->line_id);
        $customer = $this->customerSelect;
        //dd($line);
        $total = Cart::subtotal();
        $igv = (float)filter_var($total, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION) / 1.18;
        $sub_total = (float)filter_var($total, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION)  - $igv;
        $pdf = Pdf::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
            ->setPaper('a4', 'portrait')
            ->loadView('livewire.almacen.report.cotizacion', compact('num_coti','cuerpo','fecha', 'mensage01', 'mensage02', 'mensage03', 'forma_pago', 'time_entrega', 'valido_coti', 'line', 'customer', 'items', 'total', 'igv', 'sub_total'))
            ->output();
        return response()
            ->streamDownload(
                fn() => print($pdf),
                "export.pdf"
            );
    }
    public function remove()
    {
        Cart::destroy();
    }
}
