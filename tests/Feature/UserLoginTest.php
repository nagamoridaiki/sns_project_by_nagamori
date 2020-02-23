<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;
use App\User;
use App\Messages;
use App\Relationships;
use App\Article;
use App\Comment;

class UserLoginTest extends TestCase
{
    use DatabaseMigrations;

    public function testLogin()
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        //302はページは存在する(が、アクセスできない)ことを示す番号
        $response = $this->get('/home');
        $response->assertStatus(302);

        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/home');
        $response->assertStatus(200);

        $response = $this->get('/users/index/');
        $response->assertStatus(404);

        $response = $this->get('/users/index/1');
        $response->assertStatus(200);

        $response = $this->get('/users/myprof/1');
        $response->assertStatus(200);

        $response = $this->get('/users/edit/1');
        $response->assertStatus(200);

        $response = $this->get('/messages/index/1');
        $response->assertStatus(200);

        $response = $this->get('/users/detail/1');
        $response->assertStatus(200);

        $article = factory(Article::class)->create();
        $response = $this->get('/article/show/1');
        $response->assertStatus(200);


    }
}
