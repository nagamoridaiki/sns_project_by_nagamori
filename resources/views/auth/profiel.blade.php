<html>
<head>
    <title>
    プロフィール
    </title>


    
</head>

<body>

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


<br>

{{$user }}

<br>

@auth
<br>
<a href="{{ url('/home/editprof/'.Auth::id()) }}">プロフィールを編集する</a>
<br>
@endauth










</body>


</html>