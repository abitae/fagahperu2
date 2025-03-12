<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventory_id',
        'brand_id',
        'description',
        'entry_code',
        'quantity',
        'unit_price',
    ];
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
}
