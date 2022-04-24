@extends('frontend.main')
@section('title', 'Details')
@section('content')

    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg" data-background="images/bg/px-1.jpg" data-type="parallax" data-speed="3">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-12">
                        <h4>{{ $getTourdetails->category->category_name }}</h4>
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
                            <img src="{{ $getTourdetails->mainImage }}" alt="" style="width:1110px;height:420px">
                            <div class="offer-price"> Off 40%</div>
                            <div class="post-title-box">
                                <div class="price-box">
                                    <h5><span>$</span>{{ $getTourdetails->main_price }}</h5>
                                    {{-- <h6><span>Starts From</span>{{$getTourDetails->dateprice->start_date}}</h6> --}}
                                </div>
                                <div class="title-box">
                                    <h4>{{ $getTourdetails->tour_name }}</h4>
                                    <h3>{{ $getTourdetails->country->country_name }}
                                        {{ $getTourdetails->place->place_name }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <ul class="info">
                                <li><a href="#"><i class="fa fa-calendar"></i>{{ $getTourdetails->tour_days }} Days</a>
                                </li>
                                <li><a href="#"><i class="fa fa-arrows-v"></i>{{ $getTourdetails->altitude }}
                                        Altituade</a>
                                </li>
                                <li><a href="#"><i class="fa fa-height"></i></a></li>
                                <li><a href="#"><i class="fa fa-umbrella"></i>{{ $getTourdetails->accomodation }}
                                        Accomodation</a></li>
                                <li><a href="#"><i class="fa fa-plane"></i>{{ $getTourdetails->transport }}
                                        Transport</a>
                                </li>
                                <li><a href="#"><i class="fa fa-height"></i></a></li>

                            </ul>

                            <p>{!! $getTourdetails->description !!}</p>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="tab-style">
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link " id="plc-asia-tab" data-toggle="tab"
                                                    href="#plc-asia" role="tab" aria-controls="plc-asia"
                                                    aria-selected="true">Itinaries</a>
                                                <a class="nav-item nav-link " id="plc-asia-tab" data-toggle="tab"
                                                    href="#costie" role="tab" aria-controls="plc-asia"
                                                    aria-selected="true">Cost Details</a>
                                                <a class="nav-item nav-link " id="plc-asia-tab" data-toggle="tab"
                                                    href="#equipment" role="tab" aria-controls="plc-asia"
                                                    aria-selected="true">Equipment</a>
                                                <a class="nav-item nav-link " id="plc-asia-tab" data-toggle="tab"
                                                    href="#dateprice" role="tab" aria-controls="plc-asia"
                                                    aria-selected="true">Date & Price</a>
                                                <a class="nav-item nav-link " id="plc-asia-tab" data-toggle="tab"
                                                    href="#relatedimages" role="tab" aria-controls="plc-asia"
                                                    aria-selected="true">Photos</a>


                                            </div>
                                        </nav>
                                        <div class="tab-content" id="nav-tabContent">
                                            <!-- item start -->
                                            <div class="tab-pane fade show " id="plc-asia" role="tabpanel"
                                                aria-labelledby="plc-asia-tab">
                                                <div class="item">
                                                    @foreach ($getTourdetails->itinerary as $itinerary)
                                                        <div class="content">
                                                            <h3 class="font-weight-bold">{{ $itinerary->day_title }}
                                                            </h3>

                                                            <p class="text-justify" style="color:black !important">
                                                                {!! $itinerary->long_description !!}</p>

                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <!-- item end -->
                                            <!-- item start -->
                                            <div class="tab-pane fade show " id="costie" role="tabpanel"
                                                aria-labelledby="costie-tab">
                                                <div class="item">

                                                    <p class="text-justify" style="color:black !important">
                                                        {!! $getTourdetails->cost_include !!}</p>
                                                    <p class="text-justify" style="color:black !important">
                                                        {!! $getTourdetails->cost_exclude !!}</p>

                                                </div>
                                            </div>
                                            <!-- item end -->

                                            <!-- item start -->
                                            <div class="tab-pane fade show " id="equipment" role="tabpanel"
                                                aria-labelledby="equipment-tab">
                                                @foreach ($getTourdetails->equipment as $equipment)
                                                    <div class="item">
                                                        <div class="special-places">
                                                            <div class="content">

                                                                <h3 class="font-weight-bold">
                                                                    {{ $equipment->equipment_name }}
                                                                </h3>
                                                                <p class="text-justify" style="color:black !important">
                                                                    {!! $equipment->equipment_description !!}</p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <!-- item end -->
                                            <!-- item start -->
                                            <div class="tab-pane fade show " id="dateprice" role="tabpanel"
                                                aria-labelledby="dateprice-tab">

                                                <div class="item">

                                                    <table class="table">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th scope="col">Start Date</th>
                                                                <th scope="col">End Date</th>
                                                                <th scope="col">Seats Available</th>
                                                                <th scope="col">Price</th>
                                                                <th scope="col">Booking</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($getTourdetails->dateprice as $dateprice)
                                                                <tr>
                                                                    <th>{{ $dateprice->start_date }}</th>
                                                                    <td>{{ $dateprice->end_date }}</td>
                                                                    <td>{{ $dateprice->seats_available }}</td>
                                                                    <td>{{ $dateprice->price }}</td>
                                                                    <td><button class="btn btn-info">Book Now</button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                            <!-- item end -->
                                            <!-- item start -->
                                            <div class="tab-pane fade show " id="relatedimages" role="tabpanel"
                                                aria-labelledby="relatedimages-tab">

                                                <div class="item gallery-section mb-4">
                                                    <div class="row gallery-items">
                                                        @forelse($getTourdetails->images as $image)
                                                            @php
                                                                $imagess = explode(',', $image->images);
                                                                
                                                            @endphp
                                                            @foreach ($imagess as $images)
                                                                <div class="col-sm-4 col-grid">
                                                                    <div class="gallery-item">
                                                                        <div class="thumb">
                                                                            <img src="{{ $images }}" alt="image"
                                                                                style="    height: 200px; width: 365px;">
                                                                            <div class="overlay">
                                                                                <div class="inner">
                                                                                    <a href="{{ $images }}"
                                                                                        class="icon lightbox-image">
                                                                                        <i class="fa fa-plus"></i>
                                                                                    </a>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @empty
                                                            <p>No Image</p>
                                                        @endforelse

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- item end -->
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                    <img src="{{ asset('frontend/images/features/sm-d1.jpg') }}" alt="">
                                    <img src="{{ asset('frontend/images/features/sm-d2.jpg') }}" alt="">
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

    <!-- Global Section Start -->
    <section class="global-section over-layer-white pt-80 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-12">
                    <div class="global-area">
                        <div class="inner-title">
                            <h2>Now We Are Globaly Everywhare</h2>
                            <h3>Discover vestibulum <span>pharetra orci turpis</span>, ut interdum </h3>
                            <div class="sec-line"></div>
                        </div>
                        <p>Pellentesque consectetur condimentum libero, interdum aliquet enim sollic tudin ut. Donec
                            dapibus tempor odio eu aliquet. Vivamus ultricies augue ut.</p>
                        <h4>Condimentum at sed sapien:</h4>
                        <ul>
                            <li>consectetur adipting elit.</li>
                            <li>consectetur adipting elit.</li>
                            <li>consectetur adipting elit.</li>
                            <li>consectetur adipting elit.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-8 col-md-10">
                    <div class="map-area">
                        <img src="images/photos/map01.png" alt="image">
                    </div>
                    <p class="map-content">Discover vestibulum <span class="color-light">Call:</span>
                        <span>+88095085363</span>, ut interdum
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Global Section End -->

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
