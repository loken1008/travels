@php 
$contactbanner=App\Models\PageBanner::orderBy('id','desc')->where('page_name','contactus')->first();
@endphp
@extends('frontend.main')
@section('title', 'Contact Us')
@section('content')
   
    <section class="contact-details">
        <div class="container">
            <div class="section-content">
                <div class="row contact-row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <h3 class="title">Contact us</h3>
                        <div class="chooseus-box layout"></div>
                        @include('frontend.common.commoncontact')
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6" >
                        <h3 class="title">Get in Touch</h3>
                        <div class="chooseus-box layout"></div>
                        <div class="d-flex get-in-touch" style="justify-content:space-around;flex-wrap:wrap">
                            <div class="col-md-6 col-sm-12 contact-icon">
                                <i class="fa-solid fa-address-card"></i>
                                <div class="content">
                                    <h5>Address</h5>
                                    @if (isset($getcontact->address))
                                       {{ $getcontact->address }}
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12 contact-icon">
                                <i class="fa-solid fa-envelope"></i>
                                <div class="content">
                                    <h5>Email</h5>
                                    @if (isset($getcontact->email))
                                       <a class="text-decoration-none" href="Email:{{ $getcontact->email }}">{{ $getcontact->email }}</a> 
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 contact-icon">
                                <i class="fa-solid fa-phone"></i>
                                <div class="content">
                                    <h5>Phone</h5>
                                    @if (isset($getcontact->phone))
                                       <a class="text-decoration-none" href="{{ $getcontact->phone }}">{{ $getcontact->phone }}</a> 
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 contact-icon">
                                <i class="fa-solid fa-fax"></i>
                                <div class="content">
                                    <h5>Fax</h5>
                                    @if (isset($getcontact->fax))
                                       <a class="text-decoration-none" href="{{ $getcontact->fax }}">{{ $getcontact->fax }}</a> 
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 contact-icon">
                                <i class="fa-solid fa-paper-plane"></i>
                                <div class="content">
                                    <h5>GPO Box</h5>
                                    @if (isset($getcontact->gpo_box))
                                       <a class="text-decoration-none" href="{{ $getcontact->gpo_box }}">{{ $getcontact->gpo_box }}</a> 
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
                <iframe src="{{ $getcontact->map_url }}" height="450" width="100%" allowfullscreen=""></iframe>
            </div>
        </section>
    @endif
  
@endsection
