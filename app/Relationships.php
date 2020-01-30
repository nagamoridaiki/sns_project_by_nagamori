<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relationships extends Model
{
    public function user(){
        return $this->belongsTo('App\User' , 'id' , 'user_id');
    }

    public function friend(){
        return $this->belongsTo('App\User' , 'id' , 'friend_id');
    }

    
}