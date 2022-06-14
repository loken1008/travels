@php 
$loginbanner=App\Models\PageBanner::orderBy('id','desc')->where('page_name','login')->first();
@endphp
@extends('frontend.main')
@section('title', 'User Login')
@section('content')
    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg" @if(!empty($loginbanner->page_banner))data-background="{{asset($loginbanner->page_banner)}}" @endif data-type="parallax" data-speed="3">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-12">
                        <h4>Login</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Inner Section End -->

    <!-- Contact Section Start -->
    <section class="contact-section pt-90 pb-20">
        <div class="container">
            <div class="row contact-bg">
                <div class="col-md-12 col-lg-12 style-2">

                    <form class="booking-form" method="POST" action="{{ route('customer-store.login') }}" id="clform">
                        @csrf
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link" data-toggle="tab" role="tab" aria-controls="nav-packagesbk"
                                    aria-selected="false">Login </a>
                            </div>
                        </nav>
                        {{-- @if (Session::has('message'))
                            <div class="alert alert-danger text-center">
                                {{ Session::get('message') }}
                            </div>
                        @endif --}}
                        <div class="tab-content" id="nav-tabContent">

                            <!-- item start -->
                            <div class=" " id="" role="" aria-labelledby="nav-packagesbk-tab">
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


                                    <div class="form-group col-md-12 d-flex">
                                        <div class="col-6">
                                            <div class="checkbox d-flex"
                                                style="align-items:center;justify-content: space-between;">
                                                <div class="d-flex" style="align-items:center;">
                                                    <input type="checkbox" id="basic_checkbox_1" name="remember_token">
                                                    <label for="basic_checkbox_1 ml-2" class="ml-2">Remember
                                                        Me</label>
                                                </div>
                                                <a href="{{ route('forget.password.get') }}" class="text-info">Forgot
                                                    Password?Click Here</a>
                                            </div>
                                            <div class="contact-textarea  d-flex" style="align-items:center;">
                                                <button class="btn btn-theme" type="submit"
                                                    value="Submit Form">Login</button>
                                                <a href="{{ url('/auth/google/customer') }}">
                                                    <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png"
                                                        style="margin-left: 3em;height:50px">
                                                </a>
                                            </div>

                                        </div>

                                    </div>

                                    <div id="form-messages2"></div>
                                </div>
                            </div>
                            <!-- item end -->


                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

@endsection
