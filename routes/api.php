<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//APIリソースルートを追加
Route::apiResource('posts', 'PostController');

//全ユーザー取得API
Route::get('/user',function (Request $request) {
	$users = App\Models\User::all();
	return response()->json(['users' => $users]);
});
//ユーザー詳細取得API
Route::get('/user/{user}', function(App\User $user){
	return response()->json(['user' => $user]);
});

//ユーザデータの更新API
Route::patch('/user/{user}', function(App\User $user,Request $request){
	$user->update($request->user);
	return response()->json(['user' => $user]);
});

//ユーザデータの削除API
Route::delete('/user/{user}', function(App\User $user){
	$user->delete();
	return response()->json(['message' => 'delete successfully']);
});

//ユーザデータの作成API
Route::post('/user', function(Request $request){
	$user = App\Models\User::create($request->user);
	return response()->json(['user' => $user]);
});

//全メッセージ取得API
Route::get('/messages',function (Request $request) {
	$messages = App\Models\Messages::all();
	return response()->json(['messages' => $messages]);
});


//画像アップロード
Route::post('file_upload/{user}',function(App\User $user,Request $request){
	$file_name = request()->file->getClientOriginalName();
	request()->file->storeAs('image',$file_name , 'public_uploads');
	$target = App\Models\User::find($user->id);
	$target->update(['path' => '/image/'.$file_name]);
	return response()->json(['user' => $user]);
});