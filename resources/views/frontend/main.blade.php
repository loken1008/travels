<!DOCTYPE html>
<html lang="en">

<head>

    <title>MountainGuideInfo|@yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="title" content="MountainGuideInfo|@yield('meta_title')">
    <meta name="keywords" content="@yield('meta_keywords', 'some default keywords')">
    <meta name="description" content="@yield('meta_description', 'default description')">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!------------------------------------------
      Main CSS File
    <------------------------------------------>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/custom-animation.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/imageupload.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">


    <!-- Favicon -->
    @if (!empty($sitesetting->logo))
        <link href="{{ $sitesetting->logo }}" rel="shortcut icon" type="image/png">
    @endif
    <style>
        .view-gallery .read-btn {
            background-color: #255669;
            border-top: 1px solid #eee;
            border-right: 1px solid #eee;
            bottom: 0;
            color: #fff;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 1px;
            padding: 16px 0;
            position: absolute;
            text-align: center;
            text-transform: uppercase;
            -webkit-transition: all 0.2s ease-in-out;
            -moz-transition: all 0.2s ease-in-out;
            -o-transition: all 0.2s ease-in-out;
            -ms-transition: all 0.2s ease-in-out;
            transition: all 0.2s ease-in-out;
            width: 100%;
        }

        label.error {
            color: #dc3545;
            font-size: 14px;
        }

        #costie ul {
            padding-left: 0px;
        }

        .kgKuDl {
            font-family: 'Lora', serif;
            font-size: 36px;
            font-weight: 600;
            letter-spacing: 0.8px;
            line-height: 0.9;
            margin-bottom: 22px;
            text-transform: uppercase;
        }

        .ReviewText__Container-sc-1nyg8v7-0 .SimpleShortener__Outer-sc-19xjxqz-0,
        .ReviewText__Title-sc-1nyg8v7-1 {
            color: #9c9c9c;
        }

        .fa-facebook-square::before,
        .fa-whatsapp::before,
        .fa-twitter::before,
        .fa-linkedin::before,
        .fa-google-plus::before,
        .fa-pinterest::before,
        .fa-instagram::before {
            font-family: 'FontAwesome';
        }

        .social-btn-sp #social-links {
            margin: 0 auto;
            max-width: 500px;
        }

        .social-btn-sp #social-links ul li {
            display: inline-block;
        }

        .social-btn-sp #social-links ul li a {
            padding: 15px;
            border: 1px solid #ccc;
            margin: 1px;
            font-size: 30px;
        }

        /* #social-links{
            display: none;
        } */
        table #social-links {
            display: inline-table;
        }

        table #social-links ul li {
            display: inline;
        }

        table #social-links ul li a {
            padding: 5px;
            border: 1px solid #ccc;
            margin: 1px;
            font-size: 15px;
            background: #e3e3ea;
        }

        .equipmentlist ul li,
        .equipment-collaspe ul li {
            list-style: disc;
            text-align: justify;
            line-height: 2rem;
        }
        .cii ul,.cee ul {
            list-style: none;
        }
        .cii ul li::before{
            content:'\f058';
            font-family: 'FontAwesome';
            padding-right:10px;
            color: rgb(4, 83, 209)
        }
        .cee ul li::before{
            content:'\f057';
            font-family: 'FontAwesome';
            padding-right:10px;
            color:#f5400a;
        }

        #st-1 {
            z-index: 1 !important;
        }

        .landscape {

            height: auto;
            overflow: hidden;
            position: relative;
        }

        .landscape__layer {
            height: 100%;
            left: 0;
            position: absolute;
            top: 0;
            width: 100%;
        }

        .landscape__image {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            max-height: 100%;
            max-width: 300%;
            min-width: 100%;
            width: 2500px;
            display: flex;
            flex-direction: column;
        }

        .landscape__image svg {
            display: block;
            height: auto;
            max-width: 100%;
        }
        .search-input-box:focus{
            outline: auto;
        }

        /** * Styles for demo */
    </style>
    <script type="text/javascript"
        src="https://platform-api.sharethis.com/js/sharethis.js#property=62ac9ea93538ec001973353d&product=inline-share-buttons"
        async="async"></script>

</head>

<body>

    {{-- <div class="preloader"></div> --}}

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


    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6263cd5c209019ea"></script>

    <script src="{{ asset('frontend/js/jquery-3.2.1.min.js') }}"></script>

    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <!-- Optional JavaScript -->
    <script src="{{ asset('frontend/js/bootstrap-dropdownhover.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap-slider.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.flexslider-min.js') }}"></script>
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/css3-animate-it.js') }}"></script>
    <script src="{{ asset('frontend/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('frontend/js/player-min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script src="{{ asset('frontend/js/jqueryvalidation.js') }}"></script>
    <!-- Custom JavaScript -->
    <script src="{{ asset('frontend/js/script.js') }}"></script>

    <!-- Begin widget code -->
    {{-- tripadvisor --}}
    <!-- Begin widget code -->

    <script>
        var script = document.createElement("script");
        script.type = "module";
        script.src = "https://widgets.thereviewsplace.com/2.0/rw-widget-slider.js";
        document.getElementsByTagName("head")[0].appendChild(script);
    </script>
    <!-- End widget code -->
    <!-- End widget code -->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/6268f5507b967b11798cbaa5/1g1kvsgta';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>

    <!--End of Tawk.to Script-->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5EJF8NFWL9"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-5EJF8NFWL9');
    </script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;

                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>

</body>

</html>
