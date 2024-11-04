<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageSpot extends Model
{
    use HasFactory;

    protected $fillable = [
        'spot',
        'status',
    ];
}
