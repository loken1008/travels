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
                    <div class="mountainguide-block29 layout d-flex">
                        <div class="container">

                            <div class="row height d-flex justify-content-center align-items-center">

                                <div class="search">
                                    <form role="search" class="search-box " method="post" action="{{ route('search') }}">
                                        @csrf
                                        <input type="text" class="form-control" name="search" placeholder="Search...">
                                        <button class="search-icon"> <i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="countrytab layout">
                <div class="countrytabsecond layout">
                    <div class="row countrytabheading layout">
                        <div class="col-lg-4 countrytabmainheading layout">
                            <h2 class="countrytab-title layout">Where do you want to trek?</h2>
                            <div class="countrytab-box layout"></div>
                        </div>
                    </div>
                    <div class="row country-list layout">
                        <div class="country-main layout">
                            @foreach ($getcountry as $key => $cutry)
                                <div class="country-item">
                                    <div class="country-name layout">
                                        <a href="#countrytab-{{ $cutry->country_name }}"
                                            class="nav-item country-subtitle layout {{ $loop->first ? 'active' : '' }} "
                                            data-toggle="tab">{{ $cutry->country_name }}</a>
                                    </div>
                                </div>
                            @endforeach
                            <div class="make-trip">
                                <div class="make-own-trip layout">
                                    <a href="{{ route('online.book') }}" class="make-own-trip-subtitle1 layout3">Make your
                                        own trip</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mountainguide-block44 layout">
                    <div class="mountainguide-block45 layout tab-content">
                        @forelse($getcountry as $key1=> $countrys)
                            <div class="container mountainguide-block45-item1 tab-pane show {{ $loop->first ? 'active' : '' }}"
                                role="tabpanel" id="countrytab-{{ $countrys->country_name }}">
                                <div id="country-slide" class="country-details layout owl-carousel owl-theme">
                                    @forelse ($tour as $key2 => $ctour)
                                        @if ($ctour->status == '1')
                                            @if ($ctour->country_id == $countrys->id)
                                                <div class="country-details-item">
                                                    <div class="mountainguide-block48 layout ">
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
                                                                        {{ $ctour->tour_name }}</h3>
                                                                    <div class="mountainguide-paragraph-body layout">
                                                                        {{ Str::limit($ctour->short_description, 80, '.') }}
                                                                    </div>
                                                                </div>
                                                                <div class="mountainguide-block52 layout">
                                                                    <div class="mountainguide-block52-item">
                                                                        <div class="mountainguide-block53 layout">
                                                                            <div class="mountainguide-text-body11 layout">
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
                        <div class="mountainguide-block69 layout">
                            <a href="{{ route('introduction') }}"
                                class="mountainguide-highlights7 layout text-decoration-none">Discover more</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mountainguide-block70 layout">
        <div class="row mountainguide-block71 layout">
            <div class="mountainguide-block72 layout">
                <div class="mountainguide-block73 layout">
                    <div class="mountainguide-block74 layout">
                        <h3 class="mountainguide-subtitle3 layout">Our Best</h3>
                        <h1 class="mountainguide-hero-title11 layout">Selling package</h1>
                    </div>
                    <div class="mountainguide-block75 layout">
                        <div class="mountainguide-block75-item">
                            <div class="mountainguide-block76 layout">
                                <div style="--src:url(/assetss/e20aa57d388451b65d4d09e8afada9cd.png)"
                                    class="mountainguide-image12 layout"></div>
                            </div>
                        </div>
                        <div class="mountainguide-block75-spacer"></div>
                        <div class="mountainguide-block75-item">
                            <div class="mountainguide-block76 layout">
                                <div style="--src:url(/assetss/93792f44a8e36a3d441fc41f653a0862.png)"
                                    class="mountainguide-image12 layout"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="best-sell-layout">
            </div>
            <div id="best-sell-slider" class="mountainguide-block77 layout owl-carousel owl-theme">
                @if ($getTour)
                    @foreach ($getTour as $key => $selltour)
                        @if ($selltour->status == 1)
                            <div class="mountainguide-block48 layout1">

                                <div class="mountainguide-block49 layout">
                                    <div class="mountainguide-image8 layout">
                                        <img class="best-sell-image" src="{{ getThumbs($selltour->mainImage) }}"
                                            alt="{{ $selltour->img_alt }}">
                                    </div>
                                    <div class="mountainguide-block50 layout">
                                        <div class="mountainguide-block51 layout">
                                            <div class="mountainguide-text-body2-box layout">
                                                <div class="mountainguide-text-body2">
                                                    <span class="mountainguide-text-body21-span0">Duration: </span><span
                                                        class="mountainguide-text-body21-span1">{{ $selltour->tour_days }}
                                                        days</span>
                                                </div>
                                            </div>
                                            <h3 class="mountainguide-subtitle2 layout"> {{ $selltour->tour_name }}</h3>
                                            <div class="mountainguide-paragraph-body layout">
                                                {{ Str::limit($selltour->short_description, 80, '.') }}
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
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>
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
            <div class="populartrekheading mt-6 mb-4">
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
                                    <div class="populartrek_image">
                                        <img class="img-fluid" src="{{ getThumbs($tour->mainImage) }}"
                                            alt="{{ $tour->img_alt }}">
                                    </div>
                                    <div class="populartrek_details">
                                        <div class="mt-3 mb-3">
                                            <span class="duration">Duration:</span> <span
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
                                                            </span>{{ $selltour->main_price }}</strike> <span>$
                                                        </span>{{ $selltour->main_price - ($getcoupon->discount_amount / 100) * $selltour->main_price }}
                                                    </h4>
                                                @else
                                                    <h4 class="populartrekprice">
                                                        ${{ $selltour->main_price }}</h4>
                                                @endif
                                            </div>


                                            <a href="{{ route('booking', $selltour->slug) }}"
                                                class="populartrekbtn text-decoration-none">Book
                                                Now</a>
                                        </div>

                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    <div class="mountainguide-block70 layout">
        <div class="mountainguide-block71 layout">
            <div class="mountainguide-block72 layout">
                <div class="mountainguide-block73 layout">
                    <div class="mountainguide-block74 layout">
                        <h3 class="mountainguide-subtitle3 layout">Challenge</h3>
                        <h1 class="mountainguide-hero-title12-box layout">
                            <pre class="mountainguide-hero-title12">
        The
        Peak</pre>
                        </h1>
                    </div>
                    <div class="mountainguide-block75 layout">
                        <div class="mountainguide-block75-item">
                            <div class="mountainguide-block76 layout">
                                <div style="--src:url(/assetss/e20aa57d388451b65d4d09e8afada9cd.png)"
                                    class="mountainguide-image12 layout"></div>
                            </div>
                        </div>
                        <div class="mountainguide-block75-spacer"></div>
                        <div class="mountainguide-block75-item">
                            <div class="mountainguide-block76 layout">
                                <div style="--src:url(/assetss/93792f44a8e36a3d441fc41f653a0862.png)"
                                    class="mountainguide-image12 layout"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="--src:url(/assetss/c5b95a426f6dc835c545b9c398fa24fe.png)" class="mountainguide-image13 layout">
            </div>
            <div class="mountainguide-block77 layout">
                <div class="mountainguide-block48 layout2">
                    <div class="mountainguide-block49 layout">
                        <div style="--src:url(/assetss/6499244b2be51cebb69cd3ac778ec556.png)"
                            class="mountainguide-image8 layout"></div>
                        <div class="mountainguide-block50 layout">
                            <div class="mountainguide-block51 layout">
                                <div class="mountainguide-text-body2-box layout">
                                    <div class="mountainguide-text-body2">
                                        <span class="mountainguide-text-body21-span0">Duration: </span><span
                                            class="mountainguide-text-body21-span1">15 days</span>
                                    </div>
                                </div>
                                <h3 class="mountainguide-subtitle2 layout">Gokyo lake trek</h3>
                                <div class="mountainguide-paragraph-body layout">
                                    Gokyo Lake Everest Base Camp Trek is one of the famous and adventurous
                                    destinations.
                                </div>
                            </div>
                            <div class="mountainguide-block52 layout">
                                <div class="mountainguide-block52-item">
                                    <div class="mountainguide-block53 layout">
                                        <div class="mountainguide-text-body19 layout">Price</div>
                                        <h4 class="mountainguide-highlights4 layout">$1450</h4>
                                    </div>
                                </div>
                                <div class="mountainguide-block52-spacer"></div>
                                <div class="mountainguide-block52-item4">
                                    <div class="mountainguide-block54 layout">
                                        <div class="mountainguide-block55 layout">
                                            <h5 class="mountainguide-highlights5 layout">Book Now</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mountainguide-block78 layout">
                    <div class="mountainguide-block79 layout">
                        <div style="--src:url(/assetss/ebef3cd7f8a46166fac95f1a24615c22.png)"
                            class="mountainguide-image14 layout"></div>
                        <div class="mountainguide-block58 layout">
                            <div class="mountainguide-block59 layout">
                                <div class="mountainguide-text-body2-box layout">
                                    <div class="mountainguide-text-body2">
                                        <span class="mountainguide-text-body21-span0">Duration: </span><span
                                            class="mountainguide-text-body21-span1">15 days</span>
                                    </div>
                                </div>
                                <h3 class="mountainguide-subtitle2 layout">Everest base camp</h3>
                                <div class="mountainguide-paragraph-body layout">
                                    Gokyo Lake Everest Base Camp Trek is one of the famous and adventurous
                                    destinations.
                                </div>
                            </div>
                            <div class="mountainguide-block60 layout">
                                <div class="mountainguide-block60-item">
                                    <div class="mountainguide-block61 layout">
                                        <div class="mountainguide-text-body110 layout">Price</div>
                                        <h4 class="mountainguide-highlights4 layout">$1450</h4>
                                    </div>
                                </div>
                                <div class="mountainguide-block60-spacer"></div>
                                <div class="mountainguide-block60-item3">
                                    <div class="mountainguide-block54 layout">
                                        <div class="mountainguide-block55 layout">
                                            <h5 class="mountainguide-highlights5 layout">Book Now</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mountainguide-block80 layout">
                    <div class="mountainguide-block81 layout">
                        <div style="--src:url(/assetss/22513429308328ff350c783fc0e741f8.png)"
                            class="mountainguide-image15 layout"></div>
                        <div class="mountainguide-block82 layout">
                            <div class="mountainguide-block83 layout">
                                <div class="mountainguide-text-body2-box layout2">
                                    <div class="mountainguide-text-body2">
                                        <span class="mountainguide-text-body21-span0">Duration: </span><span
                                            class="mountainguide-text-body21-span1">15 days</span>
                                    </div>
                                </div>
                                <h3 class="mountainguide-subtitle2 layout2">Gokyo lake trek</h3>
                                <div class="mountainguide-paragraph-body layout2">
                                    Gokyo Lake Everest Base Camp Trek is one of the famous and adventurous
                                    destinations.
                                </div>
                            </div>
                            <div class="mountainguide-block52 layout2">
                                <div class="mountainguide-block52-item">
                                    <div class="mountainguide-block53 layout">
                                        <div class="mountainguide-text-body111 layout">Price</div>
                                        <h4 class="mountainguide-highlights4 layout">$1450</h4>
                                    </div>
                                </div>
                                <div class="mountainguide-block52-spacer"></div>
                                <div class="mountainguide-block52-spacer2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   @include('frontend.common.testmonial')
   <section class="blogs_section ">
    @if ($getblogs->count() > 0)
        <div class="populartrekheading mt-6 mb-4">
            <h2 class="populartrektitle layout2">Our Latest Blogs</h2>
            <div class="chooseus-box layout"></div>
        </div>
    @endif
    <div class="container blog-container">
        <div class="blogs_content">
            <div id="blog-slider" class="owl-carousel owl-theme">
                @forelse($getblogs as $blog)
                            <div class="blogs_item">
                                <div class="blogs_image">
                                    <img class="img-fluid" src="{{getThumbs($blog->blog_image) }}" alt="{{ $blog->img_alt }}">
                                </div>
                                <div class="blogs_details">
                                    <div class="mt-3 mb-3">
                                        <span class="blogs_date">{{$blog->created_at->format('Y-M-d')}}</span> 
                                    </div>
                                    <h5 class="blogs_title">{{ Str::limit($blog->blog_title,25) }}</h5>

                                    <div class="blogs_details">{!! Str::limit($blog->blog_description,90) !!}</div>
                                    <div class="bbtn">
                                        
                                        <a href="{{ route('blogsdetails', $blog->slug) }}"
                                            class="blogsbtn text-decoration-none">Read
                                            More</a>
                                    </div>

                                </div>
                            </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
</section>
@endsection
