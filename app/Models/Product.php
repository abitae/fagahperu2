<?php

namespace App\Models;

use App\Models\Almacen\Medida;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand_id',
        'category_id',
        'line_id',
        'code',
        'code_fabrica',
        'code_peru',
        'price_compra',
        'price_venta',
        'porcentaje',
        'stock',
        'dias_entrega',
        'description',
        'tipo',
        'color',
        'garantia',
        'observaciones',
        'image',
        'archivo',
        'archivo2',
        'isActive',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function line()
    {
        return $this->belongsTo(Line::class);
    }
    public function cotizaciondetalles()
    {
        return $this->hasMany(CotizacionDetalle::class);
    }
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
    public function codexits()
    {
        return $this->hasMany(CodeExit::class);
    }
    public function caracteristicas()
    {
        return $this->hasMany(Caracteristica::class);
    }
    public function medidas()
    {
        return $this->hasMany(Medida::class);
    }
}
