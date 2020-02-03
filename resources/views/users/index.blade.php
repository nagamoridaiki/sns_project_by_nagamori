@extends('layouts.app')

@section('content')



<h1>プロフィール画面</h1>


<table>

<tr><th>ID</th><td>{{$user -> id}}</td></tr>
<tr><th>Name</th><td>{{$user -> name}}</td></tr>
<tr><th>birthday</th><td>{{$user -> birthday}}</td></tr>
<tr><th>job</th><td>{{$user -> job}}</td></tr>
<tr><th>skill</th><td>{{$user -> skill}}</td></tr>
<tr><th>hobby</th><td>{{$user -> hobby}}</td></tr>
<tr><th>email</th><td>{{$user -> email}}</td></tr>
<tr><th>updated_at</th><td>{{$user -> updated_at }}</td></tr>
</table>

@auth
<br>
<a href="{{ url('/users/edit/'.Auth::id()) }}">プロフィールを編集する</a>
<br>
@endauth



<br>
<h1>友達</h1>
<!--テスト用コード
{{$relationships}}
-->

<br>
<table class="table">
<thead>
<tr>
    <th>#</th>
    <th>Name</th>
    <th></th>
</tr>
</thead>
<tbody>
@foreach($others as $key => $user)
    <tr>
        <th>{{$loop->iteration}}</th>
        <td>{{$user->name}}</td>

        <td><a href="{{ url('/messages/index/'.$user->id) }}"><button type="button" class="btn btn-primary">chat</button></a></td>

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
            <td><a href="{{ url('/users/create/'.$user->id) }}"><button type="button" class="btn btn-primary">友達になる</button></a></td>
        @else
            <td>友達</td>
        @endif
            
    </tr>
@endforeach
</tbody>

</table>

@endsection


