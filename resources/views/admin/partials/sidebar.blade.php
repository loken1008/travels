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

            <li class="treeview {{($prefix=='/country')?'active':''}}">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Country</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route=='country.view')?'active':''}}"><a class="{{($route=='country.view')?'active':''}}" href="{{route('country.view')}}"><i class="ti-more"></i>View Country</a></li>
                    <li class="{{($route=='country.create')?'active':''}}"><a class="{{($route=='country.create')?'active':''}}" href="{{route('country.create')}}"><i class="ti-more"></i>Add Country</a></li>
                    </li>
                </ul>
            </li>

            <li class="treeview {($prefix=='/place')?'active':''}}">
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
            </li>
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
                    <li class="{{($route=='all.subcategory')?'active':''}}"><a href="{{route('all.subcategory')}}"><i class="ti-more"></i>All SubCategory</a></li>

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

{{-- 
            <li class="treeview">
              
                <a id="lfm" data-input="thumbnail" data-preview="holder" style="cursor: pointer">
                    <i class="fa fa-picture-o"></i>   <span>File Manager</span>
                </a>
            </li> --}}

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
{{-- <script>
    var route_prefix = "laravel-filemanager";
    $('#lfm').filemanager('image', {
        prefix: route_prefix
    });
</script> --}}