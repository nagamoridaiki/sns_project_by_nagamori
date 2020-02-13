@extends('layouts.app')

@section('content')

 
<h1>Laravelで画像処理します</h1>
<form action="{{ url('/users/photocreate') }}" method="post" enctype="multipart/form-data" id="form">
    @csrf
    ファイル：
    {!! Form::label('fileName', 'アップロード') !!}
    {!! Form::file('fileName') !!}
    {!! Form::submit('アップロードする') !!}
    {!! Form::close() !!}
</form>

@endsection