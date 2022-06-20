@extends('frontend.main')
@section('title', 'HotelDetails')
@section('content')


    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg" data-background="images/bg/px-1.jpg" data-type="parallax" data-speed="3">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-12">
                        <h4>{{ $gethotelview->hotel_name }}</h4>
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
                            <img src="{{ $gethotelview->image }}" style="height:420px" alt="">
                          
                            <div class="post-title-box">
                               
                                <div class="title-box">
                                    <h4>{{ $gethotelview->hotel_name }} </h4>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <h4>{{$gethotelview->hotel_address}}, {{$gethotelview->hotel_phone}}</h4>
                            <p style="color:black !important;text-align:justify">{!! $gethotelview->hotel_description !!}</p>
                            <iframe src="{{$gethotelview->map_link}}" width="100%" height="500" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Special Packages Section End -->

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

  
@endsection
