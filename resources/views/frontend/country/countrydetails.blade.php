@extends('frontend.main')
@section('title', 'CountryDetails')
@section('content')


    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg" data-background="images/bg/px-1.jpg" data-type="parallax" data-speed="3">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-12">
                        <h4>{{ $getcountrydetails->country_name }}</h4>
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
                        <div class="thumb">
                            <img src="{{ $getcountrydetails->country_image }}" style="width:1110px; height:420px" alt="">
                            <div class="offer-price"> Off 40%</div>
                            <div class="post-title-box">
                                <div class="price-box">
                                    <h5><span>$</span>{{ $getcountrydetails->start_price }}</h5>
                                    <h6>Starts From</h6>
                                </div>
                                <div class="title-box">
                                    <h4>{{ $getcountrydetails->country_name }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            {{-- <ul class="info">
                                        <li><a href="#"><i class="fa fa-calendar"></i>4 Days</a></li>
                                        <li><a href="#"><i class="fa fa-user"></i>2 Person</a></li>
                                        <li><a href="#"><i class="fa fa-map-marker"></i>View on Map</a></li>
                                    </ul> --}}
                            <p>{!! $getcountrydetails->description !!}</p>
                            <div class="small-hotel">
                                <div class="text">
                                    <h6>Hotels to Stay</h6>
                                    <h5>Saladi Hasan Return Hotel</h5>
                                    <p>Travel quia tempore, ex delectus rerum option's sapiente, magnam ptate
                                        reiciendis eligendi cupiditate optimal.</p>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
                                        <li><a href="#"><i class="fa  fa-star-o"></i></a></li>
                                        <li><a href="#">(3 Ratings)</a></li>
                                    </ul>
                                    <a class="map-viw" href="#"><i class="fa fa-map-marker"></i>View on
                                        Map</a>
                                </div>
                                <div class="thumb">
                                    <img src="images/features/sm-d1.jpg" alt="">
                                    <img src="images/features/sm-d2.jpg" alt="">
                                </div>
                            </div>
                            <h5 class="share-btn"><i class="fa fa-share-alt"></i> Share</h5>
                            <a class="btn-theme" href="#">Booking Now</a>
                        </div>
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
                <div class="col-lg-12">
                    <div class="specialplaces_carousel owl-carousel owl-theme owl-navst">
                       @forelse($gettour as $tour)
                        <div class="item">
                            <div class="special-places">
                                <div class="thumb">
                                    <img src="{{$tour->mainImage}}" alt="" style="width:350px;height:215px">
                                </div>
                                <div class="content">
                                    <div class="price-box">
                                        <h5><span>$</span>{{$tour->main_price}}</h5>
                                        <h6>Starts From</h6>
                                    </div>
                                    <div class="title-box">
                                        <h4>{{$tour->tour_name}}</h4>
                                        <h3>{{$tour->place->place_name}},{{$tour->country->country_name}}</h3>
                                    </div>
                                    <ul class="info">
                                        <li><a href="#"><i class="fa fa-calendar"></i>{{$tour->tour_days}}</a></li>
                                        {{-- <li><a href="#"><i class="fa fa-user"></i>2 Person</a></li>
                                        <li><a href="#"><i class="fa fa-map-marker"></i>View on Map</a></li> --}}
                                    </ul>
                                    <p>{!!Str::limit($tour->description,150)!!}</p>
                                    <h5 class="share-btn"><i class="fa fa-share-alt"></i> Share</h5>
                                    <a class="btn-theme" href="{{route('tourdetails',$tour->tour_name)}}">View Details</a>
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
                <div class="col-lg-5">
                    <div class="testimonial-video mt-0">
                        <h5>Latest Hotel Reviews</h5>
                        <div class="sec-line mb-20"></div>
                        <h3><i class="fa fa-quote-left"></i> If you are going to use a passage of Lorem Ipsum, you
                            need to be on sure there isn’t anything embarras repeat predefined chunks as.</h3>
                        <a class="btn-theme popup-youtube" href="../../../www.youtube.com/watchbf1e.html?v=7e90gBu4pas"><i
                                class="fa fa-play-circle"></i> Play Video</a>
                        <div class="review-ratings">
                            <a class="ratings-star" href="#">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-empty"></i>
                                <i class="fa fa-star-o"></i>
                            </a>
                            <a class="ratings-count" href="#">(3 Ratings)</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    @include('frontend.common.testmonial')
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials Section End -->

    <!-- Client Section Start -->
    <section class="client-section bg-f8 style-2 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="client_carousel" class="owl-carousel">
                        <div class="item">
                            <div class="client-img-item">
                                <img src="images/partner/1.png" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-img-item">
                                <img src="images/partner/2.png" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-img-item">
                                <img src="images/partner/3.png" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-img-item">
                                <img src="images/partner/4.png" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-img-item">
                                <img src="images/partner/5.png" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-img-item">
                                <img src="images/partner/6.png" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-img-item">
                                <img src="images/partner/2.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Client Section End -->

@endsection
