@extends('frontend.main')
@section('title', 'OnlineBooking')
@section('content')




    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg" data-background="images/bg/px-1.jpg" data-type="parallax" data-speed="3">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-12">
                        <h4>Online Booking</h4>
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
                <div class="col-md-12 col-lg-4 p-0">
                    <div class="contact-text">
                        <h2>We are <span>Booking</span></h2>
                        <h4>Get in Touch</h4>
                        <div class="sec-line mb-20"></div>
                        <p>Consectetur adipisicing elit. Temporibus error quod necessitatibus</p>
                        <div class="contact-info">
                            <div class="icon-box">
                                <i class="flaticon-pin-1"></i>
                            </div>
                            <h6>Street melbourne, Australia</h6>
                        </div>
                        <div class="contact-info">
                            <div class="icon-box">
                                <i class="flaticon-flash"></i>
                            </div>
                            <h6>+880 195085 363</h6>
                        </div>
                        <div class="contact-info">
                            <div class="icon-box">
                                <i class="pe-7s-map"></i>
                            </div>
                            <h6>info@bdCoderonline.com</h6>
                        </div>
                        <div class="contact-info">
                            <div class="icon-box">
                                <i class="pe-7s-server"></i>
                            </div>
                            <h6><a href="#">http:/bdCoderonline.com</a></h6>
                        </div>
                    </div>
                </div>
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <div class="col-md-12 col-lg-8 style-2">

                    <form class="booking-form" method="POST" action="{{route('store.booking')}}">
                        @csrf
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                {{-- <a class="nav-item nav-link active" id="nav-hotelbk-tab" data-toggle="tab"
                                            href="#nav-hotelbk" role="tab" aria-controls="nav-hotelbk"
                                            aria-selected="true">Hotels</a> --}}
                                <a class="nav-item nav-link" data-toggle="tab" role="tab" aria-controls="nav-packagesbk"
                                    aria-selected="false">Book Packages</a>
                                {{-- <a class="nav-item nav-link" id="nav-placesbk-tab" data-toggle="tab"
                                            href="#nav-placesbk" role="tab" aria-controls="nav-placesbk"
                                            aria-selected="false">Places</a> --}}
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">

                            <!-- item start -->
                            <div class=" " id="" role="" aria-labelledby="nav-packagesbk-tab">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="tourName">Tour Name</label>
                                        <input type="text" name="" id="package_name" class="form-control" value="{{$tour->tour_name}}" readonly>
                                            <input type="hidden" name="tour_id" value="{{$tour->id}}">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="tourName">Full Name</label>
                                        <input type="text" name="fullname" id="fullname" class="form-control" value=""
                                            placeholder="Input Full Name">
                                        @error('fullname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="tourName">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" value=""
                                            placeholder="Input Email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tourName">Address</label>
                                        <input type="text" name="address" id="address" class="form-control" value=""
                                            placeholder="Input Address">
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tourName">Post Code</label>
                                        <input type="text" name="post_code" id="post_code" class="form-control" value=""
                                            placeholder="Input Postcode">
                                        @error('post_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tourName">Telephone No</label>
                                        <input type="text" name="telephone" id="telephone" class="form-control" value=""
                                            placeholder="Input Telephone">
                                        @error('telephone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tourName">Mobile</label>
                                        <input type="text" name="mobile" id="mobile" class="form-control" value=""
                                            placeholder="Input Mobile">
                                        @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="tourName">Your Country</label>
                                        <input type="text" name="country" id="country" class="form-control" value=""
                                            placeholder="Input Country">
                                        @error('country')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tourName">Number Of Person</label>
                                        <input type="text" name="number_people" id="number_people" class="form-control"
                                            value="" placeholder="Input Number people">
                                        @error('number_people')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tourName">Arrival Date</label>
                                        <input type="date" name="arrival_date" id="arrival_date" class="form-control"
                                            value="" placeholder="Input Arrival date">
                                        @error('arrival_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tourName">Departure Date</label>
                                        <input type="date" name="departure_date" id="departure_date" class="form-control"
                                            value="" placeholder="Input Departure date">
                                        @error('departure_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="tourName">Message</label>
                                        <textarea name="message" id="message" class="form-control" value=""></textarea>
                                        @error('message')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <strong>Recaptcha:</strong>
                                        {!! NoCaptcha::renderJs() !!}
                                        {!! NoCaptcha::display() !!}
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
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Special Places Section Start -->
    <section class="special-places-sec pb-80">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h2>Special <span>Tour</span> Places</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="specialplaces_carousel owl-carousel owl-theme owl-navst">
                        @foreach ($getTour as $key => $tour)
                            <div class="item">
                                <div class="special-packages">
                                    <div class="thumb">
                                        <img src="{{ $tour->mainImage }}" alt=""
                                            style="width:100% !important;height:253px !important">
                                        <div class="offer-price"> Off 40%</div>
                                        <div class="post-title-box">
                                            <div class="price-box">
                                                <h5><span>$</span>{{ $tour->main_price }}</h5>
                                                <h6>Starts From</h6>
                                            </div>
                                            <div class="title-box">
                                                <h4>{{ $tour->tour_name }}</h4>
                                                <h3>{{ $tour->country->country_name }},{{ $tour->place->place_name }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <ul class="info">
                                            <li><a href="#"><i class="fa fa-calendar"></i>{{ $tour->tour_days }} Days</a>
                                            </li>

                                        </ul>
                                        <p>{!! Str::limit($tour->description, 150) !!}</p>
                                        <a class="btn-theme" href="{{ route('tourdetails', $tour->tour_name) }}">View
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Special Places Section End -->

    <!-- Features Section Start -->
    <section class="funfact-section over-layer-black pt-90 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="video-sec">
                        <h2>Travel <span>Award</span> Year <span>2019</span></h2>
                        <p> Discover vestibulum <span>pharetra orci turpis</span>, ut interdum </p>
                        <div class="video-content">
                            <img src="images/photos/video-img.png" alt="image">
                            <div class="overlay">
                                <a href="../../../www.youtube.com/watchbf1e.html?v=7e90gBu4pas" class="popup-youtube"><i
                                        class="ficon fa fa-play-circle"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="funfact-item">
                                <div class="icon-box">
                                    <i class="fa fa-location-arrow"></i>
                                </div>
                                <div class="content">
                                    <h2>2583</h2>
                                    <h3><a href="#">Travel Package</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="funfact-item">
                                <div class="icon-box">
                                    <i class="fa fa-plane"></i>
                                </div>
                                <div class="content">
                                    <h2>1879</h2>
                                    <h3><a href="#">Locations Made</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="funfact-item">
                                <div class="icon-box">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="content">
                                    <h2>7215</h2>
                                    <h3><a href="#">Satisfied Client</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="funfact-item">
                                <div class="icon-box">
                                    <i class="fa fa-thumbs-up"></i>
                                </div>
                                <div class="content">
                                    <h2>1639</h2>
                                    <h3><a href="#">Recomended Trip</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Process Section End -->

    <!-- Client Section Start -->
    <section class="client-section bg-f8 style-2 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="client_carousel" class="owl-carousel">
                        <div class="item">
                            <div class="client-img-item">
                                <img src="images/partner/1.png" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-img-item">
                                <img src="images/partner/2.png" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-img-item">
                                <img src="images/partner/3.png" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-img-item">
                                <img src="images/partner/4.png" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-img-item">
                                <img src="images/partner/5.png" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-img-item">
                                <img src="images/partner/6.png" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-img-item">
                                <img src="images/partner/2.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Client Section End -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection
