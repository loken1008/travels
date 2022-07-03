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
                    <?php
                    $file_extension = substr(strrchr($banner->banner_image, '.'), 1);
                    $file_extension = strtolower($file_extension);
                    ?>

                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">

                        <!-- Slide Background -->
                        @if ($file_extension == 'mp4')
                            <video class="slide-video" autoplay loop muted >
                                <source src="{{ asset($banner->banner_image) }}" type="video/mp4">
                            </video>
                        @else
                            <img src="{{ $banner->banner_image }}" alt="Slider Images" class="slide-image"
                                style="width:1905px;height:750px" />
                        @endif
                        <div class="bs-slider-overlay"></div>

                        <div class="container">
                            <div class="row">
                                <!-- Slide Text Layer -->
                                <div class="slide-text slide-style-left st-two">
                                    <h2>{{ $banner->title }}</h2>
                                </div>


                                <!-- Package Box -->
                                @if ($getcoupon)
                                    <div class="package-box">
                                        <h1><span>{{ $getcoupon->discount_amount }}%</span> off</h1>
                                        <h4>on all package</h4>
                                        <h4>{{ $getcoupon->coupon_name }}</h4>
                                    </div>
                                @endif
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
            <div class="row" id="country-booking">
                <div class="col-md-9 country-tab">
                    <div class="icon-wrp text-center" style="display:flex;flex-wrap: wrap;">

                        <nav>
                            <div class="nav nav-tabs " id="nav-tab" role="tablist">
                                @foreach ($country as $key => $cutry)
                                    <a class="nav-item nav-link {{ $loop->first ? 'active' : '' }} ml-1 mt-2"
                                        id="plc-asia-tab" data-toggle="tab" href="#plc-asia{{ $cutry->country_name }}"
                                        role="tab" aria-controls="plc-asia"
                                        aria-selected="true">{{ $cutry->country_name }}</a>
                                @endforeach
                            </div>
                        </nav>
                       
                    </div>
                </div>
                <div class="col-md-3" id="custom-booking">
                    <div class=" text-center animated-button1">
                    <a href="{{ route('online.book') }}" class="animated-button1 ml-1 mt-2 cbutton">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Make Your Own Trip Now
                    </a>
                </div>
                </div>
            </div>
        </div>
    </section>
   
    <!-- Welcome Section End -->

    <!-- Special Places Section Start -->
    <section class="special-places-sec pt-20 pb-15">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-style">
                        <div class="tab-content" id="nav-tabContent">
                            <!-- item start -->
                            @forelse($getcountry as $key1=> $countrys)
                                <div class="tab-pane fade show {{ $loop->first ? 'active' : '' }}"
                                    id="plc-asia{{ $countrys->country_name }}" role="tabpanel"
                                    aria-labelledby="plc-asia-tab">
                                    <div class="specialplaces_carousel owl-carousel owl-theme owl-navst st-two">
                                        @forelse ($countrys->tours as $key2 => $tour)
                                            @if ($tour->status == '1')
                                                @if ($tour->country_id == $countrys->id)
                                                    <div class="item">
                                                        <div class="special-places">
                                                            <div class="thumb">
                                                                <img src="{{ $tour->mainImage }}"
                                                                    alt="{{ $tour->img_alt }}"
                                                                    style="height:215px !important">
                                                            </div>
                                                            <div class="content">
                                                                <div class="price-box">

                                                                    @if ($getcoupon)
                                                                        <h5 class="text-danger">
                                                                            <strike><span>$</span>{{ $tour->main_price }}</strike>
                                                                        </h5>
                                                                        <h5><span>$</span>{{ $tour->main_price - ($getcoupon->discount_amount / 100) * $tour->main_price }}
                                                                        </h5>
                                                                    @else
                                                                        <h5><span>$</span>{{ $tour->main_price }}</h5>
                                                                    @endif
                                                                </div>
                                                                <div class="title-box">
                                                                    {{-- <h4>{{ $tour->tour_name }}</h4> --}}
                                                                    <h3>{{ $tour->country->country_name }}</h3>
                                                                </div>
                                                                <ul class="info">
                                                                    <li><a href="#"><i
                                                                                class="fa fa-calendar"></i>{{ $tour->tour_days }}
                                                                            Days</a></li>
                                                                    <li><a href="{{ route('tourmap', $tour->slug) }}"><i
                                                                                class="fa fa-map-marker"></i>View on
                                                                            Map</a>
                                                                    </li>


                                                                </ul>
                                                                {{-- <p>{!! Str::words($tour->description, 30) !!}</p> --}}
                                                                <h6 class="text-center"
                                                                    style="color:#F5A13A;font-size:18px">
                                                                    {{ $tour->tour_name }}</h6>
                                                                <a class="btn-theme"
                                                                    style="float:left !important;margin-top:42px"
                                                                    href="{{ route('booking', $tour->slug) }}">Book
                                                                    Now</a>
                                                                <a class="btn-theme" style="margin-top:42px"
                                                                    href="{{ route('tourdetails', $tour->slug) }}">View
                                                                    Details</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        @empty
                                            <h5>Trip Not available</h5>
                                        @endforelse
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
    <section class="special-packages-sec pt-15 pb-15">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if($getTour)
                        <div class="section-title ">
                            <h2 class="text-center">Our Best <span>Selling</span> Package</h2>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="specialpackages_carousel owl-carousel owl-theme owl-navst">

                        {{-- {{dd($icategory)}} --}}
                        @if($getTour)
                         @foreach ($getTour as $key => $selltour)
                            <div class="item">
                                <div class="special-packages">
                                    <div class="thumb">
                                        <a href="{{ route('tourdetails', $selltour->slug) }}">
                                            <img src="{{ $selltour->mainImage }}" alt="{{ $selltour->img_alt }}"
                                                style="height:253px !important"></a>

                                        <div class="post-title-box">
                                            <div class="price-box">
                                                @if ($getcoupon)
                                                    <h5 class="text-danger">
                                                        <strike><span>$</span>{{ $selltour->main_price }}</strike>
                                                    </h5>
                                                    <h5><span>$</span>{{ $selltour->main_price - ($getcoupon->discount_amount / 100) * $selltour->main_price }}
                                                    </h5>
                                                @else
                                                    <h5><span>$</span>{{ $selltour->main_price }}</h5>
                                                @endif
                                            </div>
                                            <div class="title-box">
                                                {{-- <h4>{{ $tour->tour_name }}</h4> --}}
                                                <h3>{{ $selltour->country->country_name }}
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content" >
                                        <ul class="info">
                                            <li><a href="#"><i class="fa fa-calendar"></i>{{ $selltour->tour_days }}
                                                    Days</a></li>
                                            <li><a href="{{ route('tourmap', $selltour->slug) }}"><i
                                                        class="fa fa-map-marker"></i>View on Map</a></li>


                                        </ul>
                                        {{-- <p>{!! Str::words($tour->description,30).'.' !!}</p> --}}
                                        <h6 class="text-center" style="color:#F5A13A;font-size:18px">
                                            {{ $selltour->tour_name }}</h6>
                                        <a class="btn-theme" style="float:left !important;margin-top:42px"
                                            href="{{ route('booking', $selltour->slug) }}">Book
                                            Now</a>
                                        <a class="btn-theme" style="margin-top:42px"
                                            href="{{ route('tourdetails', $selltour->slug) }}">View
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Special Places Section End -->
    <section class="special-packages-sec pt-15 pb-15">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if($cattrekking)
                        <div class="section-title ">
                            <h2 class="text-center">Popular <span>Trekking</span> Places</h2>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="specialpackages_carousel owl-carousel owl-theme owl-navst">

                        {{-- {{dd($icategory)}} --}}
                        @if($cattrekking)
                         @foreach ($cattrekking->tour->shuffle() as $key => $tour)
                            <div class="item">
                                <div class="special-packages">
                                    <div class="thumb">
                                        <a href="{{ route('tourdetails', $tour->slug) }}">
                                            <img src="{{ $tour->mainImage }}" alt="{{ $tour->img_alt }}"
                                                style="height:253px !important"></a>

                                        <div class="post-title-box">
                                            <div class="price-box">
                                                @if ($getcoupon)
                                                    <h5 class="text-danger">
                                                        <strike><span>$</span>{{ $tour->main_price }}</strike>
                                                    </h5>
                                                    <h5><span>$</span>{{ $tour->main_price - ($getcoupon->discount_amount / 100) * $tour->main_price }}
                                                    </h5>
                                                @else
                                                    <h5><span>$</span>{{ $tour->main_price }}</h5>
                                                @endif
                                            </div>
                                            <div class="title-box">
                                                {{-- <h4>{{ $tour->tour_name }}</h4> --}}
                                                <h3>{{ $tour->country->country_name }}
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content" >
                                        <ul class="info">
                                            <li><a href="#"><i class="fa fa-calendar"></i>{{ $tour->tour_days }}
                                                    Days</a></li>
                                            <li><a href="{{ route('tourmap', $tour->slug) }}"><i
                                                        class="fa fa-map-marker"></i>View on Map</a></li>


                                        </ul>
                                        {{-- <p>{!! Str::words($tour->description,30).'.' !!}</p> --}}
                                        <h6 class="text-center" style="color:#F5A13A;font-size:18px">
                                            {{ $tour->tour_name }}</h6>
                                        <a class="btn-theme" style="float:left !important;margin-top:42px"
                                            href="{{ route('booking', $tour->slug) }}">Book
                                            Now</a>
                                        <a class="btn-theme" style="margin-top:42px"
                                            href="{{ route('tourdetails', $tour->slug) }}">View
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Special Packages Section Start -->

    <section class="special-packages-sec pt-15 pb-15">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if($catpeak)
                        <div class="section-title ">
                            <h2 class="text-center">Challenge <span>The Peak </span></h2>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="specialpackages_carousel owl-carousel owl-theme owl-navst">
                        @if($catpeak)
                        @foreach ($catpeak->tour->shuffle() as $key => $tour)
                            <div class="item">
                                <div class="special-packages">
                                    <div class="thumb">
                                        <a href="{{ route('tourdetails', $tour->slug) }}">
                                            <img src="{{ $tour->mainImage }}" alt="{{ $tour->img_alt }}"
                                                style="height:253px !important"></a>

                                        <div class="post-title-box">
                                            <div class="price-box">
                                                @if ($getcoupon)
                                                    <h5 class="text-danger">
                                                        <strike><span>$</span>{{ $tour->main_price }}</strike>
                                                    </h5>
                                                    <h5><span>$</span>{{ $tour->main_price - ($getcoupon->discount_amount / 100) * $tour->main_price }}
                                                    </h5>
                                                @else
                                                    <h5><span>$</span>{{ $tour->main_price }}</h5>
                                                @endif
                                            </div>
                                            <div class="title-box">
                                                {{-- <h4>{{ $tour->tour_name }}</h4> --}}
                                                <h3>{{ $tour->country->country_name }}
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content" >
                                        <ul class="info">
                                            <li><a href="#"><i class="fa fa-calendar"></i>{{ $tour->tour_days }}
                                                    Days</a></li>
                                            <li><a href="{{ route('tourmap', $tour->slug) }}"><i
                                                        class="fa fa-map-marker"></i>View on Map</a></li>


                                        </ul>
                                        {{-- <p>{!! Str::words($tour->description,30).'.' !!}</p> --}}
                                        <h6 class="text-center" style="color:#F5A13A;font-size:18px">
                                            {{ $tour->tour_name }}</h6>
                                        <a class="btn-theme" style="float:left !important;margin-top:42px"
                                            href="{{ route('booking', $tour->slug) }}">Book
                                            Now</a>
                                        <a class="btn-theme" style="margin-top:42px"
                                            href="{{ route('tourdetails', $tour->slug) }}">View
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="special-packages-sec pt-15 pb-15">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if($catadventure)
                        <div class="section-title ">
                            <h2 class="text-center">Get More <span>Adventure</span></h2>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="specialpackages_carousel owl-carousel owl-theme owl-navst">
                        @if($catadventure)
                            @foreach ($catadventure->tour as $key => $adventuretour)
                                <div class="item">
                                    <div class="special-packages">
                                        <div class="thumb">
                                            <a href="{{ route('tourdetails', $adventuretour->slug) }}">
                                                <img src="{{ $adventuretour->mainImage }}" alt="{{ $adventuretour->img_alt }}"
                                                    style="height:253px !important"></a>

                                            <div class="post-title-box">
                                                <div class="price-box">
                                                    @if ($getcoupon)
                                                        <h5 class="text-danger">
                                                            <strike><span>$</span>{{ $adventuretour->main_price }}</strike>
                                                        </h5>
                                                        <h5><span>$</span>{{ $adventuretour->main_price - ($getcoupon->discount_amount / 100) * $adventuretour->main_price }}
                                                        </h5>
                                                    @else
                                                        <h5><span>$</span>{{ $adventuretour->main_price }}</h5>
                                                    @endif
                                                </div>
                                                <div class="title-box">
                                                    {{-- <h4>{{ $adventuretour->adventuretour_name }}</h4> --}}
                                                    <h3>{{ $adventuretour->country->country_name }}
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="content" >
                                            <ul class="info">
                                                <li><a href="#"><i
                                                            class="fa fa-calendar"></i>{{ $adventuretour->tour_days }}
                                                        Days</a></li>
                                                <li><a href="{{ route('tourmap', $adventuretour->slug) }}"><i
                                                            class="fa fa-map-marker"></i>View on Map</a></li>


                                            </ul>
                                            {{-- <p>{!! Str::words($tour->description,30).'.' !!}</p> --}}
                                            <h6 class="text-center" style="color:#F5A13A;font-size:18px">
                                                {{ $adventuretour->tour_name }}</h6>
                                            <a class="btn-theme" style="float:left !important;margin-top:42px"
                                                href="{{ route('booking', $adventuretour->slug) }}">Book
                                                Now</a>
                                            <a class="btn-theme" style="margin-top:42px"
                                                href="{{ route('tourdetails', $adventuretour->slug) }}">View
                                                Details</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="special-packages-sec pt-15 pb-15">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if($catnature)
                        <div class="section-title ">
                            <h2 class="text-center">Experience <span>The Nature</span></h2>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="specialpackages_carousel owl-carousel owl-theme owl-navst">
                        @if($catnature)
                            @foreach ($catnature->tour->shuffle() as $key => $tour)
                                <div class="item">
                                    <div class="special-packages">
                                        <div class="thumb">
                                            <a href="{{ route('tourdetails', $tour->slug) }}">
                                                <img src="{{ $tour->mainImage }}" alt="{{ $tour->img_alt }}"
                                                    style="height:253px !important"></a>

                                            <div class="post-title-box">
                                                <div class="price-box">
                                                    @if ($getcoupon)
                                                        <h5 class="text-danger">
                                                            <strike><span>$</span>{{ $tour->main_price }}</strike>
                                                        </h5>
                                                        <h5><span>$</span>{{ $tour->main_price - ($getcoupon->discount_amount / 100) * $tour->main_price }}
                                                        </h5>
                                                    @else
                                                        <h5><span>$</span>{{ $tour->main_price }}</h5>
                                                    @endif
                                                </div>
                                                <div class="title-box">
                                                    {{-- <h4>{{ $tour->tour_name }}</h4> --}}
                                                    <h3>{{ $tour->country->country_name }}
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="content" >
                                            <ul class="info">
                                                <li><a href="#"><i
                                                            class="fa fa-calendar"></i>{{ $tour->tour_days }}
                                                        Days</a></li>
                                                <li><a href="{{ route('tourmap', $tour->slug) }}"><i
                                                            class="fa fa-map-marker"></i>View on Map</a></li>


                                            </ul>
                                            {{-- <p>{!! Str::words($tour->description,30).'.' !!}</p> --}}
                                            <h6 class="text-center" style="color:#F5A13A;font-size:18px">
                                                {{ $tour->tour_name }}</h6>
                                            <a class="btn-theme" style="float:left !important;margin-top:42px"
                                                href="{{ route('booking', $tour->slug) }}">Book
                                                Now</a>
                                            <a class="btn-theme" style="margin-top:42px"
                                                href="{{ route('tourdetails', $tour->slug) }}">View
                                                Details</a>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Global Section Start -->
    <section class="global-section over-layer-white pt-15 pb-15"
        style="@if (!empty($homepagebannertwo->page_banner)) background-image:url({{ asset($homepagebannertwo->page_banner) }}) @endif">
        <div class="row">
            <div class="section-title">
                <h2>Review <span>On</span>TrivAdvisor</h2>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12">

            <div data-rw-slider="30564"></div>

        </div>

    </section>
    <!-- Global Section End -->

    <!-- Features Section Start -->
    <section class="feature-section over-layer-black pt-15 pb-15"
        style="@if (!empty($homepagebannerone->page_banner)) background-image:url({{ asset($homepagebannerone->page_banner) }}) @endif">
        <div class="container-fluid">
            <div class="row">
                @if ($chooseus->count() > 0)
                    <div class="section-title">
                        <h2>Why <span>Choose</span> Mountain Guide Trek</h2>
                    </div>
                @endif
            </div>
            <div class="row">
                @foreach ($chooseus as $choose)
                    <div class="col-md-4">
                        <div class="feature-item">
                            <div class="icon-box">
                                <img src="{{ $choose->image }}" style="height: 50px;width:50px;border-radius:50%"
                                    alt="">
                            </div>
                            <div class="content">
                                <h3><a href="#">{{ $choose->title }}</a></h3>
                                {{-- <p>{!! Str::limit($choose->description, 100, '.') !!}</p> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Feature Section End -->
    <!-- Testimonials Section Start -->
    @include('frontend.common.testmonial')
    <!-- Testimonials Section End -->
    <!-- Blog Section Start -->
    <section class="blog-section over-layer-white bg-f8 pt-15 pb-15"
        style="@if (!empty($homepagebannerthree->page_banner)) background-image:url({{ asset($homepagebannerthree->page_banner) }}) @endif">
        <div class="container-fluid">
            <div class="row">
                @if ($getblogs->count() > 0)
                    <div class="section-title" style="margin: 0 auto 10px !important;">
                        <h2>Our <span>Latest</span> Blogs</h2>
                    </div>
                @endif
            </div>
            <div class="row">
                @forelse($getblogs as $blog)
                    <div class="col-md-4 col-lg-4">
                        <div class="blog-post">
                            <a href="{{ route('blogsdetails', $blog->slug) }}">
                            <div class="thumb">
                                <img src="{{ $blog->blog_image }}" style="height:260px" alt="{{ $blog->img_alt }}">
                                <div class="content">
                                    <h3>{{ $blog->blog_title }}</h3>
                                    <div class="meta-box">
                                        <div class="admin-post"> {{ $blog->author_name }} </div>
                                        <div class="inner">
                                            <div class="date">
                                                <i class="fa fa-calendar-plus-o"></i>
                                                {{ $blog->created_at->format('M d') }}
                                            </div>
                                            @php
                                                $getcomment = App\Models\Comment::where('blog_id', $blog->id)->count();
                                            @endphp
                                            <div class="comment">
                                                <i class="fa fa-commenting-o"></i> {{ $getcomment }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                            <a href="{{ route('blogsdetails', $blog->slug) }}" class="read-btn">Continue
                                Reading
                                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </section>
    <!-- Blog Section End -->




    <!-- Gallery Section Start -->
    <section class="gallery-section pt-15 pb-20">
        <div class="container-fluid">
            <div class="row gallery-items">
                @foreach ($gallery as $gal)
                    <div class="col-sm-3 col-grid">
                        <div class="gallery-item">
                            <div class="thumb" style="height:270px">
                                <img src="{{ $gal->cover_image }}" alt="image" style="width:337px;height:265px">
                                <div class="overlay">
                                    <div class="inner">
                                        <a href="{{ $gal->cover_image }}" class="icon lightbox-image">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                        <h4>{{ $gal->gallery_title }}</h4>
                                        <p>Tour, Travel</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>


        </div>
        @if ($gallery->count() > 0)
            <div class="text-center mt-4" style="display: flex !important;justify-content: space-around;">
                <a href="{{ route('allgallery') }}" class="read-btn" style="background:#0E4D94;padding: 10px;">
                    <h5 class="text-white">View Gallery <i class="fa fa-long-arrow-right" aria-hidden="true"></i></h5>

                </a>
            </div>
        @endif
    </section>

    <!-- Gallery Section End -->

@endsection

