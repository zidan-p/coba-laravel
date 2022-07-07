
@extends('dashboard.layouts.main')

@section('container')
    <div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create new Post 📷</h1>
    </div>
    
    <div class="col-lg-7">
        <form method="POST" action="/dashboard/posts">{{-- route untuk menambahkan data --}}
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <input id="body" type="hidden" name="body">
                <trix-editor input="body"></trix-editor>
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