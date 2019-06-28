<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    //
   protected $table = 'rating';
   protected $primaryKey = 'rating_id';
    protected $fillable = ['user_id','rating_pengirim_id', 'rating_nilai', 'created_at', 'updated_at'];

    public function get_rating_user(){
        return $this->belongsTo('App\\User', 'user_id');
    }

   public function get_like_post(){
   	return $this->belongsTo('App\\Models\\Post', 'post_id');
   }
}
