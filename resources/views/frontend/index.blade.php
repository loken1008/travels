@php
    function getThumbs($url = '')
    {
        $base = basename($url);
        if (strpos($url, 'https://') !== false or strpos($url, 'http://') !== false) {
            return str_replace($base, 'thumbs/' . $base, $url);
        } else {
            $preUrl = 'storage/';
            $beforeBase = str_replace($base, '', $url);
            return $preUrl . $beforeBase . 'thumbs/' . $base;
        }
    }
@endphp
@extends('frontend.main')
@section('title', 'Explore-With-Us-Home')
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
<style>
    .mountainguide-block25{
  background: url({{$getbanner->banner_image}}) center center/cover no-repeat;

    }
</style>
    <div class="mountainguide-block24 layout">
        @if (!empty($getbanner))
            <div class="mountainguide-block25 layout">
                <div class="mountainguide-block26 layout">
                    <div class="mountainguide-block27 layout">
                        <h1 class="mountainguide-hero-title layout">{{ $getbanner->title }}</h1>
                        <h5 class="mountainguide-highlights1 layout">{{ $getbanner->sub_title }}</h5>
                        </h5>
                    </div>
                    <div class=" mountainguide-block28 layout">
                        <a href="{{ $getbanner->url }}" class="mountainguide-highlights2 layout">Explore More</a>
                    </div>
                </div>
            </div>
        @endif

        <div class="container network_wrapper col-sm  ">
            <div class=" country-card">
                <div class="country-header">
                    <div class="col-lg-12 countrytabmainheading layout">
                        <div>
                            <h2 class="countrytab-title layout">Where do you want to trek?</h2>
                            <div class="countrytab-box layout"></div>
                        </div>
                        <ul class="nav country-nav" data-bs-tabs="tabs">

                            <a href="{{ route('online.book') }}" class="make-own-trip-subtitle1 layout3" id="own-trip">Make
                                your
                                own trip</a>
                        </ul>
                    </div>
                    <ul class="nav country-nav" data-bs-tabs="tabs">
                        {{-- @foreach ($getcountry as $key => $cutry)
                            <li class="d-flex nav-item {{ $loop->first ? 'active' : '' }}">
                                <a class="{{ $loop->first ? 'active' : '' }} country-subtitle layout" aria-current="true"
                                    data-bs-toggle="tab"
                                    href="#country{{ $cutry->country_name }}">{{ $cutry->country_name }} </a> 
                            </li>
                        @endforeach --}}
                        <a href="{{ route('online.book') }}" class="make-own-trip-subtitle1 layout3" id="own-trip">Make
                            your
                            own trip</a>
                    </ul>
                </div>
                <div class=" tab-content mt-4">
                        <div class="mountainguide-block45-item1 "id="country">
                            <div id="country-slide" class="country-details owl-carousel owl-theme">
                                @forelse ($helitour as $key2 => $ctour)
                                        <div class="mountainguide-block48 layout1">
                                            <a class="text-decoration-none" href="{{ route('tourdetails', $ctour->slug) }}">
                                                <div class="mountainguide-block49 layout">
                                                    <div class="mountainguide-image8 layout">
                                                        <img class="first-section-image"
                                                            srcset="{{ $ctour->mainImage }}"
                                                            alt="{{ $ctour->img_alt }}">
                                                            @if (!empty($ctour->type))
                                                            <p class="popularhead-tag">
                                                                @if ($ctour->type == 'group')
                                                                    <i class="fa-solid fa-people-group"></i> Group
                                                                @elseif($ctour->type == 'family')
                                                                    <i class="fa-solid fa-people-roof"></i> Family
                                                                @elseif($ctour->type == 'bestsell')
                                                                    <i class="fa-solid fa-award"></i> Best Sell
                                                                @elseif($ctour->type == 'private')
                                                                    <i class="fa-solid fa-lock"></i> Private
                                                                @elseif($ctour->type == 'tripofthemonth')
                                                                    <i class="fa-solid fa-award"></i> Trip Of The Month
                                                                    @elseif($ctour->type == 'helireturn')
                                                                    <i class="fa-solid fa-award"></i> Heli Tour & Return
                                                                @else 
                                                                @endif
                                                            </p>
                                                        @endif
                                                        <div class="first-section-price">
                                                            @if ($getcoupon)
                                                                <h4 class="mountainguide-highlights4 layout">
                                                                    <span class="discount-price">${{ $ctour->main_price }}</span>
                                                                    ${{ $ctour->main_price - ($getcoupon->discount_amount / 100) * $ctour->main_price }}
                                                                </h4>
                                                            @else
                                                                <h4 class="mountainguide-highlights4 layout">
                                                                    $ {{ $ctour->main_price }}</h4>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="mountainguide-block50 layout">
                                                        <div class="mountainguide-block51 layout">
        
                                                            <h3 class="mountainguide-subtitle2 layout">
                                                                {{$ctour->tour_name }}
                                                            </h3>
                                                        </div>
                                                        <div class="mountainguide-block52 layout">
                                                            <h4 class="text-value"><i class="fa-solid fa-route"></i>
                                                                {{ $ctour->grade }}</h4>
                                                            <h4 class="text-value d-flex"><img
                                                                    src="{{ asset('frontend/altitude.png') }}" alt=""
                                                                    class="altitude-img">
                                                                {{ $ctour->altitude }}</h4>
                                                            <span class="best-day"><i class="fa-solid fa-calendar-days"></i>
                                                                {{ $ctour->tour_days }}
                                                                days</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <section class="explore-section">
        <div class="container">
            <div class="explore-us">
                <div class="mountainguide-block65-item">
                    <div class="mountainguide-block66 layout">
                        <div class="mountainguide-image10 layout">
                            <img class="explore-main-image" srcset="{{ $homepage->main_image }}"
                                alt="{{ $homepage->img_alt }}">
                        </div>
                        <div class="mountainguide-image11 layout">
                            <img class="explore-image" srcset="{{ $homepage->image }}" alt="{{ $homepage->img_alt }}">

                        </div>
                    </div>
                </div>
                <div class="mountainguide-block65-spacer"></div>
                <div class=" mountainguide-block65-item1">
                    <div class="mountainguide-block68 layout">
                        @if (!empty($homepage->subtitle))
                            <h3 class="mountainguide-subtitle3 layout">{{ $homepage->subtitle }}</h3>
                        @endif
                        @if (!empty($homepage->title))
                            <h1 class="mountainguide-hero-title1 layout">{{ $homepage->title }}</h1>
                        @endif
                    </div>
                    @if (!empty($homepage->description))
                        <p class="mountainguide-highlights6 layout">
                            {{ $homepage->description }}
                        </p>
                    @endif
                    @if ($homepage->count() > 0)
                        <a href="{{ route('introduction') }}"
                            class="mountainguide-highlights7 layout text-decoration-none">Discover more</a>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="best-sell-section">
        <div class="container w-auto mountainguide-block70 layout">
            <div class="row mountainguide-block71 layout">
                <div class="mountainguide-block74 layout">
                    <div>
                        <h3 class="mountainguide-subtitle3 layout">Our Best</h3>
                        <h1 class="mountainguide-hero-title11 layout">Selling package</h1>
                        <div class="countrytab-box layout"></div>
                    </div>
                </div>

                <div id="best-sell-slider" class="mountainguide-block77 layout owl-carousel owl-theme">
                    @if ($getTour)
                        @foreach ($getTour as $key => $selltour)
                            @if ($selltour->status == 1)
                                <div class="mountainguide-block48 layout1">
                                    <a class="text-decoration-none" href="{{ route('tourdetails', $selltour->slug) }}">
                                        <div class="mountainguide-block49 layout">
                                            <div class="mountainguide-image8 layout">
                                                <img class="best-sell-image"
                                                    srcset="{{ getThumbs($selltour->mainImage) }}"
                                                    alt="{{ $selltour->img_alt }}">
                                                <p class="head-tag"><i class="fa-solid fa-award"></i> Best Seller</p>
                                                {{-- <span class="best-sell-day"><i class="fa-solid fa-calendar-days"></i>
                                                    {{ $selltour->tour_days }}
                                                    days</span> --}}
                                                <div class="best-sell-price">
                                                    @if ($getcoupon)
                                                        <h4 class="mountainguide-highlights4 layout">
                                                            <span
                                                                class="discount-price">${{ $selltour->main_price }}</span>
                                                            ${{ $selltour->main_price - ($getcoupon->discount_amount / 100) * $selltour->main_price }}
                                                        </h4>
                                                    @else
                                                        <h4 class="mountainguide-highlights4 layout">
                                                            $ {{ $selltour->main_price }}</h4>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="mountainguide-block50 layout">
                                                <div class="mountainguide-block51 layout">

                                                    <h3 class="mountainguide-subtitle2 layout">
                                                        {{ Str::limit($selltour->tour_name, 22) }}
                                                    </h3>
                                                </div>
                                                <div class="mountainguide-block52 layout">
                                                    <h4 class="text-value"><i class="fa-solid fa-route"></i>
                                                        {{ $selltour->grade }}</h4>
                                                    <h4 class="text-value d-flex"><img
                                                            src="{{ asset('frontend/altitude.png') }}" alt="mountainguide-altitude image"
                                                            class="altitude-img">
                                                        {{ $selltour->altitude }}</h4>
                                                    <span class="best-day"><i class="fa-solid fa-calendar-days"></i>
                                                        {{ $selltour->tour_days }}
                                                        days</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="choose-us-section">
        <div class="container mountainguide-block84 layout">
            <div class="mountainguide-block85 layout">
                <div class="mountainguide-block86 layout">
                    @if ($chooseus->count() > 0)
                        <div>
                            <h2 class="mountainguide-medium-title layout1">Why choose mountain guide trek</h2>
                            <div class="chooseus-box layout"></div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="mountainguide-block87 layout">
                @foreach ($chooseus as $key => $choose)
                    <div class="mountainguide-block87-item">
                        <div class="mountainguide-block88 layout">
                           
                            <div class="mountainguide-block89 layout">
                                <h3 class="chooseus-title"><a href="{{ route('travelwithus') }}"
                                        class="text-decoration-none">{{ $choose->title }}</a></h3>
                                <div class="mountainguide-paragraph-body2-box layout chooseus-para">
                                    {!! Str::limit($choose->description, 100, '.') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="best-sell-section">
        <div class="container mountainguide-block70 layout">
            <div class="row mountainguide-block71 layout">
                <div class="mountainguide-block74 layout">
                    <div>
                        <h3 class="mountainguide-subtitle3 layout">Challenge</h3>
                        <h1 class="mountainguide-hero-title11 layout">The Peak</h1>
                        <div class="countrytab-box layout"></div>
                    </div>
                </div>

                <div id="challenge-peak-slider" class="mountainguide-block77 layout owl-carousel owl-theme">
                    @if ($catpeak)
                        @foreach ($catpeak->tour->sortByDesc('id')->take(15) as $key => $tour)
                            @if ($tour->status == 1)
                            <div class="mountainguide-block48 layout1">
                                <a class="text-decoration-none" href="{{ route('tourdetails', $tour->slug) }}">
                                    <div class="mountainguide-block49 layout">
                                        <div class="mountainguide-image8 layout">
                                            <img class="best-sell-image"
                                                srcset="{{ getThumbs($tour->mainImage) }}"
                                                alt="{{ $tour->img_alt }}">
                                                @if (!empty($tour->type))
                                                <p class="popularhead-tag">
                                                    @if ($tour->type == 'group')
                                                        <i class="fa-solid fa-people-group"></i> Group
                                                    @elseif($tour->type == 'family')
                                                        <i class="fa-solid fa-people-roof"></i> Family
                                                    @elseif($tour->type == 'bestsell')
                                                        <i class="fa-solid fa-award"></i> Best Sell
                                                    @elseif($tour->type == 'private')
                                                        <i class="fa-solid fa-lock"></i> Private
                                                    @elseif($tour->type == 'tripofthemonth')
                                                        <i class="fa-solid fa-award"></i> Trip Of The Month
                                                    @else
                                                    @endif
                                                </p>
                                            @endif
                                            <div class="best-sell-price">
                                                @if ($getcoupon)
                                                    <h4 class="mountainguide-highlights4 layout">
                                                        <span
                                                            class="discount-price">${{ $tour->main_price }}</span>
                                                        ${{ $tour->main_price - ($getcoupon->discount_amount / 100) * $tour->main_price }}
                                                    </h4>
                                                @else
                                                    <h4 class="mountainguide-highlights4 layout">
                                                        $ {{ $tour->main_price }}</h4>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mountainguide-block50 layout">
                                            <div class="mountainguide-block51 layout">

                                                <h3 class="mountainguide-subtitle2 layout">
                                                    {{ Str::limit($tour->tour_name, 22) }}
                                                </h3>
                                            </div>
                                            <div class="mountainguide-block52 layout">
                                                <h4 class="text-value"><i class="fa-solid fa-route"></i>
                                                    {{ $tour->grade }}</h4>
                                                <h4 class="text-value d-flex"><img
                                                        src="{{ asset('frontend/altitude.png') }}" alt="mountainguide altitude-img"
                                                        class="altitude-img">
                                                    {{ $tour->altitude }}</h4>
                                                <span class="best-day"><i class="fa-solid fa-calendar-days"></i>
                                                    {{ $tour->tour_days }}
                                                    days</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    @if ($bestsell)
        <section class="best-sell-month">

            <div class="best-tag">
                <img srcset="{{ asset($bestsell->mainImage) }}" alt="{{ $bestsell->img_alt }}">
                <p class="month-head-tag"><i class="fa-solid fa-award"></i> Best Seller</p>
            </div>
            <div class="container best-month-container">
                <div class="bestsell-content">
                    <h3 class="trip-title" id="demo1">Trip Of The Month</h3>
                    <div class="trip-div">
                        <h4 class="bestselldetailsheading">
                            <a href="{{ route('tourdetails', $bestsell->slug) }}">{{ $bestsell->tour_name }}</a>
                        </h4>

                        <div class="bestselldetails">
                            @if (!empty($bestsell->activity))
                                <div class="bestduration">
                                    <div class="bestsellicon">
                                        <i class="fa-solid fa-person-hiking"></i>
                                    </div>
                                    <div class="text">
                                        <h4 class="bestselltext-duration">Activity</h4>
                                        <h4 class="bestselltext-value"> {{ $bestsell->activity }}</h4>
                                    </div>
                                </div>
                            @endif
                            @if (!empty($bestsell->tour_days))
                                <div class="bestduration">
                                    <div class="bestsellicon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <div class="text">
                                        <h4 class="bestselltext-duration">Duration</h4>
                                        <h4 class="bestselltext-value"> {{ $bestsell->tour_days }}</h4>
                                    </div>
                                </div>
                            @endif
                            @if (!empty($bestsell->altitude))
                                <div class="altitude">
                                    <div class="bestsellicon">
                                        <i class="fa fa-arrow-trend-up"></i>

                                    </div>
                                    <div class="text">
                                        <h4 class="bestselltext-duration">Altitude</h4>
                                        <h4 class="bestselltext-value"> {{ $bestsell->altitude }}</h4>
                                    </div>
                                </div>
                                <div class="altitude">
                                    <div class="bestsellicon">
                                        <i class="fa-solid fa-hand-holding-dollar"></i>
                                    </div>
                                    <div class="text">
                                        <h4 class="bestselltext-duration">Price</h4>
                                        <h4 class="bestselltext-value"> $ {{ $bestsell->main_price }}</h4>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif


    <section class="populartrek_section ">
        @if ($cattrekking)
            <div class="populartrekheading">
                <div>
                    <h2 class="populartrektitle layout2">Popular trekking places</h2>
                    <div class="chooseus-box layout"></div>

                </div>
            </div>
        @endif

        <div class="container popular-container">
            <div class="populartrek_content">
                <div id="popular-trek-slider" class="owl-carousel owl-theme">
                    @if ($cattrekking)
                        @foreach ($cattrekking->tour->sortByDesc('id')->take(15) as $key => $tour)
                            @if ($tour->status == 1)
                            <div class="mountainguide-block48 layout1">
                                <a class="text-decoration-none" href="{{ route('tourdetails', $tour->slug) }}">
                                    <div class="mountainguide-block49 layout">
                                        <div class="mountainguide-image8 layout">
                                            <img class="first-section-image"
                                                srcset="{{ $tour->mainImage }}"
                                                alt="{{ $tour->img_alt }}">
                                                @if (!empty($tour->type))
                                                <p class="popularhead-tag">
                                                    @if ($tour->type == 'group')
                                                        <i class="fa-solid fa-people-group"></i> Group
                                                    @elseif($tour->type == 'family')
                                                        <i class="fa-solid fa-people-roof"></i> Family
                                                    @elseif($tour->type == 'bestsell')
                                                        <i class="fa-solid fa-award"></i> Best Sell
                                                    @elseif($tour->type == 'private')
                                                        <i class="fa-solid fa-lock"></i> Private
                                                    @elseif($tour->type == 'tripofthemonth')
                                                        <i class="fa-solid fa-award"></i> Trip Of The Month
                                                    @else
                                                    @endif
                                                </p>
                                            @endif
                                            <div class="first-section-price">
                                                @if ($getcoupon)
                                                    <h4 class="mountainguide-highlights4 layout">
                                                        <span
                                                            class="discount-price">${{ $tour->main_price }}</span>
                                                        ${{ $tour->main_price - ($getcoupon->discount_amount / 100) * $tour->main_price }}
                                                    </h4>
                                                @else
                                                    <h4 class="mountainguide-highlights4 layout">
                                                        $ {{ $tour->main_price }}</h4>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mountainguide-block50 layout">
                                            <div class="mountainguide-block51 layout">

                                                <h3 class="mountainguide-subtitle2 layout">
                                                    {{ $tour->tour_name }}
                                                </h3>
                                            </div>
                                            <div class="mountainguide-block52 layout">
                                                <h4 class="text-value"><i class="fa-solid fa-route"></i>
                                                    {{ $tour->grade }}</h4>
                                                <h4 class="text-value d-flex"><img
                                                        src="{{ asset('frontend/altitude.png') }}" alt="mountainguide altitude-img"
                                                        class="altitude-img">
                                                    {{ $tour->altitude }}</h4>
                                                <span class="best-day"><i class="fa-solid fa-calendar-days"></i>
                                                    {{ $tour->tour_days }}
                                                    days</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="populartrek_section ">
        @if ($catnature)
            <div class="populartrekheading">
                <div>
                    <h2 class="populartrektitle layout2">Best For Natural Realism</h2>
                    <div class="chooseus-box layout"></div>

                </div>
            </div>
        @endif

        <div class="container popular-container">
            <div class="populartrek_content">
                <div id="natural-trek-slider" class="owl-carousel owl-theme">
                    @if ($catnature)
                        @foreach ($catnature->tour->sortByDesc('id')->take(15) as $key => $tour)
                            @if ($tour->status == 1)
                               
                                <div class="mountainguide-block48 layout1">
                                    <a class="text-decoration-none" href="{{ route('tourdetails', $tour->slug) }}">
                                        <div class="mountainguide-block49 layout">
                                            <div class="mountainguide-image8 layout">
                                                <img class="best-sell-image"
                                                    srcset="{{ getThumbs($tour->mainImage) }}"
                                                    alt="{{ $tour->img_alt }}">
                                                    @if (!empty($tour->type))
                                                    <p class="popularhead-tag">
                                                        @if ($tour->type == 'group')
                                                            <i class="fa-solid fa-people-group"></i> Group
                                                        @elseif($tour->type == 'family')
                                                            <i class="fa-solid fa-people-roof"></i> Family
                                                        @elseif($tour->type == 'bestsell')
                                                            <i class="fa-solid fa-award"></i> Best Sell
                                                        @elseif($tour->type == 'private')
                                                            <i class="fa-solid fa-lock"></i> Private
                                                        @elseif($tour->type == 'tripofthemonth')
                                                            <i class="fa-solid fa-award"></i> Trip Of The Month
                                                        @else
                                                        @endif
                                                    </p>
                                                @endif
                                                <div class="best-sell-price">
                                                    @if ($getcoupon)
                                                        <h4 class="mountainguide-highlights4 layout">
                                                            <span
                                                                class="discount-price">${{ $tour->main_price }}</span>
                                                            ${{ $tour->main_price - ($getcoupon->discount_amount / 100) * $tour->main_price }}
                                                        </h4>
                                                    @else
                                                        <h4 class="mountainguide-highlights4 layout">
                                                            $ {{ $tour->main_price }}</h4>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="mountainguide-block50 layout">
                                                <div class="mountainguide-block51 layout">
    
                                                    <h3 class="mountainguide-subtitle2 layout">
                                                        {{ Str::limit($tour->tour_name, 22) }}
                                                    </h3>
                                                </div>
                                                <div class="mountainguide-block52 layout">
                                                    <h4 class="text-value"><i class="fa-solid fa-route"></i>
                                                        {{ $tour->grade }}</h4>
                                                    <h4 class="text-value d-flex"><img
                                                            src="{{ asset('frontend/altitude.png') }}" alt="mountainguide altitude-img"
                                                            class="altitude-img">
                                                        {{ $tour->altitude }}</h4>
                                                    <span class="best-day"><i class="fa-solid fa-calendar-days"></i>
                                                        {{ $tour->tour_days }}
                                                        days</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>


    @include('frontend.common.testmonial')
    <section class="blogs_section ">
        <div class="container">
            @if ($getblogs->count() > 0)
                <div class="populartrekheading mt-6 mb-4">
                    <div>
                        <h2 class="populartrektitle layout2">Our Latest Blogs</h2>
                        <div class="chooseus-box layout"></div>
                    </div>
                </div>
            @endif

            <div id="blog-slider" class="owl-carousel owl-theme">
                @forelse($getblogs as $blog)
                    <div class="blogs_item">
                        <a class="text-decoration-none" href="{{ route('blogsdetails', $blog->slug) }}">
                            <div class="blogs_image">
                                <img class="img-fluid" srcset="{{ getThumbs($blog->blog_image) }}"
                                    alt="{{ $blog->img_alt }}">
                            </div>
                            <div class="blogs_details">
                                <div class="mt-3 mb-3">
                                    <span class="blogs_date">{{ $blog->created_at->format('Y-M-d') }}</span>
                                </div>
                                <h5 class="blogs_title">{{ Str::limit($blog->blog_title, 25) }}</h5>

                                <div class="blogs_details">{!! Str::limit($blog->blog_description, 70) !!}</div>
                                <div class="bbtn">

                                    <a href="{{ route('blogsdetails', $blog->slug) }}"
                                        class="blogsbtn text-decoration-none">Read
                                        More</a>
                                </div>

                            </div>
                        </a>
                    </div>

                @empty
                @endforelse
            </div>
        </div>
    </section>
@endsection
