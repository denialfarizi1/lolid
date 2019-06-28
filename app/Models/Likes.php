<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    //
   protected $table = 't_like';
   protected $primaryKey = 'like_id';
    protected $fillable = ['post_id','user_id','created_at', 'updated_at'];

    public function get_like_user(){
        return $this->belongsTo('App\\User', 'user_id');
    }

   public function get_like_post(){
   	return $this->belongsTo('App\\Models\\Post', 'post_id');
   }
}
