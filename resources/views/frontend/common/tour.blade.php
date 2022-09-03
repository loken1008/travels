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
                    <div class="country-details-item">
                        <div class="mountainguide-block48 layout ">
                            <a class="text-decoration-none" href="{{ route('tourdetails', $ctour->slug) }}">
                                <div class="mountainguide-block49 layout">
                                    <div class="country-image layout">
                                        <img src="{{ getThumbs($ctour->mainImage) }}"
                                            alt="{{ $ctour->img_alt }}">
                                            @if(!empty($ctour->type))
                                            <p class="otherhead-tag">
                                               @if($ctour->type=="group")
                                               <i class="fa-solid fa-people-group"></i>
                                               @elseif($ctour->type=='family')
                                               <i class="fa-solid fa-people-roof"></i>
                                               @elseif($ctour->type=='bestsell')
                                               <i class="fa-solid fa-award"></i>
                                               @elseif($ctour->type=='private')
                                               <i class="fa-solid fa-lock"></i>
                                               @else
                                               <i class="fa-solid fa-award"></i>
                                               @endif
                                               {{$ctour->type}}
                                           </p>
                                            @endif
                                    </div>
                                    <div class="mountainguide-block50 layout">
                                        <div class="mountainguide-block51 layout">
                                            <div class="mountainguide-text-body2-box layout">
                                                <div class="mountainguide-text-body2">
                                                    <span class="mountainguide-text-body2-span0">Duration:
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
                                                    <div class="mountainguide-text-body11 layout">
                                                        Price
                                                    </div>
                                                    @if ($getcoupon)
                                                        <h4 class="mountainguide-highlights4 layout">
                                                            <span class="discount-price">${{ $ctour->main_price }}</span> ${{ $ctour->main_price - ($getcoupon->discount_amount / 100) * $ctour->main_price }}
                                                        </h4>
                                                    @else
                                                        <h4 class="mountainguide-highlights4 layout">
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
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
<!-- Special Places Section End -->