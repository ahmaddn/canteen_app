<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'category_id',
        'user_id',
        'sku',
        'brand',
        'name',
        'price',
        'stock',
        'description',
        'is_available',
        'expired_at',
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function attachments()
    {
        return $this->hasMany(Attachments::class, 'product_id');
    }
}
