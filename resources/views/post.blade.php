

@extends('layouts.main')

@section('container')
    <article>
        <h2>{{ $post->title }}</h2> 
        <p>By Zidan Putra Rahman at 
            <a href="/category/{{ $post->category->slug }}">
                {{ $post->category->name }}
            </a>
        </p>  
        {{-- bagaimana cara kita mengakses reational/ disini pula akan diberi link untuk menampikan semua 
            tabel post yang berelasi denngan cagori ini --}}
        {!! $post->body !!} {{-- ini adalah bagaimana agar laravel tidak meng `escape` karakter dari db --}}
    </article>
    <a href="/posts">&lsaquo; Back to post</a>
@endsection