@php 
$loginbanner=App\Models\PageBanner::orderBy('id','desc')->where('page_name','login')->first();
@endphp
@extends('frontend.main')
@section('title', 'User Password Reset')
@section('content')
    <!-- Contact Section Start -->
    <section class="contact-section pt-90 pb-20">
        <div class="container">
            <div class="row contact-bg">
                <div class="col-md-12 col-lg-12 style-2">

                    <form class="booking-form" method="POST" action="{{ route('forget.password.post') }}">
                        @csrf
                            <div>
                               <h4>Reset Password </h4> 

                            </div>
                      
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
                                            
                                            <div class="contact-textarea d-flex mt-4" style="align-items:center;">
                                                <button class="loginbtn" type="submit"
                                                    value="Submit Form">Send Password Reset Link</button>
                                                    
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
