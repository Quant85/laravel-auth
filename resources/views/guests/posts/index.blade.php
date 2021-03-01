@extends('layouts.app')

@section('content')
    <h1>Blog</h1>

    @foreach ($posts as $post)
    <div class="card mb-2">
        <div class="card-body">
            <h4 class="card-title">{{ $post->title }}</h4>
            <p class="card-text">{{ $post->body }}</p>
        </div>
    </div>
    @endforeach
@endsection