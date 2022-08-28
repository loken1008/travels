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
    <div class="mountainguide-block1 layout">
        <div class="mountainguide-block24 layout">
            @if (!empty($getbanner))
                <div style="--src:url({{ $getbanner->banner_image }})" class="mountainguide-block25 layout">
                    <div class="mountainguide-block26 layout">
                        <div class="mountainguide-block27 layout">
                            <h1 class="mountainguide-hero-title layout">{{ $getbanner->title }}</h1>
                            <h5 class="mountainguide-highlights1 layout">{{ $getbanner->sub_title }}</h5>
                            </h5>
                        </div>
                        <div class="mountainguide-block28 layout">
                            <a href="{{ $getbanner->url }}" class="mountainguide-highlights2 layout">Explore More</a>
                        </div>
                    </div>
                </div>
            @endif

            <div class="container network_wrapper col-sm  ">
                <div class=" country-card">
                    <div class="country-header">
                        <div class="col-lg-6 countrytabmainheading layout">
                            <h2 class="countrytab-title layout">Where do you want to trek?</h2>
                            <div class="countrytab-box layout"></div>
                        </div>
                        <ul class="nav country-nav" data-bs-tabs="tabs">
                            @foreach ($getcountry as $key => $cutry)
                                <li class="nav-item {{ $loop->first ? 'active' : '' }}">
                                    <a class="{{ $loop->first ? 'active' : '' }} country-subtitle layout"
                                        aria-current="true" data-bs-toggle="tab"
                                        href="#country{{ $cutry->country_name }}">{{ $cutry->country_name }}</a>
                                </li>
                            @endforeach
                            <a href="{{ route('online.book') }}" class="make-own-trip-subtitle1 layout3" id="own-trip">Make
                                your
                                own trip</a>
                        </ul>
                    </div>
                    <div class=" tab-content mt-4">
                        @forelse($getcountry as $key1=> $countrys)
                            <div class="mountainguide-block45-item1 tab-pane {{ $loop->first ? 'active' : '' }}"
                                id="country{{ $countrys->country_name }}">
                                <div id="country-slide" class="country-details owl-carousel owl-theme">
                                    @forelse ($tour as $key2 => $ctour)
                                        @if ($ctour->status == '1')
                                            @if ($ctour->country_id == $countrys->id)
                                                <div class="country-details-item">
                                                    <div class="mountainguide-block48 layout ">
                                                        <a class="text-decoration-none"
                                                            href="{{ route('tourdetails', $ctour->slug) }}">
                                                            <div class="mountainguide-block49 layout">
                                                                <div class="country-image layout">
                                                                    <img src="{{ getThumbs($ctour->mainImage) }}"
                                                                        alt="{{ $ctour->img_alt }}">
                                                                </div>
                                                                <div class="mountainguide-block50 layout">
                                                                    <div class="mountainguide-block51 layout">
                                                                        <div class="mountainguide-text-body2-box layout">
                                                                            <div class="mountainguide-text-body2">
                                                                                <span
                                                                                    class="mountainguide-text-body2-span0">Duration:
                                                                                </span><span
                                                                                    class="mountainguide-text-body2-span1">{{ $ctour->tour_days }}
                                                                                    days</span>
                                                                            </div>
                                                                        </div>
                                                                        <h3 class="mountainguide-subtitle2 layout">
                                                                            {{ Str::limit($ctour->tour_name, 22) }}</h3>
                                                                        <div class="mountainguide-paragraph-body layout">
                                                                            {{ Str::limit($ctour->short_description, 60, '.') }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="mountainguide-block52 layout">
                                                                        <div class="mountainguide-block52-item">
                                                                            <div class="mountainguide-block53 layout">
                                                                                <div
                                                                                    class="mountainguide-text-body11 layout">
                                                                                    Price
                                                                                </div>
                                                                                @if ($getcoupon)
                                                                                    <h4
                                                                                        class="mountainguide-highlights4 layout">
                                                                                        <strike class="text-danger"><span>$
                                                                                            </span>{{ $ctour->main_price }}</strike>
                                                                                        <span>$
                                                                                        </span>{{ $ctour->main_price - ($getcoupon->discount_amount / 100) * $ctour->main_price }}
                                                                                    </h4>
                                                                                @else
                                                                                    <h4
                                                                                        class="mountainguide-highlights4 layout">
                                                                                        ${{ $ctour->main_price }}</h4>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        <div class="mountainguide-block52-spacer"></div>
                                                                        <div class="mountainguide-block52-item1">
                                                                            <div class="mountainguide-block54 layout">
                                                                                <div class="mountainguide-block55 layout">
                                                                                    <a href="{{ route('booking', $ctour->slug) }}"
                                                                                        class="mountainguide-highlights5 layout text-decoration-none">Book
                                                                                        Now</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>

                                                </div>
                                            @endif
                                        @endif
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="explore-us">
            <div class="mountainguide-block65-item">
                <div class="mountainguide-block66 layout">
                    <div class="mountainguide-image10 layout">
                        <img class="explore-main-image" src="{{ getThumbs($homepage->main_image) }}"
                            alt="{{ $homepage->img_alt }}">
                    </div>
                    <div class="mountainguide-image11 layout">
                        <img class="explore-image" src="{{ getThumbs($homepage->image) }}" alt="{{ $homepage->img_alt }}">

                    </div>
                </div>
            </div>
            <div class="mountainguide-block65-spacer"></div>
            <div class="mountainguide-block65-item1">
                <div class="mountainguide-block67 layout">
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
    </div>
    <div class="container-fluid mountainguide-block70 layout">
        <div class="row mountainguide-block71 layout">
            <div class="mountainguide-block74 layout">
                <h3 class="mountainguide-subtitle3 layout">Our Best</h3>
                <h1 class="mountainguide-hero-title11 layout">Selling package</h1>
                <div class="countrytab-box layout"></div>
            </div>

            <div class="mountainguide-block77 layout ">
                @if ($getTour)
                    @foreach ($getTour as $key => $selltour)
                        @if ($selltour->status == 1)
                            <div class="mountainguide-block48 layout1">
                                <a class="text-decoration-none" href="{{ route('tourdetails', $selltour->slug) }}">
                                    <div class="mountainguide-block49 layout">
                                        <div class="mountainguide-image8 layout">
                                            <img class="best-sell-image" src="{{ getThumbs($selltour->mainImage) }}"
                                                alt="{{ $selltour->img_alt }}">
                                        </div>
                                        <div class="mountainguide-block50 layout">
                                            <div class="mountainguide-block51 layout">
                                                <div class="mountainguide-text-body2-box layout">
                                                    <div class="mountainguide-text-body2">
                                                        <span class="mountainguide-text-body21-span0">Duration:
                                                        </span><span
                                                            class="mountainguide-text-body21-span1">{{ $selltour->tour_days }}
                                                            days</span>
                                                    </div>
                                                </div>
                                                <h3 class="mountainguide-subtitle2 layout"> {{ $selltour->tour_name }}
                                                </h3>
                                                <div class="mountainguide-paragraph-body layout">
                                                    {{ Str::limit($selltour->short_description, 60, '.') }}
                                                </div>
                                            </div>
                                            <div class="mountainguide-block52 layout">
                                                <div class="mountainguide-block52-item">
                                                    <div class="mountainguide-block53 layout">
                                                        <div class="mountainguide-text-body14 layout">Price</div>
                                                        @if ($getcoupon)
                                                            <h4 class="mountainguide-highlights4 layout">
                                                                <strike class="text-danger"><span>$
                                                                    </span>{{ $selltour->main_price }}</strike> <span>$
                                                                </span>{{ $selltour->main_price - ($getcoupon->discount_amount / 100) * $selltour->main_price }}
                                                            </h4>
                                                        @else
                                                            <h4 class="mountainguide-highlights4 layout">
                                                                $ {{ $selltour->main_price }}</h4>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="mountainguide-block52-spacer"></div>
                                                <div class="mountainguide-block52-item3">
                                                    <div class="mountainguide-block54 layout">
                                                        <div class="mountainguide-block55 layout">
                                                            <a href="{{ route('booking', $selltour->slug) }}"
                                                                class="mountainguide-highlights5 layout text-decoration-none">Book
                                                                Now</a>
                                                        </div>
                                                    </div>
                                                </div>
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
    @if ($bestsell)
        <section class="best-sell-month">
            <img src="{{ asset($bestsell->mainImage) }}" alt="{{ $bestsell->img_alt }}">
            <div class="bestsell-content">
                <h3 class="trip-title" id="demo1">Trip Of The Month</h3>
                <h4 class="bestselldetailsheading"><a
                        href="{{ route('tourdetails', $bestsell->slug) }}">{{ $bestsell->tour_name }}</a></h4>

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
                                <i class="fa fa-arrow-trend-up"></i>

                            </div>
                            <div class="text">
                                <h4 class="bestselltext-duration">Price</h4>
                                <h4 class="bestselltext-value"> $ {{ $bestsell->main_price }}</h4>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif
    <div class="container-fluid mountainguide-block84 layout">
        <div class="mountainguide-block85 layout">
            <div class="mountainguide-block86 layout">
                @if ($chooseus->count() > 0)
                    <h2 class="mountainguide-medium-title layout1">Why choose mountain guide trek</h2>
                    <div class="chooseus-box layout"></div>
                @endif
            </div>
        </div>
        <div class="mountainguide-block87 layout">
            @foreach ($chooseus as $key => $choose)
                <div class="mountainguide-block87-item">
                    <div class="mountainguide-block88 layout">
                        <div class="mountainguide-icon3 layout">
                            <img class="chooseimage" src="{{ getThumbs($choose->image) }}" alt="{{ $choose->title }}">
                        </div>
                        <div class="mountainguide-block89 layout">
                            <div class="mountainguide-paragraph-body1 layout">0{{ $key + 1 }}</div>
                            <h3 class="chooseus-title"><a href="{{ route('travelwithus') }}"
                                    class="text-decoration-none">{{ $choose->title }}</a></h3>
                            <div class="mountainguide-paragraph-body2-box layout chooseus-para">
                                {!! Str::limit($choose->description, 100, '.') !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mountainguide-block87-spacer"></div>
            @endforeach
        </div>
    </div>

    <section class="populartrek_section ">
        @if ($cattrekking)
            <div class="populartrekheading">
                <h2 class="populartrektitle layout2">Popular trekking places</h2>
                <div class="chooseus-box layout"></div>
            </div>
        @endif
        <div class="container popular-container">
            <div class="populartrek_content">
                <div id="popular-trek-slider" class="owl-carousel owl-theme">
                    @if ($cattrekking)
                        @foreach ($cattrekking->tour->shuffle() as $key => $tour)
                            @if ($tour->status == 1)
                                <div class="populartrek_item">
                                    <a class="text-decoration-none" href="{{ route('tourdetails', $tour->slug) }}">
                                        <div class="populartrek_image">
                                            <img class="img-fluid" src="{{ getThumbs($tour->mainImage) }}"
                                                alt="{{ $tour->img_alt }}">
                                        </div>
                                        <div class="populartrek_details">
                                            <div class="mt-3 mb-3">
                                                <span class="bestduration">Duration:</span> <span
                                                    class="days">{{ $tour->tour_days }} Days</span>
                                            </div>

                                            <div class="populartrek_title">
                                                <h5>{{ $tour->tour_name }}</h5>
                                            </div>

                                            <p>{{ Str::limit($tour->short_description, 80, '.') }}</p>
                                            <div class="pbtn">
                                                <div class="mb-2">
                                                    <h4 class="mountainguide-text-body14 layout">Price</h4>
                                                    @if ($getcoupon)
                                                        <h4 class="populartrekprice">
                                                            <strike class="text-danger"><span>$
                                                                </span>{{ $tour->main_price }}</strike> <span>$
                                                            </span>{{ $tour->main_price - ($getcoupon->discount_amount / 100) * $tour->main_price }}
                                                        </h4>
                                                    @else
                                                        <h4 class="populartrekprice">
                                                            ${{ $tour->main_price }}</h4>
                                                    @endif
                                                </div>


                                                <a href="{{ route('booking', $tour->slug) }}"
                                                    class="populartrekbtn text-decoration-none">Book
                                                    Now</a>
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
    <div class="container-fluid mountainguide-block70 layout">
        <div class=" mountainguide-block71 layout">
            <div class="mountainguide-block74 layout">
                <h3 class="mountainguide-subtitle3 layout">Challenge</h3>
                <h1 class="mountainguide-hero-title11 layout">The Peak</h1>
                <div class="countrytab-box layout"></div>
            </div>
        </div>
        <div class="mountainguide-block77 layout ">
            @if ($catpeak)
                @foreach ($catpeak->tour->shuffle()->sortDesc() as $key => $tour)
                    @if ($tour->status == 1)
                        <div class="mountainguide-block48 layout1">
                            <a class="text-decoration-none" href="{{ route('tourdetails', $tour->slug) }}">
                                <div class="mountainguide-block49 layout">
                                    <div class="mountainguide-image8 layout">
                                        <img class="best-sell-image" src="{{ getThumbs($tour->mainImage) }}"
                                            alt="{{ $tour->img_alt }}">
                                    </div>
                                    <div class="mountainguide-block50 layout">
                                        <div class="mountainguide-block51 layout">
                                            <div class="mountainguide-text-body2-box layout">
                                                <div class="mountainguide-text-body2">
                                                    <span class="mountainguide-text-body21-span0">Duration: </span><span
                                                        class="mountainguide-text-body21-span1">{{ $tour->tour_days }}
                                                        days</span>
                                                </div>
                                            </div>
                                            <h3 class="mountainguide-subtitle2 layout"> {{ $tour->tour_name }}</h3>
                                            <div class="mountainguide-paragraph-body layout">
                                                {{ Str::limit($tour->short_description, 80, '.') }}
                                            </div>
                                        </div>
                                        <div class="mountainguide-block52 layout">
                                            <div class="mountainguide-block52-item">
                                                <div class="mountainguide-block53 layout">
                                                    <div class="mountainguide-text-body14 layout">Price</div>
                                                    @if ($getcoupon)
                                                        <h4 class="mountainguide-highlights4 layout">
                                                            <strike class="text-danger"><span>$
                                                                </span>{{ $tour->main_price }}</strike> <span>$
                                                            </span>{{ $tour->main_price - ($getcoupon->discount_amount / 100) * $tour->main_price }}
                                                        </h4>
                                                    @else
                                                        <h4 class="mountainguide-highlights4 layout">
                                                            $ {{ $tour->main_price }}</h4>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="mountainguide-block52-spacer"></div>
                                            <div class="mountainguide-block52-item3">
                                                <div class="mountainguide-block54 layout">
                                                    <div class="mountainguide-block55 layout">
                                                        <a href="{{ route('booking', $tour->slug) }}"
                                                            class="mountainguide-highlights5 layout text-decoration-none">Book
                                                            Now</a>
                                                    </div>
                                                </div>
                                            </div>
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
    @include('frontend.common.testmonial')
    <section class="container-fluid blogs_section ">
        @if ($getblogs->count() > 0)
            <div class="populartrekheading mt-6 mb-4">
                <h2 class="populartrektitle layout2">Our Latest Blogs</h2>
                <div class="chooseus-box layout"></div>
            </div>
        @endif

        <div id="blog-slider" class="owl-carousel owl-theme">
            @forelse($getblogs as $blog)
                <div class="blogs_item">
                    <a class="text-decoration-none" href="{{ route('blogsdetails', $blog->slug) }}">
                        <div class="blogs_image">
                            <img class="img-fluid" src="{{ getThumbs($blog->blog_image) }}" alt="{{ $blog->img_alt }}">
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
    </section>
@endsection
