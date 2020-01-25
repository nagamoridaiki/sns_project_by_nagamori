<html>
<head>
    <title>
    プロフィール
    </title>


    
</head>

<body>

<h1>プロフィール画面</h1>


<table>
{{ Auth::id() }}
<br>
{{$user }}
<br>
{{$user -> name}}
<br>
{{$name}}
<br>

@auth
<p>idは{{$id}}です</p>
<br>
<a href="{{ url('/home/editprof/'.Auth::id()) }}">プロフィールを編集する</a>
<br>
@endauth





</table>




</body>


</html>