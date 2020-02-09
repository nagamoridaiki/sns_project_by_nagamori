@extends('layouts.app')

@section('content')

    <form action="/users/edit/image_complete/{{Auth::id()}}" method="post">
        @csrf
        <table>
            <tr>
                <td>画像</td>
                <td><img src="{{ $data['read_temp_path'] }}" width="200" height="130"></td>
            </tr>

        </table>
        <input type="submit" name="action" value="送信" />
    </form>

@endcontent
