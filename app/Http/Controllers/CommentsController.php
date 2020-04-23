<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



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

    public function destroy(Request $request , $id)
    {
        $user = Auth::user();
        $comment_id = $id;
        $comment = Comment::where('id',$comment_id);
        $comment->delete();
        return redirect('users/index/'.$user->id );
    }
}
