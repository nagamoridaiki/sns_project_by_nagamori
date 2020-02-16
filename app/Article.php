<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $fillable = [
        'user_id', 'message_text', 'path' , 'good'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }


}
