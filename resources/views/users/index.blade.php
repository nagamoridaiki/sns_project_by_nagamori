@extends('layouts.app')

@section('content')


<div id="profiel">
    <div class="profiel-line">
        <div class="profiel-head">
            <h3 class="fas fa-address-book">プロフィール画面</h3>
        </div>
        <div class="profiel-table">        
            <table>
            <div class="my_photo">
                <img src="{{ $my_path }}"  width="85" height="100">
            </div>
            <tr><th>ID</th><td>{{$user -> id ?? '' }}</td></tr>
            <tr><th>Name</th><td>{{$user -> name ?? '' }}</td></tr>
            <tr><th>birthday</th><td>{{$user -> birthday ?? '' }}</td></tr>
            <tr><th>job</th><td>{{$user -> job ?? '' }}</td></tr>
            <tr><th>skill</th><td>{{$user -> skill ?? '' }}</td></tr>
            <tr><th>hobby</th><td>{{$user -> hobby ?? '' }}</td></tr>
            <tr><th>email</th><td>{{$user -> email ?? '' }}</td></tr>
            <tr><th>updated_at</th><td>{{$user -> updated_at  ?? '' }}</td></tr>
            </table>
        </div>
        <div class="profiel-edit">
            @auth
            <br>
            <a href="{{ url('/users/edit/'.Auth::id()) }}">プロフィールを編集する</a>
            <br>
            @endauth
        </div>
    </div>
</div>



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
                                    {{$loop->iteration}}
                                </div>  
                            </th>
                            <td>
                                <div class="itr-name">
                                    {{$user->name}}
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
                                <td><a href="{{ url('/users/create/'.$user->id) }}"><button type="button" class="btn btn-primary">フォローする</button></a></td>
                            @else
                                <td><a href="{{ url('/users/destroy/'.$user->id) }}"><button type="button" class="btn btn-primary">フォローを外す</button></a></td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </div>
            </table>
        </div>
    </div>
</div>

@endsection


