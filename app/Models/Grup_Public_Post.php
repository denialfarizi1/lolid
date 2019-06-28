<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grup_Public_Post extends Model
{
    //
   protected $table = 'grup_public_post';
     protected $primaryKey = 'grup_public_post_id';
    protected $fillable = ['grup_id',  'grup_name','user_id', 'status', 'file_user','created_at','updated_at'];

  
    public function get_grup_post(){
        return $this->belongsTo('App\\Models\\Grup', 'grup_id');
    }
    public function get_grup_public_post_user(){
        return $this->belongsTo('App\\User', 'user_id');
    }
    public function get_grup_public_post(){
        return $this->hasMany('App\\Models\\Grup_Public_User', 'grup_id');
    }

    public function get_grup_public_comment_post(){
        return $this->belongsTo('App\\Models\\Grup_Public_Comment','grup_public_post_id');
    }
    public function get_grup_public_like_post(){
    return $this->hasMany('App\\Models\\Grup_Public_Like', 'grup_public_post_id');
   }
    /*
   
     public function get_comment_post(){
        return $this->belongsTo('App\\Models\\Comment', 'comment_id');
    }

     public function get_like_post(){
        return $this->hasMany('App\\Models\\Likes','post_id');
     }
   */
     public function getCreatedAtAttribute()
     {

     return \Carbon\Carbon::parse($this->attributes['created_at'])
     //  ->format('d M Y H:i');
     ->diffForHumans();
     }
     public function getUpdatedAtAttribute()
     {
    return \Carbon\Carbon::parse($this->attributes['updated_at'])
       ->diffForHumans();
     }
}
