@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp

<header class="header header-style-1 clearfix">

    <div class="top-bar" style="background-color:white">
        <div class="container">
            <div class="row">
                <div class="col-md-2 d-flex">


                    <div class="contact-info">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            @if (!empty($sitesetting->logo))
                                <img id="logo_img" src="{{ $sitesetting->logo }}" alt="" style="height:100px">
                            @endif
                        </a>
                    </div>

                </div>
                <div class="col-md-5" style="display: flex;
                align-items: center;">
                    <div class="social-icons">
                        <ul>
                            @if (!empty($sitesetting))
                                <li><a href="{{ $sitesetting->twitter }}"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{ $sitesetting->instagram }}"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="{{ $sitesetting->facebook }}"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{ $sitesetting->youtube }}"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="{{ $sitesetting->pinterest }}"><i class="fa fa-pinterest"></i></a></li>
                            @endif
                        </ul>


                    </div>
                    <!-- header dropdown buttons -->
                    <div class="dropdown-buttons">
                        <div class="btn-group menu-search-box">
                            {{-- <button type="button" class="btn dropdown-toggle" id="header-drop-3" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i></button> --}}
                            {{-- <ul class="dropdown-menu-right dropdown-animation"
                                aria-labelledby="header-drop-3">
                                <button type="button" class="btn dropdown-toggle" id="header-drop-3" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i></button><li> --}}
                            <form role="search" class="search-box " method="post" action="{{ route('search') }}">
                                @csrf
                                <div class="form-group d-flex">
                                    <input type="text" class="form-control search-input-box" placeholder="Search"
                                        name="search">
                                    <button type="submit"> <i class="fa fa-search form-control-feedback"></i></button>
                                </div>
                            </form>
                            {{-- </li>
                            </ul> --}}
                        </div>

                    </div>
                    <!-- main-menu end -->
                </div>

                <div class="col-md-5"
                    style="display: flex;
                justify-content: space-between;
                align-items: center;">
                    <span
                        class="font-weight-bold text-dark">{{ Carbon\Carbon::now('Asia/Kathmandu')->format('Y-M-d | h:i:s A') }}</span>
                    <div class="social-icons">

                        <ul>
                            <a href="{{ route('contactus') }}" class="text-dark font-weight-bold">Contact Us |</a>

                            @if (!empty(
                                Auth()->guard('customer')->user()
                            ))
                                <li class="nav-item dropdown">
                                    <div class="d-flex">

                                        <a href="#" class="nav-link dropdown-toggle mb-2" data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false">{{ Auth()->guard('customer')->user()->first_name }}</a>
                                    </div>

                                    <div class="dropdown-menu left-1">
                                        <div class="dropdown">
                                            <a class="dropdown-item text-dark"
                                                href="{{ route('customer.dashboard') }}">Dashboard</a>
                                            <a class="dropdown-item text-dark"
                                                href="{{ route('customer.logout') }}">Logout</a>
                                        </div>
                                    </div>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('customer.login') }}" class="text-dark font-weight-bold">Login
                                        |</a>

                                    <a href="{{ route('customer.register') }}"
                                        class="text-dark font-weight-bold">Register</a>
                            @endif
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="menu-style menu-style-1 bg-transparent clearfix">
        <!-- main-navigation start -->
        <div class="main-navigation main-mega-menu animated"
            style="background:linear-gradient(to top, #0E4D94 38%, #0E4D94 98%);">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container">
                    <!-- header dropdown buttons end-->

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbar-collapse-1" aria-controls="navbar-collapse-1" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>


                    <div class="collapse navbar-collapse" id="navbar-collapse-1">

                        <!-- main-menu -->
                        <ul class="navbar-nav ml-xl-auto">

                            <!-- mega-menu end -->
                            <li class="nav-item dropdown">
                                <a href="{{ url('/') }}" class="nav-link " aria-haspopup="true"
                                    aria-expanded="false">Home</a>
                            </li>
                            @foreach ($category as $cat)
                                <li class="nav-item dropdown">
                                    <a href="{{ route('tripdetails', $cat->category_slug) }}"
                                        class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">{{ $cat->category_name }}</a>

                                    <div class="dropdown-menu left-1 ">
                                        @foreach ($cat->tour as $tours)
                                            @if ($tours->status == '1')
                                                @if ($tours->subcategory_id == null)
                                                    <div class="dropdown">
                                                        <a class="dropdown-item"
                                                            href="{{ url('tourdetails', $tours->slug) }}">{{ $tours->tour_name }}</a>
                                                    </div>
                                                @endif
                                            @endif
                                        @endforeach
                                        @foreach ($cat->subcategory as $subcat)
                                            @if ($subcat->category_id == $cat->id)
                                                <div class="dropdown">

                                                    <a href="{{ route('tripdetails', $subcat->sub_category_slug) }}"
                                                        class=" dropdown-item">{{ $subcat->sub_category_name }}
                                                        @foreach ($subcat->tour->take(1) as $t)
                                                            @if ($subcat->id == $t->subcategory_id)
                                                                @if ($t->status == '1')
                                                                    <i class="fa fas fa-angle-right mt-1"
                                                                        style="float:right"></i>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </a>

                                                    <div class="dropdown-menu ">
                                                        @foreach ($subcat->tour as $tour)
                                                            @if ($tour->status == 1)
                                                                <a class="dropdown-item di-menu"
                                                                    href="{{ url('tourdetails', $tour->slug) }}">{{ $tour->tour_name }}</a>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach

                                    </div>
                                </li>
                            @endforeach
                            <!-- mega-menu start -->



                            <li class="nav-item dropdown">
                                <a href="{{ route('allblogs') }}" class="nav-link "
                                    aria-expanded="false">Blogs</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">About</a>

                                <div class="dropdown-menu left-1">
                                    <div class="dropdown">
                                        <a class="dropdown-item"
                                            href="{{ route('introduction') }}">Introduction</a>
                                        <a class="dropdown-item" href="{{ route('ourteam') }}">Our Team</a>
                                        <a class="dropdown-item" href="{{ route('travelwithus') }}">Why Travels
                                            With
                                            Us</a>
                                        <a class="dropdown-item" href="{{ route('paymentmethod') }}">Payment
                                            Method</a>
                                        <a class="dropdown-item" href="{{ route('privacypolicy') }}">Privacy
                                            Policies</a>
                                        <a class="dropdown-item" href="{{ route('termsconditions') }}">Terms and
                                            Condition</a>


                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <!-- main-navigation end -->
    </div>

</header>
