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
    @if($msg !='')
    <p>こんにちは{{$msg}}さん</p>
    @else
    <p>何か書いてください</p>
    @endif

    <form method="POST" action="/trainig">
    {{ csrf_field() }}
    <input type='text' name='msg'>
    <input type="submit">
    </form> 






</body>


</html>