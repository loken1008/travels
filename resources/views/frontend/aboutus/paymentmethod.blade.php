@extends('frontend.main')
@section('title', 'Payment Method')
@section('content')


    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg" data-background="images/bg/px-1.jpg" data-type="parallax" data-speed="3">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-12">
                        @if(isset($getpaymentmethod->title))
                        <h4>{{$getpaymentmethod->title}}</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Inner Section End -->

    <!-- Blog Section Start -->
    <section class="blog-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="blog-details">
                       
                        <div class="details-content mb-40">
                            @if(isset($getpaymentmethod->description))
                            <p class="mb-20" style="text-align:justify!important">{!! $getpaymentmethod->description !!}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

@endsection
