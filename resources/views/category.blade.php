

@extends('layouts.main')

@section('container')
    <h1>Post category : {{ $category->name }}</h1>
    {{-- berikut bagaimana cara menggunakan looping di laravel --}}

    @foreach ($posts as $post)
        <article class="mt-5">

            <h2>
                <a href="/post/{{ $post->slug }}">  {{-- ini engunakan slug --}}
                    {{ $post->title }} 
                </a>
            </h2>
            <p>{{ $post->excerpt }}</p>

        </article>
    @endforeach
        
@endsection

