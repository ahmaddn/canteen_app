<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'category_id',
        'user_id',
        'sku',
        'name',
        'price',
        'stock',
        'is_available',
        'expired_at',
    ];
}
