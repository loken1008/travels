@extends('frontend.main')
@section('title', 'Search Tour')
@section('content')



    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg"
        @if (!empty($tourbanner->page_banner)) data-background="{{ asset($tourbanner->page_banner) }}" @endif data-type="parallax"
        data-speed="3">
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
                        <div class="item" style="width:340px; margin-left:10px">
                            <div class="special-packages">
                                <div class="thumb">
                                    <a href="{{ route('tourdetails', $tourdetails->slug) }}">
                                        <img src="{{ $tourdetails->mainImage }}" alt="{{ $tourdetails->img_alt }}"
                                            style="height:253px !important"></a>

                                    <div class="post-title-box">
                                        <div class="price-box">
                                            @if ($getcoupon)
                                                <h5 class="text-danger">
                                                    <strike><span>$</span>{{ $tourdetails->main_price }}</strike>
                                                </h5>
                                                <h5><span>$</span>{{ $tourdetails->main_price - ($getcoupon->discount_amount / 100) * $tourdetails->main_price }}
                                                </h5>
                                            @else
                                                <h5><span>$</span>{{ $tourdetails->main_price }}</h5>
                                            @endif
                                        </div>
                                        <div class="title-box">
                                            {{-- <h4>{{ $tourdetails->tourdetails_name }}</h4> --}}
                                            <h3>{{ $tourdetails->country->country_name }}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="content" style="height:200px">
                                    <ul class="info">
                                        <li><a href="#"><i class="fa fa-calendar"></i>{{ $tourdetails->tour_days }}
                                                Days</a></li>
                                        <li><a href="{{ route('tourmap', $tourdetails->slug) }}"><i
                                                    class="fa fa-map-marker"></i>View on Map</a></li>


                                    </ul>
                                    {{-- <p>{!! Str::words($tour->description,30).'.' !!}</p> --}}
                                    <h6 class="text-center" style="color:#F5A13A;font-size:18px">
                                        {{ $tourdetails->tour_name }}</h6>
                                    <a class="btn-theme" style="float:left !important;margin-top:42px"
                                        href="{{ route('booking', $tourdetails->slug) }}">Book
                                        Now</a>
                                    <a class="btn-theme" style="margin-top:42px"
                                        href="{{ route('tourdetails', $tourdetails->slug) }}">View
                                        Details</a>
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
