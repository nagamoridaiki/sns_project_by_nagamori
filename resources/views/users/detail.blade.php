@extends('layouts.app')

@section('content')

<h2>友達詳細画面</h2>


<table>
<th>
    <tr>
    <td><img src="{{$user->path}}" width="100px" height="100px"></td>
    </tr>
    <tr>
        <th>名前</th>
        <td>{{$user->name}}</td>
    </tr>
    <tr>
        <th>誕生日</th>
        <td>{{$user->birthday}}</td>
    </tr>
    <tr>
        <th>職業</th>
        <td>{{$user->job}}</td>
    </tr>
    <tr>
        <th>スキル</th>
        <td>{{$user->skill}}</td>
    </tr>
    <tr>
        <th>趣味</th>
        <td>{{$user->hobby}}</td>
    </tr>
    <tr>
        <th>連絡先</th>
        <td>{{$user->email}}</td>
    </tr>
    
    <td><a href="{{ url('/messages/index/'.$user->id) }}">
        <button type="button" class="btn btn-primary">chat</button></a>
    </td>
    <td>
        @auth
        <a href="{{ url('/users/index/'.Auth::id()) }}">自分のプロフィール画面に戻る</a>
        <br>
        @endauth
    </td>

    
    
</th>

</table>



@endsection