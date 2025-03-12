<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStore extends Model
{
    use HasFactory;
    protected $fillable = [
        'code_entrada',
        'price_compra',
        'price_venta',
        'isActive',
    ];
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
    public function codexits()
    {
        return $this->hasMany(CodeExit::class);
    }
}
