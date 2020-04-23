<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag_id = "API";

        $url = "https://qiita.com/api/v2/tags/" . $tag_id . "/items?page=1&per_page=20";
        $method = "GET";

        //接続
        $client = new Client();

        $response = $client->request($method, $url);

        $posts = $response->getBody();
        $posts = json_decode($posts, true);

        return view('api', ['posts' => $posts]);

    }


    public function send(Request $request)
    {
        $url = 'https://qiita.com/api/v2/items';
        $method = "POST";
        $token = '7c21de025b02f37214bcc1ea08f9c46bcfe1c94d';

        $data = array(
            "title" => $request->title,
            "body" => $request->body,
            "private" => $request->private === 'private' ? true : false,
            "tags" => [
                [
                    "name" => $request->tag,
                ]
            ],
        );

        $client = new Client();

        $options = [
            'json' => $data,
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json',
            ]
        ];

        $response = $client->request($method, $url, $options);

        $post = $response->getBody();
        $post = json_decode($post, true);

        //レスポンスから新規記事のURLを取得
        $new_post_url = $post['url'];

        return redirect('/create')->with('flash_message', '<a href=' . $new_post_url . '>記事</a>を投稿しました');
    }


    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
    }
}
