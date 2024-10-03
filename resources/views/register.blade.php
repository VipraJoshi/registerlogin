@extends('layouts.app')
@section('pageTitle', 'Register Page')
@section('content')
    <div class="container register_container">
        <h3 class="text-center mb-5">Register Form</h3>
        <form class="row g-3" id="registerform">
            <div class="col-md-4">
                <label for="fname" class="form-label">First Name <span class="imp_red">*</span></label>
                <input type="text" class="form-control" id="fname" name="first_name" placeholder="Enter Your First Name">
                <p class="text-danger error-first_name mt-2"></p>

            </div>
            <div class="col-md-4">
                <label for="lname" class="form-label">Last Name <span class="imp_red">*</span></label>
                <input type="text" class="form-control" id="lname" name="last_name" placeholder="Enter Your Last Name">
                <p class="text-danger error-last_name mt-2"></p>

            </div>
            <div class="col-md-4">
                <label for="lname" class="form-label">Date Of Birth <span class="imp_red">*</span></label>
                <input type="date" class="form-control" id="dob" name="dob">
                <p class="text-danger error-dob mt-2"></p>

            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Email <span class="imp_red">*</span></label>
                <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Enter Your Email">
                <p class="text-danger error-email mt-2"></p>

            </div>
            <div class="col-6">
                <label for="inputAddress" class="form-label">Mobile No. <span class="imp_red">*</span></label>
                <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Enter Your Mobile No.">
                <p class="text-danger error-mobile mt-2"></p>

            </div>
            <div class="col-md-4">
                <label for="inputCountry" class="form-label">Country <span class="imp_red">*</span></label>
                <select id="inputCountry" class="form-select" name="country">
                    <option  value="" selected>Choose...</option>
                    @foreach ($country as $countrylist)
                    <option value="{{$countrylist->id}}" >{{$countrylist->country}}</option>
                    @endforeach
                </select>
                <p class="text-danger error-country mt-2"></p>

            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">State <span class="imp_red">*</span></label>
                <select id="inputState" class="form-select" name="state">
                    <option  value="" selected>Select State...</option>
                </select>
                <p class="text-danger error-state mt-2"></p>

            </div>
            <div class="col-md-4">
                <label for="inputCity" class="form-label">City <span class="imp_red">*</span></label>
                <select id="inputCity" class="form-select" name="city">
                    <option value="" selected>Select City...</option>
                </select>
                <p class="text-danger error-city mt-2"></p>

            </div>
            <div class="col-4">
                <label for="inputAddress" class="form-label">Locality <span class="imp_red">*</span></label>
                <input type="text" class="form-control" id="locality" name="locality" placeholder="Enter Your Locality">
                <p class="text-danger error-locality mt-2"></p>

            </div>
            <div class="col-4">
                <label for="inputAddress" class="form-label">Pincode <span class="imp_red">*</span></label>
                <input type="number" class="form-control" id="pincode" name="pincode" placeholder="Enter Your Pincode">
                <p class="text-danger error-pincode mt-2"></p>
            </div>
            <div class="col-md-4">
                <label for="inputPassword4" class="form-label">Password <span class="imp_red">*</span></label>
                <div class="password_field">
                    <input type="password" class="form-control" id="userPassword" name="password" placeholder="Enter Your Password" required minlength="8">
                    <p class="text-danger error-password mt-2"></p>
                    <i class="fas fa-eye" id="toggleEye" onclick="togglePasswordVisibility()"></i>
                </div>
            </div>
            <div class="col-12 button_section" style="justify-content: space-evenly;">
                <button type="submit" class="btn btn-primary">Register</button>
                <a href="/login"><p>Login</p></a>
            </div>
        </form>
    </div>
@endsection
