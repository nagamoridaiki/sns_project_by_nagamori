<html>
<head>
    <title>
    プロフィール
    </title>


    
</head>

<body>
<table>
{{ Auth::id() }}
<br>
{{$user }}
<br>
{{$user -> name}}
<br>
{{$name}}



</table>




</body>


</html>