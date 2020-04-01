<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;


class VuetestController extends Controller
{
    public function json($id = -1){
        if($id==-1){
            return User::get()->toJson();
        }else{
            return User::find($id)->toJson();
        }
    }
}
