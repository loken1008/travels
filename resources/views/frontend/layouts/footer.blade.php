@php
use App\Models\Affilated;
$affilated = Affilated::orderBy('id', 'desc')->get();
@endphp
<footer id="footer">
    <div class="footer-newsletter">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 newsletter-flex">
                    <h4 class="newsletter-title text-center">Suscribe To Our Newsletter</h4>
                    <p class="newsletter-para text-center">Subscribe to our news letter and we’ll keep you up to date on
                        our products and services.</p>
                    <form action="" method="post">
                        <input class="newsletter-input" type="email" name="email">
                        <button class="news-btn"><i class="fa fa-arrow-right nlicon"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-top mt-6">
        <div class="container footer-top-container">
            <div class="footer-first-section">
                <div class="footer-logo">
                    @if (!empty($sitesetting->footerlogo))
                        <img src="{{ $sitesetting->footerlogo }}" alt="mountainguidelogo">
                    @else
                        <img src="{{ asset('frontend/logo.png') }}" alt="mountainguidelogo">
                    @endif

                </div>
                <ul class="d-flex mt-5">
                    @if (!empty($sitesetting->facebook))
                        <li><a href="{{ $sitesetting->facebook }}"><i class="fa fa-facebook fa-icon"></i></a></li>
                    @endif
                    @if (!empty($sitesetting->twitter))
                        <li><a href="{{ $sitesetting->twitter }}"><i class="fa fa-twitter fa-icon"></i></a></li>
                    @endif
                    @if (!empty($sitesetting->instagram))
                        <li><a href="{{ $sitesetting->instagram }}"><i class="fa fa-instagram fa-icon"></i></a></li>
                    @endif
                    @if (!empty($sitesetting->pinterest))
                        <li><a href="{{ $sitesetting->pinterest }}"><i class="fa fa-pinterest fa-icon"></i></a></li>
                    @endif
                    @if (!empty($sitesetting->youtube))
                        <li><a href="{{ $sitesetting->youtube }}"><i class="fa fa-youtube fa-icon"></i></a></li>
                    @endif
                </ul>
            </div>
            <div class="row footer-second">

                <div class="col-lg-4 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <div class="line"></div>

                    <li><a href="{{ route('travelwithus') }}">Why Travels With Us</a></li>
                    <li><a href="{{ route('paymentmethod') }}">Payment Method</a></li>
                    <li><a href="{{ route('termsconditions') }}"">Terms and Conditions</a></li>
                    <li><a href="{{ route('privacypolicy') }}"">Privacy Policies</a></li>
                    <li><a href="{{ route('customer.register') }}">Sign up </a></li>
                    <li><a href="{{ route('customer.login') }}">Log in account</a></li>

                </div>
                <div class="col-lg-4 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <div class="line"></div>

                    <li><a href="{{ route('introduction') }}">About Us</a></li>
                    <li><a href="{{ route('ourteam') }}">Team</a></li>
                    <li><a href="{{ route('allgallery') }}">Gallery</a></li>
                    <li><a href="{{ route('allblogs') }}">Blogs</a></li>
                    <li><a href="{{ route('all.reviews') }}">Read Reviews</a></li>
                    <li><a href="{{ route('contactus') }}">Contact</a></li>

                </div>
                <div class="col-lg-4 col-md-6 footer-contact">
                    <h4>Contact Us</h4>
                    <div class="line"></div>
                    @if (!empty($getcontact->phone))
                        <li><i class="pe-7s-call"></i> <a
                                href="tel:{{ $getcontact->phone }}">{{ $getcontact->phone }}</a></li>
                    @endif
                    @if (!empty($getcontact->fax))
                        <li><i class="pe-7s-print"></i> <a
                                href="tel:{{ $getcontact->fax }}">{{ $getcontact->fax }}</a></li>
                    @endif
                    @if (!empty($getcontact->email))
                        <li><i class="pe-7s-mail"></i> <a
                                href="mailto:{{ $getcontact->email }}">{{ $getcontact->email }}</a>
                        </li>
                    @endif
                </div>
            </div>
            <div class="row mt-4 footer-last ml-0 mr-0 mb-4">
                <div class="col-lg-6 col-md-12 footer-copyright m-0">
                    <p>© {{ Carbon\Carbon::now()->format('Y') }}, All Rights Reserved, Design & Developed By: <a
                            href="https://www.dristicode.com/" target="__blank" class="text-decoration-none text-white">
                            Dristicode Solutions Pvt. Ltd</a></p>
                </div>
                <div class="col-lg-6 col-md-12 footer-associated">
                    <div class="associated-with">
                        <h4 class="associatedtitle"> We are Associated With </h4>

                        <div class="d-flex associated-image">
                            @foreach ($affilated as $affilate)
                                @if ($affilate->type == 'affilated-member')
                                    <img src="{{ $affilate->image }}" alt="associated">
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="pay-accepted">
                        <h4 class="paytitle">We Accept For Pay</h4>

                        <div class="d-flex pay-image">
                            @foreach ($affilated as $affilate)
                                @if ($affilate->type == 'pay-method')
                                    <img src="{{ $affilate->image }}" alt="pay">
                                @endif
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</footer>
