@extends('frontend.main')
@section('title', "$getTourdetails->tour_name ")
@section('meta_title', $getTourdetails->meta_title)
@section('meta_keywords', $getTourdetails->meta_keywords)
@section('meta_description', $getTourdetails->meta_description)
@section('content')

    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg"
        @if (!empty($tourbanner->page_banner)) data-background="{{ asset($tourbanner->page_banner) }}" @endif data-type="parallax"
        data-speed="3">
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
    <section class="special-packages-sec pt-85 pb-0">
        <div class="container">
            <div class="row grid-mb">
                <div class="col-md-9">
                    <div class="special-packages dtl-st">
                        <div class="thumb">
                            <img src="{{ $getTourdetails->mainImage }}" alt="{{ $getTourdetails->img_alt }}"
                                style="height:420px">

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
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="content">


                            <p>{!! $getTourdetails->description !!}</p>
                            {{-- {{dd($getTourdetails->cost_include)}} --}}
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="tab-style">
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">

                                                @if ($getTourdetails->itinerary->count() > 0)
                                                    <a class="nav-item nav-link " id="plc-asia-tab" data-toggle="tab"
                                                        href="#plc-asia" role="tab" aria-controls="plc-asia"
                                                        aria-selected="true">Itinaries</a>
                                                @endif
                                                @if ($getTourdetails->cost_include == 'null' || $getTourdetails->cost_exclude == '')
                                                @else
                                                    <a class="nav-item nav-link " id="plc-asia-tab" data-toggle="tab"
                                                        href="#costie" role="tab" aria-controls="plc-asia"
                                                        aria-selected="true">Cost Details</a>
                                                @endif
                                                @if ($getTourdetails->equipment->count() > 0)
                                                    <a class="nav-item nav-link " id="plc-asia-tab" data-toggle="tab"
                                                        href="#equipment" role="tab" aria-controls="plc-asia"
                                                        aria-selected="true">Equipment</a>
                                                @endif
                                                @if ($getTourdetails->dateprice->count() > 0)
                                                    <a class="nav-item nav-link " id="plc-asia-tab" data-toggle="tab"
                                                        href="#dateprice" role="tab" aria-controls="plc-asia"
                                                        aria-selected="true">Date & Price</a>
                                                @endif
                                                @if ($getTourdetails->images->count() > 0)
                                                    <a class="nav-item nav-link " id="plc-asia-tab" data-toggle="tab"
                                                        href="#relatedimages" role="tab" aria-controls="plc-asia"
                                                        aria-selected="true">Photos</a>
                                                @endif
                                                @if ($getTourdetails->map_url != null)
                                                    <a class="nav-item nav-link" id="plc-asia-tab" data-toggle="tab"
                                                        href="#tmap" role="tab" aria-controls="plc-asia"
                                                        aria-selected="true">Map</a>
                                                @endif
                                                @if ($getTourdetails->fqa->count() > 0)
                                                    <a class="nav-item nav-link " id="plc-asia-tab" data-toggle="tab"
                                                        href="#fqa" role="tab" aria-controls="plc-asia"
                                                        aria-selected="true">FQA</a>
                                                @endif
                                            </div>
                                        </nav>
                                        <div class="tab-content" id="nav-tabContent">
                                            <!-- item start -->
                                            <div class="tab-pane fade show active" id="plc-asia" role="tabpanel"
                                                aria-labelledby="plc-asia-tab">
                                                <div class="item" style="padding-right: 20px;">
                                                    @foreach ($getTourdetails->itinerary as $itin)
                                                        @if ($itin->day_title == !null)
                                                            <a href="#" data-toggle="collapse"
                                                                data-target="#collapseExample1{{ $itin->id }}"
                                                                aria-expanded="false" aria-controls="collapseExample"
                                                                style="justify-content:space-between;background:rgb(180, 213, 245);padding:10px;margin-top:4px"
                                                                class="d-flex">

                                                                <h6 class="font-weight-bold">{{ $itin->day_title }}
                                                                </h6><span><i class="fa fa-plus"></i></span>

                                                            </a>
                                                        @endif
                                                        <div class="collapse" id="collapseExample1{{ $itin->id }}"
                                                            style="padding:10px 10px 0 10px !important">
                                                            {!! $itin->long_description !!}
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <!-- item end -->
                                            <!-- item start -->
                                            <div class="tab-pane fade show " id="costie" role="tabpanel"
                                                aria-labelledby="costie-tab">
                                                @if ($getTourdetails->cost_include == 'null' || $getTourdetails->cost_exclude == '')
                                                @else
                                                    <div class="item" style="padding-right: 20px;" style="">
                                                        <a href="#" data-toggle="collapse"
                                                            data-target="#collapseExamplecost{{ $getTourdetails->id }}"
                                                            aria-expanded="false" aria-controls="collapseExamplecost"
                                                            style="justify-content:space-between;background:rgb(180, 213, 245);padding:10px;margin-top:4px"
                                                            class="d-flex">
                                                            <h6 class="font-weight-bold">Cost Include
                                                            </h6><span><i class="fa fa-plus"></i></span>
                                                        </a>

                                                        <div class="collapse costincludeexclude cii"
                                                            id="collapseExamplecost{{ $getTourdetails->id }}"
                                                            style="padding-left:10px;padding-top:10px !important">

                                                            {!! $getTourdetails->cost_include !!}
                                                        </div>
                                                        <a href="#" data-toggle="collapse"
                                                            data-target="#collapseExampleexcludecost{{ $getTourdetails->id }}"
                                                            aria-expanded="false"
                                                            aria-controls="collapseExampleexcludecost"
                                                            style="justify-content:space-between;background:rgb(180, 213, 245);padding:10px;margin-top:4px"
                                                            class="d-flex">
                                                            <h6 class="font-weight-bold">Cost Exclude
                                                            </h6><span><i class="fa fa-plus"></i></span>
                                                        </a>

                                                        <div class="collapse costincludeexclude cee"
                                                            id="collapseExampleexcludecost{{ $getTourdetails->id }}"
                                                            style="padding-left:24px;padding-top:10px !important">

                                                            {!! $getTourdetails->cost_exclude !!}
                                                        </div>



                                                    </div>
                                                @endif
                                            </div>
                                            <!-- item end -->

                                            <!-- item start -->
                                            <div class="tab-pane fade show " id="equipment" role="tabpanel"
                                                aria-labelledby="equipment-tab">
                                                @foreach ($getTourdetails->equipment as $equipment)
                                                    <div class="item" style="padding-right: 20px;">
                                                        @if ($equipment->equipment_name == !null)
                                                            <a href="#" data-toggle="collapse"
                                                                data-target="#collapseExample2{{ $equipment->id }}"
                                                                aria-expanded="false" aria-controls="collapseExample"
                                                                style="justify-content:space-between;background:rgb(180, 213, 245);padding:10px;margin-top:4px"
                                                                class="d-flex">

                                                                <h6 class="font-weight-bold">
                                                                    {{ $equipment->equipment_name }}
                                                                </h6><span><i class="fa fa-plus"></i></span>

                                                            </a>
                                                        @endif
                                                        <div class="collapse equipment-collaspe"
                                                            id="collapseExample2{{ $equipment->id }}"
                                                            style="padding:10px 10px 0 22px !important">
                                                            {!! $equipment->equipment_description !!}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <!-- item end -->
                                            <!-- item start -->
                                            <div class="tab-pane fade show " id="dateprice" role="tabpanel"
                                                aria-labelledby="dateprice-tab">

                                                <div class="item" style="padding-right: 20px;">

                                                    <table class="table">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th scope="col">Start Date</th>
                                                                <th scope="col">End Date</th>
                                                                <th scope="col">Seats Available</th>
                                                                <th scope="col">Price</th>
                                                                <th scope="col">Book</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($getTourdetails->dateprice as $dateprice)
                                                                @if ($dateprice->start_date == !null)
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
                                                                                href="{{ route('booking', $getTourdetails->slug) }}">Book
                                                                                Now</a>
                                                                        </td>
                                                                    </tr>
                                                                @endif
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
                                                    <div class="row gallery-items" style="padding: 0px 16px;">
                                                        @forelse($getTourdetails->images as $image)
                                                            @php
                                                                $imagess = explode(',', $image->images);
                                                                
                                                            @endphp
                                                            @foreach ($imagess as $images)
                                                                @if ($images == !null)
                                                                    <div class="col-sm-4 col-grid">
                                                                        <div class="gallery-item">
                                                                            <div class="thumb">
                                                                                <img src="{{ $images }}"
                                                                                    alt="{{ $getTourdetails->img_alt }}"
                                                                                    style="height: 200px;">
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
                                                                @endif
                                                            @endforeach
                                                        @empty
                                                            <p>No Image</p>
                                                        @endforelse

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- item end -->

                                            <!-- item start -->
                                            <div class="tab-pane fade show showmap" id="tmap" role="tabpanel"
                                                aria-labelledby="map-tab">

                                                <div class="item" style="padding-right: 20px;">
                                                    <div class="special-places">
                                                        @if ($getTourdetails->map_url == !null)
                                                            <div id="map_canvas"
                                                                style="height:400px; width:100%; display:inline-block; overflow:hidden;">

                                                                <iframe src="{{ $getTourdetails->map_url }}"
                                                                    width="100%" height="600" frameborder="0"
                                                                    style="position:relative; top:-70px; border:none;"></iframe>

                                                            </div>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- item end -->

                                            <!-- item start -->
                                            <div class="tab-pane fade show " id="fqa" role="tabpanel"
                                                aria-labelledby="fqa-tab">

                                                <div class="item" style="padding-right: 20px;">
                                                    @foreach ($getTourdetails->fqa as $fqas)
                                                        @if ($fqas->question == !null)
                                                            <a href="#" class="d-flex"
                                                                style="justify-content:space-between;background:rgb(180, 213, 245);padding:10px;margin-top:4px"
                                                                data-toggle="collapse"
                                                                data-target="#collapseExample{{ $fqas->id }}"
                                                                aria-expanded="false" aria-controls="collapseExample">
                                                                <h6 class="font-weight-bold">{{ $fqas->question }}</h6>
                                                                <span><i class="fa fa-plus"></i></span>
                                                            </a>
                                                        @endif
                                                        <div class="collapse" id="collapseExample{{ $fqas->id }}"
                                                            style="padding:10px 10px 0 10px !important">

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
                            <div class="d-flex mt-5">
                                <h6 class="share-btn text-dark"> Share: </h6>

                                <div class="sharethis-inline-share-buttons"></div>

                            </div>

                            <a class="btn-theme mt-4" href="{{ route('booking', $getTourdetails->slug) }}">Book
                                Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="information">
                        <h4>Basic Information</h4>
                        <hr>
                        <ul class="info">
                            <li><i class="fa fa-calendar"></i><span>Days</span>:
                                {{ $getTourdetails->tour_days }}
                            </li>
                            <li><i class="fa fa-arrows-v"></i><span>Altituade</span>:
                                {{ $getTourdetails->altitude }}

                            </li>

                            <li><i class="fa fa-umbrella"></i><span>Accomodation</span>:
                                {{ $getTourdetails->accomodation }}
                            </li>
                            <li><i class="fa fa-plane"></i><span>Transport</span>:
                                {{ $getTourdetails->transport }}

                            </li>


                        </ul>
                    </div>
                    @if(!empty($getTourdetails->trip_map))
                    <div class="tripmap mt-4">
                        <h4 class="px-4 py-2">Trip Route</h4>
                        <hr>
                        <img src="{{$getTourdetails->trip_map}}" alt="{{$getTourdetails->img_alt}}" style="height:230px">
                    </div>
                    @endif
                    <div class="query-button mt-4">
                        <a class="btn-book cbutton" href="{{ route('booking', $getTourdetails->slug) }}">Book This
                            Trip</a>
                        <a href="{{ route('online.book') }}" class="animated-button1 ml-1 mt-2 cbutton">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            Make Your Own Trip Now
                        </a>

                    </div>
                    <div class="qi mt-4">
                        <h4>Quick Inquery </h4>
                        <hr>
                        @include('frontend.common.commoncontact')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Special Packages Section End -->

    <!-- Special Places Section Start -->
    @if($getTour->count()>0)
    <section class="special-places-sec pt-0 pb-10">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h2>Related <span>Tour</span> Places</h2>
                </div>
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
                                            <div class="title-box">
                                                {{-- <h4>{{ $tour->tour_name }}</h4> --}}
                                                <h3>{{ $tour->country->country_name }}
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content" style="height:200px">
                                        <ul class="info">
                                            <li><a href="#"><i class="fa fa-calendar"></i>{{ $tour->tour_days }}
                                                    Days</a></li>
                                            <li><a href="{{ route('tourmap', $tour->slug) }}"><i
                                                        class="fa fa-map-marker"></i>View on Map</a></li>


                                        </ul>
                                        {{-- <p>{!! Str::words($tour->description,30).'.' !!}</p> --}}
                                        <h6 class="text-center" style="color:#F5A13A;font-size:18px">
                                            {{ $tour->tour_name }}</h6>
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
    <!-- Blog Section Start -->

