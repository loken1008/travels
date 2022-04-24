@php
$prefix=Request::route()->getPrefix();
$route=Route::current()->getName();
@endphp

<header class="header header-style-1 clearfix">

    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="contact-info">
                        <ul>
                            <li>
                                <i class="flaticon-flash"></i> 
                                829, Hasan street melbourne, Australia.
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="social-icons">
                        <ul>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="menu-style menu-style-1 bg-transparent clearfix">
        <!-- main-navigation start -->
        <div class="main-navigation main-mega-menu animated">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container">
                    <!-- header dropdown buttons end-->
                    <a class="navbar-brand" href="{{url('/')}}">
                        <img id="logo_img" src="{{asset('frontend/images/logo-1.png')}}" alt=""></a> 
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-1" aria-controls="navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    

                    <div class="collapse navbar-collapse" id="navbar-collapse-1">

                        <!-- main-menu -->
                        <ul class="navbar-nav ml-xl-auto">

                            <!-- mega-menu end -->
                            <li class="nav-item dropdown {{($route=='home')?'active':''}}">
                                <a href="{{url('/')}}" class="nav-link "
                                    aria-haspopup="true" aria-expanded="false">Home</a>
                            </li>
                           
                            <!-- mega-menu start -->
                            <!-- mega-menu end -->
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Places</a>

                                <div class="dropdown-menu left-1">
                                    <div class="dropdown">
                                        @foreach($country as $c)
                                        <a class="dropdown-item" href="{{route('countrydetails',$c->country_name)}}">{{$c->country_name}}</a>
                                       @endforeach
                                    </div>
                                </div>
                            </li>
                            <!-- mega-menu start -->
                              <!-- mega-menu end -->
                              @foreach($category as $cat)
                              <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$cat->category_name}}</a>

                                <div class="dropdown-menu left-1">
                                    <div class="dropdown">
                                        @foreach($cat->subcategory as $subcat)
                                        <a class="dropdown-item" href="{{route('tripdetails',$subcat->sub_category_slug)}}">{{$subcat->sub_category_name}}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            <!-- mega-menu start -->


                            <li class="nav-item dropdown">
                                <a href="blog.html" class="nav-link dropdown-toggle"
                                   id="seventh-dropdown" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">Blog</a>

                                <div class="dropdown-menu navbar-center" aria-labelledby="seventh-dropdown">
                                    <a class="dropdown-item" href="blog.html">Blog</a>
                                    
                                </div>
                            </li>

                            <!-- mega-menu end -->
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link"
                                   aria-haspopup="true" aria-expanded="false">Contact</a>

                               
                            </li>
                            <!-- mega-menu start -->

                        </ul>

                        <!-- header dropdown buttons -->
                        <div class="dropdown-buttons">
                            <div class="btn-group menu-search-box">
                                <button type="button" class="btn dropdown-toggle" id="header-drop-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i></button>
                                <ul class="dropdown-menu dropdown-menu-right dropdown-animation" aria-labelledby="header-drop-3">
                                    <li>
                                        <form role="search" class="search-box">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Search">
                                                <i class="fa fa-search form-control-feedback"></i>
                                            </div>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            
                            
                        </div>
                        <!-- main-menu end -->

                    </div>
                </div>
            </nav>
        </div>
        <!-- main-navigation end -->
    </div>

</header>