@extends('frontend.main')
@section('title', 'Travel With Us')
@section('content')


    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg"  @if(!empty($chooseus->page_banner))data-background="{{asset($chooseus->page_banner)}}" @endif data-type="parallax" data-speed="3">
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

    <section class="shop-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    @foreach($getchooseus as $chooseus)
                    @if ($loop->iteration % 2 !== 0)
                    <div class="shop-single">
                        <div class="row " >
                            <div class="col-lg-12" style="margin-top:40px">
                                <div class="thumb" style="float:left;margin-right:20px">
                                    <img src="{{ $chooseus->image }}" alt="{{ $chooseus->title }}" style="float:left;height:310px">
                                </div>
                                <div class="content large-content">
                                    <div class="inner-title">
                                        <h2 style="font-size:18px">{{ $chooseus->title }}</h2>
                                      
                                        <div class="sec-line"></div>
                                    </div>
                                 
                                    <div class="visible-content" style="text-align: justify">
                                        <p class="mb-25"  style="text-align: justify"> {!! Str::limit($chooseus->description, 500, '') !!}</p>
                                    </div>
                                    <div class="invisible-content"><p>{!! $chooseus->description !!}</p></div>
                                    <button class="aboutbtn btn-theme more-less">Read More</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="shop-single">
                        <div class="row mt-5">
                            <div class="col-lg-12" style="margin-top:40px">
                               
                                <div class="thumb" style="float:right;margin-left:20px">
                                    <img src="{{ $chooseus->image }}" alt="{{ $chooseus->title }}" style="height:310px">
                                </div>
                                <div class="content large-content">
                                    <div class="inner-title">
                                        <h2 style="font-size:18px">{{ $chooseus->title }}</h2>
                                      
                                        <div class="sec-line"></div>
                                    </div>
                                    <div class="visible-content" style="text-align: justify">
                                        <p class="mb-25"  style="text-align: justify"> {!! Str::limit($chooseus->description, 500, '') !!}</p>
                                    </div>
                                    <div class="invisible-content"><p>{!! $chooseus->description !!}</p></div>
                                    <button class="aboutbtn btn-theme more-less">Read More</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                   @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @include('frontend.common.tour')
@endsection
