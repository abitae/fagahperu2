<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negocio extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'user_id',
        'code',
        'name',
        'date_closing',
        'priority',
        'monto_aprox',
        'stage',
        'description',
        'isActive',
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function actions()
    {
        return $this->hasMany(ActionNegocio::class);
    }
}

