@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-4">
        <main class="form-signin m-auto">
            <h1 class="h3 mb-3 fw-normal text-center">Please Log In</h1>
            <form>
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
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