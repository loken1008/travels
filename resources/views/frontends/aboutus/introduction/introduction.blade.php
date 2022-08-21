@extends('frontend.main')
@section('title', 'Introduction')
@section('content')


    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg"  @if(!empty($intropagebanner->page_banner))data-background="{{asset($intropagebanner->page_banner)}}" @endif data-type="parallax" data-speed="3">
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


      <!-- Global Section Start -->
      <section class="global-section over-layer-white pt-80 pb-0"  @if(!empty($intropagebanner->page_banner))data-background="{{asset($intropagebanner->page_banner)}}" @endif>
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-12">
                    <div class="global-area">
                        <div class="inner-title">
                            @if(isset($introduction->aboutus_title))
                            <h2>{{ $introduction->aboutus_title }}</h2>
                            <div class="sec-line"></div>
                            @endif
                          
                            
                        </div>
                        @if(isset($introduction->aboutus_description))
                        <p >{!! $introduction->aboutus_description !!}</p>
                        @endif
                        
                    </div>
                </div>
                <div class="col-xl-5 col-lg-8 col-md-10">
                    <div class="map-area">
                        @if(isset($introduction->aboutus_image))
                        <img src="{{ $introduction->aboutus_image }}" alt="{{ $introduction->aboutus_title }}" style="height:350px" >
                        @endif
                    </div>
                    @if($getblogs->count() > 0)
                    <div class="widget d-flex mt-6" style="flex-direction:column">
                        <div class="title-box">
                            <h3>Recent <span>Blogs</span></h3>
                        </div>

                        @foreach ($getblogs as $getblog)
                            <div class="blog-small-item mt-4 mb-0" style="display:flex;flex-direction:column">
                             
                                <a 
                                href="{{ route('blogsdetails', $getblog->slug) }}">  <img src="{{ $getblog->blog_image }}" style="width:500px;height:200px" alt="{{ $getblog->blog_title }}"></a>
                              
                                <div class="tex pl-0">
                                    <h5 style="line-height: inherit;"><a 
                                            href="{{ route('blogsdetails', $getblog->slug) }}">{{ $getblog->blog_title }}</a>
                                    </h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Global Section End -->
       <!-- Special Places Section Start -->
     @include('frontend.common.tour')
    <!-- Special Places Section End -->

 


@endsection
