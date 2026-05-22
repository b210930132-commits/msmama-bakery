<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function orderItems()
{
    return $this->hasMany(\App\Models\OrderItem::class);
}
    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'image',
        'featured',
        'stock',
    ];

    }
