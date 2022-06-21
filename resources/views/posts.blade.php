

@extends('layouts.main')

@section('container')
    <h1>halaman post</h1>
    {{-- berikut bagaimana cara menggunakan looping di laravel --}}

    @foreach ($posts as $post)
        <article class="mt-5">

            <h2>
                <a href="/post/{{ $post['slug'] }}">  {{-- ini engunakan slug --}}
                    {{ $post['title'] }} 
                </a>
            </h2>
            <h5>{{ $post['author'] }}</h5>
            <p>{{ $post['body'] }}</p>

        </article>
    @endforeach
        
@endsection

