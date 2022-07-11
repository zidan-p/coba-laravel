
@extends('dashboard.layouts.main')

@section('container')
    <div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Post 📝</h1>
    </div>
    
    <div class="col-lg-7">
        {{-- route untuk mengedit data, dengan menggunakan method put--}}
        <form method="POST" class="mb-5" action="/dashboard/posts/{{ $post->slug }}" enctype="multipart/form-data">
            @csrf
            @method('put'){{-- suapa ditimpa menjadi method put --}}

            <div class="mb-3">
                <label for="title" class="form-label ">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}" required autofocus>
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $post->slug) }}" required>
                @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select @error('category_id') is-invalid @enderror" id="category" name="category_id" value="{{ old('category_id', $post->category_id) }}" required>
                    
                    @foreach ($categories as $category)
                        @if (old('category_id', $post->category_id) == $category->id)
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
                <label for="image" class="form-label @error('image') is-invalid @enderror">Post Image</label>

                {{-- untuk preview gambar --}}
                {{-- dibuat pengkodisina, bila gambar ada maka gunakan dari db --}}
                @if ($post->image)
                    <img src="{{ asset('storage/'.$post->image) }}" class="img-fluid img-preview mb-3 col-sm-5 d-block">
                @else
                    <img class="img-fluid img-preview mb-3 col-sm-5 d-block">
                @endif

                <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                <trix-editor input="body"></trix-editor>
                @error('body')
                <p class="text-danger">
                    {{ $message }}
                </p>
                @enderror
            </div>

            {{-- hidden input untuntk gambar lama --}}
            <input type="hidden" name="oldImage" value="{{ $post->image }}">
            <button type="submit" class="btn btn-primary">Update post 🔔</button>
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

                //------------------- menmabhkan fitur preview image --------------------
                function previewImage(){
            let image = document.querySelector('#image');
            let imgPreview = document.querySelector('.img-preview')

            imgPreview.style.display = 'block';

            let oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent){
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection