@extends('frontend.main')
@section('title', 'User Password Reset')
@section('content')
    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg" data-background="images/bg/px-1.jpg" data-type="parallax" data-speed="3">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-12">
                        <h4>Reset Password</h4>
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

                    <form class="booking-form" method="POST" action="{{ route('forget.password.post') }}">
                        @csrf
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link" data-toggle="tab" role="tab" aria-controls="nav-packagesbk"
                                    aria-selected="false">Reset Password </a>
                            </div>
                        </nav>
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
                                   
                                    <div class="form-group col-md-12 d-flex" >
                                        <div class="col-6">
                                            
                                            <div class="contact-textarea  d-flex" style="align-items:center;">
                                                <button class="btn btn-theme" type="submit"
                                                    value="Submit Form">Send Password Reset Link</button>
                                                    
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
