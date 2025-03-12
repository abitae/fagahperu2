<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcuerdoMarco extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'isActive',
    ];
}
