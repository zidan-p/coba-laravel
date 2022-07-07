
@extends('dashboard.layouts.main')

@section('container')
    <div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create new Post 📷</h1>
    </div>
    
    <div class="col-lg-7">
        <form method="POST" class="mb-5" action="/dashboard/posts">{{-- route untuk menambahkan data --}}
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label ">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required autofocus>
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" required>
                @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select @error('category_id') is-invalid @enderror" id="category" name="category_id" value="{{ old('category_id') }}" required>
                    
                    @foreach ($categories as $category)
                        @if (old('category_id') == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else    
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach

                </select>
                @error('category_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <input id="body" type="hidden" name="body">
                <trix-editor input="body"></trix-editor>
                @error('body')
                <p class="text-danger">
                    {{ $message }}
                </p>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>

    <script>
        let slug = document.querySelector('#slug');
        let title = document.querySelector('#title');

        title.addEventListener('change', ()=>{
            fetch('/dashboard/posts/checkSlug?title=' + title.value)
                .then(res => res.json())
                .then(data => {slug.value = data.slug})
        })

        // untuk mematikan fitur upload trix

        document.addEventListener('trix-file-accept', function(e){
            e.preventDefdault();
        })
    </script>
@endsection