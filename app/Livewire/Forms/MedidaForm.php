<?php

namespace App\Livewire\Forms;

use App\Models\Almacen\Medida;
use App\Models\Product;
use Livewire\Form;

class MedidaForm extends Form
{
    public ?Medida $medida;
    public $product_id = '';
    public $alto_total = '';
    public $ancho_total = '';
    public $profundidad_total = '';
    public $alto_espaldar = '';
    public $ancho_espaldar = '';
    public $profundidad_asiento = '';
    public $ancho_asiento = '';
    public $altura_asiento = '';
    public $margen_error = '';
    public $descripcion_general = '';
    public $recomendacion_uso = '';

    public function setMedida(Medida $medida)
    {
        $this->medida = $medida;
        $this->product_id = $medida->product_id;
        $this->alto_total = $medida->alto_total;
        $this->ancho_total = $medida->ancho_total;
        $this->profundidad_total = $medida->profundidad_total;
        $this->alto_espaldar = $medida->alto_espaldar;
        $this->ancho_espaldar = $medida->ancho_espaldar;
        $this->profundidad_asiento = $medida->profundidad_asiento;
        $this->ancho_asiento = $medida->ancho_asiento;
        $this->altura_asiento = $medida->altura_asiento;
        $this->margen_error = $medida->margen_error;
        $this->descripcion_general = $medida->descripcion_general;
        $this->recomendacion_uso = $medida->recomendacion_uso;
    }
    public function store(Product $product)
    {

        try {
            $product->medidas()->updateOrCreate(
                ['product_id' => $product->id],
                [
                    'alto_total' => $this->alto_total,
                    'ancho_total' => $this->ancho_total,
                    'profundidad_total' => $this->profundidad_total,
                    'alto_espaldar' => $this->alto_espaldar,
                    'ancho_espaldar' => $this->ancho_espaldar,
                    'profundidad_asiento' => $this->profundidad_asiento,
                    'ancho_asiento' => $this->ancho_asiento,
                    'altura_asiento' => $this->altura_asiento,
                    'margen_error' => $this->margen_error,
                    'descripcion_general' => $this->descripcion_general,
                    'recomendacion_uso' => $this->recomendacion_uso,
                ]
            );
            infoLog('Caracteristica store', $this->product_id);
            return true;
        } catch (\Exception $e) {
            errorLog('Caracteristica store', $e);
            return false;
        }

    }
}
