<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'city',
        'company_name',
        'bank_name',
        'account_holder',
        'account_no',
        'brance_name',
        'routing_no',
        'photo',
        'status',
    ];


    function purchase()
    {
        return $this->hasMany(Purchase::class);
    }
}
