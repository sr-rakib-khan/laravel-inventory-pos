<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;


    protected $fillable = [
        'total_amount',
    ];


    function items()
    {
        return $this->hasMany(Invoiceitem::class);
    }


    public function deletePreviousItems()
    {

        $this->items()->delete();
    }
}
