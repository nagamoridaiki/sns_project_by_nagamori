@extends('layouts.app')

@section('content')


<h1>編集画面</h1>


@if (count($errors) > 0)
<div>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<form method="post" action="/users/update/{{Auth::id()}}">

<table>
{{ csrf_field() }}
    <input type="hidden" name="id" value="{{Auth::id()}}">
    
    <tr><th>Name:</th><td>
    <input type="text" name="name" value="{{$form->name ?? '' }}"></td></tr>

    <tr><th>birthday:</th><td><input type="date" name="birthday" value="{{$form->birthday ?? '' }}"></td></tr>

    <tr><th>job:</th><td><input type="text" name="job" value="{{$form->job ?? '' }}"></td></tr>

    <tr><th>skill:</th><td><input type="text" name="skill" value="{{$form->skill ?? '' }}"></td></tr>

    <tr><th>hobby:</th><td><input type="text" name="hobby" value="{{$form->hobby ?? '' }}"></td></tr>

    <tr><th>email:</th><td><input type="email" name="email" value="{{$form->email ?? '' }}"></td></tr>
    <tr><th></th><td><input type="submit" value="send"></td></tr>
    </table>
</form>




@auth
<a href="{{ url('/users/index/'.Auth::id()) }}">プロフィール画面へ</a>
<br>
@endauth

<div class="photo-edit">

<form action="/users/edit/image_confirm/{{Auth::id()}}" method="post" enctype="multipart/form-data" id="form">
    @csrf
    ファイル：
    <input type="file" name="imagefile" value=""/><br /><br />


    <input type="submit" name="confirm" id="button" value="確認" />
</form>

<img class="logo" src="storage/app/public/productimage/kao.jpeg" alt="logo">
<img src="{{ $users->path ?? '' }}" width="200" height="130">


</div>




@endsection