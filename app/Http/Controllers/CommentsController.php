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

        return redirect('/article/show/'.$article->id );
    }
}
