<?php

namespace App\Livewire\Forms;

use App\Models\Caracteristica;
use App\Models\Product;
use Livewire\Form;

class CaracteristicaForm extends Form
{
    public ?Caracteristica $caracteristica;
    public $product_id;
    public $estructura = '';
    public $base_del_asiento = '';
    public $relleno_del_asiento = '';
    public $acabado_del_asiento = '';
    public $espaldar = '';
    public $relleno_del_espaldar = '';
    public $acabado_del_espaldar = '';
    public $reposa_brazos = '';
    public $cantidad_de_patas = '';
    public $soporte_peso_máximo = '';
    public $garantia_de_fabrica = '';
    public $unidad_de_despacho = '';
    public $gama_de_color = '';
    public $marca = '';
    public $modelo = '';
    public $codigo_de_identificacion_unico = '';
    public $empaque_de_fabrica = '';
    public $certificado_de_ergonomía = '';
    public $entrega_del_producto_armado = '';
    public $soporte_del_asiento = '';
    public $material_patas = '';
    public $apilable = '';
    public $relleno_reposa_brazos = '';
    public $material_del_piston = '';
    public $material_de_la_funda_del_piston = '';
    public $tipo_de_mecanismo_del_asiento = '';
    public $material_del_mecanismo_del_asiento = '';
    public $soporte_lumbar = '';
    public $reposacabeza = '';
    public $numero_de_aspas = '';
    public $material_del_aspa = '';
    public $material_de_las_ruedas = '';
    public $tapizado_del_asiento = '';
    public $cubierta_del_espaldar = '';
    public $tapizado_del_espaldar = '';
    public $mecanismo_del_espaldar = '';
    public $tablero = '';
    public $platina_de_anclaje = '';
    public $tapizado_asiento = '';
    public $cantidad_de_cuerpos = '';
    public $contacto_superficie = '';
    public $cod_de_identif_unico = '';

