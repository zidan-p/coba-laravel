
@extends('layouts.main')

@section('container')
    <h1 class="mb-5">{{ $title }}</h1>

    @foreach ($posts as $post)
        <article class="mb-3 pb-3 border-bottom">

            <h2>
                <a href="/post/{{ $post->slug }}" class="text-decoration-none"> 
                    {{ $post->title }} 
                </a>
            </h2>
            <p>by 
                <a href="/author/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a>
                in 
                <a href="/category/{{ $post->category->slug }}" class="text-decoration-none">
                    {{ $post->category->name }}
                </a>
            </p>
            <p>{{ $post->excerpt }}</p>

            <a href="/post/{{ $post->slug }}" class="text-decoration-none">Read more...</a>
        </article>
    @endforeach
        
@endsection

