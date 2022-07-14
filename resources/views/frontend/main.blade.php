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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/menu.css') }}">
   
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"  />

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script   src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.5/umd/popper.min.js"></script>
    <script   src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-dropdown-hover/4.2.0/jquery.bootstrap-dropdown-hover.min.js"></script>
    <script   src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.js"></script>
    <script   src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider-min.js"></script>
    <script   src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"> </script>
    <script   src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
    <script   src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script   src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"> </script>
    <script   src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script   src="https://cdnjs.cloudflare.com/ajax/libs/css3-animate-it/0.1.0/js/css3-animate-it.min.js"></script>
    <script   src="{{ asset('frontend/js/script.js') }}"></script>
    <script   src="{{ asset('frontend/js/jqueryvalidation.js') }}"></script>
    <script   src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script   src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5EJF8NFWL9"></script>
    <script   src="https://platform-api.sharethis.com/js/sharethis.js#property=62ac9ea93538ec001973353d&product=inline-share-buttons"> </script>
    <script  >
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-5EJF8NFWL9');

        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5c5e75576cb1ff3c14cbbbe8/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>

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
    <script type="text/javascript" >
       

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
