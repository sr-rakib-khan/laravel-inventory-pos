<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cartinfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_id',
        'reference',
        'payment_status',
        'tax',
        'tax_amount',
        'discount',
        'discount_amount',
        'due',
        'total'
    ];
}
