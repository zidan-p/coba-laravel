@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-lg-5">
        <main class="form-register m-auto">
            <h1 class="h3 mb-3 fw-normal text-center">Please Register</h1>
            <form>
                <div class="form-floating">
                    <input type="text" class="form-control rounded-top" id="floatingname" placeholder="name">
                    <label for="floatingname">Name</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingusername" placeholder="username">
                    <label for="floatingusername">Userame</label>
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control rounded-bottom" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
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