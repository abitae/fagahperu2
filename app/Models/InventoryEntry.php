<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventory_id',
        'supplier_id',
        'description',
        'entry_code',
        'quantity',
        'unit_price',
    ];
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
}
