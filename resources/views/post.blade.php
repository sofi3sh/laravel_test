@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
        <hr>
        <h3>{{ __('post_lang.comments') }}</h3>

        @if($post->comments->count())
            <ul>
                @foreach($post->comments as $comment)
                    <li>{{ $comment->content }}</li>
                @endforeach
            </ul>
        @else
            <p>{{ __('post_lang.no_comment') }}</p>
        @endif

        <hr>
        <h4>{{ __('post_lang.comments2') }}</h4>
        <form method="POST" action="{{ route('comments.store', $post->id) }}">
            @csrf
            <div class="form-group">
                <textarea name="content" class="form-control" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-2">{{ __('post_lang.comment_bt') }}</button>
        </form>
    </div>
@endsection
