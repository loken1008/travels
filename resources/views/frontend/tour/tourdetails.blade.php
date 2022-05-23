@extends('frontend.main')
@section('title', "$getTourdetails->tour_name ")
@section('content')

    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg" data-background="images/bg/px-1.jpg" data-type="parallax" data-speed="3">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-12">
                        <h4>{{ $getTourdetails->category->category_name }}</h4>
                        <h5 style="color:white">{{ $getTourdetails->tour_name }}</h5>
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

                            <div class="post-title-box">
                                <div class="price-box">
                                    @if ($getcoupon)
                                        <h5 class="text-danger">
                                            <strike><span>$</span>{{ $getTourdetails->main_price }}</strike>
                                        </h5>
                                        <h5><span>$</span>{{ $getTourdetails->main_price - ($getcoupon->discount_amount / 100) * $getTourdetails->main_price }}
                                        </h5>
                                    @else
                                        <h5><span>$</span>{{ $getTourdetails->main_price }}</h5>
                                    @endif
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
                                                <a class="nav-item nav-link " id="plc-asia-tab" data-toggle="tab"
                                                    href="#map" role="tab" aria-controls="plc-asia"
                                                    aria-selected="true">Map</a>
                                                <a class="nav-item nav-link " id="plc-asia-tab" data-toggle="tab"
                                                    href="#fqa" role="tab" aria-controls="plc-asia"
                                                    aria-selected="true">FQA</a>


                                            </div>
                                        </nav>
                                        <div class="tab-content" id="nav-tabContent">
                                            <!-- item start -->
                                            <div class="tab-pane fade show active" id="plc-asia" role="tabpanel"
                                                aria-labelledby="plc-asia-tab">
                                                <div class="item">
                                                    @foreach ($getTourdetails->itinerary as $itin)
                                                        <a href="#" data-toggle="collapse"
                                                            data-target="#collapseExample1{{ $itin->id }}"
                                                            aria-expanded="false" aria-controls="collapseExample"
                                                            style="justify-content:space-between;background:rgb(180, 213, 245);padding:25px;margin-top:4px"
                                                            class="d-flex">
                                                            <h5 class="font-weight-bold">{{ $itin->day_title }}
                                                            </h5><span><i class="fa fa-plus"></i></span>
                                                        </a>
                                                        <div class="collapse"
                                                            id="collapseExample1{{ $itin->id }}"
                                                            style="color:black !important;padding-top:10px !important">
                                                            {!! $itin->long_description !!}
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <!-- item end -->
                                            <!-- item start -->
                                            <div class="tab-pane fade show " id="costie" role="tabpanel"
                                                aria-labelledby="costie-tab">
                                                <div class="item"
                                                    style="color:black !important;padding-left:30px;padding-top:10px !important">
                                                    {!! $getTourdetails->cost_include !!}
                                                    {!! $getTourdetails->cost_exclude !!}

                                                </div>
                                            </div>
                                            <!-- item end -->

                                            <!-- item start -->
                                            <div class="tab-pane fade show " id="equipment" role="tabpanel"
                                                aria-labelledby="equipment-tab">
                                                @foreach ($getTourdetails->equipment as $equipment)
                                                    <div class="item">
                                                        <a href="#" data-toggle="collapse"
                                                            data-target="#collapseExample2{{ $equipment->id }}"
                                                            aria-expanded="false" aria-controls="collapseExample"
                                                            style="justify-content:space-between;background:rgb(180, 213, 245);padding:25px;margin-top:4px"
                                                            class="d-flex">
                                                            <h5 class="font-weight-bold">{{ $equipment->equipment_name }}
                                                            </h5><span><i class="fa fa-plus"></i></span>
                                                        </a>
                                                        <div class="collapse"
                                                            id="collapseExample2{{ $equipment->id }}"
                                                            style="color:black !important;padding-left:30px;padding-top:10px !important">

                                                            {!! $equipment->equipment_description !!}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <!-- item end -->
                                            <!-- item start -->
                                            <div class="tab-pane fade show " id="dateprice" role="tabpanel"
                                                aria-labelledby="dateprice-tab">

                                                <div class="item" style="color:black">

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
                                                                    <td>{{ $dateprice->start_date }}</td>
                                                                    <td>{{ $dateprice->end_date }}</td>
                                                                    <td>{{ $dateprice->seats_available }}</td>
                                                                    <td>{{ $dateprice->price }}</td>
                                                                    <td> <a style="background-color: #255669;
                                                                                            border: 2px solid #255669;
                                                                                            border-radius: 50px;
                                                                                            color: #fff;
                                                                                            display: inline-block;
                                                                                            /* float: right; */
                                                                                            font-weight: 600;
                                                                                            padding: 7px 18px;
                                                                                            vertical-align: top;"
                                                                            href="{{ route('booking', $getTourdetails->tour_name) }}">Booking
                                                                            Now</a>
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

                                            <!-- item start -->
                                            <div class="tab-pane fade show " id="map" role="tabpanel"
                                                aria-labelledby="map-tab">

                                                <div class="item">
                                                    <div class="special-places">
                                                        <div class="content">

                                                            <iframe src="{{ $getTourdetails->map_url }}" width="100%"
                                                                height="600" frameborder="0"></iframe>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- item end -->

                                            <!-- item start -->
                                            <div class="tab-pane fade show " id="fqa" role="tabpanel"
                                                aria-labelledby="fqa-tab">

                                                <div class="item">
                                                    @foreach ($getTourdetails->fqa as $fqas)
                                                        <a href="#" class="d-flex"
                                                            style="justify-content:space-between;background:rgb(180, 213, 245);padding:25px;margin-top:4px"
                                                            data-toggle="collapse"
                                                            data-target="#collapseExample{{ $fqas->id }}"
                                                            aria-expanded="false" aria-controls="collapseExample">
                                                            <h5 class="font-weight-bold">{{ $fqas->question }}</h5>
                                                            <span><i class="fa fa-plus"></i></span>
                                                        </a>
                                                        <div class="collapse" id="collapseExample{{ $fqas->id }}"
                                                            style="color:black !important;padding-top:10px !important">

                                                            {!! $fqas->answer !!}
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <!-- item end -->
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Latest Hotel Section Start -->
                            <section class="latest-hotel-sec pt-85 pb-80">
                                <div class="container">
                                    <div class="row">
                                        <div class="section-title">
                                            <h2>Latest <span>Hotel</span> Collection</h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="latesthotel_carousel owl-carousel owl-theme owl-navst">
                                                @forelse ($gethotel as $hotel)
                                                    <div class="item">
                                                        <div class="latest-hotel">
                                                            <div class="thumb">
                                                                <img src="{{ $hotel->image }}" alt=""
                                                                    style="height:358px !important">
                                                            </div>
                                                            <div class="content">
                                                                <h4>{{ $hotel->hotel_name }}</h4>
                                                                <h5>{{ $hotel->hotel_address }}</h5>

                                                                <p>{!! Str::limit($hotel->hotel_description, 200) !!}</p>
                                                                <a class="map-viw"
                                                                    href="{{ route('hotelviewdetails', $hotel->hotel_name) }}"><i
                                                                        class="fa fa-eye"></i>View Details</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <p class="text-center">No Hotel Found</p>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Latest Hotel Section End -->
                            <div class="d-flex">
                                <h6 class="share-btn text-dark"> Share: </h6>
                                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                <div class="addthis_inline_share_toolbox_mi34"></div>
                            </div>

                            <a class="btn-theme" href="{{ route('booking', $getTourdetails->tour_name) }}">Booking
                                Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Special Packages Section End -->
    <!-- Blog Section Start -->
    <section class="blog-section over-layer-white bg-f8 pt-30 pb-30">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h2>Related blog</h2>
                </div>
            </div>
            <div class="row">
                @forelse($getTourdetails->blog as $blog)
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-post">
                            <div class="thumb">
                                <img alt="" src="{{ $blog->blog_image }}" style="width:348px;height:442px">
                                <div class="content">
                                    <h3>{{ $blog->blog_title }}</h3>
                                    <div class="meta-box">
                                        <div class="admin-post"> {{ $blog->author_name }} </div>
                                        <div class="inner">
                                            <div class="date">
                                                <i class="fa fa-calendar-plus-o"></i>
                                                {{ $blog->created_at->format('M d') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('blogsdetails', $blog->blog_title) }}" class="read-btn">Continue
                                Reading
                                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

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

    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6263cd5c209019ea"></script>

@endsection
