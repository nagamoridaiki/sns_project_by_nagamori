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




}
