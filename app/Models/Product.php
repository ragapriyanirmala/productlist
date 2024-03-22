<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_sku',
        'product_description',
        'product_price',
        'product_images', // If you have multiple images, store them as an array
    ];

    // If you need to cast product_images as an array
    protected $casts = [
        'product_images' => 'array',
    ];

    // Other model definitions like relationships would go here
}

