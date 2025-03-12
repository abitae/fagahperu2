<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'logo',
        'fondo',
        'firma_autorizacion',
        'fondo_autorizacion',
        'fondo_rotulo',
        'archivo',
        'isActive',
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function cotizaciones()
    {
        return $this->hasMany(Cotizacion::class);
    }
}
