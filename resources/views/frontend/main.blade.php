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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/custom-animation.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css" integrity="sha512-GqP/pjlymwlPb6Vd7KmT5YbapvowpteRq9ffvufiXYZp0YpMTtR9tI6/v3U3hFi1N9MQmXum/yBfELxoY+S1Mw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
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
            left: 200px;
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

        .homepagetitle::after {
            content: "\f178";
            font-family: 'FontAwesome';
            font-size: 33px;
            color: #0E4D94;
            position: relative;
            left: 10px;
            top: 5px;
        }

        .homepagetitle::before {
            content: "\f177";
            font-family: 'FontAwesome';
            font-size: 33px;
            color: #0E4D94;
            position: relative;
            right: 10px;
            top: 5px;
        }

        /* CSS */
        .button-51 {
            background-color: transparent;
            border: 1px solid #266DB6;
            box-sizing: border-box;
            color:white;
            font-size: 16px;
            font-weight: 700;
            line-height: 24px;
            padding: 16px 23px !important;
            position: relative;
            top:36px;
            text-decoration: none;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
        }

        .button-51:hover,
        .button-51:active {
            outline: 0;
        }

        .button-51:hover {
            background-color: transparent;
            cursor: pointer;
        }

        .button-51:before {
            background-color: #0E4D94;
            content: "";
            height: calc(100% + 3px);
            position: absolute;
            right: -7px;
            top: -7px;
            transition: background-color 300ms ease-in;
            width: 100%;
            z-index: -1;
        }

        .button-51:hover:before {
            background-color:#F6AB3B;
        }

        @media (min-width: 768px) {
            .button-51 {
                padding: 16px 32px;
            }
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha512-3P8rXCuGJdNZOnUx/03c1jOTnMn3rP63nBip5gOP2qmUh5YAdVAvFZ1E+QLZZbC1rtMrQb+mah3AfYW11RUrWA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script type="text/javascript" defer
        src="https://platform-api.sharethis.com/js/sharethis.js#property=62ac9ea93538ec001973353d&product=inline-share-buttons">
    </script>
    <script type="text/javascript" defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.5/umd/popper.min.js">
    </script>
    <script type="text/javascript" defer
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-dropdown-hover/4.2.0/jquery.bootstrap-dropdown-hover.min.js">
    </script>
    <script type="text/javascript" defer
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.js"></script>
    <script type="text/javascript" defer
        src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider-min.js"></script>
    <script type="text/javascript" defer src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js">
    </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js" integrity="sha512-lo4YgiwkxsVIJ5mex2b+VHUKlInSK2pFtkGFRzHsAL64/ZO5vaiCPmdGP3qZq1h9MzZzghrpDP336ScWugUMTg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/css3-animate-it/0.1.0/js/css3-animate-it.min.js" integrity="sha512-m6pMIUdyE0LGOwaBrku9N/qMxThfAVPuKTPkVrijYN4wnOcmEYmqqJkQpgJXPIBMTjm5IxwyruUJqgnOy9Q1cg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" defer
        src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" defer src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js">
    </script>
    <script type="text/javascript" defer
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script type="text/javascript" defer src="{{ asset('frontend/js/jqueryvalidation.js') }}"></script>
    <script type="text/javascript" defer src="{{ asset('frontend/js/script.js') }}"></script>
    <script type="text/javascript" defer src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js">
    </script>
    <script type="text/javascript" defer src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js">
    </script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5EJF8NFWL9"></script>
    <script type="text/javascript" defer>
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
    </script>
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
