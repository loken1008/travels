@extends('frontend.main')
@section('title', 'Details')
@section('content')



    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg" data-background="images/bg/px-1.jpg" data-type="parallax" data-speed="3">
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
            <div class="row grid-mb">
                @if(count($getTourdetails)>0)
               @forelse($getTourdetails as $tourdetails)
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="special-packages">
                        <div class="thumb">
                            <img src="{{$tourdetails->mainImage}}" alt="" style="width:350px;height:200px">
                            <div class="offer-price"> Off 40%</div>
                            <div class="post-title-box">
                                <div class="price-box">
                                    <h5><span>$</span>{{$tourdetails->main_price}}</h5>
                                    <h6>Starts From</h6>
                                </div>
                                <div class="title-box">
                                    <h4>{{$tourdetails->tour_name}}</h4>
                                    <h3>{{$tourdetails->place->place_name}}, {{$tourdetails->country->country_name}}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <ul class="info">
                                <li><a href="#"><i class="fa fa-calendar"></i>{{$tourdetails->tour_days}} Days</a></li>
                                {{-- <li><a href="#"><i class="fa fa-user"></i>2 Person</a></li>
                                <li><a href="#"><i class="fa fa-map-marker"></i>View on Map</a></li> --}}
                            </ul>
                            <p>{!!Str::limit($tourdetails->description,150)!!}</p>
                            <div class="small-hotel">
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
                            </div>
                            <h5 class="share-btn"><i class="fa fa-share-alt"></i> Share</h5>
                            <a class="btn-theme" href="{{route('tourdetails',$tourdetails->tour_name)}}">View Details</a>
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
