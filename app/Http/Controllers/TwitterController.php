<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterController extends Controller
{
    // 投稿
    public function index(Request $request)
    {
        $consumer_key ='Bd1UxhX5btzF7i7UqjBFfBJFn';
        $consumer_secret ='5szPBUOda4Xtl3Wv2Xxm6ToX7xQorbZbMsAHwdQ3rMIJlDwYNO';
        $access_token ='1040872440937607168-Ynt2NvH4LPNPq1GyKqUdL91kuoYGmf';
        $access_token_secret ='XQL9oHWACauA6P6BVW8VHQjoXid9OkYZFoRMCL80p3aDY';
         
        // APIに接続
        $connection = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);
         
        // アクセストークンを使用しているユーザーのタイムラインを10件取得する
        $request = $connection->get('statuses/user_timeline',
        array(
        'count'=>'2',
        ));


        return view('twitter', ['request' => $request]);
        
    }
}
