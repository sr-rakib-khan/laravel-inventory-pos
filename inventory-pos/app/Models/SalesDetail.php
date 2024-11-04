<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesDetail extends Model
{
    use HasFactory;

    protected $table = 'salesdetails';

    protected $fillable = [
        'sale_id',
        'product_id',
        'qty',
        'price',
        'subtotal',
        'tax',
        'discount',
        'total',
    ];
}
