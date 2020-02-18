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


<div class="edit-table">
    <div class="photo-edit">
        <img src="{{ $my_path }}"  width="100" height="100">
        <form action="{{ url('/users/photocreate') }}" method="post" enctype="multipart/form-data" id="form">
        @csrf
        <p>{!! Form::file('fileName') !!}</p>
        <input class="submit" type="submit" value="アップロードする">
        {!! Form::close() !!}
        </form>
    </div>
    <div class="edit_table">
        <form method="post" action="/users/update/{{Auth::id()}}">
        <table>
        {{ csrf_field() }}
            <input type="hidden" name="id" value="{{Auth::id()}}">

            
            <tr><th>Name:</th><td>
            <input type="text" name="name" value="{{$user->name ?? '' }}"></td></tr>

            <tr><th>birthday:</th><td><input type="date" name="birthday" value="{{$user->birthday ?? '' }}"></td></tr>

            <tr><th>job:</th><td><input type="text" name="job" value="{{$user->job ?? '' }}"></td></tr>

            <tr><th>skill:</th><td><input type="text" name="skill" value="{{$user->skill ?? '' }}"></td></tr>

            <tr><th>hobby:</th><td><input type="text" name="hobby" value="{{$user->hobby ?? '' }}"></td></tr>

            <tr><th>email:</th><td><input type="email" name="email" value="{{$user->email ?? '' }}"></td></tr>
            <tr><th></th><td><input class="edit-button" type="submit" value="更新する"></td></tr>
            </table>
        </form>
    </div>
</div>

@auth
<a href="{{ url('/users/index/'.Auth::id()) }}">プロフィール画面へ</a>
<br>
@endauth

@endsection