@extends('frontend.main')
@section('title', 'Mountain Guide Trekking')
@section('content')



    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg" @if(!empty($tourbanner->page_banner))data-background="{{asset($tourbanner->page_banner)}}" @endif data-type="parallax" data-speed="3">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-12">
                        <h4>@if(!empty($getsubcat->sub_category_name)){{$getsubcat->sub_category_name}}@endif</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Inner Section End -->

    <!-- Special Packages Section Start -->
    <section class="special-packages-sec pt-85 pb-60">
       
        <div class="container">
            <div class="row grid-mb" style="justify-content: space-around;">
                @if(count($getTourdetails)>0)
               @forelse($getTourdetails as $tourdetails)
               <div class="item" style="width:340px">
                <div class="special-places">
                    <div class="thumb">
                        <img src="{{ $tourdetails->mainImage }}" alt="{{$tourdetails->img_alt}}"
                            style="width:340px !important;height:215px !important">
                    </div>
                    <div class="content">
                        <div class="price-box">
                            {{-- <h5><span>$</span>{{ $tourdetails->main_price }}</h5> --}}
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
                            <h4>{{ $tourdetails->tour_name }}</h4>
                            <h3>{{ $tourdetails->country->country_name }}</h3>
                        </div>
                        <ul class="info">
                            <li><a href="#"><i
                                        class="fa fa-calendar"></i>{{ $tourdetails->tour_days }}
                                    Days</a></li>
                            {{-- <li><a href="#"><i class="fa fa-user"></i>{{$tour->}} Person</a></li> --}}
                            <li><a
                                    href="{{ route('tourmap', $tourdetails->slug) }}"><i
                                        class="fa fa-map-marker"></i>View on Map</a>
                            </li>
                           

                        </ul>
                        <p>{!! Str::limit($tourdetails->description, 200, '.') !!}</p>
                        <a class="btn-theme" style="float:left !important"
                            href="{{ route('booking', $tourdetails->slug) }}">Book
                            Now</a>
                        <a class="btn-theme"
                            href="{{ route('tourdetails', $tourdetails->slug) }}">View
                            Details</a>
                    </div>
                </div>
            </div>
              @empty 
              <span>Not found</span>
              @endforelse
              @endif
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-center">
                             {{$getTourdetails->links()}}
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Special Packages Section End -->

@endsection
