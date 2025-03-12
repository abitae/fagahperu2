<?php

namespace App\Models;

use App\Models\Crm\CustomerType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'type_id',
        'type_code',
        'code',
        'first_name',
        'phone',
        'email',
        'address',
        'archivo',
        'isActive',
    ];
    public function negocios()
    {
        return $this->hasMany(Negocio::class);
    }
    public function cotizaciones()
    {
        return $this->hasMany(Cotizacion::class);
    }
    public function inventories()
    {
        return $this->hasMany(InventoryExit::class);
    }
    public function type()
    {
        return $this->belongsTo(CustomerType::class, 'type_code');
    }
}
