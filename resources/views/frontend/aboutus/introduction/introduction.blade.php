@extends('frontend.main')
@section('title', 'Introduction')
@section('content')


      <!-- Global Section Start -->
      <section class="payment-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="global-area">
                        <div class="inner-title">
                            <div class="allblogs-heading">
                                @if(isset($introduction->aboutus_title))
                                    <h2 class="populartrektitle layout2">{{ $introduction->aboutus_title }}</h2>
                                    <div class="chooseus-box layout"></div>
                                @endif
                            </div>
                        </div>
                        @if(isset($introduction->aboutus_image))
                        <img class="aboutus-img" src="{{ $introduction->aboutus_image }}" alt="{{ $introduction->aboutus_title }}">
                        @endif
                        @if(isset($introduction->aboutus_description))
                        <p >{!! $introduction->aboutus_description !!}</p>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Global Section End -->
       <!-- Special Places Section Start -->
     @include('frontend.common.tour')
    <!-- Special Places Section End -->

 


@endsection
