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
    <!-- Favicon -->
    @if (!empty($sitesetting->logo))
        <link href="{{ $sitesetting->logo }}" rel="shortcut icon" type="image/png">
    @endif

    <!------------------------------------------
      Main CSS File
    <------------------------------------------>

    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('frontend/css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/custom-animation.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/imageupload.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <style>
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

        .scroll {
            overflow-y: scroll;
            height: 150px;
        }

        .scroll::-webkit-scrollbar {
            width: 6px;
        }

        .scroll::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
        }

        .scroll::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 10px #0E4D94;
        }

        .crating li .fa-star {
            color: #0E4D94;
            font-size: 20px;
            padding: 7px 0 0 7px;
        }

        .crt::before {
            content: "\7d";
            position: absolute;
            top: 21px;
            left: 300px;
            color: #0E4D94;
            opacity: 0.7;
            font-size: 123px;

        }

        #underdiv {
            background: #1a4491;
            width: 227px;
            height: 12px;
            position: relative;
            top: -11px;
            left: 0px;
            border-bottom-left-radius: 17px;
            border-top-right-radius: 18px;
        }
    </style>

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

        @include('cookieConsent::index')
    </div>
    <!-- End Page Wrapper  -->

    <a href="#" class="scrollup"><i class="flaticon-long-arrow-pointing-up" aria-hidden="true"></i></a>
    <!------------------------------------------
Main JavaScript
<------------------------------------------>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>    
<script type="text/javascript"
        src="https://platform-api.sharethis.com/js/sharethis.js#property=62ac9ea93538ec001973353d&product=inline-share-buttons"
        defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.5/umd/popper.min.js" defer></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-dropdown-hover/4.2.0/jquery.bootstrap-dropdown-hover.min.js"
        defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" defer></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/css3-animate-it/1.0.3/js/css3-animate-it.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" defer>
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" defer></script>
    <script src="{{ asset('frontend/js/jqueryvalidation.js') }}" defer></script>
    <script src="{{ asset('frontend/js/script.js') }}" defer></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5EJF8NFWL9" defer></script>
    <script type="text/javascript" defer>
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

        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-5EJF8NFWL9');

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


        $('[data-toggle="tab"]').click('shown.bs.collapse', function() {
            var googleIframe = $('#map_canvas iframe');
            googleIframe.attr('src', googleIframe.attr('src') + '');
        });

        $(document).ready(function() {
            $(".invisible-content").hide();
            $(document).on('click', '.aboutbtn', function() {
                var moreLessButton = $(".invisible-content").is(':visible') ? 'Read More' : 'Read Less';
                $(this).text(moreLessButton);
                $(this).parent('.large-content').find(".invisible-content").toggle();
                $(this).parent('.large-content').find(".visible-content").toggle();
            });
        });

        $(document).ready(function() {
            $(".teaminvisible-content").hide();
            $(document).on('click', '.teambtn', function() {
                var moreLessButton = $(".teaminvisible-content").is(':visible') ? 'Read More' : 'Read Less';
                $(this).text(moreLessButton);
                $(this).parent('.teamlarge-content').find(".teaminvisible-content").toggle();
                $(this).parent('.teamlarge-content').find(".visible-content").toggle();
            });
        });

        $(".closebtn").click(function() {
            $(this).closest("div").hide();
        });
    </script>
</body>

</html>
