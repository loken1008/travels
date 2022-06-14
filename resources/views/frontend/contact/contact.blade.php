@php 
$contactbanner=App\Models\PageBanner::orderBy('id','desc')->where('page_name','contactus')->first();
@endphp
@extends('frontend.main')
@section('title', 'Contact Us')
@section('content')
    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg" @if(!empty($contactbanner->page_banner))data-background="{{asset($contactbanner->page_banner)}}" @endif data-type="parallax" data-speed="3">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-12">
                        <h4>Contact</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Inner Section End -->

    <section class="contact-details pb-70">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <h3 class="title">Contact <span>us</span></h3>
                        <form method="post" action="{{route('user.message')}}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    @if(Auth()->guard('customer')->check() && Auth()->guard('customer')->user()->first_name)
                                    <input type="text" name="f_name" id="f_name" class="form-control" value="{{Auth()->guard('customer')->user()->first_name}}" readonly>
                                    @else
                                    <input type="text" name="f_name" id="f_name" class="form-control" placeholder="First Name" required>  
                                    @endif
                                    @error('f_name')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    @if(Auth()->guard('customer')->check() && Auth()->guard('customer')->user()->last_name)
                                    <input type="text" name="l_name" id="l_name" class="form-control" value="{{Auth()->guard('customer')->user()->last_name}}" readonly>
                                    @else
                                    <input type="text" name="l_name" id="l_name" class="form-control" placeholder="Last Name" required>
                                    @endif
                                    @error('l_name')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    @if(Auth()->guard('customer')->check() && Auth()->guard('customer')->user()->email)
                                    <input type="email" name="email" id="email" class="form-control" value="{{Auth()->guard('customer')->user()->email}}" readonly>
                                    @else
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Your Email"  required>
                                    @endif
                                    @error('email')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    @if(Auth()->guard('customer')->check() && Auth()->guard('customer')->user()->mobile)
                                    <input type="text" name="phone" id="phone" class="form-control" value="{{Auth()->guard('customer')->user()->mobile}}" readonly>
                                    @else
                                    <input type="number" name="phone" id="phone" class="form-control" placeholder="Your Contact Number"  required>
                                    @endif
                                    @error('phone')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    @if(Auth()->guard('customer')->check() && Auth()->guard('customer')->user()->country)
                                    <input type="text" name="country" id="country" class="form-control" value="{{Auth()->guard('customer')->user()->country}}" readonly>
                                    @else
                                    <input type="text" name="country" class="form-control" placeholder="Country" id="country" required>
                                    @endif
                                    @error('country')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="contact-textarea">
                                        <textarea class="form-control" rows="6" placeholder="Write Message" id="message" name="message" required></textarea>
                                        <div class="mt-4">
                                      
                                            {!! NoCaptcha::renderJs() !!}
                                            {!! NoCaptcha::display() !!}
                                            @error('g-recaptcha-response')
                                            <span class="text-danger" >
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                        <button class="btn btn-theme mt-4" type="submit" value="Submit Form">Send Message</button>
                                    </div>
                                </div>
                                
                                <div id="form-messages"></div>
                            </div>
                        </form>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6" >
                        <h3 class="title">Get in <span>Touch</span></h3>
                        <div class="d-flex" style="justify-content:space-around;flex-wrap:wrap">
                            <div class="service-item style-1 border-1px" style="width:256px">
                                <div class="service-icon">
                                    <i class="pe-7s-map"></i>
                                </div>
                                <div class="content">
                                    <h5>Address</h5>
                                    @if (isset($getcontact->address))
                                        <p>{{ $getcontact->address }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="service-item style-1 border-1px" style="width:256px">
                                <div class="service-icon">
                                    <i class="pe-7s-mail-open"></i>
                                </div>
                                <div class="content">
                                    <h5><a href="#">Email</a></h5>
                                    @if (isset($getcontact->email))
                                        <p><a href="Email:{{ $getcontact->email }}">{{ $getcontact->email }}</a> </p>
                                    @endif
                                </div>
                            </div>
                            <div class="service-item style-1 border-1px" style="width:256px">
                                <div class="service-icon">
                                    <i class="pe-7s-call"></i>
                                </div>
                                <div class="content">
                                    <h5><a href="#">Phone</a></h5>
                                    @if (isset($getcontact->phone))
                                        <p><a href="{{ $getcontact->phone }}">{{ $getcontact->phone }}</a> </p>
                                    @endif
                                </div>
                            </div>
                            <div class="service-item style-1 border-1px" style="width:256px">
                                <div class="service-icon">
                                    <i class="pe-7s-print"></i>
                                </div>
                                <div class="content">
                                    <h5><a href="#">Fax</a></h5>
                                    @if (isset($getcontact->fax))
                                        <p><a href="{{ $getcontact->fax }}">{{ $getcontact->fax }}</a> </p>
                                    @endif
                                </div>
                            </div>
                            <div class="service-item style-1 border-1px" style="width:256px">
                                <div class="service-icon">
                                    <i class="pe-7s-print"></i>
                                </div>
                                <div class="content">
                                    <h5><a href="#">GPO Box</a></h5>
                                    @if (isset($getcontact->gpo_box))
                                        <p><a href="{{ $getcontact->gpo_box }}">{{ $getcontact->gpo_box }}</a> </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if (isset($getcontact->map_url))
        <section class="p-0">
            <div class="map">
                <iframe src="{{ $getcontact->map_url }}" height="450" allowfullscreen=""></iframe>
            </div>
        </section>
    @endif
  
@endsection
