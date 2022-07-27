@php
$getTour=App\Models\Tour::with('country','place','category')->orderBy('id','desc')->where('status','=','1')->limit(12)->get();

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
                                        style="height:185px !important"></a>
                            </div>
                            <div class="content" style="height:200px">
                                <h3 style="color:black;font-size:15px;font-weight:bold">
                                    {{ $tour->tour_name }}</h3>
                                    <p>{{Str::limit($tour->short_description,80,'.')}}</p>
                                <ul class="info">
                                    <li><i class="fa fa-calendar mr-2"></i>{{ $tour->tour_days }}
                                            Days
                                        </li>
                                    <li>  
                                        @if ($getcoupon)
                                        <p>
                                            <strike  class="text-danger"><span>$ </span>{{ $tour->main_price }}</strike> <span>$ </span>{{ $tour->main_price - ($getcoupon->discount_amount / 100) * $tour->main_price }}
                                        </p>
                                      
                                    @else
                                        <p><span>$ </span>{{ $tour->main_price }}</p>
                                    @endif
                                </li>
                                   

                                </ul>
                                <a class="btn-theme" style="float:left !important;"
                                    href="{{ route('booking', $tour->slug) }}">Book
                                    Now</a>
                                <a class="btn-theme" style=""
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