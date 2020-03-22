<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;

class CommentsController extends Controller
{
    public function create(Request $request)
    {
        $article_id = $request->article_id;

        $params = $request->validate([
            'body' => 'required|max:200',
        ]);

        $article = Article::findOrFail($article_id);
        $article->comments()->create($params);
        $msg="";

        // 指定したデータをセッションから削除する
        $request->session()->forget('msg');

        return redirect('users/index/'.$article->id );
    }
}
