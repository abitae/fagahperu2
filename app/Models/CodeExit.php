<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeExit extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_store_id',
        'name',
    ];
    public function product()
    {
        return $this->belongsTo(ProductStore::class);
    }
}
