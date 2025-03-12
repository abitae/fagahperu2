<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'warehouse_id',
        'quantity',
    ];
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
    public function product()
    {
        return $this->belongsTo(ProductStore::class);
    }
    public function entries()
    {
        return $this->hasMany(InventoryEntry::class);
    }
    public function exits()
    {
        return $this->hasMany(InventoryExit::class);
    }
}
