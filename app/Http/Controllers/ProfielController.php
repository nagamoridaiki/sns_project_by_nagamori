<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;

class ProfielController extends Controller
{
    public function index(){

        $items = User::all();

        return view('auth/profiel', ['items' => $items]);
    }

    public function search(){

        //$id = Auth::id();
        $user = User::find(1);
        $name = $user -> email;


        return view('auth/profiel', [ 'user' => $user , 'name' => $name]);
    }
}
