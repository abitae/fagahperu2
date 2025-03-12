<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caracteristica extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id'
        ,'estructura'
        , 'base_del_asiento'
        , 'relleno_del_asiento'
        , 'acabado_del_asiento'
        , 'espaldar'
        , 'relleno_del_espaldar'
        , 'acabado_del_espaldar'
        , 'reposa_brazos'
        , 'cantidad_de_patas'
        , 'soporte_peso_máximo'
        , 'garantía_de_fabrica'
        , 'unidad_de_despacho'
        , 'gama_de_color'
        , 'marca'
        , 'modelo'
        , 'codigo_de_identificacion_unico'
        , 'empaque_de_fabrica'
        , 'certificado_de_ergonomía'
        , 'entrega_del_producto_armado'
        , 'soporte_del_asiento'
        , 'reposa_brazos'
        , 'material_patas'
        , 'apilable'
        , 'relleno_reposa_brazos'
        , 'material_del_piston'
        , 'material_de_la_funda_del_piston'
        , 'tipo_de_mecanismo_del_asiento'
        , 'material_del_mecanismo_del_asiento'
        , 'soporte_lumbar'
        , 'reposacabeza'
        , 'número_de_aspas'
        , 'material_del_aspa'
        , 'material_de_las_ruedas'
        , 'estructura'
        , 'tapizado_del_asiento'
        , 'cubierta_del_espaldar'
        , 'tapizado_del_espaldar'
        , 'mecanismo_del_espaldar'
        , 'tablero'
        , 'platina_de_anclaje'
        , 'tapizado_asiento'
        , 'cantidad_de_cuerpos'
        , 'contacto_superficie'
        , 'cod_de_identif_unico',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
