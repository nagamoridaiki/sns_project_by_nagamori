<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;
use App\User;

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

    }
}
