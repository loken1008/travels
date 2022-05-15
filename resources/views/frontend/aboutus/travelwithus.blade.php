@extends('frontend.main')
@section('title', 'Travel With Us')
@section('content')


    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg" data-background="images/bg/px-1.jpg" data-type="parallax" data-speed="3">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-12">
                        <h4>Why Travels With Us? </h4>
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
                    @foreach($getchooseus as $chooseus)
                    <div class="blog-details">
                        <div class="details-thumb">
                            <img src="{{ $chooseus->image }}" alt="" style="width:825px;height:390px">
                        </div>
                        <div class="details-content mb-40">
                            <h4>{{ $chooseus->title }}</h4>
                            <p class="mb-20" style="text-align:justify!important">{!! $chooseus->description !!}</p>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

@endsection
