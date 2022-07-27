@extends('frontend.main')
@section('title', 'Search Tour')
@section('content')



    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg"
        @if (!empty($tourbanner->page_banner)) data-background="{{ asset($tourbanner->page_banner) }}" @endif
        data-type="parallax" data-speed="3">
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
                                            style="height:185px !important"></a>

                                   
                                </div>
                                <div class="content" >
                                    <h3 style="color:black;font-size:16px;font-weight:bold">
                                        {{ $tourdetails->tour_name }}</h3>
                                        <p>{{Str::limit($tourdetails->short_description,80,'.')}}</p>
                                    <ul class="info">
                                        <li><i class="fa fa-calendar mr-2"></i>{{ $tourdetails->tour_days }}
                                                Days
                                            </li>
                                        <li>  
                                            @if ($getcoupon)
                                            <p>
                                                <strike  class="text-danger"><span>$ </span>{{ $tourdetails->main_price }}</strike> <span>$ </span>{{ $tourdetails->main_price - ($getcoupon->discount_amount / 100) * $tourdetails->main_price }}
                                            </p>
                                          
                                        @else
                                            <p><span>$ </span>{{ $tourdetails->main_price }}</p>
                                        @endif
                                    </li>
                                       
    
                                    </ul>
                                    <a class="btn-theme" style="float:left !important;"
                                        href="{{ route('booking', $tourdetails->slug) }}">Book
                                        Now</a>
                                    <a class="btn-theme" style=""
                                        href="{{ route('tourdetails', $tourdetails->slug) }}">View
                                        Details</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center ">Your Search Tour Not found! Try Another.</p>
                    @endforelse
                @else
                    <h4 style="text-align:center!important;">OOPS! Your Search Tour Not found! Try Another.
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