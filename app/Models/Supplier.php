<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'type_code',
        'code',
        'first_name',
        'phone',
        'email',
        'address',
        'archivo',
        'isActive',
    ];
    public function inventories()
    {
        return $this->hasMany(InventoryEntry::class);
    }
}
