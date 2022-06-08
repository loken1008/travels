@extends('frontend.main')
<style>
    .read-more-show {
        cursor: pointer;
        color: #ed8323;
    }

    .read-more-hide {
        cursor: pointer;
        color: #ed8323;
    }

    .hide_content {
        display: none;
    }
</style>
@section('title', 'Team Details')
@section('content')


    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg" data-background="images/bg/px-1.jpg" data-type="parallax" data-speed="3">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-12">
                        <h4>Our Team</h4>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Inner Section End -->

    <!-- Contact Section Start -->
    <section class="contact-section pt-90 pb-20">
        <div class="container">
            <h2 class="text-dark">Our Experienced and Skilled Team</span></h2>
            @foreach ($getteamdetails as $teamdetails)
                @if ($loop->iteration % 2 !== 0)
                    <div class="row ">
                        <div class="col-md-12 col-lg-4 p-0">
                            <div class="">

                                <div class="sec-line mb-20"></div>
                                <img class="mt-1" src="{{ $teamdetails->image }}" alt="{{ $teamdetails->name }}"
                                    style="width:100%;height:300px;padding-top:11px">

                            </div>
                        </div>
                        <div class="col-md-12 col-lg-8 style-2 mt-3">
                            <div class="ml-4 mt-4">
                                <h5 class="font-weight-bold" style="width:100%!important">{{ $teamdetails->name }}</h5>
                                <h6 class="font-weight-bold pt-2" style="width:100%!important"> {{ $teamdetails->post }}
                                </h6>
                                <h6 class="font-weight-bold pt-2" style="width:100%!important">Language:
                                    {{ $teamdetails->language }}</h6>
                                <h6 class="font-weight-bold pt-2" style="width:100%!important">Experiences:
                                    {{ $teamdetails->experiences }} </h6>
                            </div>
                            <div class="tab-content" id="nav-tabContent" style="    text-align: justify;
                            padding: 27px;">


                                {!! Str::limit($teamdetails->description, 500, '') !!}
                                @if (strlen($teamdetails->description) > 500)
                                    <span id="dots{{ $teamdetails->id }}">...</span>
                                    <span id="more{{ $teamdetails->id }}"
                                        style="display:  none;">{!! substr($teamdetails->description, 500) !!}</span>
                                @endif

                                <button class="btn-theme" onclick="myFunction({{ $teamdetails->id }})" id="myBtn">Read
                                    more</button>

                            </div>
                        </div>
                    </div>
                @else
                    <div class="row ">
                        <div class="col-md-12 col-lg-8 style-2 mt-3">
                            <div class="ml-4 mt-4">
                                <h5 class="font-weight-bold" style="width:100%!important">{{ $teamdetails->name }}</h5>
                                <h6 class="font-weight-bold pt-2" style="width:100%!important"> {{ $teamdetails->post }}
                                </h6>
                                <h6 class="font-weight-bold pt-2" style="width:100%!important">Language:
                                    {{ $teamdetails->language }}</h6>
                                <h6 class="font-weight-bold pt-2" style="width:100%!important">Experiences:
                                    {{ $teamdetails->experiences }} </h6>
                            </div>
                            <div class="tab-content" id="nav-tabContent" style="text-align: justify;
                            padding: 27px;">

                                {!! Str::limit($teamdetails->description, 500, '') !!}
                                @if (strlen($teamdetails->description) > 500)
                                    <span id="dots{{ $teamdetails->id }}">...</span>
                                    <span id="more{{ $teamdetails->id }}"
                                        style="display:  none;">{!! substr($teamdetails->description, 500) !!}</span>
                                @endif

                                <button class="btn-theme" onclick="myFunction({{ $teamdetails->id }})" id="myBtn">Read
                                    more</button>
                            </div>

                        </div>
                        <div class="col-md-12 col-lg-4 p-0">
                            <div class="">

                                <div class="sec-line mb-20"></div>
                                <img class="mt-1" src="{{ $teamdetails->image }}" alt="{{ $teamdetails->name }}"
                                    style="width:100%;height:300px;padding-top:11px">

                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-center">
                        {{ $getteamdetails->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

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
                                        <img src="{{ $tour->mainImage }}" alt="" style="width:350px;height:215px">
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
                                            <li><a href="#"><i class="fa fa-calendar"></i>{{ $tour->tour_days }} Days</a>
                                            </li>
                                            <li><a href="{{ route('tourmap', Str::slug($tour->tour_name)) }}"><i
                                                        class="fa fa-map-marker"></i>View on Map</a></li>

                                        </ul>
                                        <p>{!! Str::limit($tour->description, 100) !!}</p>
                                        <a class="btn-theme" style="float:left !important"
                                            href="{{ route('booking', Str::slug($tour->tour_name)) }}">Booking Now</a>
                                        <a class="btn-theme"
                                            href="{{ route('tourdetails', Str::slug($tour->tour_name)) }}">View Details</a>
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

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script type="text/javascript">
        function myFunction(id) {
            var dots = document.getElementById("dots" + id);
            var moreText = document.getElementById("more" + id);
            var btnText = document.getElementById("myBtn");

            if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnText.innerHTML = "Read more";
                moreText.style.display = "none";
            } else {
                dots.style.display = "none";
                btnText.innerHTML = "Read less";
                moreText.style.display = "inline";
            }
        }
    </script>


@endsection
