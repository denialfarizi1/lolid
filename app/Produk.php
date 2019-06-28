<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $fillable = ['user_id', 'produk_name', 'produk_jenis', 'produk_brand', 'produk_model', 'produk_released_on', 'produk_dimensions', 'produk_size', 'produk_desc', 'produk_qty', 'produk_price', 'image_src1', 'image_src2', 'image_src3', 'video_url'];
}