    public function setCaracteristica(Caracteristica $caracteristica)
    {
        $this->caracteristica = $caracteristica;
        $this->product_id = $caracteristica->product_id;
        $this->estructura = $caracteristica->estructura;
        $this->base_del_asiento = $caracteristica->base_del_asiento;
        $this->relleno_del_asiento = $caracteristica->relleno_del_asiento;
        $this->acabado_del_asiento = $caracteristica->acabado_del_asiento;
        $this->espaldar = $caracteristica->espaldar;
        $this->relleno_del_espaldar = $caracteristica->relleno_del_espaldar;
        $this->acabado_del_espaldar = $caracteristica->acabado_del_espaldar;
        $this->reposa_brazos = $caracteristica->reposa_brazos;
        $this->cantidad_de_patas = $caracteristica->cantidad_de_patas;
        $this->soporte_peso_máximo = $caracteristica->soporte_peso_máximo;
        $this->garantia_de_fabrica = $caracteristica->garantia_de_fabrica;
        $this->unidad_de_despacho = $caracteristica->unidad_de_despacho;
        $this->gama_de_color = $caracteristica->gama_de_color;
        $this->marca = $caracteristica->marca;
        $this->modelo = $caracteristica->modelo;
        $this->codigo_de_identificacion_unico = $caracteristica->codigo_de_identificacion_unico;
        $this->empaque_de_fabrica = $caracteristica->empaque_de_fabrica;
        $this->certificado_de_ergonomía = $caracteristica->certificado_de_ergonomía;
        $this->entrega_del_producto_armado = $caracteristica->entrega_del_producto_armado;
        $this->soporte_del_asiento = $caracteristica->soporte_del_asiento;
        $this->material_patas = $caracteristica->material_patas;
        $this->apilable = $caracteristica->apilable;
        $this->relleno_reposa_brazos = $caracteristica->relleno_reposa_brazos;
        $this->material_del_piston = $caracteristica->material_del_piston;
        $this->material_de_la_funda_del_piston = $caracteristica->material_de_la_funda_del_piston;
        $this->tipo_de_mecanismo_del_asiento = $caracteristica->tipo_de_mecanismo_del_asiento;
        $this->material_del_mecanismo_del_asiento = $caracteristica->material_del_mecanismo_del_asiento;
        $this->soporte_lumbar = $caracteristica->soporte_lumbar;
        $this->reposacabeza = $caracteristica->reposacabeza;
        $this->numero_de_aspas = $caracteristica->numero_de_aspas;
        $this->material_del_aspa = $caracteristica->material_del_aspa;
        $this->material_de_las_ruedas = $caracteristica->material_de_las_ruedas;
        $this->tapizado_del_asiento = $caracteristica->tapizado_del_asiento;
        $this->cubierta_del_espaldar = $caracteristica->cubierta_del_espaldar;
        $this->tapizado_del_espaldar = $caracteristica->tapizado_del_espaldar;
        $this->mecanismo_del_espaldar = $caracteristica->mecanismo_del_espaldar;
        $this->tablero = $caracteristica->tablero;
        $this->platina_de_anclaje = $caracteristica->platina_de_anclaje;
        $this->tapizado_asiento = $caracteristica->tapizado_asiento;
        $this->cantidad_de_cuerpos = $caracteristica->cantidad_de_cuerpos;
        $this->contacto_superficie = $caracteristica->contacto_superficie;
        $this->cod_de_identif_unico = $caracteristica->cod_de_identif_unico;
    }
    public function store(Product $product)
    {
        //dd($product);
        try {
            //$this->validate();
            $product->caracteristicas()->updateOrCreate(
                ['product_id' => $product->id],
                [
                    'estructura' => $this->estructura,
                    'base_del_asiento' => $this->base_del_asiento,
                    'relleno_del_asiento' => $this->relleno_del_asiento,
                    'acabado_del_asiento' => $this->acabado_del_asiento,
                    'espaldar' => $this->espaldar,
                    'relleno_del_espaldar' => $this->relleno_del_espaldar,
                    'acabado_del_espaldar' => $this->acabado_del_espaldar,
                    'reposa_brazos' => $this->reposa_brazos,
                    'cantidad_de_patas' => $this->cantidad_de_patas,
                    'soporte_peso_máximo' => $this->soporte_peso_máximo,
                    'garantia_de_fabrica' => $this->garantia_de_fabrica,
                    'unidad_de_despacho' => $this->unidad_de_despacho,
                    'gama_de_color' => $this->gama_de_color,
                    'marca' => $this->marca,
                    'modelo' => $this->modelo,
                    'codigo_de_identificacion_unico' => $this->codigo_de_identificacion_unico,
                    'empaque_de_fabrica' => $this->empaque_de_fabrica,
                    'certificado_de_ergonomía' => $this->certificado_de_ergonomía,
                    'entrega_del_producto_armado' => $this->entrega_del_producto_armado,
                    'soporte_del_asiento' => $this->soporte_del_asiento,
                    'material_patas' => $this->material_patas,
                    'apilable' => $this->apilable,
                    'relleno_reposa_brazos' => $this->relleno_reposa_brazos,
                    'material_del_piston' => $this->material_del_piston,
                    'material_de_la_funda_del_piston' => $this->material_de_la_funda_del_piston,
                    'tipo_de_mecanismo_del_asiento' => $this->tipo_de_mecanismo_del_asiento,
                    'material_del_mecanismo_del_asiento'=> $this->material_del_mecanismo_del_asiento,
                    'soporte_lumbar' => $this->soporte_lumbar,
                    'reposacabeza' => $this->reposacabeza,
                    'material_de_las_ruedas' => $this->material_de_las_ruedas,
                    'tapizado_del_asiento' => $this->tapizado_del_asiento,
                    'cubierta_del_espaldar' => $this->cubierta_del_espaldar,
                    'tapizado_del_espaldar' => $this->tapizado_del_espaldar,
                    'mecanismo_del_espaldar' => $this->mecanismo_del_espaldar,
                    'tablero' => $this->tablero,
                    'platina_de_anclaje' => $this->platina_de_anclaje,
                    'tapizado_asiento' => $this->tapizado_asiento,
                    'cantidad_de_cuerpos' => $this->cantidad_de_cuerpos,
                    'contacto_superficie' => $this->contacto_superficie,
                    'cod_de_identif_unico' => $this->cod_de_identif_unico,
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
