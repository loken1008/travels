@php
$getTour=App\Models\Tour::with('country','place','category')->orderBy('id','desc')->where('status','=','1')->get();

@endphp
 
 <!-- Special Places Section Start -->
 @if($getTour->count()>0)
  <section class="special-places-sec pb-30">
    <div class="container">
        <div class="row">
            @if($getTour->count()>0)
            <div class="section-title">
                <h2>Popular <span>Tour</span> Places</h2><div id="underdiv"></div>
            </div>
            @endif
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="specialplaces_carousel owl-carousel owl-theme owl-navst">
                    @foreach ($getTour as $key => $tour)
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
                                </div>
                            </div>
                            <div class="content" style="height:200px">
                                <ul class="info">
                                    <li><i class="fa fa-calendar mr-2"></i>{{ $tour->tour_days }}
                                            Days</li>
                                    <li><a href="{{ route('tourmap', $tour->slug) }}"><i
                                                class="fa fa-map-marker"></i>View on Map</a></li>


                                </ul>
                                <h6 style="color:black;font-size:16px;font-weight:bold">{{ $tour->tour_name }}</h6>
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

                </div>
            </div>
        </div>
    </div>
  </section>
@endif
<!-- Special Places Section End -->