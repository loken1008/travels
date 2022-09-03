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
                            <div class="col-md-6">
                                <h4> Login To Your Account </h4>
                                <div class="chooseus-box layout"></div>
                            </div>
                           
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
                                <div class="checkbox" style="margin:20px 0px">

                                    <span><input type="checkbox" class="mr-2" id="basic_checkbox_1"
                                            name="remember_token"><span style="margin-left:10px">Remember
                                            Me</span> </span>

                                </div>
                                <a href="{{ route('forget.password.get') }}" class="text-decoration-none text-info">Forgot
                                    Password</a>
                                <div class="login-button" style="margin:20px 0px">
                                    <button class="loginbtn mb-4" type="submit" value="Submit Form">Login</button>
                                    <a href="{{ url('/auth/google/customer') }}" class="text-decoration-none"><button
                                            class="google-btn">
                                            Sign In With Google <i class="fa-brands fa-google-plus"></i>
                                        </button>
                                    </a>
                                </div>

                            </div>

                            <div id="form-messages2"><a class="text-decoration-none" href="{{ route('customer.register') }}">Don't Have Account Yet?
                                    Signup Here.</a></div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

@endsection
