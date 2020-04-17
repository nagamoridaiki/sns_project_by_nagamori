<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','birthday','job','skill','hobby','path'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function send_messages(){
        return $this->hasMany('App\Message' , 'send_user_id' , 'id');
    }

    public function receive_messages(){
        return $this->hasMany('App\Message' , 'receive_user_id' , 'id');
    }

    public function user_relationships(){
        return $this->hasMany('App\Relationship' , 'user_id' , 'id');
    }

    public function friend_relationships(){
        return $this->hasMany('App\Relationship' , 'friend_id' , 'id');
    }

    public function write_article(){
        return $this->hasMany('App\Article');
    }
}
