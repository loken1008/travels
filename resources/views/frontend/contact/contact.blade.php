@extends('frontend.main')
@section('title', 'Contact Us')
@section('content')
    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg" data-background="images/bg/px-1.jpg" data-type="parallax" data-speed="3">
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

    <section class="contact-details pb-70">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    {{-- <div class="col-12 col-sm-12 col-md-7 col-lg-7">
                        <h3 class="title">Contact <span>us</span></h3>
                        <form id="ajax-contact" method="post" action="http://heatmaponline.com/html/touran/php/contact.php">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" name="f_name" id="f_name" class="form-control" placeholder="First Name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="l_name" id="l_name" class="form-control" placeholder="Last Name" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Your Email"  required>
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="text" name="subject" class="form-control" placeholder="Subject" id="subject" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="contact-textarea">
                                        <textarea class="form-control" rows="6" placeholder="Wright Message" id="message" name="message" required></textarea>
                                        <button class="btn btn-theme mt-4" type="submit" value="Submit Form">Send Message</button>
                                    </div>
                                </div>
                                <div id="form-messages"></div>
                            </div>
                        </form>
                    </div> --}}
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12" >
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
