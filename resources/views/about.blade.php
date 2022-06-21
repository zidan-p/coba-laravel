@extends('layouts.main')

@section('container')
    {{-- contoh untuk mengeprint data menggunakan templating engine --}}
    <div class="d-flex flex-column text-center">
        <h1>Halaman about</h1>
        <img src="img/{{ $image }}" alt="" width="240" class="img-thumbnail rounded-circle mx-auto mb-2">
        <h3>{{ $name }}</h3>
        <p>{{ $email }}</p>

    </div>
@endsection
