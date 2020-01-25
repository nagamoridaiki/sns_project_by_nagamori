<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfielController extends Controller
{ 
    
    
    public function show(Request $request){

        $id = Auth::user()->id;
        $user = User::find(1);
        $name = $user -> email;


        return view('auth/profiel', [ 'user' => $user , 'name' => $name , 'id'=>$id]);
    }
}
