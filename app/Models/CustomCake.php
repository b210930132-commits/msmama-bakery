<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomCake extends Model
{
    protected $fillable = [
        'title',
        'label',
        'description',
        'price',
        'image',
        'is_active',
    ];
}