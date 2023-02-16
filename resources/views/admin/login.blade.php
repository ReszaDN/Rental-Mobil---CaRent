@extends('layouts.login.main')

@section('container')
<div class="card-body">
    <form action="/admin-login" method="POST" class="my-login-validation" novalidate="">
        @csrf
        <div class="form-group">
            <label for="username">Username</label>
            <input id="username" type="=text" class="form-control" name="username" required>
            <div class="invalid-feedback">
                Username is invalid
            </div>
        </div>

        <div class="form-group">
            <label for="password">Password
            </label>
            <input id="password" type="password" class="form-control" name="password" required data-eye>
            <div class="invalid-feedback">
                Password is required
            </div>
        </div>

        <div class="form-group m-0">
            <button type="submit" class="btn btn-primary btn-block" name="login">
                Login
            </button>
        </div>
    </form>
</div>

@endsection
