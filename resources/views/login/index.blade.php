@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-4">
        {{-- untuk alert, cek apakah session punya key bernama success --}}
        {{-- alert dibawah berasala dari register  --}}
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- alert berasal dari login yang error --}}
        @if (session()->has('errorLogin'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('errorLogin') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <main class="form-signin m-auto">
            <h1 class="h3 mb-3 fw-normal text-center">Please Log In</h1>
            <form action="/login" method="POST">
                @csrf
                <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" placeholder="masukan email..." name="email" required autofocus >
                    <label for="email">Email address</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required >
                    <label for="password">Password</label>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            
                <button class="w-100 btn btn-primary" type="submit">Log In</button>
            </form>
            <small class="d-block mt-3 text-center">Not registered? 
                <a href="/register">register now</a>
            </small>
        </main>

    </div>
</div>


@endsection