@php
$getTour=App\Models\Tour::with('country','place','category')->orderBy('id','desc')->where('status','=','1')->limit(12)->get();

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
 
 <!-- Special Places Section Start -->
 @if($getTour->count()>0)

 <div class="container network_wrapper col-sm  ">
    <div class=" country-card">
        <div class="country-header">
            <div class="countrytabmainheading layout">
                <div>
                    <h2 class="countrytab-title layout">Popular Trekking Places</h2>
                    <div class="countrytab-box layout"></div>
                </div>
               
            </div>

        </div>

        <div class="mountainguide-block45-item1 " id="country">
            <div id="country-slide" class="country-details owl-carousel owl-theme">
                @forelse ($getTour as $key2 => $ctour)
                <div class="mountainguide-block48 layout1">
                    <a class="text-decoration-none" href="{{ route('tourdetails', $ctour->slug) }}">
                        <div class="mountainguide-block49 layout">
                            <div class="mountainguide-image8 layout">
                                <img class="first-section-image"
                                    srcset="{{ getThumbs($ctour->mainImage) }}"
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
                                        @else
                                        @endif
                                    </p>
                                @endif
                                <div class="first-section-price">
                                    @if ($getcoupon)
                                        <h4 class="mountainguide-highlights4 layout">
                                            <span
                                                class="discount-price">${{ $ctour->main_price }}</span>
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
                                        {{ $ctour->tour_name }}
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
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
<!-- Special Places Section End -->