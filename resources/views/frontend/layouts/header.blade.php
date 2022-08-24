<div class=" mountainguide-block2 layout">
    <nav class=" navbar navbar-expand-lg mountainguide-block3 layout">
        <div class="container ">
            <button class="navbar-toggler collapsed collapsebtn" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbar-content">
                <i class="fa fa-bars text-white"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbar-content">
                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside">Trekking</a>
                        <ul class="container-fluid dropdown-menu trekking-subcategory ">
                            <div class="row d-flex trek-flex">
                            @foreach ($category as $cat)
                            @if ($cat->category_type == 'trekking')
                            @foreach ($subcategory as $subcat)
                            @if($subcat->category_id == $cat->id)
                            <div class=" col-lg-3 col-sm-6">
                                <a href={{ route('tripdetails', $subcat->sub_category_slug) }} class="treksubcategory">{{ $subcat->sub_category_name }}</a> <span data-toggle="collapse"
                                            href="#collapseExample{{ $subcat->id }}" class="cursor-pointer"></span>

                                        @foreach ($subcat->tour as $tours)
                                            @if ($tours->status == '1')
                                                <div class="collapse show"
                                                    id="collapseExample{{ $subcat->id }}">
                                                    <a class="d-flex treksubsubcategory" href="{{ url('tourdetails', $tours->slug) }}">{{ $tours->tour_name }}</a>

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
                    @if($cat->category_type != 'trekking')
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
                                                    class="dropdown-item desktop-view " data-bs-toggle="dropdown1" aria-expanded="false" id="dropdownMenuButton2" >{{ $subcat->sub_category_name }}
                                                    @foreach ($subcat->tour->take(1) as $t)
                                                        @if ($subcat->id == $t->subcategory_id)
                                                            @if ($t->status == '1')
                                                                <i class="fa fas fa-angle-right mt-1"
                                                                    style="float:right"></i>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </a>
                                                <ul class="dropdown-menu  other-subsubcategory sdesktop-view" aria-labelledby="dropdownMenuButton2">
                                                    @foreach ($subcat->tour as $tour)
                                                    @if ($tour->status == 1)
                                                    <li><a class="dropdown-item " href="{{ url('tourdetails', $tour->slug) }}">{{ $tour->tour_name }}</a></li>
                                                    @endif
                                                    @endforeach
                                                  </ul>
                                                <!-- for mobile!-->
                                                <a href="#"
                                                    class=" dropdown-item mobile-view" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownMenuButton1">{{ $subcat->sub_category_name }}
                                                    @foreach ($subcat->tour->take(1) as $t)
                                                        @if ($subcat->id == $t->subcategory_id)
                                                            @if ($t->status == '1')
                                                                <i class="fa fas fa-angle-right mt-1"
                                                                    style="float:right"></i>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </a>
                                                {{-- <ul class="dropdown-menu mobile-view" aria-labelledby="dropdownMenuButton1">
                                                    @foreach ($subcat->tour as $tour)
                                                    @if ($tour->status == 1)
                                                    <li><a class="dropdown-item " href="{{ url('tourdetails', $tour->slug) }}">{{ $tour->tour_name }}</a></li>
                                                    @endif
                                                    @endforeach
                                                  </ul> --}}
                                            </div>
                                        @endif
                                    @endforeach

                                </div>
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
                        <li><a class="dropdown-item" href="{{ route('travelwithus') }}">Why Travels With Us</a></li>
                        <li><a class="dropdown-item" href="{{ route('paymentmethod') }}">Payment Method</a></li>
                        <li><a class="dropdown-item" href="{{ route('privacypolicy') }}">Privacy Policies</a></li>
                        <li><a class="dropdown-item" href="{{ route('termsconditions') }}">Terms and Condition</a></li>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- <nav class="navbar navbar-expand-lg">
        <div class="container">
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu" area-controls="menu" area-expanded="false" area-label="Toggle navigation">
                <i class="fa fa-bars text-white"></i>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav max-auto mb-lg-0">
                    <li class="nav-item">
                        <a href="" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">Multilevel</a>
                        <ul class="dropdown-menu shadow">
                            <li>
                                <a href="" class="dropdown-item">Gallery</a>
                            </li>
                            <li class="dropstart">
                                <a href="" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown">Submenu</a>
                                <ul class="dropdown-menu shadow">
                                    <li><a href="" class="dropdown-item">Level 1</a></li>
                                    <li><a href="" class="dropdown-item">Level 1</a></li>
                                    <li><a href="" class="dropdown-item">Level 1</a></li>
                                    <li class="dropend">
                                        <a href="" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">Lets Go inner</a>
                                    <ul class="dropdown-menu dropdown-submenu shadow">
                                        <li><a href="" class="dropdown-item">Level 1</a></li>
                                    <li><a href="" class="dropdown-item">Level 1</a></li>
                                    <li><a href="" class="dropdown-item">Level 1</a></li>
                                    </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav> --}}

    <div class="container-fluid mountainguide-block15 layout">
        <div class=" mountainguide-block16 layout">
            <div class="mountainguide-block16-item">
                @if (!empty($sitesetting->logo))
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <div class="mountainguide-image2 layout">
                            <img src="{{ $sitesetting->logo }}" alt="mountainguidelogo">
                        </div>
                    </a>
                @endif
            </div>
            <div class=" mountainguide-block16-item1">
                <div class="mountainguide-block17 layout">
                    <div class="mountainguide-block17-item">
                        <div class="mountainguide-block18 layout">
                            <div class="mountainguide-text-body1 layout">Contact us (Ram)</div>
                            <div class="mountainguide-block19 layout">
                                <div class="mountainguide-block19-item">
                                    <div class="mountainguide-block20 layout">
                                        <div class="mountainguide-block20-item">
                                            <div class="mountainguide-block21 layout">
                                                @if (!empty($sitesetting->google))
                                                    <a href="{{ $sitesetting->google }}">
                                                        <div class="mountainguide-image3 layout">
                                                            {{-- <i class="fa fa-whatsapp"></i> --}}
                                                        </div>
                                                    </a>
                                                @endif
                                                @if (!empty($sitesetting->google))
                                                    <a href="{{ $sitesetting->google }}">
                                                        <div class="mountainguide-image4 layout">
                                                            <i class="fa fa-whatsapp whatsapp"></i>
                                                        </div>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mountainguide-block20-spacer"></div>
                                        <div class="mountainguide-block20-item1">
                                            @if (!empty($sitesetting->linkedin))
                                                <a href="{{ $sitesetting->linkedin }}">
                                                    <div style="--src:url(/frontend/viber.png)"
                                                        class="mountainguide-block22 layout"></div>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mountainguide-block19-spacer"></div>
                                @if (!empty($getcontact->phone))
                                    <h5 class="mountainguide-highlights layout">{{ $getcontact->mobile }}</h5>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="mountainguide-block17-spacer"></div>
                    <div class="mountainguide-block17-item1 dropdown">
                        <div class="mountainguide-block23 layout ">
                            <a id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
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