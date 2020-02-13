<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use App\Messages;
use App\Relationships;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Storage;

class PhotosController extends Controller
{
    public function create(){

        return View('photos.create');
    }

    public function store(Request $request){

        //画像が fileName として送られてきていて、それを public/images に image.png という名前で保存する場合
        $request->file('fileName')->storeAs('image', Auth::user()->name.'.png', 'public_uploads');

        //リクエストの全入力を取得する
        $input = $request->all();

        //画像パス
        $photo_path = '/image/'.Auth::user()->name.'.png';

        //usersデータベースのpathに、画像までのパス情報を格納
        $users = Auth::user();
        $users->path = $photo_path;
        $users->save();


        return View('photos.complete')->with('path',$photo_path );
    }


}
