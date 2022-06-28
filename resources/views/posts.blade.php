
@extends('layouts.main')

@section('container')
    <h1 class="mb-5">{{ $title }}</h1>

    @if ($posts->count())
        <div class="card mb-3 text-center">
            <img src="http://placeimg.com/1200/400/tech" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">
                        {{ $posts[0]->title }}
                    </a>
                </h5>
                <p>
                    <small class="text-muted">
                        by 
                        <a href="/author/{{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a>
                        in 
                        <a href="/category/{{ $posts[0]->category->slug }}" class="text-decoration-none">
                            {{ $posts[0]->category->name }}
                        </a>
                        {{ $posts[0]->created_at->diffForHumans() }}{{-- supaya bisa dibaca oleh manusia --}}
                    </small>
                </p>
                <p class="card-text">{{ $posts[0]->excerpt }}</p>

                {{-- untuk button --}}
                <a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
            </div>
        </div>
    @else
        <p class="fs-2 text-center">Data tidak ditemukan</p>
    @endif


    <div class="row">
    @foreach ($posts->skip(1) as $post) {{-- untuk skip 1 postingan --}}
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="position-absolute p-2  rounded-end" style="background-color: rgba(0,0,0,0.7)">
                    <a href="/category/{{ $post->category->slug }}" class="text-white text-decoration-none">
                        {{ $post->category->name }}
                    </a>
                </div>
                <img src="http://placeimg.com/400/300/tech" class="card-img-top" alt="gambar tek">
                    <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p>
                        <small class="text-muted">
                            by 
                            <a href="/author/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a>
                            in 
                            <a href="/category/{{ $post->category->slug }}" class="text-decoration-none">
                                {{ $post->category->name }}
                            </a>
                            {{ $post->created_at->diffForHumans() }}{{-- supaya bisa dibaca oleh manusia --}}
                        </small>
                    </p>
                    <p class="card-text">{{ $post->excerpt }}</p>
                    <a href="/post/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>



        {{-- <article class="mb-3 pb-3 border-bottom">
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
        </article> --}}
    @endforeach
    </div>
        
@endsection

