@extends('layouts.app')

@section('content')



<h1>チャット画面</h1>


<h1><th>Name</th><td>{{$friend->name}}</td></h1>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        </div>
    </div>
 
    {{--  チャットルーム  --}}
    <div id="room">
        @foreach($messageall as $key => $message)
            {{--   送信したメッセージ  --}}
            @if($message->send_user_id == $loginId && $message->receive_user_id == $friend->id)
                <div class="send" style="text-align: right">
                    <p>{{$friendsall->find($message->send_user_id)->name}}</p>
                    <p>{{$message->message_text}}</p>
                    <p>{{$message->created_at}}</p>
                </div>
 
            @endif
 
            {{--   受信したメッセージ  --}}
            @if($message->receive_user_id == $loginId && $message->send_user_id == $friend->id)
                <div class="recieve" style="text-align: left">
                    <p>{{$friendsall->find($message->send_user_id)->name}}</p>
                    <p>{{$message->message_text}}</p>
                    <p>{{$message->created_at}}</p>
                </div>
            @endif
        @endforeach

    </div>
 
    <form method="post" action="/messages/send/{{$friend->id}}">
        <table>
            {{ csrf_field() }}
            <textarea name="message_text" style="width:100%"></textarea>
            <input type="hidden" name="send_user_id" value="{{$param['send']}}">
            <input type="hidden" name="receive_user_id" value="{{$param['recieve']}}">
            <input type="submit" value="送信">

        </table>
    </form>
</div>
    <br>
    @auth
        <a href="{{ url('/users/index/'.Auth::id()) }}">プロフィール画面へ</a>
        <br>
    @endauth 
@endsection


