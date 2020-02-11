@extends('layouts.app')

@section('content')

<h1>画像確認</h1>
<img src="{{ asset('/image/cat.jpg') }}">
<img src="/image/cat.jpg" width="100" height="100">

@endsection