@extends('layouts.app')

@section('content')

    <table>
        <ul class="my_prof_photo">
            <li>
                <img src="{{ $my_path }}"  width="100" height="100">
            </li>
            <li>
                <h4>{{ $user -> name ?? '' }}</h4> 
            </li>
        </ul>
        <div class="my_prof_list">
            <tr><th>ID</th><td>{{$user -> id ?? '' }}</td></tr>
            <tr><th>Name</th><td>{{$user -> name ?? '' }}</td></tr>
            <tr><th>birthday</th><td>{{$user -> birthday ?? '' }}</td></tr>
            <tr><th>job</th><td>{{$user -> job ?? '' }}</td></tr>
            <tr><th>skill</th><td>{{$user -> skill ?? '' }}</td></tr>
            <tr><th>hobby</th><td>{{$user -> hobby ?? '' }}</td></tr>
            <tr><th>email</th><td>{{$user -> email ?? '' }}</td></tr>
            <tr><th>updated_at</th><td>{{$user -> updated_at  ?? '' }}</td></tr>
        </div>
    </table>
    <div class="profiel-edit">
            @auth
            <br>
            <a href="{{ url('/users/edit/'.Auth::id()) }}">プロフィールを編集する</a>
            
            <a href="{{ url('article/index/'.Auth::id()) }}">投稿を書く</a>
            @endauth
    </div>
    <p><a href="{{ url('/users/index/'.Auth::id()) }}">メイン画面</a>


@endsection