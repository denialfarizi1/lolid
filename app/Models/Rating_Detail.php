<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating_Detail extends Model
{
    //
   protected $table = 'rating_detail';
   protected $primaryKey = 'rating_detail_id';
    protected $fillable = ['user_id','rating_average', 'rating_popularitas', 'rating_peringkat', 'created_at', 'updated_at'];

    public function get_rating_detail_user(){
        return $this->belongsTo('App\\User', 'user_id');
    }

  
}

