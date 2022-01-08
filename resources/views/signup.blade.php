@extends('layout/main')
@section('title', 'Sign up')

@section('content')
    <div style="height: 200px; width: 400px; position: fixed; top: 50%; left: 50%; margin-top: -280px; margin-left: -200px;">
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Sign up failed!
                <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="pb-3">
            <div class="d-flex justify-content-center">
                <p class="h3 fw-bold">Sign up to your account</p>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="card bg-white" style="width: 30rem;">
                <div class="card-body m-2">
                    <form action="/signup" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-plaintext">Name</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" required value="{{old('name')}}" autofocus>
                            @error('name')
                            <div class="invalid-feedback">
                                Please insert name.
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-plaintext">Email address</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" required value="{{old('email')}}">
                            @error('email')
                            <div class="invalid-feedback">
                                Please insert correct email.
                            </div>
                            @enderror
                        </div>
                        <div class="form-group pb-2">
                            <label class="form-control-plaintext">Password</label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" required>
                            @error('password')
                            <div class="invalid-feedback">
                                Please insert password.
                            </div>
                            @enderror
                        </div>
                        <label>Gender</label>
                        <div class="form-group">
                            <div class="form-check-inline pe-5">
                                <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" id="gender" name="gender" value="Male" required>
                                <label class="form-check-label" for="gender">Male</label>
                            </div>
                            <div class="form-check-inline ps-5">
                                <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" id="gender" name="gender" value="Female" required>
                                <label class="form-check-label" for="gender">Female</label>
                            </div>
                            @error('gender')
                            <div class="invalid-feedback">
                                Please choose one of the gender.
                            </div>
                            @enderror
                        </div>
                        <div class="form-group pb-3">
                            <label class="form-control-plaintext">Date of Birth</label>
                            <input class="form-control @error('date_of_birth') is-invalid @enderror" type="date" name="date_of_birth" required value="{{old('date_of_birth')}}">
                            @error('date_of_birth')
                            <div class="invalid-feedback">
                                Your age must be over 13 or more years old.
                            </div>
                            @enderror
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit">Sign up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
