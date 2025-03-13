<?php

namespace App\Livewire\Convenio;

use App\Imports\ProductsImport;
use App\Models\ProductData;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class ImportProductLive extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    #[Validate('required')]
    public $file;
    public function render()
    {
        return view('livewire.convenio.import-product-live');
    }
    public function import()
    {
        if ($this->file->getClientOriginalExtension() !== 'xlsx') {
            $this->message('error', 'Error!', 'El archivo debe ser un Excel (.xlsx)');
            return;
        }
        try {
            $products = ProductData::where('cod_acuerdo_marco', 'EXT-CE-2024-11' )->delete();
            Excel::import(new ProductsImport, $this->file);
            $this->message('success', 'En hora buena!', 'Archivo procesado correctamente!');
            $this->file = null;
            infoLog('CM import', Auth::user()->name . ' importo productos');
        } catch (\Exception $e) {
            $this->message('error', 'Error!', 'No se pudo procesar el archivo!');
            $this->file = null;
            errorLog('CM import', $e);
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
