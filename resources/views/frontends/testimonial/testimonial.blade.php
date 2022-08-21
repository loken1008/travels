@extends('frontend.main')
@section('title', 'All Reviews')
@section('content')



    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg"
        @if (!empty($tourbanner->page_banner)) data-background="{{ asset($tourbanner->page_banner) }}" @endif
        data-type="parallax" data-speed="3">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-12">
                        <h4>All Reviews</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Inner Section End -->

     <!-- Testimonials Section Start -->
     <section class="testimonials-section bg-f9 pb-100">
        <div class="container">
            <h4 class="text-center mt-4 mb-4">Read All<span class="text-warning"> Review</span></h4>
            @foreach($gettestimonials as $testimonials)
            <div class="row">
                <div class="col-md-12">
                    <div >
                        <div class="item">
                            <div class="testimonials-col">
                                <div style="float: right;position: relative;top: -22px;left: -44px;">
                                    @if($testimonials->type=='tripadvisor')
                                    <img src="{{asset('tripadvisor.svg')}}" alt=""
                                    style="width:45px;height:45px;border-radius:50%" title="{{$testimonials->type}}">
                                    @elseif($testimonials->type=='google')
                                    <img src="{{asset('google.png')}}" alt=""
                                    style="width:45px;height:45px;border-radius:50%" title="{{$testimonials->type}}">
                                    @elseif($testimonials->type=='facebook')
                                    <img src="{{asset('facebook.svg')}}" alt=""
                                    style="width:45px;height:45px;border-radius:50%" title="{{$testimonials->type}}">
                                    @else
                                    <img src="{{asset('mg.png')}}" alt=""
                                    style="width:45px;height:45px;border-radius:50%" title="{{$testimonials->type}}">
                                    @endif
                                </div>
                                <div class="text">
                                    <div class="thumb d-flex" style="align-items: center">
                                        <img src="{{$testimonials->image}}" alt="{{$testimonials->name}}" style="width:60px;height:60px">

                                        <h4 class="ml-2">{{$testimonials->name}}</h4>
                                    </div>
                                    <div class="content">
                                        <h6>{{$testimonials->country}} | {{$testimonials->created_at->format('M d, Y')}}</h6>
                                        <h4 >{{$testimonials->message_title}}</h4>
                                        <ul>
                                            @for($i=0;$i<$testimonials->rating;$i++)
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            @endfor
                                        </ul>
                                    </div>
                                    <p>{{$testimonials->message_description}}</p>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-center">
                        {{ $gettestimonials->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials Section End -->
@endsection
