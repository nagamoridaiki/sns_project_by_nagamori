<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use App\Messages;
use App\Relationships;
use Illuminate\Support\Facades\Auth;
use Storage;

class ImageUploadRequest extends Controller
{
    public function postImageConfirm(Request $request){
        $imagefile = $request->file('imagefile');
    
        $temp_path = $imagefile->store('public/image');
        $read_temp_path = str_replace('public/' , 'storage/', $temp_path); //追加
    
        $data = array(
            'temp_path' => $temp_path,
            'read_temp_path' => $read_temp_path, //追加
        );
        $request->session()->put('data', $data);
    
        return view('users/image_confirm', compact('data') );
    }



    public function postImageComplete(Request $request) {
        $data = $request->session()->get('data');
        $temp_path = $data['temp_path'];
        $read_temp_path = $data['read_temp_path'];
    
        $filename = str_replace('public/temp/', '', $temp_path);
        //ファイル名は$temp_pathから"public/temp/"を除いたもの
        $storage_path = 'public/productimage/'.$filename;
        //画像を保存するパスは"public/productimage/xxx.jpeg"
    
        $request->session()->forget('data');
    
        Storage::move($temp_path, $storage_path);
        //Storageファサードのmoveメソッドで、第一引数->第二引数へファイルを移動
    
        $read_path = str_replace('public/', 'storage/app/public/', $storage_path);
        //商品一覧画面から画像を読み込むときのパスはstorage/productimage/xxx.jpeg"
    
        $users = Auth::user();

        $users->path = $read_path;
        $users->save();

        return view('users/image_complete' , 'read_path'-> $read_path);

    }


}
