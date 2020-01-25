<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class EditprofController extends Controller
{

    
    public function index(){

        $id = Auth::user()->id;
        $user = Auth::user();

        return view('auth/editprof',['form' => $user ,'id' => $id]);
    }

    public function post(Request $request){

        $id = Auth::user()->id;

        return view('auth/editprof');

    }
}
