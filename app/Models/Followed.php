<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;
use User;
class Followed extends Model
{
    //
   protected $table = 'followed';
     protected $primaryKey = 'followed_id';
    protected $fillable = ['user_id', 'followed_user_id', 'created_at','updated_at'];

  
       
    public function get_followed_user(){
       return $this->belongsTo('App\\User', 'followed_user_id');
    }
     public function get_followed(){
        return $this->belongsTo('App\\Models\\Post','user_id');
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
