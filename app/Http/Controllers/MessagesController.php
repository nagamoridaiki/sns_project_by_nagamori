<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use Illuminate\Support\Facades\Auth;


class MessagesController extends Controller
{

    public function index(Request $request){

        $user = Auth::id();
        $friend = User::find($request->id);

        
        return view('friend',['friend' => $friend]);
        
    }
    
    public function send(Request $request){

        $user = Auth::User();
        $friend_id = $request->id;


        return view('friend/',['friend_id' => $friend_id]);


    }
}
