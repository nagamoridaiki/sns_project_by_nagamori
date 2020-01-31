@extends('layouts.app')

@section('content')



<h1>チャット画面</h1>

<br>
<p>loginID.{{$loginId}}</p>
<p>friendId.{{$friend->id}}</p>

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
            @if($message->send_user_id == $loginId)
                <div class="send" style="text-align: right">
                    <p>{{$friendsall->find($message->send_user_id)->name}}</p>
                    <p>{{$message->message_text}}</p>
                    <p>{{$message->created_at}}</p>
                </div>
 
            @endif
 
            {{--   受信したメッセージ  --}}
            @if($message->receive_user_id == $loginId)
                <div class="recieve" style="text-align: left">
                    <p>{{$friendsall->find($message->send_user_id)->name}}</p>
                    <p>{{$message->message_text}}</p>
                    <p>{{$message->created_at}}</p>
                </div>
            @endif
        @endforeach

    </div>
 
    <form>
        <textarea name="message" style="width:100%"></textarea>
        <button type="button" id="btn_send">送信</button>
    </form>
 
    <input type="hidden" name="send" value="{{$param['send']}}">
    <input type="hidden" name="recieve" value="{{$param['recieve']}}">
    <input type="hidden" name="login" value="{{\Illuminate\Support\Facades\Auth::id()}}">
 
</div>
 
@endsection


