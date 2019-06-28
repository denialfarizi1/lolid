<?php

namespace App\Cart;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
     protected $table = 'cart';
    protected $fillable = ['user_id', 'produk_id', 'produk_name', 'produk_cart_qty', 'produk_price', 'image_src1'];
}
