<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grup extends Model
{
    //
   protected $table = 'grup';
     protected $primaryKey = 'grup_id';
    protected $fillable = ['grup_jenis', 'grup_name','created_at','updated_at'];

  
    
    public function get_grup_post(){
        return $this->hasMany('App\\Models\\Grup_Public_Post', 'grup_id');
    }
    public function get_grup_public_user(){
        return $this->hasMany('App\\Models\\Grup_Public_User', 'grup_id');
    }
     public function get_grup(){
        return $this->hasMany('App\\Models\\Grup_Public_User', 'grup_id');
    }
    
    public function get_grup_public(){
        return $this->hasMany('App\\Models\\Grup_Public_User', 'grup_id');
    }
   
     public function get_comment_post(){
        return $this->belongsTo('App\\Models\\Comment', 'comment_id');
    }

     public function get_like_post(){
        return $this->hasMany('App\\Models\\Likes','post_id');
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
