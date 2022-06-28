

@extends('layouts.main')

@section('container')
    <h1>halaman daftar categories</h1>
    {{-- berikut bagaimana cara menggunakan looping di laravel --}}



    <div class="container">
        <div class="row">
            @foreach($categories as $category)
                <div class="col-md-4">
                        <a href="/category/{{ $category->slug }}">
                        <div class="card bg-dark text-white">
                            <img src="http://placeimg.com/400/400/tech" class="card-img" alt="...">
                            <div class="card-img-overlay d-flex align-items-center p-0">
                                <h5 class="card-title text-center flex-fill p-4" style="background-color: rgba(0, 0, 0, 0.7)">
                                    {{ $category->name }}
                                </h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
        
@endsection

