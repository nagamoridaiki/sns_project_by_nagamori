<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use Illuminate\Support\Facades\Auth;

class EditprofController extends Controller
{

    
    public function index(){

        $id = Auth::user()->id;
        $user = Auth::user();

        return view('auth/editprof',['form' => $user ,'id' => $id]);
    }

    public function post(Request $request){
        //$this -> validate($request , User::$rules);
        $id = Auth::user()->id;
        $user = $user = Auth::user();
        $form = $request -> all();
        unset($form['_token']);
        $user -> fill($form) -> save();

        return redirect('home/profiel/'.Auth::id());

    }


}
