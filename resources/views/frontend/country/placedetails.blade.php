@extends('frontend.main')
@section('title', 'Place Details')
@section('content')


    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg" data-background="{{asset('frontend/images/bg/ev.jpg')}}" data-type="parallax" data-speed="3">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-12">
                        <h4>{{ $getplacedetails->place_name }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Inner Section End -->

    <!-- Special Packages Section Start -->
    <section class="special-packages-sec pt-85 pb-60">
        <div class="container">
            <div class="row grid-mb">
                <div class="col-md-12">
                    <div class="special-packages dtl-st">
                       
                            <p>{!! $getplacedetails->description !!}</p>

                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Special Packages Section End -->

    <!-- Special Places Section Start -->
    <section class="special-places-sec pb-80">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h2>Our Famous Tours</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="specialplaces_carousel owl-carousel owl-theme owl-navst">
                        @forelse($getplacedetails->tour as $tour)
                            
                                <div class="item">
                                    <div class="special-places">
                                        <div class="thumb">
                                            <a href="{{ route('tourdetails', $tour->tour_name) }}"><img src="{{ $tour->mainImage }}" alt="" style="height:215px"></a>
                                        </div>
                                        <div class="content">
                                            <div class="price-box">
                                                <h5><span>$</span>{{ $tour->main_price }}</h5>
                                                {{-- <h6>Starts From</h6> --}}
                                            </div>
                                            <div class="title-box">
                                                <h4>{{ $tour->tour_name }}</h4>
                                                <h3>{{ $tour->place->place_name }},{{ $tour->country->country_name }}</h3>
                                            </div>
                                            <ul class="info">
                                                <li><i class="fa fa-calendar"></i>{{ $tour->tour_days }}
                                                        Days</li>
                                                <li><a href="{{ route('tourmap', $tour->tour_name) }}"><i
                                                            class="fa fa-map-marker"></i>View on Map</a></li>

                                                {{-- <li><a href="#"><i class="fa fa-user"></i>2 Person</a></li>
                                        <li><a href="#"><i class="fa fa-map-marker"></i>View on Map</a></li> --}}
                                            </ul>
                                            <p>{!! Str::limit($tour->description, 150,'.') !!}</p>
                                            <a class="btn-theme" style="float:left !important"
                                            href="{{ route('booking', $tour->tour_name) }}">Booking Now</a>
                                            <a class="btn-theme"
                                                href="{{ route('tourdetails', $tour->tour_name) }}">View Details</a>
                                        </div>
                                    </div>
                                </div>
                                
                            @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Special Places Section End -->
    <!-- Testimonials Section Start -->
    <section class="testimonials-section pt-80 pb-80">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    @include('frontend.common.testmonial')
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials Section End -->

@endsection
