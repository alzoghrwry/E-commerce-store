<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'on_sale', 'image_path'];

    protected $casts = [
        'on_sale' => 'boolean',
        'price'   => 'decimal:2',
    ];
}
