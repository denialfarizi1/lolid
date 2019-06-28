<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grup_Public_Like extends Model
{
    //
   protected $table = 'grup_public_like';
   protected $primaryKey = 'grup_public_like_id';
    protected $fillable = ['grup_id','grup_public_post_id','user_id','created_at', 'updated_at'];

    public function get_grup_public_like_user(){
        return $this->belongsTo('App\\User', 'user_id');
    }

   public function get_grup_public_like_post(){
   	return $this->belongsTo('App\\Models\\Grup_Public_Post', 'grup_public_post_id');
   }
}
