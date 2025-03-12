<?php

namespace App\Models\Crm;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'isActive',
    ];
    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
