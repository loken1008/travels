@php
$loginbanner = App\Models\PageBanner::orderBy('id', 'desc')
    ->where('page_name', 'login')
    ->first();
@endphp
@extends('frontend.main')
@section('title', 'User Register')
@section('content')


    <!-- Contact Section Start -->
    <section class="contact-section ">
        <div class="container">
            <div class="row contact-bg">
                <div class="col-md-12 col-lg-12 ">

                    <form class="booking-form" method="POST" action="{{ route('customer.store') }}" id="crform">
                        @csrf
                        <h4> Register Form</h4>
                        <div class="form-row register-form d-flex" style="flex-wrap: wrap;justify-content:space-between">

                            <div class="form-group col-md-5">
                                <label for="name">First Name <span class="text-danger">*</span> </label>
                                <input type="text" name="first_name" id="first_name" class="form-control"
                                    placeholder="Input First Name">
                                @error('first_name')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-5">
                                <label for="name">Last Name <span class="text-danger">*</span> </label>
                                <input type="text" name="last_name" id="last_name" class="form-control"
                                    placeholder="Input Last Name">
                                @error('last_name')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-5">
                                <label for="tourName">Email <span class="text-danger">*</span> </label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Input Email">
                                @error('email')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-5">
                                <label for="tourName">Password <span class="text-danger">*</span> </label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Input password">
                                @error('password')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-5">
                                <label for="tourName">Confirm Password <span class="text-danger">*</span> </label>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control"
                                    placeholder="Input Confirm password">
                                @error('confirm_password')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-5">
                                <label for="tourName">Address <span class="text-danger">*</span> </label>
                                <input type="text" name="address" id="address" class="form-control"
                                    placeholder="Input Address">
                                @error('address')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-5">
                                <label for="tourName">Mobile <span class="text-danger">*</span> </label>
                                <input type="text" name="mobile" id="mobile" class="form-control"
                                    placeholder="Input Mobile">
                                @error('mobile')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-5">
                                <label for="tourName">Your Country <span class="text-danger">*</span> </label>
                                <input type="text" name="country" id="country" class="form-control"
                                    placeholder="Input Country">
                                @error('country')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-5 mt-4 register-button">
                                <div class="contact-textarea text-center">
                                    <button class="registerbtn" type="submit" value="Submit Form">Register
                                        Now</button>
                                </div>
                            </div>
                            <div class="form-group col-md-5 mt-4 register-button">
                                <div class="contact-textarea text-center">
                                    <a href="{{route('customer.login')}}">Already Have An Account. Signin Here</a>
                                </div>
                            </div>
                        </div>
                       
                    </form>

                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

@endsection
