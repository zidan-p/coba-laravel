

@extends('layouts.main')

@section('container')
    <article>
        <h2>{{ $post->title }}</h2> 
        <p>By 
            <a href="#" class="text-decoration-none">{{ $post->author->name }}</a>
            at 
            <a href="/category/{{ $post->category->slug }}" class="text-decoration-none">
                {{ $post->category->name }}
            </a>
        </p>  
        {{-- bagaimana cara kita mengakses reational/ disini pula akan diberi link untuk menampikan semua 
            tabel post yang berelasi denngan cagori ini --}}
        {!! $post->body !!} {{-- ini adalah bagaimana agar laravel tidak meng `escape` karakter dari db --}}
    </article>
    <a href="/posts" class="text-decoration-none d-block mb-4">&lsaquo; Back to post</a>
@endsection