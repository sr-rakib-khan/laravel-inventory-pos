<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'purchase_date',
        'invoice_number',
        'total_amount',
        'payment_status',
    ];


    function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }


    function purchaseitem()
    {
        return $this->hasMany(Purchaseitem::class);
    }
}
