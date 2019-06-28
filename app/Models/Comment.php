<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
   protected $table = 'comment';
   protected $primaryKey = 'comment_id';
    protected $fillable = ['post_id','user_id','name','username','comment_desc','created_at', 'updated_at'];

    
    
    public function get_comment_user(){
        return $this->belongsTo('App\\User','user_id');
    }
    public function get_comment_post(){
        return $this->hasMany('App\\Models\\Post','post_id');
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