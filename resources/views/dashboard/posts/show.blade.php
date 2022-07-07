@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-5">
            <div class="col-lg-8">
                <h2>{{ $post->title }}</h2>
                <a href="/dashboard/posts" class="btn btn-sm btn-success">
                    <span data-feather="arrow-left" class="align-text-bottom"></span> Back to Index
                </a>
                <a href="" class="btn btn-warning btn-sm">
                    <span data-feather="edit" class="align-text-bottom"></span> Edit
                </a>
                <a href="" class="btn btn-danger btn-sm">
                    <span data-feather="x-circle" class="align-text-bottom"></span> Delete
                </a>


                <img src="http://placeimg.com/1200/400/tech" alt="gambar bagus" class="img-fluid mt-3">
                <article class="my-3"> 
                    {!! $post->body !!} {{-- ini adalah bagaimana agar laravel tidak meng `escape` karakter dari db --}}
                </article>
                {{-- <a href="/posts" class="text-decoration-none d-block mb-4">&lsaquo; Back to post</a> --}}
            </div>
        </div>
    </div>
@endsection