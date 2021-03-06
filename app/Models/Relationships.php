<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relationships extends Model
{
    protected $fillable = [
        'user_id', 'friend_id', 
    ];
    
    public function user(){
        return $this->belongsTo('App\Models\User' , 'id' , 'user_id');
    }

    public function friend(){
        return $this->belongsTo('App\Models\User' , 'id' , 'friend_id');
    }

    
}
