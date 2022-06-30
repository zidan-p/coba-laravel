

@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>{{ $post->title }}</h2> 
                <p>By 
                    <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a>
                    at 
                    <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">
                        {{ $post->category->name }}
                    </a>
                </p>

                <img src="http://placeimg.com/1200/400/tech" alt="gambar bagus" class="img-fluid">
                <article class="my-3"> 
                    {!! $post->body !!} {{-- ini adalah bagaimana agar laravel tidak meng `escape` karakter dari db --}}
                </article>
                <a href="/posts" class="text-decoration-none d-block mb-4">&lsaquo; Back to post</a>
            </div>
        </div>
    </div>
@endsection