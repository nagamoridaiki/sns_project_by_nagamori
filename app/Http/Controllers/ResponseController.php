<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponseController extends Controller
{
    public function index(){
        $data = ['msg' => 'これはコントローラーから渡されたメッセージです'];

        return view('response/response', $data);

    }
}
