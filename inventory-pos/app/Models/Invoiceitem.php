<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoiceitem extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'product_name',
        'qty',
        'price',
        'subtotal',
    ];

    function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    
}
