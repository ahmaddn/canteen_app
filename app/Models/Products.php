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
        return $this->hasMany(Attachments::class);
    }
}
