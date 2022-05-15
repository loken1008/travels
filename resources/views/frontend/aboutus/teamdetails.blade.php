@extends('frontend.main')
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
            <div class="row contact-bg">
                <div class="col-md-12 col-lg-4 p-0">
                    <div class="contact-text">
                        <h2>Details</span></h2>
                        <div class="sec-line mb-20"></div>
                        <img src="{{$getteamdetails->image}}" alt="" style="width:100%">
                        <div class="contact-info">
                           
                            <h6 style="width:100%!important">Name: {{$getteamdetails->name}}</h6>
                        </div>
                        <div class="contact-info">
                          
                            <h6 style="width:100%!important">Expert: {{$getteamdetails->post}}</h6>
                        </div>
                        <div class="contact-info">
                           
                            <h6 style="width:100%!important">Language: {{$getteamdetails->language}}</h6>
                        </div>
                        <div class="contact-info">
                           
                            <h6 style="width:100%!important">Experiences: {{$getteamdetails->experiences}}</h6>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-12 col-lg-8 style-2">
                        <div class="tab-content" id="nav-tabContent" style="    text-align: justify;
                        padding: 27px;">
                         {!!$getteamdetails->description!!}
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
                                    <img src="{{$tour->mainImage}}" alt="" style="width:350px;height:215px">
                                </div>
                                <div class="content">
                                    <div class="price-box">
                                        <h5><span>$</span>{{$tour->main_price}}</h5>
                                        {{-- <h6>Starts From</h6> --}}
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
                                    <p>{!!Str::limit($tour->description,100)!!}</p>
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

  

 

@endsection
