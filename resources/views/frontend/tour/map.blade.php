@extends('frontend.main')
@section('title', "$gettourmap->tour_name")
@section('content')

    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg" @if(!empty($tourbanner->page_banner))data-background="{{asset($tourbanner->page_banner)}}" @endif data-type="parallax" data-speed="3">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-12">
                        <h4>{{ $gettourmap->tour_name }}</h4>
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
                        <h3 class="text-center">View Map</h3>
                       <iframe src="{{$gettourmap->map_url}}" width="100%" height="600" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Special Packages Section End -->

    <!-- Testimonials Section Start -->
     @include('frontend.common.testmonial')
    <!-- Testimonials Section End -->
    @include('frontend.common.tour')

@endsection
