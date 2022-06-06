@extends('frontend.main')
@section('title', 'Search Tour')
@section('content')



    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg" data-background="images/bg/px-1.jpg" data-type="parallax" data-speed="3">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-12">
                        <h4>Search Tour Page</h4>
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
                @if (count($searchtour) > 0)
                    @forelse($searchtour as $tourdetails)
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="special-packages">
                                <div class="thumb">
                                    <img src="{{ $tourdetails->mainImage }}" alt="" style="width:350px;height:200px">

                                    <div class="post-title-box">
                                        <div class="price-box">
                                            @if ($getcoupon)
                                                <h5 class="text-danger">
                                                    <strike><span>$</span>{{ $tourdetails->main_price }}</strike></h5>
                                                <h5><span>$</span>{{ $tourdetails->main_price - ($getcoupon->discount_amount / 100) * $tourdetails->main_price }}
                                                </h5>
                                            @else
                                                <h5><span>$</span>{{ $tourdetails->main_price }}</h5>
                                            @endif
                                            {{-- <h6>Starts From</h6> --}}
                                        </div>
                                        <div class="title-box">
                                            <h4>{{ $tourdetails->tour_name }}</h4>
                                            <h3>{{ $tourdetails->place->place_name }},
                                                {{ $tourdetails->country->country_name }}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="content">
                                    <ul class="info">
                                        <li><a href="#"><i class="fa fa-calendar"></i>{{ $tourdetails->tour_days }} Days</a>
                                        </li>
                                        {{-- <li><a href="#"><i class="fa fa-user"></i>2 Person</a></li> --}}
                                        <li><a href="{{ route('tourmap', Str::slug($tourdetails->tour_name)) }}"><i
                                                    class="fa fa-map-marker"></i>View on Map</a></li>
                                                    <li>

                                                        {!! Share::page(url('/tour-search' . $tourdetails->tour_name))->facebook()->twitter()->whatsapp()->pinterest() !!} </li>

                                                    </li>
                                    </ul>
                                    <p>{!! Str::limit($tourdetails->description, 150, '.') !!}</p>
                                    {{-- <div class="small-hotel">
                                <div class="text">
                                    <h6>Hotels to Stay</h6>
                                    <h5>Saladi Hasan</h5>
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
                                    <img src="images/features/sm1.jpg" alt="">
                                    <img src="images/features/sm2.jpg" alt="">
                                </div>
                            </div> --}}
                                    <a class="btn-theme" style="float:left !important"
                                        href="{{ route('booking', Str::slug($tourdetails->tour_name)) }}">Booking Now</a>
                                    <a class="btn-theme"
                                        href="{{ route('tourdetails', Str::slug($tourdetails->tour_name)) }}">View Details</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>Your Search Tour Not found! Try Another.</p>
                    @endforelse
                @else
                    <h4 style="text-align:center!important">Your Search Tour Not found! Try Another.
                    </h4>
                @endif
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-center">
                        {{ $searchtour->links() }}
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Special Packages Section End -->
@endsection
