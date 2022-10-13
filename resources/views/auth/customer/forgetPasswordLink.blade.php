@php
$loginbanner = App\Models\PageBanner::orderBy('id', 'desc')
    ->where('page_name', 'login')
    ->first();
@endphp
@extends('frontend.main')
@section('title', 'User Password Reset')
@section('content')


    <!-- Contact Section Start -->
    <section class="contact-section">
        <div class="container">
            <div class="row contact-bg">
                <div class="col-md-12 col-lg-12 style-2">

                    <form class="booking-form" method="POST" action="{{ route('reset.password.post') }}">
                        @csrf
                        <h4>
                            Reset Password
                        </h4>
                        <div class="form-row">
                            <input type="hidden" name="token" value="{{ $token }}">
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
                                    placeholder="Input Password">
                                @error('password')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tourName">Confirm Password</label>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control"
                                    value="" placeholder="Input Confirm Password">
                                @error('confirm_password')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12 d-flex">
                                <div class="col-6">

                                    <div class="contact-textarea  d-flex" style="align-items:center;">
                                        <button class="btn btn-theme" type="submit" value="Submit Form">Reset
                                            Password</button>

                                    </div>

                                </div>

                            </div>

                            <div id="form-messages2"></div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

@endsection
