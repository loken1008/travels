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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">

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

    </div>
    <!-- End Page Wrapper  -->

    <a href="#" class="scrollup"><i class="flaticon-long-arrow-pointing-up" aria-hidden="true"></i></a>
    <!------------------------------------------
Main JavaScript
<------------------------------------------>
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=62ac9ea93538ec001973353d&product=inline-share-buttons"
        async="async"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.5/umd/popper.min.js" async="async"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" async="async"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-dropdown-hover/4.2.0/jquery.bootstrap-dropdown-hover.min.js" async="async"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider-min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" async="async"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}" async="async"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/css3-animate-it/1.0.3/js/css3-animate-it.js" async="async"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" async="async"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" async="async"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" async="async"></script>
    <script src="{{ asset('frontend/js/jqueryvalidation.js') }}" async="async"></script>
    <script src="{{ asset('frontend/js/script.js') }}" async="async"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js" async="async"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5EJF8NFWL9" async="async"></script>
    <script type="text/javascript" async="async">
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


        var script = document.createElement("script");
        script.type = "module";
        script.src = "https://widgets.thereviewsplace.com/2.0/rw-widget-slider.js";
        document.getElementsByTagName("head")[0].appendChild(script);

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
    </script>
</body>

</html>
