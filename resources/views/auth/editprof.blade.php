<html>
<head>
    <title>
    プロフィール
    </title>


    
</head>

<body>

<h1>編集画面</h1>


@auth
<p>idは{{$id}}です</p>
<br>
<a href="{{ url('/home/profiel'.Auth::id()) }}">プロフィール画面へ</a>
<br>
@endauth







</body>


</html>