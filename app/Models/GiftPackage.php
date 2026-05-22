<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GiftPackage extends Model
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