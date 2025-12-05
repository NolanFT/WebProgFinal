<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
    ];

    public function cart() 
    {
        return $this->belongsTo(Cart::class); //CartItem milik 1 cart
    }

    public function product() 
    {
        return $this->belongsTo(Product::class); // CartItem milik 1 produk
    }
}
