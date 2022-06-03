<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';
    protected $fillable = [
        'category_id', 'product_name', 'type', 'item', 'weight', 'sku', 'price_sell', 'price_promo',
        'price_agent', 'photo', 'recommendation', 'description', 'status'
    ];
}
