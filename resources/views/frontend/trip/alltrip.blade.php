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
@section('title', 'Mountain Guide Trekking')
@section('content')


<div class="container search-tour ">
    <div class="row">
        @if (!empty($getsubcat->sub_category_name))       
        <div class="allblogs-heading">
            <h2 class="populartrektitle layout2"> {{ $getsubcat->sub_category_name }}</h2>
            <div class="chooseus-box layout"></div>
        </div>
    </div>
        @endif
        <div class=" row mountainguide-block77 layout d-flex">
            @if ($getTourdetails)
                @foreach ($getTourdetails as $key => $tour)
                    @if ($tour->status == 1)
                        <div class="col-md-4 tour-search mountainguide-block48 layout1">
                            <a class="text-decoration-none" href="{{ route('tourdetails', $tour->slug) }}">
                                <div class="mountainguide-block49 layout">
                                    <div class="mountainguide-image8 layout">
                                        <img class="best-sell-image" srcset="{{ getThumbs($tour->mainImage) }}"
                                            alt="{{ $tour->img_alt }}">
                                    </div>
                                    <div class="mountainguide-block50 layout">
                                        <div class="mountainguide-block51 layout">
                                            <div class="mountainguide-text-body2-box layout">
                                                <div class="mountainguide-text-body2">
                                                    <span class="mountainguide-text-body21-span0">Duration:
                                                    </span><span
                                                        class="mountainguide-text-body21-span1">{{ $tour->tour_days }}
                                                        days</span>
                                                </div>
                                            </div>
                                            <h3 class="mountainguide-subtitle2 layout"> {{Str::limit( $tour->tour_name,22) }}
                                            </h3>
                                            <div class="mountainguide-paragraph-body layout">
                                                {{ Str::limit($tour->short_description, 40, '.') }}
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
</div>
<section class="paginate text-center pt-0 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-center">
                    {{ $getTourdetails->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection