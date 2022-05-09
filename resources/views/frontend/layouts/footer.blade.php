<footer class="bg-faded pt-70 pb-40 bg-theme-color-2">
    <div class="container">
        <div class="section-content">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-item footer-widget-one">
                        <img class="footer-logo mb-25" src="images/logo-1.png" alt="">
                        <p>Dolorum quae quis cumque officia labore delectus at animi ducimus non nisi, dolores sapiente
                        </p>
                        <hr>
                        <h6>Follow<span> Us</span></h6>
                        <ul class="social-icon bg-transparent bordered-theme">
                            @if($sitesetting)
                            <li><a href="{{$sitesetting->twitter}}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="{{$sitesetting->instagram}}"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="{{$sitesetting->facebook}}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="{{$sitesetting->youtube}}"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                            <li><a href="{{$sitesetting->pinterest}}"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-item">
                        <div class="footer-title">
                            <h4>Our <span>Services</span></h4>
                            <div class="border-style-3"></div>
                        </div>
                        <ul class="footer-list">
                            <li><a href="#">Sign up to theme</a></li>
                            <li><a href="#">Log in account</a></li>
                            <li><a href="#">Help and support</a></li>
                            <li><a href="#">Read our blog</a></li>
                            <li><a href="#">Visit our help section</a></li>
                            <li><a href="#">Donation Fund</a></li>
                        </ul>

                    </div>
                </div>


                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-item">
                        <div class="footer-title">
                            <h4>Usefull <span>Links</span></h4>
                            <div class="border-style-3"></div>
                        </div>
                        <ul class="footer-list">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">Gallery</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>

                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-item">
                        <div class="footer-title">
                            <h4>Quick <span>Contact</span></h4>
                            <div class="border-style-3"></div>
                        </div>
                        <ul class="footer-list footer-contact mb-10">
                            <li><i class="pe-7s-call"></i> Phone: 001 (407) 901-6400</li>
                            <li><i class="pe-7s-print"></i> Fax: 001 (407) 901-6400</li>
                            <li><i class="pe-7s-mail"></i> <a href="mailto:">Email: info@bdCoder.com</a></li>
                        </ul>
                        <div class="footer-item">
                            <h6>News <span>letter</span></h6>
                            @if (\Session::has('success'))
                                <div class="alert alert-success">
                                    <p>{{ \Session::get('success') }}</p>
                                </div><br />
                            @endif
                            @if (\Session::has('failure'))
                                <div class="alert alert-danger">
                                    <p>{{ \Session::get('failure') }}</p>
                                </div><br />
                            @endif
                            <form method="post" action="{{url('newsletter')}}">
                              @csrf
                                <div class="input-group subscribe-style-two">
                                    <input type="email" class="form-control input-subscribe" placeholder="Email" name="email">
                                  
                                    <span class="input-group-btn">
                                        <button class="btn btn-subscribe" type="submit">Subscribe</button>
                                    </span>
                                    
                                </div>
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<section class="footer-copy-right bg-theme-color-2 text-white p-0">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <p>© 2019, All Rights Reserved, Design & Developed By:<a href="#"> Tours</a></p>
            </div>
        </div>
    </div>
</section>
