<?php

namespace App\Livewire\Convenio;

use App\Models\AcuerdoMarco;
use App\Models\ProductData;
use Carbon\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class ProductLive extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $search = '';
    public $num = 10;
    public $convenioMarco;
    public $searchMarca;
    public $searchPartNumber;
    public $start_date;
    public $end_date;
    public $dateNow;

    public function mount()
    {
        $this->start_date = Carbon::now('GMT-5')->startOfDay()->format('Y-m-d');
        $this->end_date = Carbon::now('GMT-5')->endOfDay()->format('Y-m-d');
        $this->convenioMarco = AcuerdoMarco::first()->code;
    }
    #[Computed]
    public function acuerdosMarco()
    {
        return AcuerdoMarco::where('isActive', true)->get();
    }
    #[Computed]
    public function datas()
    {
        return ProductData::where('cod_acuerdo_marco', $this->convenioMarco)
            ->Where('numero_parte', 'LIKE', '%' . $this->searchPartNumber . '%')
            ->Where('marca_ficha_producto', 'LIKE', '%' . $this->searchMarca . '%')
            ->where(
                fn($query)
                => $query
                    ->orWhere('orden_electronica', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('ruc_proveedor', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('ruc_entidad', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('razon_proveedor', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('razon_entidad', 'LIKE', '%' . $this->search . '%')
            )
            ->whereBetween("fecha_aceptacion", array($this->start_date, $this->end_date))
            ->orderBy('fecha_aceptacion', 'desc')
            ->paginate($this->num, '*', 'page');
    }
    public function render()
    {
        return view('livewire.convenio.product-live');
    }
    public function detail(ProductData $id){
        return redirect()->route('convenio.detail', ['id' => $id]);
    }
    public function updatedConvenioMarco($value)
    {
        $this->resetPage();
    }
    public function updatedSearchMarca($value)
    {
        $this->resetPage();
    }
    public function updatedSearch($value)
    {
        $this->resetPage();
    }
    public function updatedStartDate()
    {
        $this->resetPage();
    }

    public function updatedEndDate()
    {
        $this->resetPage();
        $this->render();
    }
}
