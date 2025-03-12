<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionNegocio extends Model
{
    use HasFactory;
    protected $fillable = [
        'negocio_id',
        'contact_id',
        'tipo',
        'description',
        'date',
        'image',
        'archivo',
    ];
    public function negocio()
    {
        return $this->belongsTo(Negocio::class);
    }
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
