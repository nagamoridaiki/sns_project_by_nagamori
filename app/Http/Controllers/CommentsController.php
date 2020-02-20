<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;

class CommentsController extends Controller
{
    public function create(Request $request)
    {
        $params = $request->validate([
            'article_id' => 'required|exists:Articles,id',
            'body' => 'required|max:2000',
        ]);

        $article = Article::findOrFail($params['article_id']);
        $article->comments()->create($params);

        return redirect('/article/show/'.$article->id );
    }
}
