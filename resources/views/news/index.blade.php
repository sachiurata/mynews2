@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <div class="image">
                                    @if ($headline->image_path)
                                        <img src="{{ secure_asset('storage/image/' . $headline->image_path) }}">
                                    @endif
                                </div>
                                <div class="title p-2">
                                    <h1>{{ Str::limit($headline->title, 70) }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="body mx-auto">{{ Str::limit($headline->body, 650) }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 offset-1">
                            <P>コメント</P>
                            @foreach($headline->comments as $comment)
                                @if ($comment->user->profile)
                                    <div>{{ $comment->user->profile->name }}：{{ $comment->body }}</div>
                                @else
                                    <div>{{ $comment->user->name }}：{{ $comment->body }}</div>
                                @endif    
                            @endforeach
                            @if (Auth::user())
                                <form action="{{ route('comment.create') }}" method="post" enctype="multipart/form-data">    
                                    <textarea class="form-control" name="body" rows="1"></textarea>
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> 
                                    <input type="hidden" name="news_id" value="{{ $headline->id }}"> 
                                    @csrf
                                    <input type="submit" class="btn btn-primary" value="投稿">
                                </form>
                            @endif    
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        @endif
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                    {{ Str::limit($post->title, 150) }}
                                </div>
                                <div class="body mt-3">
                                    {{ Str::limit($post->body, 1500) }}
                                </div>
                            </div>
                            <div class="image col-md-6 text-right mt-4">
                                @if ($post->image_path)
                                    <img src="{{ secure_asset('storage/image/' . $post->image_path) }}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection