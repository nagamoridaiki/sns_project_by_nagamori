@extends('layouts.app')

@section('content')

<form method="post" action="/article/create/{{Auth::id()}}">
<table>
{{ csrf_field() }}

    <input type="hidden" name="id" value="{{Auth::id()}}">

    
    <tr><th>文章</th><td><input type="text" name="message_text" value=""></td></tr>
    <tr><th>写真:</th>
    <td>
        <form method="post" action="/article/create/{{Auth::id()}}" enctype="multipart/form-data" id="form">
        

        @csrf
        ファイル：
        {!! Form::label('path', 'アップロード') !!}
        {!! Form::file('path') !!}
        {!! Form::submit('アップロードする') !!}
        {!! Form::close() !!}
        </form>
    </td></tr>

    <tr><th></th><td><input type="submit" value="send"></td></tr>
    </table>
</form>



@endsection