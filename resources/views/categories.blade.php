

@extends('layouts.main')

@section('container')
    <h1>halaman daftar categories</h1>
    {{-- berikut bagaimana cara menggunakan looping di laravel --}}

    <ul>
    @foreach ($categories as $category)
            <h2>
                <a href="/category/{{ $category->slug }}">  {{-- ini engunakan slug --}}
                    {{ $category->name }} 
                </a>
            </h2>

    @endforeach
    </ul>
        
@endsection

