@extends('layouts.main')

@section('container')
    {{-- contoh untuk mengeprint data menggunakan templating engine --}}
    <h1>Halaman about</h1>
    <img src="img/{{ $image }}" alt="" height="120">
    <h3>{{ $name }}</h3>
    <p>{{ $email }}</p>
@endsection
