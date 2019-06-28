<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grup_Public_Comment extends Model
{
    //
   protected $table = 'grup_public_comment';
   protected $primaryKey = 'grup_public_comment_id';
    protected $fillable = ['grup_public_post_id','user_id','comment','created_at', 'updated_at'];

    
    
    public function get_grup_public_comment_user(){
        return $this->belongsTo('App\\User','user_id');
    }
    public function get_grup_public_comment_post(){
        return $this->hasMany('App\\Models\\Grup_Public_Post','grup_public_post_id');
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