<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;


class FormController extends Controller
{
    public function index(){


        return view('response.form' , ['name'=> '']);
    }

    public function post(Request $request){

        $name = $request -> name;

        $data = ['name'=> $name];

        return view('response.form' , $data);
        
    }
}
