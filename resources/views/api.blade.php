<!DOCTYPE html>

<head>
    <meta charset="utf-8">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>

<body>
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <table class="table table-striped table-dark mt-5">
                        <tr>
                            <th>タイトル</th>
                            <th>いいね数</th>
                            <th>コメント数</th>
                            <th>作成日</th>
                        </tr>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{$post['title']}}</td>
                            <td>{{$post['likes_count']}}</td>
                            <td>{{$post['comments_count']}}</td>
                            <td>{{$post['created_at']}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>

</html>