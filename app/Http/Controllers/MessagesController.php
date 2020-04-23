<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\Messages;
use App\Models\Relationships;
use Illuminate\Support\Facades\Auth;


class MessagesController extends Controller
{

    public function index(Request $request , $id){

        $loginId = Auth::id();
        $friendsall = User::all();
        $friend = User::find($request->id);
        $messageall = Messages::all();
        $my_path =  Auth::user()->path;
        $friend_path = $friend->path;
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

        $msg="";

        // 指定したデータをセッションから削除する
        $request->session()->forget('msg');
        
        return view('message',compact('my_path' , 'friend_path' , 'param' , 'messages' ,'friend' ,'friendsall','loginId', 'messageall' , 'msg'));
        
    }
    
    public function send(Request $request , $id){

        $user = Auth::User();


        $message = new Messages;
        $request->send_user_id = $user->id;
        $request->receive_user_id = $id;
        $form = $request->all();

        unset($form['_token']);
        $message->fill($form)->save();

        return redirect('/messages/'.$id);
        


    }
}
