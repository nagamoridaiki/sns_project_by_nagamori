@extends('layouts.app')

@section('content')

記事詳細画面とコメント書き込み画面

<div class="container mt-4">
        <div class="border p-4">
            <h2 class="card-text">
                {!! nl2br(e($article->message_text, 200)) !!}
            </h2>
<!--　自分の投稿だけ削除できるif判定　-->
            @if($login_user_id == $article->user_id)
            <form　method="POST" action="/article/destroy/{{$article->id}}">
                @csrf
                <input type="hidden" value="{{ $article->id }}" name="article_id">
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        この投稿を削除する
                </button>
            </form>
            @endif
            

            <section>
            <br>
            <br>
                <h3 class="h5 mb-4">
                    コメント
                </h3>
                <form class="mb-4" method="POST" action="/comments/create/{{$article->id}}" >
                    @csrf
                    <input
                        name="article_id"
                        type="hidden"
                        value="{{ $article->id }}"
                    >

                    <div class="form-group">
                        <label for="body">
                            本文
                        </label>

                        <textarea
                            id="body"
                            name="body"
                            class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}"
                            rows="4"
                        >{{ old('body') }}</textarea>
                        @if ($errors->has('body'))
                            <div class="invalid-feedback">
                                {{ $errors->first('body') }}
                            </div>
                        @endif
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            コメントする
                        </button>
                    </div>
                </form>

                @forelse($article->comments as $comment)
                    <div class="border-top p-4">
                        <time class="text-secondary">
                            {{ $comment->created_at->format('Y.m.d H:i') }}
                        </time>
                        <p class="mt-2">
                            {!! nl2br(e($comment->body)) !!}
                        </p>
                        <!-- ここにコメントの削除機能をつける-->
                        <td><a href="{{ url('comments/destroy/'.$comment->id) }}"><button type="button" class="btn btn-primary">コメント削除</button></a></td>
                    
                    </div>
                @empty
                    <p>コメントはまだありません。</p>
                @endforelse
            </section>
        </div>
    </div>
    <p><a href="{{ url('/users/index/'.Auth::id()) }}">メイン画面に戻る</a>


@endsection