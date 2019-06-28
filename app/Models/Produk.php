<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    //
   protected $table = 'produk';
   protected $primaryKey = 'produk_id';
    protected $fillable = ['user_id', 'produk_name', 'produk_lokasi', 'produk_brand', 'produk_model', 'produk_released_on', 'produk_dimensions', 'produk_size', 'produk_desc', 'produk_qty', 'produk_price', 'produk_image_src1', 'produk_image_src2', 'produk_image_src3', 'video_url', 'created_at', 'updated_at'];

    public function get_user(){
        return $this->belongsTo('App\\User', 'user_id');
    }


}
