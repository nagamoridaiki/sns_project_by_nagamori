<html>
<head>
    <title>
    プロフィール
    </title>


    
</head>

<body>

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

<table>
<form action="'/home/profiel/'.Auth::id()" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{Auth::id()}}">
    <tr><th>Name:</th><td><input type="test" name="name" value="{{$form->name ?? '' }}"></td></tr>
    <tr><th>birthday:</th><td><input type="date" name="name" value="{{$form->birthday ?? '' }}"></td></tr>
    <tr><th>job:</th><td><input type="test" name="name" value="{{$form->job ?? '' }}"></td></tr>
    <tr><th>skill:</th><td><input type="test" name="name" value="{{$form->skill ?? '' }}"></td></tr>
    <tr><th>hobby:</th><td><input type="test" name="name" value="{{$form->hobby ?? '' }}"></td></tr>
    <tr><th>email:</th><td><input type="email" name="name" value="{{$form->email ?? '' }}"></td></tr>
    <tr><th></th><td><input type="submit" value="send"></td></tr>
</form>
</table>





@auth
<p>idは{{$id}}です</p>
<br>
<a href="{{ url('/home/profiel/'.Auth::id()) }}">プロフィール画面へ</a>
<br>
@endauth







</body>


</html>