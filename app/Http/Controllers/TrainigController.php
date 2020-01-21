<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TrainigController extends Controller
{
    public function index(){
        
        $data = ['msg'=>'名前を入力してください',];

        return view('training',$data);
    }




    public function post(Request $request){

        return view('training', ['msg' => $request->msg,]);
    }


}
