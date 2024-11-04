<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'brand_id',
        'Product_name',
        'unit',
        'purchase_price',
        'selling_price',
        'warehouse',
        'storage_spot',
        'min_qty',
        'qty',
        'reorder_lavel',
        'description',
        'supplier',
        'status',
        'photo',
        'sku'
    ];

    // join with brand table 
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