@if($getTourdetails->blog->count()>0)
    <section class="blog-section over-layer-white bg-f8 pt-10 pb-10">
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
                                <img alt="{{ $blog->img_alt }}" src="{{ $blog->blog_image }}" style="height:260px">
                                <div class="content">
                                    <h3>{{ $blog->blog_title }}</h3>
                                    <div class="meta-box">
                                        <div class="admin-post"> {{ $blog->author_name }} </div>
                                        <div class="inner">
                                            <div class="date">
                                                <i class="fa fa-calendar-plus-o"></i>
                                                {{ $blog->created_at->format('M d') }}
                                            </div>
                                            @php
                                                $getcomment = App\Models\Comment::where('blog_id', $blog->id)->count();
                                            @endphp
                                            <div class="comment">
                                                <i class="fa fa-commenting-o"></i> {{ $getcomment }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('blogsdetails', $blog->slug) }}" class="read-btn">Continue
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
    @endif
    <!-- Blog Section End -->
    <!-- Testimonials Section Start -->
    @include('frontend.common.testmonial')
    <!-- Testimonials Section End -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $('[data-toggle="tab"]').click('shown.bs.collapse', function() {
            var googleIframe = $('#map_canvas iframe');
            googleIframe.attr('src', googleIframe.attr('src') + '');
        });
    </script>
@endsection
