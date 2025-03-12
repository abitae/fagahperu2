<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CotizacionDetalle extends Model
{
    use HasFactory;
    protected $fillable = [
        'cotizacion_id',
        'product_id',
        'cantidad',
        'price_cotizacion',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function cotizacion()
    {
        return $this->belongsTo(Cotizacion::class);
    }
}
