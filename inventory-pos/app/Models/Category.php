<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $filleable = [
        'category_name',
        'category_code',
        'category_description',
        'photo',
        'status',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
