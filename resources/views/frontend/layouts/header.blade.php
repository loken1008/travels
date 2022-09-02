
<div class=" mountainguide-block2 layout">
    <nav class="navbar navbar-expand-lg mountainguide-block3 layout">
        <div class="container nav-container-large">
            <button class="navbar-toggler collapsed " type="button" data-bs-toggle="collapse"
                data-bs-target="#navbar-content">
                <i class="fa fa-bars text-white"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbar-content">
                <ul class="navbar-nav mr-auto mb-2 mb-lg-0 navbar">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside">Trekking</a>
                        <ul class="container-fluid dropdown-menu trekking-subcategory ">
                            <div class="row d-flex trek-flex">
                                @foreach ($category as $cat)
                                    @if ($cat->category_type == 'trekking')
                                        @foreach ($subcategory as $subcat)
                                            @if ($subcat->category_id == $cat->id)
                                                <div class=" col-lg-3 col-sm-6">
                                                    <a href={{ route('tripdetails', $subcat->sub_category_slug) }}
                                                        class="treksubcategory">{{ $subcat->sub_category_name }}</a>
                                                    <span data-toggle="collapse"
                                                        href="#collapseExample{{ $subcat->id }}"
                                                        class="cursor-pointer"></span>

                                                    @foreach ($subcat->tour as $tours)
                                                        @if ($tours->status == '1')
                                                            <div class="collapse show"
                                                                id="collapseExample{{ $subcat->id }}">
                                                                <a class="d-flex treksubsubcategory"
                                                                    href="{{ url('tourdetails', $tours->slug) }}">{{ $tours->tour_name }}</a>

                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>
                        </ul>
                    </li>
                    @foreach ($category as $cat)
                        @if ($cat->category_type != 'trekking')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                    data-bs-auto-close="outside">{{ $cat->category_name }}</a>
                                <div class="dropdown-menu  other-subcategory left-1 ">
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
                                    @foreach ($subcategory as $subcat)
                                        @if ($subcat->category_id == $cat->id)
                                            <div class="dropdown sdt">
                                                <a href="{{ route('tripdetails', $subcat->sub_category_slug) }}"
                                                    class="dropdown-item desktop-view " data-bs-toggle="dropdown1"
                                                    aria-expanded="false"
                                                    id="dropdownMenuButton2">{{ $subcat->sub_category_name }}
                                                    @foreach ($subcat->tour->take(1) as $t)
                                                        @if ($subcat->id == $t->subcategory_id)
                                                                <i class="fa fas fa-angle-right mt-1"
                                                                    style="float:right"></i>
                                                        @endif
                                                    @endforeach
                                                </a>
                                                <ul class="dropdown-menu  other-subsubcategory sdesktop-view"
                                                    aria-labelledby="dropdownMenuButton2">
                                                    @foreach ($subcat->tour as $tour)
                                                        @if ($tour->status == 1)
                                                            <li><a class="dropdown-item "
                                                                    href="{{ url('tourdetails', $tour->slug) }}">{{ $tour->tour_name }}</a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                                <!-- for mobile!-->
                                                
                                                <div class="mobile-view">
                                                    <a class=""
                                                        href="{{ route('tripdetails', $subcat->sub_category_slug) }}">{{ $subcat->sub_category_name }}
                                                    </a>             
                                                </div>
                                                <div class="mobile-view1 dropdown-item " data-bs-toggle="dropdown"
                                                aria-expanded="false" id="dropdownMenuButton1">

                                                @foreach ($subcat->tour->take(1) as $t)
                                                    @if ($subcat->id == $t->subcategory_id)
                                                            <i class="fa fas fa-angle-right mt-1"
                                                                style="float:right"></i>
                                                    @endif
                                                @endforeach
                                            </div>
                                                {{-- <ul class="dropdown-menu  mobile-view"
                                                aria-labelledby="dropdownMenuButton2">
                                                @foreach ($subcat->tour as $tour)
                                                    @if ($tour->status == 1)
                                                        <li><a class="dropdown-item "
                                                                href="{{ url('tourdetails', $tour->slug) }}">{{ $tour->tour_name }}</a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul> --}}
                                            </div>
                                        @endif
                                    @endforeach
                            </li>
                        @endif
                    @endforeach
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('allblogs') }}">Blogs</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside">About Us</a>
                        <ul class="dropdown-menu about-subcategory">
                            <li><a class="dropdown-item" href="{{ route('introduction') }}">Introduction</a></li>
                            <li><a class="dropdown-item" href="{{ route('ourteam') }}">Our Team</a></li>
                            <li><a class="dropdown-item" href="{{ route('travelwithus') }}">Why Travels With Us</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('paymentmethod') }}">Payment Method</a></li>
                            <li><a class="dropdown-item" href="{{ route('privacypolicy') }}">Privacy Policies</a></li>
                            <li><a class="dropdown-item" href="{{ route('termsconditions') }}">Terms and Condition</a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mountainguide-block15 layout">
        <div class=" mountainguide-block16 layout">
            <div class="mountainguide-block16-item">
                @if (!empty($sitesetting->logo))
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <div class="mountainguide-image2 layout">
                            <img src="{{ $sitesetting->logo }}" alt="mountainguidelogo">
                        </div>
                    </a>
                @endif
                <div class="search">
                    <form role="search" class="search-box " method="post" action="{{ route('search') }}">
                        @csrf
                        <input type="text" class="form-control" name="search" placeholder="Search...">
                        <button class="search-icon"> <i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
            <div class=" mountainguide-block16-item1">
                <div class="mountainguide-block17 layout">
                    <div class="mountainguide-block17-item">
                        <div class="mountainguide-block18 layout">
                            <div class="mountainguide-text-body1 layout text-uppercase">Contact us @if(!empty($getcontact->name))({{$getcontact->name}})@endif
                               
                            </div>
                            <div class="mountainguide-block19 layout">
                                            @if (!empty($sitesetting->google))
                                                <a href="{{ $sitesetting->google }}">
                                                    <i class="fa fa-whatsapp whatsapp"></i>
                                                </a>
                                            @endif
                                            @if (!empty($sitesetting->linkedin))
                                                <a href="{{ $sitesetting->linkedin }}">

                                                    <i class="fa-brands fa-viber viber"></i>
                                                </a>
                                            @endif
                                @if (!empty($getcontact->phone))
                                    <a href="tel:{{ $getcontact->mobile }}" class="mountainguide-highlights layout">{{ $getcontact->mobile }}</a>
                                @endif
                            </div>
                        </div>
                            @if(!empty($getcontact->profile_image))
                            <img class="profile-image" src="{{ asset($getcontact->profile_image) }}" alt="profile">
                              @endif
                    </div>
                    <div class="mountainguide-block17-spacer"></div>
                    <div class="mountainguide-block17-item1 dropdown">
                        <div class="mountainguide-block23 layout ">
                            <a href="#" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <div style="--src:url(/assetss/06384088d7834281ad51b73c8b2cd9d5.png)"
                                    class="mountainguide-icon1 layout dropdown" data-toggle="dropdown"></div>
                            </a>
                            <ul class="dropdown-menu logindropdown" aria-labelledby="dropdownMenuLink">
                                @if (!empty(Auth()->guard('customer')->user()
                                ))
                                    <li class="dropdown-item"><a
                                            href="#">{{ Auth()->guard('customer')->user()->first_name }}</a>
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="{{ route('customer.dashboard') }}">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="{{ route('customer.logout') }}">Logout</a>
                                    </li>
                                @else
                                    <li><a class="dropdown-item" href="{{ route('customer.login') }}">Login</a></li>
                                    <li><a class="dropdown-item" href="{{ route('customer.register') }}">Register</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>