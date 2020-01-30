<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    public function send_user(){
        return $this->belongsTo('App\User' , 'id', 'send_user_id');
    }

    public function receive_user(){
        return $this->belongsTo('App\User' , 'id' , 'receive_user_id');
    }


}
