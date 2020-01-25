@extends('layouts.app')

@section('content')



<h1>プロフィール画面</h1>


<table>

<tr><th>ID</th><td>{{$user -> id}}</td></tr>
<tr><th>Name</th><td>{{$user -> name}}</td></tr>
<tr><th>birthday</th><td>{{$user -> birthday}}</td></tr>
<tr><th>job</th><td>{{$user -> job}}</td></tr>
<tr><th>skill</th><td>{{$user -> skill}}</td></tr>
<tr><th>hobby</th><td>{{$user -> hobby}}</td></tr>
<tr><th>email</th><td>{{$user -> email}}</td></tr>
<tr><th>updated_at</th><td>{{$user -> updated_at }}</td></tr>
</table>

@auth
<br>
<a href="{{ url('/home/profiel/edit/'.Auth::id()) }}">プロフィールを編集する</a>
<br>
@endauth

@endsection