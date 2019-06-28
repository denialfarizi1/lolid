<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message_Chat extends Model
{
    //
     protected $table = 'message_chat';
     protected $primaryKey = 'message_chat_id';
     protected $fillable = ['message_id','user_id', 'message_chat_comment','created_at','updated_at'];

  
    
    public function get_message_chat_user(){
        return $this->belongsTo('App\\User', 'user_id');
    }
    
    public function get_message_chat(){
       return $this->hasMany('App\\Models\\Message', 'message_id');
    }   
     public function get_message_chat_id(){
       return $this->hasMany('App\\Models\\Message', 'message_id');
    }
    public function get_message_chat_comment(){
        return $this->belongsTo('App\\Models\\Message_Anggota', 'user_id');
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
