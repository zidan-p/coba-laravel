

@extends('layouts.main')

@section('container')
    <article>
        <h2>{{ $post->title }}</h2> 
        {{-- <h5>{{ $post['author'] }}</h5> --}} 
        {!! $post->body !!} {{-- ini adalah bagaimana agar laravel tidak meng `escape` karakter dari db --}}
    </article>
    <a href="/posts">&lsaquo; Back to post</a>
@endsection