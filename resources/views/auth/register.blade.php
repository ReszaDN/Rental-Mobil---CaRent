@extends('layouts.login.main')

@section('container')
<div class="card-body">
    <form action=" {{ route('register') }} " method="POST" class="my-login-validation" novalidate="">
        @csrf
        <div class="form-group">
            <label for="name">Nama</label>
            <input id="name" type="=text" class="form-control @error('name') is-invalid @enderror" value="{{ old('email') }}" name="name" required>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="invalid-feedback">
                Name is invalid
            </div>
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input id="username" type="=text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" name="username" required>
            
            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
            <div class="invalid-feedback">
                Username is invalid
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="=email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" required>
            
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
            <div class="invalid-feedback">
                email is invalid
            </div>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required data-eye>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="invalid-feedback">
                Password is required
            </div>
        </div>

        <div class="form-group">
            <label for="password-confirm">Confirm Password</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required data-eye>
        </div>
        <div class="form-group m-0">

            <button type="submit" class="btn btn-primary btn-block" name="login">
                Register
            </button>
        </div>
        <div class="mt-4 text-center">
            Sudah Punya Akun? <a href=" {{ route('login') }} ">Daftar</a>
        </div>
    </form>
</div>
@endsection
