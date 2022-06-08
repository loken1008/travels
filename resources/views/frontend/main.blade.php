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
    
    </style>
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
    <script src="{{ asset('frontend/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
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
    <!--Start of Tawk.to Script-->
 
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
