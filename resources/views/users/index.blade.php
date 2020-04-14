@extends('layouts.app')

@section('content')

<!--Myプロフィール画面-->
<div id="profiel">
    <div class="profiel-line">
        <div class="profiel-head">
            <h3 class="fas fa-address-book">プロフィール</h3>
        </div>
        <div class="profiel-table">
        <h3>{{ $my->name }}</h3>
            <img src="{{ $my_path ?? '' }}"  width="100" height="100">
        <div id="app">
            <router-link to="/users/index/{{ $id }}"></router-link>
            <router-view></router-view>
        </div>
         
        </div>
    </div>
</div>



<!--投稿一覧画面-->
<div class="article-top">
    <div class="article-thema">
        <h3 class="fas fa-chalkboard-teacher"> タイムライン</h3>
    </div>
    <div class="article-list">
        @foreach($article as $index => $one_article)
        <div class="one-article">
            <div class=article-photo>
                <img src="{{ $one_article->user->path }}" width="40" height="50">
            </div>
            <div class="article-text">              
                {{ $one_article->user->name}}
                <span class="created-at">{{ $one_article->created_at }}</span>
                <p>{{ $one_article->message_text }}</p>
                <div class="comment-memo">
                    @if ($one_article->comments->count())
                        <span class="badge badge-primary">
                            コメント {{ $one_article->comments->count() }}件
                        </span>
                    @endif
                    <span><a href="{{ url('article/show/'.$one_article->id) }}">詳細/コメントを書く</a></span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="paginate">
        {{ $article->links() }}
    </div>
    <button type="button" >
        <a href="{{ url('article/index/'.$id) }}">
            <h3 class="fas fa-user-edit"></h3>
        </a>
    </button>
    <p class="error_msg">{{$msg ?? '' }}</p>
</div>



<!--友達一覧画面-->
<div class="friend_top">
    <div class="friend-main">
        <div class="friend-theme">
            <h3 class="fas fa-child">ユーザー</h3>
        </div>
        <div class="friend-serch">
            <form class="form" method="post" action="/users/show/{{Auth::id()}}">
                {{ csrf_field() }}
                <div class="serch-window">
                    <input type="text" name="name">
                </div> 
                <div class="serch-submit">
                    <input type="submit" value="検索">
                </div>      
            </form>
        </div>
        <div class="friend-table">
            <table>
                <div class="friend-table-body">
                    <tbody>
                    @foreach($others as $key => $user)
                    
                        <tr>
                            <th>
                                <div class="iteration">
                                    <a href="{{ url('/users/detail/'.$user->id)}}">
                                        <img src="{{ $user->path }}" width="60" height="80" >
                                    </a>
                                </div>  
                            </th>
                            <td>
                                <div class="itr-name">
                                    <a href="{{ url('/users/detail/'.$user->id)}}">{{$user->name}}</a>
                                </div>
                            </td>
                            <td>
                                <a href="{{ url('/messages/'.$user->id) }}">
                                    <button type="button" class="btn btn-primary">chat</button>
                                </a>
                            </td>
                            @php
                                $flag = 0;
                                foreach($relationships as $index => $value){
                                    if($value->friend_id == $user->id){
                                        //echo 'すでに友達'.'<br>';
                                        $flag = 1;
                                    }
                                }
                            @endphp
                            <!--@if($flag == 0)
                                <td><a href="{{ url('/users/create/'.$user->id) }}"><button type="button" class="btn btn-primary">フォロー</button></a></td>
                            @else
                                <td><a href="{{ url('/users/destroy/'.$user->id) }}"><button type="button" class="btn btn-primary-followon" >フォロー中</button></a></td>
                            @endif-->
                        </tr>
                    @endforeach
                    </tbody>
                </div>
            </table>
        </div>
    </div>
</div>

<!-- Styles -->
<link href="{{ asset('css/main.css') }}" rel="stylesheet">

@endsection


