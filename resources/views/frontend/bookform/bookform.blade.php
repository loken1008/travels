@php
$tours=App\Models\Tour::orderBy('tour_name','asc')->get();
@endphp

@extends('frontend.main')
@section('title', "OnlineBook")
@section('content')
    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg" @if(!empty($bookbanner->page_banner))data-background="{{asset($bookbanner->page_banner)}}" @endif data-type="parallax" data-speed="3">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-12">
                        <h4>Online Book</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Inner Section End -->
  
    <!-- Contact Section Start -->
    <section class="contact-section pt-90 pb-20">
        {{-- @if(Session::has('message'))
        <div class="alert alert-success text-center">
            {{ Session::get('message') }}
        </div>
        @endif --}}
        <div class="container">
            <div class="row ">
                <div class="col-md-12 col-lg-8 style-2">

                    <form class="booking-form" method="POST" action="{{route('store.booking')}}" id="bookingForm">
                        @csrf
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                {{-- <a class="nav-item nav-link active" id="nav-hotelbk-tab" data-toggle="tab"
                                            href="#nav-hotelbk" role="tab" aria-controls="nav-hotelbk"
                                            aria-selected="true">Hotels</a> --}}
                                <a class="nav-item nav-link" data-toggle="tab" role="tab" aria-controls="nav-packagesbk"
                                    aria-selected="false">Book Your Prefer Packages</a>
                                {{-- <a class="nav-item nav-link" id="nav-placesbk-tab" data-toggle="tab"
                                            href="#nav-placesbk" role="tab" aria-controls="nav-placesbk"
                                            aria-selected="false">Places</a> --}}
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <!-- item start -->
                            <div class=" " id="" role="" aria-labelledby="nav-packagesbk-tab">
                                <div class="form-row">
                                    @if(!empty($tour->tour_name))
                                    <div class="form-group col-md-12">
                                        <label for="tourName">Tour Name  <span class="text-danger">*</span> </label>
                                        <input type="text" name="" id="package_name" class="form-control" value="{{$tour->tour_name}}" readonly>
                                         <input type="hidden" name="tour_id" value="{{$tour->id}}">
                                    </div>
                                    @else 
                                    <div class="form-group col-md-12">
                                        <label for="tourName">Tour Name  <span class="text-danger">*</span> </label>
                                        <select name="tour_id" id="package_name" class="form-control">
                                          <option value="">Select Tours </option>
                                          @foreach($tours as $tours)
                                          <option  value="{{$tours->id}}">{{$tours->tour_name}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                    @endif
                                    <div class="form-group col-md-12">
                                        @if(Auth()->guard('customer')->check() && Auth()->guard('customer')->user()->id)
                                        <input type="hidden" name="customer_id" value="{{Auth()->guard('customer')->user()->id}}">
                                        @else
                                        <input type="hidden" name="customer_id" value="">
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tourName">First Name  <span class="text-danger">*</span> </label>
                                        @if( Auth()->guard('customer')->check() && Auth()->guard('customer')->user()->first_name)
                                        <input type="text" name="first_name" id="first_name" class="form-control" value="{{ Auth()->guard('customer')->user()->first_name}}" readonly>
                                        @else
                                        <input type="text" name="first_name" id="first_name" class="form-control" value=""
                                            placeholder="Enter First Name">
                                        @endif
                                        @error('first_name')
                                            <span class="text-danger" >
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tourName">Last Name  <span class="text-danger">*</span> </label>
                                        @if(Auth()->guard('customer')->check() && Auth()->guard('customer')->user()->last_name)
                                        <input type="text" name="last_name" id="last_name" class="form-control" value="{{ Auth()->guard('customer')->user()->last_name}}" readonly>
                                        @else
                                        <input type="text" name="last_name" id="last_name" class="form-control" value=""
                                            placeholder="Enter Last Name">
                                        @endif
                                        @error('last_name')
                                            <span class="text-danger" >
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tourName">Email  <span class="text-danger">*</span> </label>
                                        @if(Auth()->guard('customer')->check() && Auth()->guard('customer')->user()->email)
                                        <input type="email" name="email" id="email" class="form-control" value="{{ Auth()->guard('customer')->user()->email}}" readonly>
                                        @else
                                        <input type="email" name="email" id="email" class="form-control" value=""
                                            placeholder="Enter Your Email">
                                        @endif
                                        @error('email')
                                            <span class="text-danger" >
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tourName">Address  <span class="text-danger">*</span> </label>
                                        @if(Auth()->guard('customer')->check() && Auth()->guard('customer')->user()->address)
                                        <input type="text" name="address" id="address" class="form-control" value="{{ Auth()->guard('customer')->user()->address}}" readonly>
                                        @else
                                        <input type="text" name="address" id="address" class="form-control" value=""
                                            placeholder="Enter Your Address">
                                        @endif
                                        @error('address')
                                            <span class="text-danger" >
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tourName">Post Code  </label>
                                        <input type="text" name="post_code" id="post_code" class="form-control" value=""
                                            placeholder="Enter Your Postcode">

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tourName">Telephone No  </label>
                                        <input type="text" name="telephone" id="telephone" class="form-control" value=""
                                            placeholder="Enter Your Telephone">
                                        
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tourName">Mobile  <span class="text-danger">*</span> </label>
                                        @if(Auth()->guard('customer')->check() && Auth()->guard('customer')->user()->mobile)
                                        <input type="text" name="mobile" id="mobile" class="form-control" value="{{ Auth()->guard('customer')->user()->mobile}}" readonly>
                                        @else
                                        <input type="text" name="mobile" id="mobile" class="form-control" value=""
                                            placeholder="Enter Your Mobile">
                                        @endif
                                        @error('mobile')
                                            <span class="text-danger" >
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="tourName">Your Country  <span class="text-danger">*</span> </label>
                                        @if(Auth()->guard('customer')->check() && Auth()->guard('customer')->user()->country)
                                        <input type="text" name="country" id="country" class="form-control" value="{{Auth()->guard('customer')->user()->country}}" readonly>
                                        @else
                                        <input type="text" name="country" id="country" class="form-control" value=""
                                            placeholder="Enter Your Country">
                                        @endif
                                        @error('country')
                                            <span class="text-danger" >
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tourName">Number Of Person  <span class="text-danger">*</span> </label>
                                        <input type="text" name="number_people" id="number_people" class="form-control"
                                            value="" placeholder="Enter Your Number people">
                                        @error('number_people')
                                            <span class="text-danger" >
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tourName">Arrival Date   </label>
                                        <input type="date" name="arrival_date" id="arrival_date" class="form-control"
                                            value="" placeholder="Enter Arrival date">
                                       
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tourName">Departure Date  </label>
                                        <input type="date" name="departure_date" id="departure_date" class="form-control"
                                            value="" placeholder="Enter Departure date">
                                       
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="tourName">Message  </label>
                                        <textarea name="message" id="message" class="form-control" value=""></textarea>
                                      
                                    </div>
                                    <div class="form-group col-md-12">
                                      
                                        {!! NoCaptcha::renderJs() !!}
                                        {!! NoCaptcha::display() !!}
                                        @error('g-recaptcha-response')
                                        <span class="text-danger" >
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="contact-textarea text-center">
                                            <button class="btn btn-theme" type="submit" value="Submit Form">Book
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
                <div class="col-md-12 col-lg-4 p-0">
                    <div class="contact-text">
                        <h4>Get in Touch</h4>
                        <div class="sec-line mb-20"></div>
                        <div class="contact-info">
                            <div class="icon-box">
                                <i class="flaticon-pin-1"></i>
                            </div>
                            @if(isset($getcontact->address))
                            <h6>{{$getcontact->address}}</h6>
                            @endif
                        </div>
                        <div class="contact-info">
                            <div class="icon-box">
                                <i class="flaticon-flash"></i>
                            </div>
                            @if(isset($getcontact->phone))
                            <h6>{{$getcontact->phone}}</h6>
                            @endif
                        </div>
                        <div class="contact-info">
                            <div class="icon-box">
                                <i class="pe-7s-map"></i>
                            </div>
                            @if(isset($getcontact->email))
                            <h6>{{$getcontact->email}}</h6>
                            @endif
                        </div>
                       
                            <h4 >Quick Inquery </h4>
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
                   
                </div>
             
               
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Special Places Section Start -->
    @include('frontend.common.tour')
    <!-- Special Places Section End -->
    
@endsection
