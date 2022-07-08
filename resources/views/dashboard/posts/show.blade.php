@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-5">
            <div class="col-lg-8">
                <h2>{{ $post->title }}</h2>
                <a href="/dashboard/posts" class="btn btn-sm btn-success">
                    <span data-feather="arrow-left" class="align-text-bottom"></span> Back to Index
                </a>
                {{-- edit data --}}
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning btn-sm">
                    <span data-feather="edit" class="align-text-bottom"></span> Edit
                </a>
                {{-- hapus data --}}
                <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                    @csrf
                    @method('delete') {{-- digunakan untuk menimpa method, jadi yang awalanya post mennjadi delete --}}
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('are you sure??')">
                        <span data-feather="x-circle" class="align-text-bottom"></span> Delete
                    </button>
                </form>


                <img src="http://placeimg.com/1200/400/tech" alt="gambar bagus" class="img-fluid mt-3">
                <article class="my-3"> 
                    {!! $post->body !!} {{-- ini adalah bagaimana agar laravel tidak meng `escape` karakter dari db --}}
                </article>
                {{-- <a href="/posts" class="text-decoration-none d-block mb-4">&lsaquo; Back to post</a> --}}
            </div>
        </div>
    </div>
@endsection