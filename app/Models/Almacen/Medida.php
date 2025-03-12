<?php

namespace App\Models\Almacen;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medida extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'alto_total',
        'ancho_total',
        'profundidad_total',
        'alto_espaldar',
        'ancho_espaldar',
        'profundidad_asiento',
        'ancho_asiento',
        'altura_asiento',
        'margen_error',
        'descripcion_general',
        'recomendacion_uso',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
