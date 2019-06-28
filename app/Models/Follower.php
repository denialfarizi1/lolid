<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;
use User;
class Follower extends Model
{
    //
   protected $table = 'follower';
     protected $primaryKey = 'follower_id';
    protected $fillable = ['user_id', 'follower_user_id', 'created_at','updated_at'];

  
       
    public function get_follower_user(){
       return $this->belongsTo('App\\User', 'follower_user_id');
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
