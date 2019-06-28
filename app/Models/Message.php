<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;
use User;
class Message extends Model
{
    //
   protected $table = 'message';
     protected $primaryKey = 'message_id';
    protected $fillable = ['meesage_kode', 'message_user1', 'message_user2', 'created_at','updated_at'];

  
       
    public function get_message_user1(){
       return $this->belongsTo('App\\User', 'message_user1');
    }
    public function get_message_user2(){
       return $this->belongsTo('App\\User', 'message_user2');
    }
    
    public function get_message_chat(){
       return $this->hasMany('App\\Models\\Message_Chat', 'message_id');
    }
    public function get_message_chat_id(){
       return $this->hasMany('App\\Models\\Message_Chat', 'message_id');
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
