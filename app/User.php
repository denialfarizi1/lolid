<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [ 'id', 'username',
        'name', 'email', 'password','is_activated', 'hp', 'alamat', 'image_profil','image_background','desc'
    ];
     public function get_user(){
        return $this->hasMany('App\\Models\\Produk', 'user_id');
    }
    public function get_post_user(){
        return $this->hasMany('App\\Models\\Post', 'user_id');
    }

    public function get_like_user(){
        return $this->hasMany('App\\Models\\Likes', 'user_id');
    }
    public function get_comment_user(){
        return $this->hasMany('App\\Models\\Comment', 'user_id');
    }
    public function get_comment_produk_user(){
        return $this->hasMany('App\\Models\\Comment_Produk', 'user_id');
    }
    public function get_message_user1(){
        
        return $this->hasMany('App\\Models\\Message', 'user_id' );
    }
    public function get_message_user2(){
        
        return $this->hasMany('App\\Models\\Message', 'user_id' );
    }
    public function get_message_chat_user(){
        return $this->hasMany('App\\Models\\Message_Chat', 'user_id');
    }
     public function get_rating_user(){
        return $this->hasMany('App\\Models\\Rating', 'user_id');
    }
      public function get_rating_detail_user(){
        return $this->hasMany('App\\User', 'user_id');
    }
    public function get_follower_user(){
        
        return $this->hasMany('App\\Models\\Follower', 'user_id' );
    }
     public function get_followed_user(){
        
        return $this->hasMany('App\\Models\\Followed', 'user_id' );
    }
     public function get_grup_public_admin(){
        return $this->hasMany('App\\Models\\Grup_Public_Admin', 'user_id');
    }
    public function get_grup_public_post_user(){
        return $this->hasMany('App\\Models\\Grup_Public_Post', 'user_id');
    }
     public function get_grup_public_anggota(){
        return $this->hasMany('App\\Models\\Grup_Public_User', 'user_id');
    }
    public function get_grup_public_comment_user(){
        return $this->belongsTo('App\\User','user_id');
    }
    public function get_grup_public_like_user(){
        return $this->hasMany('App\\Models\\Grup_Public_Post', 'user_id');
    }
    public function get_catatan_user(){
       return $this->hasMany('App\\Models\\Catatan', 'user_id');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
