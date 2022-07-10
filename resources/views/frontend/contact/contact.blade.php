@php 
$contactbanner=App\Models\PageBanner::orderBy('id','desc')->where('page_name','contactus')->first();
@endphp
@extends('frontend.main')
@section('title', 'Contact Us')
@section('content')
    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg" @if(!empty($contactbanner->page_banner))data-background="{{asset($contactbanner->page_banner)}}" @endif data-type="parallax" data-speed="3">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-12">
                        <h4>Contact</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Inner Section End -->

    <section class="contact-details pb-70 pt-140">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <h3 class="title">Contact <span>us</span></h3>
                        @include('frontend.common.commoncontact')
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6" >
                        <h3 class="title">Get in <span>Touch</span></h3>
                        <div class="d-flex" style="justify-content:space-around;flex-wrap:wrap">
                            <div class="service-item style-1 border-1px" style="width:256px">
                                <div class="service-icon">
                                    <i class="pe-7s-map"></i>
                                </div>
                                <div class="content">
                                    <h5>Address</h5>
                                    @if (isset($getcontact->address))
                                        <p>{{ $getcontact->address }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="service-item style-1 border-1px" style="width:256px">
                                <div class="service-icon">
                                    <i class="pe-7s-mail-open"></i>
                                </div>
                                <div class="content">
                                    <h5><a href="#">Email</a></h5>
                                    @if (isset($getcontact->email))
                                        <p><a href="Email:{{ $getcontact->email }}">{{ $getcontact->email }}</a> </p>
                                    @endif
                                </div>
                            </div>
                            <div class="service-item style-1 border-1px" style="width:256px">
                                <div class="service-icon">
                                    <i class="pe-7s-call"></i>
                                </div>
                                <div class="content">
                                    <h5><a href="#">Phone</a></h5>
                                    @if (isset($getcontact->phone))
                                        <p><a href="{{ $getcontact->phone }}">{{ $getcontact->phone }}</a> </p>
                                    @endif
                                </div>
                            </div>
                            <div class="service-item style-1 border-1px" style="width:256px">
                                <div class="service-icon">
                                    <i class="pe-7s-print"></i>
                                </div>
                                <div class="content">
                                    <h5><a href="#">Fax</a></h5>
                                    @if (isset($getcontact->fax))
                                        <p><a href="{{ $getcontact->fax }}">{{ $getcontact->fax }}</a> </p>
                                    @endif
                                </div>
                            </div>
                            <div class="service-item style-1 border-1px" style="width:256px">
                                <div class="service-icon">
                                    <i class="pe-7s-print"></i>
                                </div>
                                <div class="content">
                                    <h5><a href="#">GPO Box</a></h5>
                                    @if (isset($getcontact->gpo_box))
                                        <p><a href="{{ $getcontact->gpo_box }}">{{ $getcontact->gpo_box }}</a> </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if (isset($getcontact->map_url))
        <section class="p-0">
            <div class="map">
                <iframe src="{{ $getcontact->map_url }}" height="450" allowfullscreen=""></iframe>
            </div>
        </section>
    @endif
  
@endsection
