@extends('frontend.main')
@section('title', 'User Register')
@section('content')
    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg" data-background="images/bg/px-1.jpg" data-type="parallax" data-speed="3">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-12">
                        <h4>Register</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Inner Section End -->

    <!-- Contact Section Start -->
    <section class="contact-section pt-90 pb-20">
        @if (Session::has('message'))
            <div class="alert alert-success text-center">
                {{ Session::get('message') }}
            </div>
        @endif
        <div class="container">
            <div class="row contact-bg">
                <div class="col-md-12 col-lg-12 style-2">

                    <form class="booking-form" method="POST" action="{{ route('customer.store') }}">
                        @csrf
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link" data-toggle="tab" role="tab" aria-controls="nav-packagesbk"
                                    aria-selected="false">Register Form</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">

                            <!-- item start -->
                            <div class=" " id="" role="" aria-labelledby="nav-packagesbk-tab">
                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label for="name">First Name</label>
                                        <input type="text" name="first_name" id="first_name" class="form-control"
                                            placeholder="Input First Name">
                                        @error('first_name')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Last Name</label>
                                        <input type="text" name="last_name" id="last_name" class="form-control"
                                            placeholder="Input Last Name">
                                        @error('last_name')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tourName">Email</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="Input Email">
                                        @error('email')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tourName">Password</label>
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="Input password">
                                        @error('password')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tourName">Confirm Password</label>
                                        <input type="password" name="confirm_password" id="confirm_password"
                                            class="form-control" placeholder="Input Confirm password">
                                        @error('confirm_password')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tourName">Address</label>
                                        <input type="text" name="address" id="address" class="form-control"
                                            placeholder="Input Address">
                                        @error('address')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="tourName">Mobile</label>
                                        <input type="text" name="mobile" id="mobile" class="form-control"
                                            placeholder="Input Mobile">
                                        @error('mobile')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="tourName">Your Country</label>
                                        <input type="text" name="country" id="country" class="form-control"
                                            placeholder="Input Country">
                                        @error('country')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="form-group col-md-12">
                                        <div class="contact-textarea text-center">
                                            <button class="btn btn-theme" type="submit" value="Submit Form">Register
                                                Now</button>
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
