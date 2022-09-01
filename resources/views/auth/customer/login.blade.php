@php
$loginbanner = App\Models\PageBanner::orderBy('id', 'desc')
    ->where('page_name', 'login')
    ->first();
@endphp
@extends('frontend.main')
@section('title', 'User Login')
@section('content')


    <!-- Contact Section Start -->
    <section class="login-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 col-lg-12 style-2">

                    <form class="booking-form" method="POST" action="{{ route('customer-store.login') }}" id="clform">
                        @csrf
                        <div class="login-heading">
                            <h4> Login To Your Account </h4>
                        </div>
                        {{-- @if (Session::has('message'))
                            <div class="alert alert-danger text-center">
                                {{ Session::get('message') }}
                            </div>
                        @endif --}}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="tourName">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value=""
                                    placeholder="Input Email">
                                @error('email')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tourName">Password</label>
                                <input type="password" name="password" id="password" class="form-control" value=""
                                    placeholder="Input password">
                                @error('password')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xsm-12">
                                    <div class="checkbox">
                                        <div class="d-flex" style="align-items:center;">
                                            <input type="checkbox" id="basic_checkbox_1" name="remember_token">
                                            <label for="basic_checkbox_1 ml-2" class="ml-2">Remember
                                                Me</label>
                                        </div>
                                        <a href="{{ route('forget.password.get') }}" class="text-info mt-4">Forgot
                                            Password?Click Here</a>
                                    </div>
                                    <div class="login-button" >
                                        <button class="loginbtn" type="submit" value="Submit Form">Login</button>
                                        <a href="{{ url('/auth/google/customer') }}" class="text-decoration-none"><button class="google-btn">
                                            Sign In With Google <i class="fa-brands fa-google-plus"></i>
                                        </button>
                                        </a>
                                    </div>

                            </div>

                            <div id="form-messages2"><a href="{{route('customer.register')}}">Don't Have Account Yet? Signup Here.</a></div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

@endsection
