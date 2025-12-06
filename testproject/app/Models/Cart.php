<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    public function user() 
    {
        return $this->belongsTo(User::class); // Cart milik 1 user
    }

    public function items()
    {
        return $this->hasMany(CartItem::class); // Cart mempunyai banyak cart_items
    }
}
