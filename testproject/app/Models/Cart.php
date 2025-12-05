<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    /**
     * User who owns this cart row.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Product in this cart row.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}