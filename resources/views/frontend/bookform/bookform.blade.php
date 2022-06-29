@extends('frontend.main')
@section('title', 'OnlineBook')
@section('content')
    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg"
        @if (!empty($bookbanner->page_banner)) data-background="{{ asset($bookbanner->page_banner) }}" @endif data-type="parallax"
        data-speed="3">
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

        <div class="container">
            <div class="row ">
                <div class="col-md-12 col-lg-8 style-2">

                    <form class="booking-form" method="POST" action="{{ route('store.booking') }}" id="bookingForm">
                        @csrf
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link" data-toggle="tab" role="tab" aria-controls="nav-packagesbk"
                                    aria-selected="false">Book Your Prefer Packages</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <!-- item start -->
                            <div class=" " id="" role="" aria-labelledby="nav-packagesbk-tab">
                                <div class="form-row">
                                    @if (!empty($tour->tour_name))
                                        <div class="form-group col-md-12">
                                            <label for="tourName">Tour Name <span class="text-danger">*</span> </label>
                                            <input type="text" name="" id="package_name" class="form-control"
                                                value="{{ $tour->tour_name }}" readonly>
                                            <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                                        </div>
                                    @else
                                        <div class="form-group col-md-12">
                                            <label for="tourName">Tour Name <span class="text-danger">*</span> </label>
                                            <input type="text" id="package_name" class="form-control" name="tour_id"
                                                placeholder="Tour Name">
                                            @error('tour_id')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    @endif
                                    <div class="form-group col-md-12">
                                        @if (Auth()->guard('customer')->check() &&
                                            Auth()->guard('customer')->user()->id)
                                            <input type="hidden" name="customer_id"
                                                value="{{ Auth()->guard('customer')->user()->id }}">
                                        @else
                                            <input type="hidden" name="customer_id" value="">
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tourName">Full Name <span class="text-danger">*</span> </label>
                                        @if (Auth()->guard('customer')->check() &&
                                            Auth()->guard('customer')->user()->first_name &&
                                            Auth()->guard('customer')->check() &&
                                            Auth()->guard('customer')->user()->last_name)
                                            <input type="text" name="full_name" id="full_name" class="form-control"
                                                value="{{ Auth()->guard('customer')->user()->first_name }} {{ Auth()->guard('customer')->user()->last_name }}"
                                                readonly>
                                        @else
                                            <input type="text" name="full_name" id="full_name" class="form-control"
                                                value="" placeholder="Full Name">
                                        @endif
                                        @error('full_name')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tourName">Email <span class="text-danger">*</span> </label>
                                        @if (Auth()->guard('customer')->check() &&
                                            Auth()->guard('customer')->user()->email)
                                            <input type="email" name="email" id="email" class="form-control"
                                                value="{{ Auth()->guard('customer')->user()->email }}" readonly>
                                        @else
                                            <input type="email" name="email" id="email" class="form-control"
                                                value="" placeholder="Valid Email">
                                        @endif
                                        @error('email')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tourName">Current Address</label>
                                        @if (Auth()->guard('customer')->check() &&
                                            Auth()->guard('customer')->user()->address)
                                            <input type="text" name="address" id="address" class="form-control"
                                                value="{{ Auth()->guard('customer')->user()->address }}" readonly>
                                        @else
                                            <input type="text" name="address" id="address" class="form-control"
                                                value="" placeholder="Current Address">
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tourName">Mobile <span class="text-danger">*</span> </label>
                                        @if (Auth()->guard('customer')->check() &&
                                            Auth()->guard('customer')->user()->mobile)
                                            <input type="text" name="mobile" id="mobile" class="form-control"
                                                value="{{ Auth()->guard('customer')->user()->mobile }}" readonly>
                                        @else
                                            <input type="text" name="mobile" id="mobile" class="form-control"
                                                value="" placeholder="Mobile Number">
                                        @endif
                                        @error('mobile')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="tourName">Country <span class="text-danger">*</span> </label>
                                        @if (Auth()->guard('customer')->check() &&
                                            Auth()->guard('customer')->user()->country)
                                            <input type="text" name="country" id="country" class="form-control"
                                                value="{{ Auth()->guard('customer')->user()->country }}" readonly>
                                        @else
                                            <input type="text" name="country" id="country" class="form-control"
                                                value="" placeholder="Country Name">
                                        @endif
                                        @error('country')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tourName">Number Of Person <span class="text-danger">*</span> </label>
                                        <input type="text" name="number_people" id="number_people"
                                            class="form-control" value="" placeholder="Number Of people">
                                        @error('number_people')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    @if (!empty($tour->tour_name))
                                        <div class="form-group col-md-6">
                                            <label for="tourName">Arrival Date </label>
                                            <input type="date" name="arrival_date" id="arrival_date"
                                                class="form-control" value="" placeholder="Arrival date">

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="tourName">Departure Date </label>
                                            <input type="date" name="departure_date" id="departure_date"
                                                class="form-control" value="" placeholder="Departure date">

                                        </div>
                                    @else
                                        <div class="form-group col-md-6">
                                            <label for="tourName">Start Date </label>
                                            <input type="date" name="start_date" id="start_date" class="form-control"
                                                value="" placeholder="Start date">

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="tourName">Tour Days</label>
                                            <input type="number" name="tour_days" id="tour_days" class="form-control"
                                                value="" placeholder="Tour Days">

                                        </div>
                                    @endif
                                    <div class="form-group col-md-12">
                                        <label for="tourName">Message </label>
                                        <textarea name="message" id="message" class="form-control" value=""></textarea>

                                    </div>
                                    <div class="form-group col-md-12">

                                        {!! NoCaptcha::renderJs() !!}
                                        {!! NoCaptcha::display() !!}
                                        {{-- @error('g-recaptcha-response')
                                        <span class="text-danger" >
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
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
                            @if (isset($getcontact->address))
                                <h6>{{ $getcontact->address }}</h6>
                            @endif
                        </div>
                        <div class="contact-info">
                            <div class="icon-box">
                                <i class="flaticon-flash"></i>
                            </div>
                            @if (isset($getcontact->phone))
                                <h6>{{ $getcontact->phone }}</h6>
                            @endif
                        </div>
                        <div class="contact-info">
                            <div class="icon-box">
                                <i class="pe-7s-map"></i>
                            </div>
                            @if (isset($getcontact->email))
                                <h6>{{ $getcontact->email }}</h6>
                            @endif
                        </div>

                        <h4>Quick Inquery </h4>
                   @include('frontend.common.commoncontact')
                       
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
