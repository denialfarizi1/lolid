<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;
use User;
class Catatan extends Model
{
    //
   protected $table = 'Catatan';
     protected $primaryKey = 'catatan_id';
    protected $fillable = ['user_id', 'catatan_judul', 'catatan_isi', 'created_at','updated_at'];

  
       
    public function get_catatan_user(){
       return $this->belongsTo('App\\User', 'user_id');
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
