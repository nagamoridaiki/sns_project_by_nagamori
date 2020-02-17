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
    
    
    public function index(Request $request){

        $id = Auth::user()->id;
        $all_user = User::all();
        $user = User::find($id);
        $name = $user -> email;
        $relationships = Relationships::all()->where('user_id',$id);       
        $others = User::where('id','<>', $user->id)->get();

        $sort = $request->sort;
        $article = Article::orderBy( 'id' , 'desc' )->Paginate(4);
        $my_path = Auth::user()->path;
        

        return view('users/index', compact('all_user','article','others' ,'my_path','relationships','id','name','user'));
    }

    public function show(Request $request, $id)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $name = $user -> email;
        $relationships = Relationships::all()->where('user_id',$id);
        $others = User::where('id','<>', $user->id)->where('name',$request->name)->get();

        if($request->name == ""){
            $others = User::where('id','<>', $user->id)->get();
        }

        return view('users/index', [ 'user' => $user , 'name' => $name , 'id'=>$id , 'relationships'=>$relationships ], compact('others'));
        
    }

    public function edit(Request $request){
        $id = Auth::user()->id;
        $user = Auth::user();

        return view('users/edit',['form' => $user ,'id' => $id]);
    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $user = Auth::user();
        $form = $request->all();
        unset($form['_token']);
        $user->fill($form)->save();

        return redirect('users/index/'.Auth::id());
    }

    //友達申請 relationshipモデル作成
    public function create(Request $request , $id)
    {
        $relationship = new Relationships;
        $user_id = Auth::User()->id;
        $friend_id = $id;
        $relationship->fill(['user_id'=>$user_id , 'friend_id'=>$friend_id ]);
        $relationship->save();

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

        return view('users/detail' , compact('user' ,'id'));
    }

    public function myprof(Request $request){
        $id = Auth::user()->id;
        $all_user = User::all();
        $user = User::find($id);
        $name = $user -> email;
        $my_path = Auth::user()->path;
        
        return view('users/myprof', compact('all_user' ,'my_path','id','name','user'));
    }

    


}
