<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfielController extends Controller
{ 
    
    
    public function index(Request $request){



        $id = Auth::user()->id;
        $user = User::find($id);
        $name = $user -> email;

        $others = User::where('id','<>', $user->id)->get();


        return view('profiel/index', [ 'user' => $user , 'name' => $name , 'id'=>$id ], compact('others'));
    }

    public function edit(Request $request){
        $id = Auth::user()->id;
        $user = Auth::user();

        return view('profiel/edit',['form' => $user ,'id' => $id]);
    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $user = Auth::user();
        $form = $request->all();
        unset($form['_token']);
        $user->fill($form)->save();

        return redirect('profiel/index/'.Auth::id());
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
    }

    public function show(Request $request)
    {
        //
    }


    public function destroy($id)
    {
        //
    }


}
