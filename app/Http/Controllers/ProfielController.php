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


        return view('auth/profiel', [ 'user' => $user , 'name' => $name , 'id'=>$id]);
    }

    public function edit(Request $request){
        $id = Auth::user()->id;
        $user = Auth::user();
        $form = $request->all();
        unset($form['_token']);
        $user->fill($form)->save();

        return redirect('home/profiel/'.Auth::id());
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        $restdata->fill($form)->save();

        return redirect('home/profiel/'.Auth::id());
    }

    public function show(Request $request)
    {
        //
    }



    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }


}
