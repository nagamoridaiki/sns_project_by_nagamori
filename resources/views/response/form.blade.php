<html>
<head>
    <title>
    response
    </title>

    <style>
    h1{font-size:100pt; text-align:right; color:#f6f6f6;
    margin: -50px ,0px, -100px, -0px;}

    body{font-size:16pt; color:#999; }
    </style>
    
</head>

<body>
<h1>Formページ</h1>

@if($name != '')
<p>こんにちは{{$name}}さん</p>
@else
<p>何か書いてください</p>
@endif

<form method="post" action="/form">
    {{ csrf_field() }}
    <input type="text" name="name">
    <input type="submit">
</form>
    
</body>


</html>