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
                                        <img srcset="{{ getThumbs($ctour->mainImage) }}"
                                            alt="{{ $ctour->img_alt }}">
                                        @if (!empty($ctour->type))
                                            <p class="otherhead-tag">
                                                @if ($ctour->type == 'group')
                                                    <i class="fa-solid fa-people-group"></i>
                                                    Group
                                                @elseif($ctour->type == 'family')
                                                    <i class="fa-solid fa-people-roof"></i>
                                                    Family
                                                @elseif($ctour->type == 'bestsell')
                                                    <i class="fa-solid fa-award"></i> Best Sell
                                                @elseif($ctour->type == 'private')
                                                    <i class="fa-solid fa-lock"></i> Private
                                                @elseif($ctour->type == 'tripofthemonth')
                                                    <i class="fa-solid fa-award"></i> Trip Of
                                                    The Month
                                                @else
                                                @endif
                                            </p>
                                        @endif
                                    </div>
                                    <div class="mountainguide-block50 layout">
                                        <div class="mountainguide-block51 layout">
                                            <div class="mountainguide-text-body2-box layout">
                                                <div class="mountainguide-text-body2">Duration:<span class="mountainguide-text-body2-span1">{{ $ctour->tour_days }}
                                                        days</span>
                                                </div>
                                            </div>
                                            <h3 class="mountainguide-subtitle2 layout">
                                                {{ Str::limit($ctour->tour_name, 22) }}</h3>
                                            <div class="mountainguide-paragraph-body layout">
                                                {{$ctour->short_description }}
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
                                                            <span
                                                                class="discount-price">${{ $ctour->main_price }}
                                                            </span>
                                                            ${{ $ctour->main_price - ($getcoupon->discount_amount / 100) * $ctour->main_price }}
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