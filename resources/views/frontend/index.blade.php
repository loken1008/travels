@php
 function getThumbs($url=""){
            $base = basename($url);
            if (strpos($url, 'https://') !== false or strpos($url, 'http://') !== false) {
                return str_replace($base, "thumbs/".$base, $url);
            }else{
                $preUrl = "storage/";
                $beforeBase = str_replace($base, "",$url);
                return $preUrl.$beforeBase.'thumbs/'.$base;
            }
        }
@endphp
@extends('frontend.main')
@section('title', 'Explore-With-Us|Home')
@section('meta_title', $homepage->meta_title)
@section('meta_keywords', $homepage->meta_keywords)
@section('meta_description', $homepage->meta_description)
@section('og_title', $homepage->title . $homepage->subtitle)
@section('og_description', $homepage->description)
@section('og_image', asset('frontend/fb.webp'))
@section('og_url', url()->current())
@section('twitter_title', $homepage->title . $homepage->subtitle)
@section('twitter_description', $homepage->meta_description)
@section('twitter_image', asset('frontend/twitter.webp'))
@section('twitter_url', url()->current())
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
                            <video class="slide-video" autoplay loop muted>
                                <source src="{{ asset($banner->banner_image) }}" type="video/mp4">
                            </video>
                        @else
                            <img src="{{ $banner->banner_image }}" alt="{{ $banner->title }}" class="banner-image slide-image"/>
                        @endif
                        <div class="bs-slider-overlay"></div>

                        <div class="container">
                            <div class="row">
                                <!-- Slide Text Layer -->
                                <div class="slide-text slide-style-left st-two mt-4">
                                    <h2>{{ $banner->title }}</h2>
                                </div>


                                <!-- Package Box -->
                                @if ($getcoupon)
                                    <div class="package-box mt-4">
                                        <h2><span>{{ $getcoupon->discount_amount }}%</span> off</h2>
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
                    <div class="icon-wrp text-center" >

                        <nav>
                            <div class="nav nav-tabs " id="nav-tab" role="tablist">
                                @foreach ($getcountry as $key => $cutry)
                                    <a class="nav-item nav-link {{ $loop->first ? 'active' : '' }} ml-1 mt-2"
                                        id="plc-asia-tab{{$cutry->country_name }}" data-toggle="tab" href="#plc-asia{{ $cutry->country_name }}"
                                        role="tab" 
                                        aria-selected="true">{{ $cutry->country_name }}</a>
                                @endforeach
                            </div>
                        </nav>

                    </div>
                </div>
                <div class="col-md-3" id="custom-booking">
                    <div class=" text-center">
                        <a href="{{ route('online.book') }}" class="animated-button1 ml-1 mt-2 cbutton">
                          
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
                                        @forelse ($tour as $key2 => $ctour)
                                            @if ($ctour->status == '1')
                                                @if ($ctour->country_id == $countrys->id)
                                                    <div class="item">
                                                        <div class="special-places">
                                                            <div class="thumb">
                                                                <img src="{{ getThumbs($ctour->mainImage) }}"
                                                                    alt="{{ $ctour->img_alt }}"
                                                                    class="package-img">
                                                            </div>
                                                            <div class="content">

                                                                <h3 class="text-dark font-weight-bold h6">
                                                                    {{ $ctour->tour_name }}</h3>
                                                                <p>{{ Str::limit($ctour->short_description, 80, '.') }}</p>
                                                                <ul class="info">
                                                                    <li><i
                                                                            class="fa fa-calendar mr-2"></i>{{ $ctour->tour_days }}
                                                                        Days
                                                                    </li>
                                                                    <li>
                                                                        @if ($getcoupon)
                                                                            <p>
                                                                                <strike
                                                                                    class="text-danger">${{ $ctour->main_price }}</strike>
                                                                                $
                                                                                {{ $ctour->main_price - ($getcoupon->discount_amount / 100) * $ctour->main_price }}
                                                                            </p>
                                                                        @else
                                                                            <p>$ {{ $ctour->main_price }}</p>
                                                                        @endif
                                                                    </li>


                                                                </ul>
                                                                <a class="btn-theme bookbtn" 
                                                                    href="{{ route('booking', $ctour->slug) }}">Book
                                                                    Now</a>
                                                                <a class="btn-theme detailsbtn"
                                                                    href="{{ route('tourdetails', $ctour->slug) }}">View
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
    <section class="special-packages-sec pt-35 pb-25">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="text-center">
                        @if (!empty($homepage->subtitle))
                            <h6 class="homepagetitle text-uppercase font-weight-bold">{{ $homepage->subtitle }}</h6>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center home-section">
                    <div class="section-title home-title text-center mt-4">
                        @if (!empty($homepage->title))
                            <h1>{{ $homepage->title }}</h1>
                        @endif
                    </div>
                    @if (!empty($homepage->description))
                        <p class="text-center">{{ $homepage->description }}</p>
                    @endif
                    <!-- HTML !-->
                    <a href="{{ route('introduction') }}" class="mb-2 button-51">Discover
                            More</a>
                    <div class="sharethis-inline-share-buttons"></div>
                </div>

            </div>
        </div>
    </section>

    <section class="special-packages-sec pt-35 pb-25">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if ($getTour)
                        <div class="section-title ">
                            <h2 class="">Our Best <span>Selling</span> Package</h2>
                            <div class="underdiv"></div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="specialpackages_carousel owl-carousel owl-theme owl-navst">
                        @if ($getTour)
                            @foreach ($getTour as $key => $selltour)
                                @if ($selltour->status == 1)
                                    <div class="item">
                                        <div class="special-packages">
                                            <div class="thumb">
                                                <a href="{{ route('tourdetails', $selltour->slug) }}">
                                                    <img src="{{ getThumbs($selltour->mainImage) }}" alt="{{ $selltour->img_alt }}"
                                                        class="package-img"></a>

                                            </div>
                                            <div class="content">
                                                <h3 class="text-dark font-weight-bold h6">
                                                    {{ $selltour->tour_name }}</h3>
                                                <p>{{ Str::limit($selltour->short_description, 80, '.') }}</p>
                                                <ul class="info mt-6">
                                                    <li><i class="fa fa-calendar mr-2"></i>{{ $selltour->tour_days }}
                                                        Days
                                                    </li>
                                                    <li>
                                                        @if ($getcoupon)
                                                            <p>
                                                                <strike class="text-danger">$
                                                                    {{ $selltour->main_price }}</strike> $
                                                                {{ $selltour->main_price - ($getcoupon->discount_amount / 100) * $selltour->main_price }}
                                                            </p>
                                                        @else
                                                            <p>$ {{ $selltour->main_price }}</p>
                                                        @endif
                                                    </li>


                                                </ul>
                                                <a class="btn-theme bookbtn" 
                                                    href="{{ route('booking', $selltour->slug) }}">Book
                                                    Now</a>
                                                <a class="btn-theme detailsbtn"
                                                    href="{{ route('tourdetails', $selltour->slug) }}">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Features Section Start -->
    <section class="feature-section chooseus-section over-layer-black pt-35 pb-35 mt-2">
        <div class="container-fluid pl-0 pr-0">
            <div class="row">
                @if ($chooseus->count() > 0)
                    <div class="section-title text-left">
                        <h2>Why <span>Choose</span> Mountain Guide Trek</h2>
                        <div class="underdiv"></div>
                    </div>
                @endif
            </div>
                <div class="row frow">
                    @foreach ($chooseus as $choose)
                        <div class="col-md-4">
                            <div class="feature-item">
                                <a href="{{ route('travelwithus') }}">
                                <div class="icon-box">
                                    <h3 class="ml-1 mb-4">{{ $choose->title }}
                                    </h3>
                                    <div class="content choosecontent d-flex">
                                        <img src="{{ getThumbs($choose->image) }}" alt="{{ $choose->title }}"> 
                                        <p id="choosepara">{!! Str::limit($choose->description, 200, '.') !!}</p>
                                    </div>
                                    
                                </div>
                                
                            </a>
                            </div>
                        </div>
                    @endforeach
                </div>
        </div>
    </section>
    <!-- Special Places Section End -->
    <section class="special-packages-sec pt-35 pb-25">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if ($cattrekking)
                        <div class="section-title ">
                            <h2 class="">Popular <span>Trekking</span> Places</h2>
                            <div class="underdiv"></div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class=" popular-trekking owl-carousel owl-theme owl-navst">
                        @if ($cattrekking)
                            @foreach ($cattrekking->tour->shuffle() as $key => $tour)
                                @if ($tour->status == 1)
                                    <div class="item">
                                        <div class="special-packages">
                                            <div class="thumb">
                                                <a href="{{ route('tourdetails', $tour->slug) }}">
                                                    <img src="{{ getThumbs($tour->mainImage) }}" alt="{{ $tour->img_alt }}"></a>

                                            </div>
                                            <div class="content">
                                                <h3 class="text-dark font-weight-bold h6">
                                                    {{ $tour->tour_name }}</h3>
                                                <p>{{ Str::limit($tour->short_description, 80, '.') }}</p>
                                                <ul class="info mt-6">
                                                    <li><i class="fa fa-calendar mr-2"></i>{{ $tour->tour_days }}
                                                        Days
                                                    </li>
                                                    <li>
                                                        @if ($getcoupon)
                                                            <p>
                                                                <strike class="text-danger">$
                                                                    {{ $tour->main_price }}</strike> $
                                                                {{ $tour->main_price - ($getcoupon->discount_amount / 100) * $tour->main_price }}
                                                            </p>
                                                        @else
                                                            <p>$ {{ $tour->main_price }}</p>
                                                        @endif
                                                    </li>


                                                </ul>
                                                <a class="btn-theme bookbtn" 
                                                    href="{{ route('booking', $tour->slug) }}">Book
                                                    Now</a>
                                                <a class="btn-theme detailsbtn"
                                                    href="{{ route('tourdetails', $tour->slug) }}">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Special Packages Section Start -->

    <section class="special-packages-sec pt-35 pb-25">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if ($catpeak)
                        <div class="section-title ">
                            <h2 class="">Challenge <span>The Peak </span></h2>
                            <div class="underdiv"></div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="specialpackages_carousel owl-carousel owl-theme owl-navst">
                        @if ($catpeak)
                            @foreach ($catpeak->tour->shuffle() as $key => $tour)
                                @if ($tour->status == 1)
                                    <div class="item">
                                        <div class="special-packages">
                                            <div class="thumb">
                                                <a href="{{ route('tourdetails', $tour->slug) }}">
                                                    <img src="{{ getThumbs($tour->mainImage) }}" alt="{{ $tour->img_alt }}"
                                                        class="package-img"></a>
                                            </div>

                                            <div class="content">
                                                <h3 class="text-dark font-weight-bold h6">
                                                    {{ $tour->tour_name }}</h3>
                                                <p>{{ Str::limit($tour->short_description, 80, '.') }}</p>
                                                <ul class="info mt-6">
                                                    <li><i class="fa fa-calendar mr-2"></i>{{ $tour->tour_days }}
                                                        Days
                                                    </li>
                                                    <li>
                                                        @if ($getcoupon)
                                                            <p>
                                                                <strike class="text-danger">$
                                                                    {{ $tour->main_price }}</strike> $
                                                                {{ $tour->main_price - ($getcoupon->discount_amount / 100) * $tour->main_price }}
                                                            </p>
                                                        @else
                                                            <p>$ {{ $tour->main_price }}</p>
                                                        @endif
                                                    </li>


                                                </ul>

                                                <a class="btn-theme bookbtn" 
                                                    href="{{ route('booking', $tour->slug) }}">Book
                                                    Now</a>
                                                <a class="btn-theme detailsbtn"
                                                    href="{{ route('tourdetails', $tour->slug) }}">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="special-packages-sec pt-35 pb-25">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if ($catadventure)
                        <div class="section-title ">
                            <h2 class="">Get More <span>Adventure</span></h2>
                            <div class="underdiv"></div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="specialpackages_carousel owl-carousel owl-theme owl-navst">
                        @if ($catadventure)
                            @foreach ($catadventure->tour as $key => $adventuretour)
                                @if ($adventuretour->status == 1)
                                    <div class="item">
                                        <div class="special-packages">
                                            <div class="thumb">
                                                <a href="{{ route('tourdetails', $adventuretour->slug) }}">
                                                    <img src="{{ getThumbs($adventuretour->mainImage) }}"
                                                        alt="{{ $adventuretour->img_alt }}"
                                                        class="package-img"></a>


                                            </div>
                                            <div class="content">
                                                <h6 class="text-dark font-weight-bold h6">
                                                    {{ $adventuretour->tour_name }}</h6>
                                                    <p>{{ Str::limit($adventuretour->short_description, 80, '.') }}</p>
                                                    <ul class="info mt-6">
                                                        <li><i
                                                                class="fa fa-calendar mr-2"></i>{{ $adventuretour->tour_days }}
                                                            Days
                                                        </li>
                                                        <li>
                                                            @if ($getcoupon)
                                                                <p>
                                                                    <strike class="text-danger">$
                                                                        {{ $adventuretour->main_price }}</strike> $
                                                                    {{ $adventuretour->main_price - ($getcoupon->discount_amount / 100) * $adventuretour->main_price }}
                                                                </p>
                                                            @else
                                                                <p>$ {{ $adventuretour->main_price }}</p>
                                                            @endif
                                                        </li>


                                                    </ul>

                                                    <a class="btn-theme bookbtn" 
                                                        href="{{ route('booking', $adventuretour->slug) }}">Book
                                                        Now</a>
                                                    <a class="btn-theme detailsbtn"
                                                        href="{{ route('tourdetails', $adventuretour->slug) }}">View
                                                        Details</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="special-packages-sec pt-35 pb-25">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if ($catnature)
                        <div class="section-title ">
                            <h2 class="">Experience <span>The Nature</span></h2>
                            <div class="underdiv"></div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="popular-trekking owl-carousel owl-theme owl-navst">
                        @if ($catnature)
                            @foreach ($catnature->tour->shuffle() as $key => $tour)
                                @if ($tour->status == 1)
                                    <div class="item">
                                        <div class="special-packages">
                                            <div class="thumb">
                                                <a href="{{ route('tourdetails', $tour->slug) }}">
                                                    <img src="{{ getThumbs($tour->mainImage) }}" alt="{{ $tour->img_alt }}" ></a>
                                            </div>
                                            <div class="content">
                                                <h3 class="text-dark font-weight-bold h6">
                                                    {{ $tour->tour_name }}</h3>
                                                <p>{{ Str::limit($tour->short_description, 80, '.') }}</p>
                                                <ul class="info mt-6">
                                                    <li><i class="fa fa-calendar mr-2"></i>{{ $tour->tour_days }}
                                                        Days
                                                    </li>
                                                    <li>
                                                        @if ($getcoupon)
                                                            <p>
                                                                <strike class="text-danger">$
                                                                    {{ $tour->main_price }}</strike> $
                                                                {{ $tour->main_price - ($getcoupon->discount_amount / 100) * $tour->main_price }}
                                                            </p>
                                                        @else
                                                            <p>$ {{ $tour->main_price }}</p>
                                                        @endif
                                                    </li>


                                                </ul>

                                                <a class="btn-theme bookbtn" 
                                                    href="{{ route('booking', $tour->slug) }}">Book
                                                    Now</a>
                                                <a class="btn-theme detailsbtn"
                                                    href="{{ route('tourdetails', $tour->slug) }}">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Global Section Start -->
    @include('frontend.common.testmonial')




    <section class="blog-section home-blog-section over-layer-white bg-f8 pt-35 pb-25">
        <div class="container">
            <div class="row">
                @if ($getblogs->count() > 0)
                    <div class="section-title blog-title">
                        <h2>Our <span>Latest</span> Blogs</h2>
                        <div class="underdiv"></div>
                    </div>
                @endif
            </div>
            <div class="row">
                @forelse($getblogs as $blog)
                    <div class="col-md-4 col-lg-4">
                        <div class="blog-post">
                            <a href="{{ route('blogsdetails', $blog->slug) }}">
                                <div class="thumb">
                                    <img  class="blog-img" src="{{ getThumbs($blog->blog_image) }}" alt="{{ $blog->img_alt }}">

                                </div>
                            </a>
                            <a href="{{ route('blogsdetails', $blog->slug) }}" class="read-btn">

                                <h3>{{ $blog->blog_title }}</h3>
                                {{-- <p class="text-center">{!! Str::limit($blog->blog_description,100) !!}</p> --}}
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
    <section class="gallery-section pt-15">
        <div class="container">
            <div class="row gallery-items">
                @foreach ($gallery as $gal)
                    <div class="col-sm-3 col-grid">
                        <div class="gallery-item home-gallery">
                            <div class="thumb">
                                <img src="{{ getThumbs($gal->cover_image) }}" alt="{{ $gal->gallery_title }}">
                                <div class="overlay">
                                    <div class="inner">
                                        <a href="{{ getThumbs($gal->cover_image) }}" target="_blank" >
                                            <h4>{{ $gal->gallery_title }}</h4>
                                            <p>Tour, Travel</p>
                                        </a>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>


        </div>
        @if ($gallery->count() > 0)
            <div class="text-center gallery-btn mt-4">
                <a href="{{ route('allgallery') }}" class="read-btn">
                    <h5 class="text-white">View Gallery <i class="fa fa-long-arrow-right" aria-hidden="true"></i></h5>

                </a>
            </div>
        @endif
    </section>

    <!-- Gallery Section End -->

@endsection
