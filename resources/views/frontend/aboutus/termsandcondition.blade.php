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
                <div class="col-xl-8 col-lg-12">
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
                <div class="col-md-4 col-lg-3">
                    <div class="theme-sidebar">

                        <div class="widget search-sidebar">
                        <div class="title-box">
                            
                        @foreach($getcategory as $categorys)
                        <div class="widget">
                            <div class="title-box mt-4">
                                <h3>{{$categorys->category_name}}</h3>
                            </div>
                          
                            <div class="cat-item">
                                <ul>
                                    @foreach($categorys->tour->take(6) as $tours)
                                    @if($tours->status == '1')
                                    <li><a href="{{ route('tourdetails', Str::slug($tours->tour_name)) }}">{{$tours->tour_name}}</a></li>
                                    @endif
                                   @endforeach
                                </ul>
                            </div>
                        </div>
                       @endforeach
                    </div>
                    @if($getblogs->count() > 0)
                            <div class="widget d-flex" style="flex-direction:column">
                                <div class="title-box">
                                    <h3>Recent <span>Blogs</span></h3>
                                </div>
        
                                @foreach ($getblogs->take(3) as $getblog)
                                    <div class="blog-small-item ">
                                        <img src="{{ $getblog->blog_image }}" style="width:68px;height:68px" alt="">
                                        <div class="tex">
                                            <h5><a
                                                    href="{{ route('blogsdetails', Str::slug($getblog->blog_title)) }}">{{ $getblog->blog_title }}</a>
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
    {{-- @include('frontend.common.tour') --}}
@endsection
