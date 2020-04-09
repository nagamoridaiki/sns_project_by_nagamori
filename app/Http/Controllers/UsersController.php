<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use App\Relationships;
use App\Messages;
use App\Article;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{ 

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request){

        $id = Auth::user()->id;
        $my = Auth::user();
        $all_user = User::all();
        $user = User::find($id);
        $name = $user -> email;
        $relationships = Relationships::all()->where('user_id',$id);       
        $others = User::where('id','<>', $user->id)->get();

        $sort = $request->sort;
        $article = Article::orderBy( 'id' , 'desc' )->Paginate(4);
        $my_path = Auth::user()->path;
        $msg = "";

        if ($request->session()->exists('msg')) {
            // 存在する
            $msg = $request->session()->get('msg');
        }
        

        return view('users/index', compact('my','all_user','article','others' ,'my_path','relationships','id','name','user','msg'));
    }

    public function show(Request $request, $id)
    {
        $id = Auth::user()->id;
        $all_user = User::all();
        $user = User::find($id);
        $name = $user -> email;
        $relationships = Relationships::all()->where('user_id',$id);
        $others = User::where('id','<>', $user->id)->where('name',$request->name)->get();

        $sort = $request->sort;
        $article = Article::orderBy( 'id' , 'desc' )->Paginate(4);
        $my_path = Auth::user()->path;


        if($request->name == ""){
            $others = User::where('id','<>', $user->id)->get();
        }

        return view('users/index', compact('all_user','article','others' ,'my_path','relationships','id','name','user'));
        
    }

    public function edit(Request $request){
        $id = Auth::user()->id;
        $user = Auth::user();
        $my_path = Auth::user()->path;
        $msg = "";

        if ($request->session()->exists('msg')) {
            // 存在する
            $msg = $request->session()->get('msg');
        }


        return view('users/edit',compact('my_path', 'user','id','msg'));
    }

    public function update(Request $request)
    {
        $validate_rule = [
            'name' => 'max:20',
        ];

        $id = Auth::user()->id;
        $user = Auth::user();
        $form = $request->all();
        unset($form['_token']);
        $my_path = Auth::user()->path;
        $name = $request->name;


        if($name==""){
            $msg = "名前は必須です。";
        }else if( strlen($name) > 20){
            $msg = "名前は20文字以下にしてください";
        }else if($request->email==""){
            $msg = "メールアドレスは必須です";
        }else{
            $user->fill($form)->save();
            $msg = "正しく入力されました";
            $request->session()->put('msg', $msg);
    
            return redirect('users/edit/'.Auth::id());
        }
    
        $this->validate($request, $validate_rule);
        return view('users/edit',compact('my_path', 'user','id','msg'));
    }

    //友達申請 relationshipモデル作成
    public function create(Request $request , $id)
    {
        $relationship = new Relationships;
        $user_id = Auth::User()->id;
        $friend_id = $id;
        $relationship->fill(['user_id'=>$user_id , 'friend_id'=>$friend_id ]);
        $relationship->save();
        $msg="";

        // 指定したデータをセッションから削除する
        $request->session()->forget('msg');


        return redirect('users/index/'.Auth::id());
    }

    public function store(Request $request)
    {
    }


    public function destroy(Request $request , $id)
    {

        $user_id = Auth::User()->id;
        $friend_id = $id;
        Relationships::where('user_id',$user_id)->where('friend_id',$friend_id)->delete();
        return redirect('users/index/'.Auth::id());
    }


    public function visit(Request $request , $id)
    {
        $id = $id;
        $user = User::find($id);

        $msg="";

        // 指定したデータをセッションから削除する
        $request->session()->forget('msg');

        return view('users/detail' , compact('user' ,'id' ,'msg'));
    }

    public function myprof(Request $request){
        $id = Auth::user()->id;
        $all_user = User::all();
        $user = User::find($id);
        $name = $user -> email;
        $my_path = Auth::user()->path;
        $msg="";

        // 指定したデータをセッションから削除する
        $request->session()->forget('msg');
        
        return view('users/myprof', compact('all_user' ,'my_path','id','name','user','msg'));
    }

    


}
