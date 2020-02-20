@extends('layouts.app')

@section('content')

<!--Myプロフィール画面-->
<div id="profiel">
    <div class="profiel-line">
        <div class="profiel-head">
            <h3 class="fas fa-address-book">プロフィール画面</h3>
        </div>
        <div class="profiel-table">        
            <table>
            <ul class="my_photo">
                <li>
                    <img src="{{ $my_path }}"  width="100" height="100">
                </li>
                <li>
                    <h4>{{ $user -> name ?? '' }}</h4>
                    <p><a href="{{ url('/users/myprof/'.Auth::id()) }}">プロフィールを表示</a></a>
                </li>
            </ul>
            </table>
        </div>

    </div>
        <!--友達一覧画面-->
    <div class="friend_top">
        <div class="friend-main">
            <div class="friend-theme">
                <h3 class="fas fa-child">友達</h3>
            </div>
            <div class="friend-serch">
                名前で検索
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
                                    <a href="{{ url('/messages/index/'.$user->id) }}">
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

                                @if($flag == 0)
                                    <td><a href="{{ url('/users/create/'.$user->id) }}"><button type="button" class="btn btn-primary">フォロー</button></a></td>
                                @else
                                    <td><a href="{{ url('/users/destroy/'.$user->id) }}"><button type="button" class="btn btn-primary-followon" >フォロー中</button></a></td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </div>
                </table>
            </div>
        </div>
    </div>
</div>



<!--投稿一覧画面-->
<div class="article-top">
    <div class="article-thema">
        <h3 class="fas fa-chalkboard-teacher"> 投稿一覧画面</h3>
    <div>
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
                @if ($one_article->comments->count())
                    <span class="badge badge-primary">
                        コメント {{ $one_article->comments->count() }}件
                    </span>
                @endif
                <span><a href="{{ url('article/show/'.$one_article->id) }}">詳細/コメントを書く</a></span>
            </div>
        </div>
        @endforeach
    </div>
    <div class="paginate">
        {{ $article->links() }}
    </div>
    <!--書き込みフォーム-->
    <div class="post-top">
        <form method="post" action="/article/create/{{Auth::id()}}">
            <table>
            {{ csrf_field() }}
                <input type="hidden" name="id" value="{{Auth::id()}}">
                <tr><th>投稿する　</th>
                <td><textarea class="input_text" type="text" name="message_text" value=""></textarea></td>
                <td><input type="submit" value="送信"></td>
            </table>
        </form>
    </div>
</div>


@endsection


