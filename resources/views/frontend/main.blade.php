
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

    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('og_title')" />
    <meta property="og:description" content="@yield('og_description')" />
    <meta property="og:image" content="@yield('og_image')" />
    <meta property="og:url" content="@yield('og_url')" />
    <meta property="og:site_name" content="Mountainguideinfo" />

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="@yield('twitter_title')">
    <meta name="twitter:description" content="@yield('twitter_description')">
    <meta name="twitter:image" content="@yield('twitter_image')">
    <meta name="twitter:site" content="Mountainguideinfo">
    <meta name="twitter:url" content="@yield('twitter_url')" />
    <!-- Favicon -->
    @if (!empty($sitesetting->logo))
        <link href="{{ $sitesetting->logo }}" rel="shortcut icon" type="image/png">
    @endif

    <!------------------------------------------
      Main CSS File
    <------------------------------------------>
    <link rel="canonical" href="{{ url(Request::url()) }}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/responsive.css') }}" media="" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/menu.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css"
        crossorigin="anonymous" />
    <!-- Responsive CSS -->
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css"
        crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous" />  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        
        .svg {
            position: absolute;
            height: 40% !important;
            width: 100%;
        }

        .forest {
            position: absolute;
            top: 130px;
            z-index: 1;
        }

        .elephant {
            position: absolute;
            width: 600px;
            left: 272px;
            top: 0px;
            opacity: 0.09;
            height: 400px;
        }

        #tiger {
            position: absolute;
            height: 168px;
            opacity: 0.09;
            top: 253px;
            left: 984px;
            width: 450px;
        }

        @keyframes pulse {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(1.1, 1.1);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        #ray {
            transform: rotate(60deg);
        }

        .baloon {
            position: absolute;
            z-index: 0;
            left: 0vw;
            bottom: 21vh;
            animation: float 10s linear infinite;
            ;
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .birds {
            z-index: 4;
            position: absolute;
            bottom: 25vh;
            animation: flying 30s linear infinite;
        }

        @keyframes flying {
            0% {
                transform: translate(100vw, 0);
            }

            50% {
                transform: translate(50vw, 50px);
            }

            100% {
                transform: translate(-2vw, 0);
            }
        }

        .wing {
            animation: swing 2s linear infinite;
        }

        @keyframes swing {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1, -.5);
            }

            100% {
                transform: scale(1);
            }
        }

        #sendit:hover {
            cursor: pointer;
        }

        #speech {
            opacity: 0;
            padding: 10px;
            position: absolute;
            z-index: 5;
            right: 2.5vw;
            bottom: 20vh;
            transition: .5s ease-in-out;
        }

        @media screen and (max-width: 760px) {


            #baloon {
                transform: scale(0.8, 0.8);
            }

            #birds {
                transform: scale(0.8, 0.8);
            }

        }

        @media screen and (max-width: 480px) {


            #baloon {
                transform: scale(0.5, 0.5);
            }

            #birds {
                transform: scale(0.5, 0.5);
            }
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

        .underdiv {
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
            color: white;
            font-size: 16px;
            font-weight: 700;
            line-height: 24px;
            padding: 16px 23px !important;
            margin-bottom: 20px;
            position: relative;
            top: 36px;
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
            color: white;
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
            background-color: #F6AB3B;
        }

        @media (min-width: 768px) {
            .button-51 {
                padding: 16px 32px;
            }
        }

      
        .home-blog-section{
            @if(!empty($homepagebannerthree->page_banner)) background: url('{{ asset($homepagebannerthree->page_banner) }}') ;
           @else
            background-color:#000000;
            @endif
        }
        .chooseus-section{
            @if(!empty($homepagebannerone->page_banner)) background: url('{{ asset($homepagebannerone->page_banner)}}') cover;
           @else
            background-color:#000000;
            @endif
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" async></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.5/umd/popper.min.js" ></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-dropdown-hover/4.2.0/jquery.bootstrap-dropdown-hover.min.js" >
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider-min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" async></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" async></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" async></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/css3-animate-it/0.1.0/js/css3-animate-it.min.js" async></script>
    <script src="{{ asset('frontend/js/script.js') }}"></script>
    <script src="{{ asset('frontend/js/jqueryvalidation.js') }}"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js" async></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" async></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5EJF8NFWL9" async></script>
    <script src="https://platform-api.sharethis.com/js/sharethis.js#property=62ac9ea93538ec001973353d&product=inline-share-buttons" async>
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.3/jquery.scrollTo.min.js" 
        integrity="sha512-PsJ1f4lw0Jrga4wbDOvdWs9DFl88C1vlcH2VQYqgljHBmzmqtGivUkzRHWx2ZxFlnysKUcROqLeuOpYh9q4YNg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" async></script>
      
    <script>
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
            s1.src = 'https://embed.tawk.to/5c5e75576cb1ff3c14cbbbe8/default';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>

    <script >
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
    <script >
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
        console.clear();
    </script>
    <script>
        window.onscroll = function() {
            myFunction()
        };

        var navbar = document.getElementById("tabnav");
        var sticky = navbar.offsetTop;

        function myFunction() {
            if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky")
            } else {
                navbar.classList.remove("sticky");
            }
        }

        // $(function() {
        //     $('a[href*=\\#]:not([href=\\#])').on('click', function() {
        //         var target = $(this.hash);
                
        //         target = target.length ? target : $('[name=' + this.hash.substr(1) + ']');
        //         if (target.length) {
        //             $('html,body').animate({
        //                 scrollTop: target.offset().top
        //             }, 400,'swing');
        //             return false;
        //         }
                

        //     });

        // });
    </script>
</body>

</html>
