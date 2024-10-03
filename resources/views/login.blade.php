@extends('layouts.app')
@section('pageTitle', 'Register Page')
@section('content')
<div class="container register_container">
    <h3 class="text-center mb-5">Login Form</h3>
    <form class="row g-3" role="form" method="POST" action="session">
        @csrf
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email <span class="imp_red">*</span></label>
            <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Enter Your Email" value="{{ old('email') }}" >
            <p class="text-danger error-email mt-2"></p>
            @error('email')
                <p class="text-danger text-xs mt-2">Email or password invalid.</p>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Password <span class="imp_red">*</span></label>
            <div class="password_field">
                <input type="password" class="form-control" id="userPassword" name="password" placeholder="Enter Your Password" required minlength="8">
                <p class="text-danger error-password mt-2"></p>
                <i class="fas fa-eye" id="logintoggleEye" onclick="togglePasswordVisibility()"></i>
            </div>
        </div>
        <div class="col-12 button_section" style="justify-content: space-evenly;">
            <button type="submit" class="btn btn-primary">Login</button>
            <a href="/"><p>Create New Account</p></a>
        </div>
    </form>
</div>
@endsection