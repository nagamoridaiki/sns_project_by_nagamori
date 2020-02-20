<?php

use Illuminate\Database\Seeder;
use App\Comment;
use App\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Article::class, 2)
        ->create()
        ->each(function ($article) {
            $comments = factory(App\Comment::class, 2)->make();
            $article->comments()->saveMany($comments);
        });
    }
}
