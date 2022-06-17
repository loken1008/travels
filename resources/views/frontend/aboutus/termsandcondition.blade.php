@extends('frontend.main')
@section('title', 'Terms and Condition')
@section('content')


    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg"  @if(!empty($terms->page_banner))data-background="{{asset($terms->page_banner)}}" @endif data-type="parallax" data-speed="3">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-12">
                        @if(isset($gettermsandcondition->title))
                        <h4>{{$gettermsandcondition->title}}</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Inner Section End -->

    <section class="blog-section over-layer-white pt-80 pb-30"  >
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="global-area">
                        <div class="inner-title">
                            @if(isset($gettermsandcondition->title))
                            <h2>{{$gettermsandcondition->title}}</h2>
                            <div class="sec-line"></div>
                            @endif
                          
                            
                        </div>
                        @if(isset($gettermsandcondition->description))
                        <p >{!! $gettermsandcondition->description !!}</p>
                        @endif
                        
                    </div>
                </div>
               
            </div>
        </div>
    </section>
    @include('frontend.common.tour')
@endsection
