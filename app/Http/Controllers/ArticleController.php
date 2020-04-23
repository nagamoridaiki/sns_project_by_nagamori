<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\Relationships;
use App\Models\Messages;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;


class ArticleController extends Controller
{
    private $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function index(Request $request){
        $user = Auth::user();
        return view('article_post', compact('user'));
    }

    public function show(Request $request, $id)
    {
        $login_user_id = Auth::user()->id;

        $article = Article::findOrFail($id);
        $msg="";
        // 指定したデータをセッションから削除する
        $request->session()->forget('msg');
        
        return view('article_detail' , compact('article','msg','login_user_id'));
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

        $this->article->create($request->validated());
        $request->session()->put('msg', "投稿しました");
        /*または
        $message_text = $request->message_text;
        $request->session()->put('msg', "投稿しました");
        $path = "ここにはパスが入る予定";
        $article->fill(['user_id'=>$my->id , 'message_text'=>$message_text , 'path'=>$path ]);
        $article->save();
        */
        return redirect('users/index/'.Auth::id());

    }

    public function store(Request $request)
    {
    }


    public function destroy(Request $request , $id)
    {
        $article_id = $request->article_id;
        Article::where('id',$article_id)->delete();
        return redirect('users/index/'.Auth::id());
    }


    
}
