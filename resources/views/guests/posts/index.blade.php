@extends('layouts.app')

@section('content')
    <h1>Blog</h1>

    @foreach ($posts as $post)
    <div class="card mb-2">
        <div class="card-body">
            <a href="{{route('post', ['post' => $post->slug])}}" class="btn">
                <h4 class="card-title">{{ $post->title }}</h4>
            <p class="card-text">{{ $post->body }}</p>
        </a>
        </div>
    </div>
    @endforeach
@endsection