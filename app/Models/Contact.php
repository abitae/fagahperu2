<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'type_code',
        'code',
        'first_name',
        'last_name',
        'date_brinday',
        'phone',
        'email',
        'address',
        'isActive',
    ];
}
