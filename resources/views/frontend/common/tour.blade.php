@php
$getTour=App\Models\Tour::with('country','place','category')->orderBy('id','desc')->where('status','=','1')->get();

@endphp
 
 <!-- Special Places Section Start -->
  <section class="special-places-sec pb-80">
    <div class="container">
        <div class="row">
            @if($getTour->count()>0)
            <div class="section-title">
                <h2>Special <span>Tour</span> Places</h2>
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
                                    <img src="{{ $tour->mainImage }}" alt="{{$tour->img_alt}}"
                                        style="width:100% !important;height:253px !important">
                                    {{-- <div class="offer-price"> Off 40%</div> --}}
                                    <div class="post-title-box">
                                        <div class="price-box">
                                            @if($getcoupon)
                                            <h5 class="text-danger"><strike><span>$</span>{{ $tour->main_price }}</strike></h5>
                                            <h5><span>$</span>{{ $tour->main_price-($getcoupon->discount_amount/100*$tour->main_price)}}</h5>
        
                                            @else
                                            <h5><span>$</span>{{ $tour->main_price }}</h5>
                                            @endif
                                            {{-- <h6>Starts From</h6> --}}
                                        </div>
                                        <div class="title-box">
                                            <h4>{{ $tour->tour_name }}</h4>
                                            <h3>{{ $tour->country->country_name }}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="content">
                                    <ul class="info">
                                        <li><a href="#"><i class="fa fa-calendar"></i>{{ $tour->tour_days }} Days</a>
                                        </li>
                                        <li><a href="{{ route('tourmap', $tour->slug) }}"><i
                                            class="fa fa-map-marker"></i>View on Map</a></li>
                                           

                                    </ul>
                                    <p>{!! substr($tour->description,0, 300).'.' !!}</p>
                                    <a class="btn-theme" style="float:left !important" href="{{route('booking',$tour->slug)}}">Book Now</a>
                                    <a class="btn-theme" href="{{ route('tourdetails', $tour->slug) }}">View
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
<!-- Special Places Section End -->