@extends('frontend.main')
@section('title', 'Home')
@section('content')
    <!-- Slick Section Start -->
    <section class="slider-wrapper st-two p-0">
        <div id="slider-style-one" class="carousel slide bs-slider control-round indicators-line" data-ride="carousel"
            data-pause="hover" data-interval="5000">

            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#slider-style-one" data-slide-to="0" class="active"></li>
                <li data-target="#slider-style-one" data-slide-to="1"></li>
                <li data-target="#slider-style-one" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper For Slides -->
            <div class="carousel-inner" role="listbox">

                <!-- Item Slide -->
                @foreach ($getbanner as $banner)
                    <div class="carousel-item active">

                        <!-- Slide Background -->
                        <img src="{{ $banner->banner_image }}" alt="Slider Images" class="slide-image"
                            style="width:1905px;height:750px" />
                        <div class="bs-slider-overlay"></div>

                        <div class="container">
                            <div class="row">
                                <!-- Slide Text Layer -->
                                <div class="slide-text slide-style-left st-two">
                                    <h2>{{ $banner->title }}</h2>
                                </div>
                                <!-- Package Box -->
                                <div class="package-box">
                                    <h1><span>45%</span> off</h1>
                                    <h4>on all package</h4>
                                    <a href="#">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- End of Slide -->



            </div><!-- End of Wrapper For Slides -->

            <!-- Left Control -->
            <a class="left carousel-control" href="#slider-style-one" role="button" data-slide="prev">
                <span class="fa fa-angle-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <!-- Right Control -->
            <a class="right carousel-control" href="#slider-style-one" role="button" data-slide="next">
                <span class="fa fa-angle-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div> <!-- End  slider-style-one Slider -->
    </section>
    <!-- Slick Section End -->

    <!-- Welcome Section Start -->
    <section class="welcome-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="icon-wrp">
                        <div class="icon-box">
                            <i class="fa fa-wifi"></i>
                            <h5>Travel</h5>
                            <a href="#">view more</a>
                        </div>
                        <div class="icon-box">
                            <i class="fa fa-crosshairs"></i>
                            <h5>Packages</h5>
                            <a href="#">view more</a>
                        </div>
                        <div class="icon-box">
                            <i class="fa fa-plane"></i>
                            <h5>Vehicle</h5>
                            <a href="#">view more</a>
                        </div>
                        <div class="icon-box">
                            <i class="fa fa-umbrella"></i>
                            <h5>Hoteel</h5>
                            <a href="#">view more</a>
                        </div>
                        <div class="icon-box">
                            <i class="fa fa-map-marker"></i>
                            <h5>Location</h5>
                            <a href="#">view more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Welcome Section End -->

    <!-- Special Places Section Start -->
    <section class="special-places-sec pb-80">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h4>Welcome to Touran Travel</h4>
                    <h2>Special <span>Tour</span> Places</h2>
                    <p>Deserunt quia ducimus ut illum optio cum eum voluptate corrupti numquam</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-style">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                @foreach ($country as $key => $cutry)
                                    <a class="nav-item nav-link {{ $loop->first ? 'active' : '' }}" id="plc-asia-tab"
                                        data-toggle="tab" href="#plc-asia{{ $cutry->country_name }}" role="tab"
                                        aria-controls="plc-asia" aria-selected="true">{{ $cutry->country_name }}</a>
                                @endforeach
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <!-- item start -->
                            @forelse($getcountry as $key1=> $countrys)
                                <div class="tab-pane fade show {{ $loop->first ? 'active' : '' }}"
                                    id="plc-asia{{ $countrys->country_name }}" role="tabpanel"
                                    aria-labelledby="plc-asia-tab">
                                    <div class="specialplaces_carousel owl-carousel owl-theme owl-navst st-two">
                                        @foreach ($countrys->tours as $key2 => $tour)
                                            @if ($tour->country_id == $countrys->id)
                                                <div class="item">
                                                    <div class="special-places">
                                                        <div class="thumb">
                                                            <img src="{{ $tour->mainImage }}" alt=""
                                                                style="width:350px !important;height:215px !important">
                                                        </div>
                                                        <div class="content">
                                                            <div class="price-box">
                                                                <h5><span>$</span>{{ $tour->main_price }}</h5>
                                                                <h6>Starts From</h6>
                                                            </div>
                                                            <div class="title-box">
                                                                <h4>{{ $tour->tour_name }}</h4>
                                                                <h3>{{ $tour->place->place_name }}</h3>
                                                            </div>
                                                            <ul class="info">
                                                                <li><a href="#"><i
                                                                            class="fa fa-calendar"></i>{{ $tour->tour_days }}
                                                                        Days</a></li>
                                                                {{-- <li><a href="#"><i class="fa fa-user"></i>{{$tour->}} Person</a></li>
                                                <li><a href="#"><i class="fa fa-map-marker"></i>View on Map</a></li> --}}
                                                            </ul>
                                                            <p>{!! Str::limit($tour->description, 200) !!}</p>
                                                            <a class="btn-theme" style="float:left !important"
                                                                href="{{ route('booking', $tour->tour_name) }}">Booking
                                                                Now</a>
                                                            <a class="btn-theme"
                                                                href="{{ route('tourdetails', $tour->tour_name) }}">View
                                                                Details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                Not Available
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @empty
                            @endforelse
                            <!-- item end -->


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Special Places Section End -->

    <!-- Features Section Start -->
    <section class="feature-section over-layer-black pt-85 pb-90">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h4>Touran Travel Features</h4>
                    <h2>Why <span>Choose</span> Touran</h2>
                    <p>Deserunt quia ducimus ut illum optio cum eum voluptate corrupti numquam</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-item">
                        <div class="icon-box">
                            <i class="flaticon-like"></i>
                        </div>
                        <div class="content">
                            <h3><a href="#">Years of <span>experience</span></a></h3>
                            <p>dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-item">
                        <div class="icon-box">
                            <i class="flaticon-manager"></i>
                        </div>
                        <div class="content">
                            <h3><a href="#">Expert Tour <span>Guide</span></a></h3>
                            <p>dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-item last">
                        <div class="icon-box">
                            <i class="flaticon-heart-1"></i>
                        </div>
                        <div class="content">
                            <h3><a href="#">Beautiful <span>Tour Place</span></a></h3>
                            <p>dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature Section End -->

    <!-- Special Packages Section Start -->
    <section class="special-packages-sec pt-85 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="section-title stitle-left">
                        <h4>Our packages</h4>
                        <h2>Special <span>Packages</span> Offer</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="specialpackages_carousel owl-carousel owl-theme owl-navst">
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
                                                        <h3>{{ $tour->country->country_name }},{{ $tour->place->place_name }}
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <ul class="info">
                                                    <li><a href="#"><i class="fa fa-calendar"></i>{{ $tour->tour_days }}
                                                            Days</a></li>

                                                </ul>
                                                <p>{!! Str::limit($tour->description, 200) !!}</p>
                                                <a class="btn-theme" style="float:left !important"
                                                    href="{{ route('booking', $tour->tour_name) }}">Booking Now</a>
                                                <a class="btn-theme"
                                                    href="{{ route('tourdetails', $tour->tour_name) }}">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-3">
                    <div class="add-box thumb">
                        <img src="{{asset('frontend/images/features/ad-1.png')}}" alt="">
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- Special Packages Section End -->

    <!-- Funfact Section Start -->
    <section class="funfact-section over-layer-black pt-90 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="video-sec">
                        <h2>Travel <span>Award</span> Year <span>2019</span></h2>
                        <p> Discover vestibulum <span>pharetra orci turpis</span>, ut interdum </p>
                        <div class="video-content">
                            <img src="{{ asset('frontend/images/photos/video-img.png') }}" alt="image">
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
    <!-- Funfact Section End -->

    <!-- Latest Hotel Section Start -->
    <section class="latest-hotel-sec pt-85 pb-80">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h4>Touran Hotel Collection</h4>
                    <h2>Latest <span>Hotel</span> Collection</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="latesthotel_carousel owl-carousel owl-theme owl-navst">
                        @foreach ($gethotel as $hotel)
                            <div class="item">
                                <div class="latest-hotel">
                                    <div class="thumb">
                                        <img src="{{ $hotel->image }}" alt="">
                                    </div>
                                    <div class="content">
                                        <h4>{{ $hotel->hotel_name }}</h4>
                                        <h5>{{ $hotel->hotel_address }}</h5>

                                        <p>{!! Str::limit($hotel->hotel_description, 200) !!}</p>
                                        <a class="map-viw"
                                            href="{{ route('hotelviewdetails', $hotel->hotel_name) }}"><i
                                                class="fa fa-eye"></i>View Details</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Hotel Section End -->

    <!-- Global Section Start -->
    <section class="global-section over-layer-white pt-80 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-12">
                    <div class="global-area">
                        <div class="inner-title">
                            <h2>Now We Are Globaly Everywhare</h2>
                            <h3>Discover vestibulum <span>pharetra orci turpis</span>, ut interdum </h3>
                            <div class="sec-line"></div>
                        </div>
                        <p>Pellentesque consectetur condimentum libero, interdum aliquet enim sollic tudin ut. Donec dapibus
                            tempor odio eu aliquet. Vivamus ultricies augue ut.</p>
                        <h4>Condimentum at sed sapien:</h4>
                        <ul>
                            <li>consectetur adipting elit.</li>
                            <li>consectetur adipting elit.</li>
                            <li>consectetur adipting elit.</li>
                            <li>consectetur adipting elit.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-8 col-md-10">
                    <div class="map-area">
                        <img src="{{ asset('frontend/images/photos/map01.png') }}" alt="image">
                    </div>
                    <p class="map-content">Discover vestibulum <span class="color-light">Call:</span>
                        <span>+88095085363</span>, ut interdum </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Global Section End -->

    <!-- Gallery Section Start -->
    <section class="gallery-section pt-85 pb-0">
        <div class="container-fluid">
            <div class="row">
                <div class="section-title">
                    <h4>Touran Travel Gallery</h4>
                    <h2>Touran <span>Tour</span> Gallery</h2>
                    <p>Deserunt quia ducimus ut illum optio cum eum voluptate corrupti numquam</p>
                </div>
            </div>
            <div class="row gallery-items">
                <div class="col-sm-4 col-grid">
                    <div class="gallery-item">
                        <div class="thumb">
                            <img src="{{ asset('frontend/images/gallery/1.jpg') }}" alt="image">
                            <div class="overlay">
                                <div class="inner">
                                    <a href="{{ asset('frontend/images/gallery/1.jpg') }}" class="icon lightbox-image">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                    <h4>Beautiful Nature</h4>
                                    <p>Tour, Travel</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-grid col-center">
                    <div class="gallery-item">
                        <div class="thumb">
                            <img src="{{ asset('frontend/images/gallery/2.jpg') }}" alt="image">
                            <div class="overlay">
                                <div class="inner">
                                    <a href="{{ asset('frontend/images/gallery/2.jpg') }}" class="icon lightbox-image">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                    <h4>Beautiful Nature</h4>
                                    <p>Tour, Travel</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-grid">
                    <div class="gallery-item">
                        <div class="thumb">
                            <img src="{{ asset('frontend/images/gallery/3.jpg') }}" alt="image">
                            <div class="overlay">
                                <div class="inner">
                                    <a href="{{ asset('frontend/images/gallery/3.jpg') }}" class="icon lightbox-image">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                    <h4>Beautiful Nature</h4>
                                    <p>Tour, Travel</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-grid">
                    <div class="gallery-item">
                        <div class="thumb">
                            <img src="{{ asset('frontend/images/gallery/4.jpg') }}" alt="image">
                            <div class="overlay">
                                <div class="inner">
                                    <a href="{{ asset('frontend/images/gallery/4.jpg') }}" class="icon lightbox-image">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                    <h4>Beautiful Nature</h4>
                                    <p>Tour, Travel</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-grid col-center">
                    <div class="gallery-item">
                        <div class="thumb">
                            <img src="{{ asset('frontend/images/gallery/5.jpg') }}" alt="image">
                            <div class="overlay">
                                <div class="inner">
                                    <a href="{{ asset('frontend/images/gallery/5.jpg') }}" class="icon lightbox-image">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                    <h4>Beautiful Nature</h4>
                                    <p>Tour, Travel</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-grid">
                    <div class="gallery-item">
                        <div class="thumb">
                            <img src="{{ asset('frontend/images/gallery/6.jpg') }}" alt="image">
                            <div class="overlay">
                                <div class="inner">
                                    <a href="{{ asset('frontend/images/gallery/6.jpg') }}" class="icon lightbox-image">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                    <h4>Beautiful Nature</h4>
                                    <p>Tour, Travel</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Gallery Section End -->

    <!-- Testimonials Section Start -->
    <section class="testimonials-section pt-80 pb-80">
        <div class="container">
            <div class="row">
                {{-- <div class="col-lg-5">
                    <div class="testimonial-video mt-0">
                        <h5>Latest Hotel Reviews</h5>
                        <div class="sec-line mb-20"></div>
                        <h3><i class="fa fa-quote-left"></i> If you are going to use a passage of Lorem Ipsum, you need to be on sure there isn’t anything embarras repeat predefined chunks as.</h3>
                        <a class="btn-theme popup-youtube" href="../../../www.youtube.com/watchbf1e.html?v=7e90gBu4pas"><i class="fa fa-play-circle"></i> Play Video</a>
                        <div class="review-ratings">
                            <a class="ratings-star" href="#">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-empty"></i>
                                <i class="fa fa-star-o"></i>
                            </a>
                            <a class="ratings-count" href="#">(3 Ratings)</a>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-12">
                    @include('frontend.common.testmonial')
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials Section End -->

    <!-- Blog Section Start -->
    <section class="blog-section bg-f8 pt-85 pb-55">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h4>Our latest blog</h4>
                    <h2>Touran <span>Latest</span> Blog</h2>
                    <p>Consectetur adipisicing elit. Excepturi nemo tenetur veniam repellat earum inventore modi omnis.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="blog-post">
                        <div class="thumb">
                            <img alt="" src="{{ asset('frontend/images/blog/1.jpg') }}">
                            <div class="content">
                                <h3>Summer Vacation Travel On gratest global mounten</h3>
                                <div class="meta-box">
                                    <div class="admin-post"> Admin, TributeTheme </div>
                                    <div class="inner">
                                        <div class="date">
                                            <i class="fa fa-calendar-plus-o"></i> Feb 24
                                        </div>
                                        <div class="comment">
                                            <i class="fa fa-commenting-o"></i> 8
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="blog-details.html" class="read-btn">Continue Reading
                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="blog-post">
                        <div class="thumb">
                            <img alt="" src="{{ asset('frontend/images/blog/2.jpg') }}">
                            <div class="content">
                                <h3>Winter Vacation Travel On beautiful tour package</h3>
                                <div class="meta-box">
                                    <div class="admin-post"> Admin, TributeTheme </div>
                                    <div class="inner">
                                        <div class="date">
                                            <i class="fa fa-calendar-plus-o"></i> Feb 24
                                        </div>
                                        <div class="comment">
                                            <i class="fa fa-commenting-o"></i> 8
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="blog-details.html" class="read-btn">Continue Reading
                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 offset-md-3 col-lg-4 offset-lg-0">
                    <div class="blog-post">
                        <div class="thumb">
                            <img alt="" src="{{ asset('frontend/images/blog/3.jpg') }}">
                            <div class="content">
                                <h3>Summer Vacation Travel On gratest global Tower</h3>
                                <div class="meta-box">
                                    <div class="admin-post"> Admin, TributeTheme </div>
                                    <div class="inner">
                                        <div class="date">
                                            <i class="fa fa-calendar-plus-o"></i> Feb 24
                                        </div>
                                        <div class="comment">
                                            <i class="fa fa-commenting-o"></i> 8
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="blog-details.html" class="read-btn">Continue Reading
                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

   

    <!-- Client Section Start -->
    <section class="client-section bg-f8 pb-70 pt-70">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="client_carousel" class="owl-carousel">
                        <div class="item">
                            <div class="client-img-item">
                                <img src="{{ asset('frontend/images/partner/1.png') }}" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-img-item">
                                <img src="{{ asset('frontend/images/partner/2.png') }}" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-img-item">
                                <img src="{{ asset('frontend/images/partner/3.png') }}" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-img-item">
                                <img src="{{ asset('frontend/images/partner/4.png') }}" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-img-item">
                                <img src="{{ asset('frontend/images/partner/5.png') }}" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-img-item">
                                <img src="{{ asset('frontend/images/partner/6.png') }}" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-img-item">
                                <img src="{{ asset('frontend/images/partner/2.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Client Section End -->
@endsection
