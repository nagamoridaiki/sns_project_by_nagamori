<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use App\Messages;
use App\Relationship;
use Illuminate\Support\Facades\Auth;


class MessagesController extends Controller
{

    public function index(Request $request , $id){

        $loginId = Auth::id();
        $friendsall = User::all();
        $friend = User::find($request->id);
        $messageall = Messages::all();
        $param = [
            'send' => $loginId,
            'recieve' => $id,
            'friendsall' => $friendsall,
            'friend' => $friend,
          ];

          // 送信 / 受信のメッセージを取得する
        $query = Messages::where('send_user_id' , $loginId)->where('receive_user_id' , $id);;
        $query->orWhere(function($query) use($loginId , $id){
            $query->where('send_user_id' , $id);
            $query->where('receive_user_id' , $loginId);
        });
        $messages = $query->get();
        
        return view('message',compact('param' , 'messages' ,'friend' ,'friendsall','loginId', 'messageall'));
        
    }
    
    public function send(Request $request){

        $user = Auth::User();
        $friend_id = $request->id;


        return view('message/',['friend_id' => $friend_id]);


    }
}
