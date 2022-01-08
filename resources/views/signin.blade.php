@extends('layout/main')
@section('title', 'Sign in')

@section('content')
    <div style="height: 200px; width: 400px; position: fixed; top: 50%; left: 50%; margin-top: -220px; margin-left: -200px;">
        @if(session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{session('loginError')}}
                <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="pb-3">
            <div class="d-flex justify-content-center">
                <p class="h3 fw-bold">Sign in to your account</p>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="card bg-white" style="width: 30rem;">
                <div class="card-body m-2">
                    <form method="post">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-plaintext">Email address</label>
                            <input value="{{\Illuminate\Support\Facades\Cookie::get('email')}}" class="form-control @error('email') is-invalid @enderror" type="email" name="email" autofocus required>
                        </div>
                        <div class="form-group">
                            <label class="form-control-plaintext">Password</label>
                            <input value="{{\Illuminate\Support\Facades\Cookie::get('password')}}" class="form-control" type="password" name="password" required>
                        </div>
                        <div class="mt-3 mb-3 form-check">
                            <input class="form-check-input" type="checkbox" id="remember_me" name="remember_me">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
