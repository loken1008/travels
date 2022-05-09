@php
$prefix=Request::route()->getPrefix();
$route=Route::current()->getName();
@endphp
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="../images/logo-dark.png" alt="">
                        <h3><b>TOurs</b> & Travels</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li>
                <a href="index.html">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="header nav-small-cap">User Interface</li>
            <li class="treeview {($prefix=='/tour')?'active':''}}">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Manage Users</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li class="{{($route=='users.index')?'active':''}}"><a class="{{($route=='users.index')?'active':''}}" href="{{route('users.index')}}"><i class="ti-more"></i>Manage User</a></li>
                    <li class="{{($route=='roles.index')?'active':''}}"><a class="{{($route=='roles.index')?'active':''}}" href="{{route('roles.index')}}"><i class="ti-more"></i>Role</a></li>
                    <li class="{{($route=='permissions.index')?'active':''}}"><a class="{{($route=='permissions.index')?'active':''}}" href="{{route('permissions.index')}}"><i class="ti-more"></i>Permission</a></li>
                    </li>
                </ul>
            </li>

            <li class="treeview {{($prefix=='/banner')?'active':''}}">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Banner</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route=='all.banner')?'active':''}}"><a class="{{($route=='all.banner')?'active':''}}" href="{{route('all.banner')}}"><i class="ti-more"></i>View Banner</a></li>
                    </li>
                </ul>
            </li>

            <li class="treeview ">
               
                        <a href="#" id="filelfm" data-input="mainthumbnail" data-preview="holder"
                            >
                            <i class="fa fa-picture-o"></i> File Manager
                        </a>
               
            </li>

            <li class="treeview {{($prefix=='/country')?'active':''}}">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Country/Place</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route=='country.view')?'active':''}}"><a class="{{($route=='country.view')?'active':''}}" href="{{route('country.view')}}"><i class="ti-more"></i>View Country</a></li>
                    <li class="{{($route=='country.create')?'active':''}}"><a class="{{($route=='country.create')?'active':''}}" href="{{route('country.create')}}"><i class="ti-more"></i>Add Country</a></li>
                    </li>
                    <li class="{{($route=='place.view')?'active':''}}"><a class="{{($route=='place.view')?'active':''}}" href="{{route('place.view')}}"><i class="ti-more"></i>View Place</a></li>
                    <li class="{{($route=='place.create')?'active':''}}"><a class="{{($route=='place.create')?'active':''}}" href="{{route('place.create')}}"><i class="ti-more"></i>Add Place</a></li>
                    </li>
                </ul>
                
            </li>

            {{-- <li class="treeview {($prefix=='/place')?'active':''}}">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Destination Place</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route=='place.view')?'active':''}}"><a class="{{($route=='place.view')?'active':''}}" href="{{route('place.view')}}"><i class="ti-more"></i>View Place</a></li>
                    <li class="{{($route=='place.create')?'active':''}}"><a class="{{($route=='place.create')?'active':''}}" href="{{route('place.create')}}"><i class="ti-more"></i>Add Place</a></li>
                    </li>
                </ul>
            </li> --}}
            <li class="treeview {{($prefix=='/category')?'active':''}}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Category</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route=='all.category')?'active':''}}"><a href="{{route('all.category')}}"><i class="ti-more"></i>All Category</a></li>
                    {{-- <li class="{{($route=='all.subcategory')?'active':''}}"><a href="{{route('all.subcategory')}}"><i class="ti-more"></i>All SubCategory</a></li> --}}

                </ul>
            </li>
            <li class="treeview {($prefix=='/tour')?'active':''}}">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Tour Place</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li class="{{($route=='tour.create')?'active':''}}"><a class="{{($route=='tour.create')?'active':''}}" href="{{route('tour.create')}}"><i class="ti-more"></i>Add Tour</a></li>
                    <li class="{{($route=='tour.view')?'active':''}}"><a class="{{($route=='tour.view')?'active':''}}" href="{{route('tour.view')}}"><i class="ti-more"></i>View Trip</a></li>
                    {{-- <li class="{{($route=='package.view')?'active':''}}"><a class="{{($route=='package.view')?'active':''}}" href="{{route('package.view')}}"><i class="ti-more"></i>View Packages</a></li>
                    <li class="{{($route=='activities.view')?'active':''}}"><a class="{{($route=='activities.view')?'active':''}}" href="{{route('activities.view')}}"><i class="ti-more"></i>View Activities</a></li> --}}

                    </li>
                </ul>
            </li>
            <li class="treeview {($prefix=='/fqa')?'active':''}}">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>FQA</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route=='all.fqa')?'active':''}}"><a class="{{($route=='all.fqa')?'active':''}}" href="{{route('all.fqa')}}"><i class="ti-more"></i>View FQA</a></li>
                    </li>
                </ul>
            </li>
            <li class="treeview {($prefix=='/coupon')?'active':''}}">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span> Discount Coupon</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route=='coupon.view')?'active':''}}"><a class="{{($route=='coupon.view')?'active':''}}" href="{{route('coupon.view')}}"><i class="ti-more"></i>View Coupon</a></li>
                    </li>
                </ul>
            </li>
            <li class="treeview {{($prefix=='/aboutus')?'active':''}}">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>About Us</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route=='all.category')?'active':''}}"><a href="{{route('all.introduction')}}"><i class="ti-more"></i>About  Us</a></li>
                    <li class="{{($route=='all.team')?'active':''}}"><a href="{{route('all.team')}}"><i class="ti-more"></i>Our Team</a></li>
                    <li class="{{($route=='all.choose')?'active':''}}"><a href="{{route('all.choose')}}"><i class="ti-more"></i>Why Choose Us </a></li>
                    <li class="{{($route=='all.choose')?'active':''}}"><a href="{{route('all.termsandconditions')}}"><i class="ti-more"></i>Terms and Conditions </a></li>
                </ul>
            </li>
            <li class="treeview {{($prefix=='/testmonial')?'active':''}}">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Testmonial</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route=='all.testmonial')?'active':''}}"><a class="{{($route=='all.testmonial')?'active':''}}" href="{{route('all.testmonial')}}"><i class="ti-more"></i>View Testmonial</a></li>
                    </li>
                </ul>
            </li>
            <li class="treeview {{($prefix=='/booking')?'active':''}}">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>View Booking</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route=='showbooking.view')?'active':''}}"><a class="{{($route=='showbooking.view')?'active':''}}" href="{{route('showbooking.view')}}"><i class="ti-more"></i>View Booking Details</a></li>
                    </li>
                </ul>
            </li>
            <li class="treeview {{($prefix=='/blog')?'active':''}}">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Blog</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route=='blog.view')?'active':''}}"><a class="{{($route=='blog.view')?'active':''}}" href="{{route('blog.view')}}"><i class="ti-more"></i>View Blog</a></li>
                    </li>
                    <li class="{{($route=='viewblog.comment')?'active':''}}"><a class="{{($route=='viewblog.comment')?'active':''}}" href="{{route('viewblog.comment')}}"><i class="ti-more"></i>View Blog Comment</a></li>
                </li>
                </ul>
            </li>
            <li class="treeview {{($prefix=='/hotel')?'active':''}}">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Hotel</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route=='hotel.view')?'active':''}}"><a class="{{($route=='hotel.view')?'active':''}}" href="{{route('hotel.view')}}"><i class="ti-more"></i>View Hotel</a></li>
                    </li>
                </ul>
            </li>
            <li class="treeview {{($prefix=='/gallery')?'active':''}}">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Gallery</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route=='all.gallery')?'active':''}}"><a class="{{($route=='all.gallery')?'active':''}}" href="{{route('all.gallery')}}"><i class="ti-more"></i>View Gallery</a></li>
                    </li>
                </ul>
            </li>
            <li class="treeview {{($prefix=='/sitesetting')?'active':''}}">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Site Setting</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route=='all.logo')?'active':''}}"><a class="{{($route=='all.logo')?'active':''}}" href="{{route('all.logo')}}"><i class="ti-more"></i>Site Logo/Social Link</a></li>
                    <li class="{{($route=='all.gallery')?'active':''}}"><a class="{{($route=='all.gallery')?'active':''}}" href="{{route('all.gallery')}}"><i class="ti-more"></i>Contact </a></li>

                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="alert-triangle"></i>
                    <span>Authentication</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="auth_login.html"><i class="ti-more"></i>Login</a></li>
                    <li><a href="auth_register.html"><i class="ti-more"></i>Register</a></li>
                    <li><a href="auth_lockscreen.html"><i class="ti-more"></i>Lockscreen</a></li>
                    <li><a href="auth_user_pass.html"><i class="ti-more"></i>Password</a></li>
                    <li><a href="error_404.html"><i class="ti-more"></i>Error 404</a></li>
                    <li><a href="error_maintenance.html"><i class="ti-more"></i>Maintenance</a></li>
                </ul>
            </li>

        </ul>
    </section>

</aside>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    var route_prefix = "/laravel-filemanager";
    $('#filelfm').filemanager('images', {
        prefix: route_prefix
    });
</script>