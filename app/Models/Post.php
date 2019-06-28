<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
   protected $table = 'post';
     protected $primaryKey = 'post_id';
    protected $fillable = ['user_id', 'status', 'lokasi', 'image_post','created_at','updated_at'];

  
    
    public function get_post_user(){
        return $this->belongsTo('App\\User', 'user_id');
    }
   
     public function get_comment_post(){
        return $this->belongsTo('App\\Models\\Comment', 'comment_id');
    }

     public function get_like_post(){
        return $this->hasMany('App\\Models\\Likes','post_id');
     }
     public function get_followed(){
        return $this->hasMany('App\\Models\\Followed','followed_user_id');
     }
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
