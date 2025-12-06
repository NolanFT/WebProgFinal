<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'image',
        'description',
        'quantity',
        'category_id',
    ];

    public function category() 
    {
        return $this->belongsTo(Category::class); // produk milik 1 kategori
    }

    public function cartItems() 
    {
        return $this->hasMany(CartItem::class); // Produk bisa muncul di banyak cart_items
    }
}
