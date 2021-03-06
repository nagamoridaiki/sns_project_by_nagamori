@extends('layouts.app')

@section('content')

<div class="messages-top">
    <div class="friend-name">
        <h2>{{$friend->name}}</h2>
        <div id="app">
            <div id="nav">
                <router-link to="{ path: '/messages/{{ $friend->id }}', params: { login_id:{{ $loginId }} } , props:true }"></router-link>
            </div>
            <router-view></router-view>
            </div>
        </div>
    </div>
    <div class="messages">
        {{--  チャットルーム  --}}
        
            @foreach($messageall as $key => $message)
                {{--   送信したメッセージ  右側--}}
                @if($message->send_user_id == $loginId && $message->receive_user_id == $friend->id)
                    <div class="send">
                        <div class="my_info">
                            <div class="my_info_name">
                                <p>{{$friendsall->find($message->send_user_id)->name}}</p>
                            </div>
                            <div class="my_info_photo">
                                <img src="{{ $my_path }}"  width="50" height="50" style="border-radius:20px">
                            </div>
                        </div>
                        <div class="my_speek">
                            <p>{{$message->message_text}}</p>
                        </div>
                        <p>{{$message->created_at}}</p>
                    </div>
                @endif
    
                {{--   受信したメッセージ  左側--}}
                @if($message->receive_user_id == $loginId && $message->send_user_id == $friend->id)
                    <div class="recieve" style="text-align: left">
                        <div class="your_info">
                            <div class="your_info_name">
                                <p>{{$friendsall->find($message->send_user_id)->name}}</p>
                            </div>
                            <div class="your_info_photo">
                                <img src="{{ $friend_path }}"  width="50" height="50" style="border-radius:20px">
                            </div>
                        </div>
                        <div class="your_speek">
                            <p>{{$message->message_text}}</p>
                        </div>
                        <p>{{$message->created_at}}</p>
                    </div>
                @endif
            @endforeach
        
    </div>
    <div class="message-box">
        <form method="post" action="/messages/send/{{$friend->id}}">
            <table>
                {{ csrf_field() }}
                <textarea name="message_text" style="width:100%"></textarea>
                <input type="hidden" name="send_user_id" value="{{$param['send']}}">
                <input type="hidden" name="receive_user_id" value="{{$param['recieve']}}">
                <div class="message-submit">
                    <input type="submit" value="送信">
                </div>
            </table>
        </form>
    </div>
</div>

<br>
    @auth
        <a href="{{ url('/users/index/'.Auth::id()) }}">プロフィール画面へ</a>
        <br>
    @endauth 

<!-- Styles -->
<link href="{{ asset('css/message.css') }}" rel="stylesheet">

@endsection


