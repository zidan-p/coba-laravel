
@extends('layouts.main')

@section('container')
    <h1 class="mb-5">Halam Blog Post</h1>

    @foreach ($posts as $post)
        <article class="mb-3 pb-3 border-bottom">

            <h2>
                <a href="/post/{{ $post->slug }}" class="text-decoration-none"> 
                    {{ $post->title }} 
                </a>
            </h2>
            <p>by 
                <a href="#" class="text-decoration-none">{{ $post->user->name }}</a>
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

