<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="" />
    <meta name="keywords" 
    content="creative, portfolio, agency, template, theme, designed, html5, html, css3, responsive, onepage" />
    <meta name="author" content="Set Private Limited" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
    <title>@yield('title')</title>


    <!------------------------------------------
      Main CSS File
    <------------------------------------------>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/menu.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/custom-animation.css')}}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">

    <!-- Favicon -->
    <link href="images/favicon.png" rel="shortcut icon" type="image/png">

  </head>

<body>

<div class="preloader"></div>

<!-- Start Page Wrapper  -->
<div class="page-wrapper">

    <!-- Header Section Start -->
   @include('frontend.layouts.header')
    <!-- Header Section End -->
    @yield('content')

    <!-- Footer Style Seven Start -->
  @include('frontend.layouts.footer')
    <!-- Footer Style Seven End -->

</div>
<!-- End Page Wrapper  -->

<a href="#" class="scrollup"><i class="flaticon-long-arrow-pointing-up" aria-hidden="true"></i></a>


<!------------------------------------------
Main JavaScript
<------------------------------------------>
<script src="{{asset('frontend/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('frontend/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>


<!-- Optional JavaScript -->
<script src="{{asset('frontend/js/bootstrap-dropdownhover.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap-slider.js')}}"></script>
<script src="{{asset('frontend/js/jquery.flexslider-min.js')}}"></script>
<script src="{{asset('frontend/js/slick.min.js')}}"></script>
<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/js/css3-animate-it.js')}}"></script>
<script src="{{asset('frontend/js/magnific-popup.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.fancybox.js')}}"></script>
<script src="{{asset('frontend/js/player-min.js')}}"></script>

<!-- Custom JavaScript -->
<script src="{{asset('frontend/js/script.js')}}"></script>

</body>
</html>