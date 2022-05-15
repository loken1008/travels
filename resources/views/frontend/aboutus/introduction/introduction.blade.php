@extends('frontend.main')
@section('title', 'Introduction')
@section('content')


    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg" data-background="images/bg/px-1.jpg" data-type="parallax" data-speed="3">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-12">
                        <h4>Introduction </h4>
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
                        <div class="details-thumb">
                            @if(isset($getintroduction->image))
                            <img src="{{ $introduction->aboutus_image }}" alt="" style="width:825px;height:390px">
                            @endif
                        </div>
                        <div class="details-content mb-40">
                            @if(isset($getintroduction->title))
                            <h4>{{ $introduction->aboutus_title }}</h4>
                            @endif
                            @if(isset($getintroduction->description))
                            <p class="mb-20" style="text-align:justify!important">{!! $introduction->aboutus_description !!}</p>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

 


@endsection
