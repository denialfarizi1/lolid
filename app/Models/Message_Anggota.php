<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message_Anggota extends Model
{
    //
     protected $table = 'message_anggota';
     protected $primaryKey = 'message_anggota_id';
     protected $fillable = ['message_id','user_id', 'created_at','updated_at'];

  
    
    public function get_message_chat_comment(){
        return $this->hasMany('App\\Models\\Message_Chat', 'user_id');
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
