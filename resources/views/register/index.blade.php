@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-lg-5">
        <main class="form-register m-auto">

            <h1 class="h3 mb-3 fw-normal text-center">Please Register</h1>
            <form action="/register" method="POST">
                @csrf
                {{-- method oled disini adalah suatu method yang dibuat supaya menyimpan nilai inputan sebelumnya kedalam suatu session, dan dipanggil ketika methodnya dipanggi  --}}
                <div class="form-floating">
                    <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror "id="floatingname" placeholder="name" name="name" required value="{{ old('name') }}">
                    <label for="floatingname">Name</label>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                        {{-- mungkin message disini merupakan message default dari laravel, untuk yang custom bisa baca di dokumentasi --}}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control @error('username') is-invalid @enderror " id="floatingusername" placeholder="username" name="username" required value="{{ old('username') }}">
                    <label for="floatingusername">Userame</label>
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror " id="floatingInput" placeholder="name@example.com" name="email" required value="{{ old('email') }}">
                    <label for="floatingInput">Email address</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password" required >
                    <label for="floatingPassword">Password</label>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button class="w-100 btn btn-primary mt-3" type="submit">Register</button>
            </form>
            <small class="d-block mt-3 text-center">Already have an account? 
                <a href="/login">login</a>
            </small>
        </main>

    </div>
</div>


@endsection