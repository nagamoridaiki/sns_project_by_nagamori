<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use App\Relationships;
use App\Messages;
use App\Article;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{

    public function index(Request $request){

        $user = Auth::user();
        return view('article', compact('user'));
    }

    public function show(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $msg="";
        // 指定したデータをセッションから削除する
        $request->session()->forget('msg');
        
        return view('article_detail' , compact('article','msg'));
    }

    public function edit(Request $request){
    }

    public function update(Request $request)
    {
    }


    public function create(Request $request , $id)
    {
        $my = Auth::user();

        $validate_rule = [
            'message_text' => 'max:20',
        ];

        $text = $request->message_text;

        if(strlen($text)>60){
            $msg = "投稿が長すぎます";
            $request->session()->put('msg', $msg);
            return redirect( 'users/index/'.Auth::id() );
        }else{
            $msg = "投稿しました";
            $request->session()->put('msg', $msg);
        }

        $article = new Article;
        $message_text = $request->message_text;
        $path = "ここにはパスが入る予定";
        $article->fill(['user_id'=>$my->id , 'message_text'=>$message_text , 'path'=>$path ]);
        $article->save();
        
        return redirect('users/index/'.Auth::id());

    }

    public function store(Request $request)
    {
    }


    public function destroy(Request $request , $id)
    {

    }


    
}
