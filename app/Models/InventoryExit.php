<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryExit extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventory_id',
        'customer_id',
        'description',
        'exit_code',
        'quantity',
        'unit_price',
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
}
