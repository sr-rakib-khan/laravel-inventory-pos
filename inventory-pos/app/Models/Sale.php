<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'reference',
        'status',
        'payment',
        'total',
        'paid',
        'due',
        'tax',
        'discount',
        'shipping',
        'biller',
        'date',
    ];
}
