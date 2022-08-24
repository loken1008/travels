<!DOCTYPE html>
<html>
<!--  This source code is exported from pxCode, you can get more document from https://www.pxcode.io  -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        * {
            box-sizing: border-box;
        }
    </style>
    <link rel="stylesheet" type="text/css"
    href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
<link rel="stylesheet" type="text/css" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/common.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/fonts.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/mountainguide.css') }}" />
<!-- CSS only -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
    crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>

</head>

<body>
    <div class="body">
        @include('frontend.layouts.header')
        @yield('content')
        <!--footer -->
        @include('frontend.layouts.footer')
        <!--endfooter-->
    </div>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
    $( function() {
      $( "#countrytab" ).tabs();
    } );
    </script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript" src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/px2code/posize/build/v1.00.6.js"></script>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>



    <!-- custom JS code after importing jquery and owl -->
    <script type="text/javascript">
        $(document).ready(function() {
            function initSliders() {
                var sliderConfig = {
                    loop: true,
                    autoplay: true,
                    dots: true,
                    nav: true,
                    margin: 10,
                    responsive: {
                        0: {
                            items: 1
                        },
                        500: {
                            items: 1
                        },
                        768: {
                            items: 2
                        },
                        800: {
                            items: 2
                        },
                        1000: {
                            items: 3
                        }
                    },
                }
                var firstOwlCarousel = $('.mountainguide-block45-item1 #country-slide').owlCarousel(sliderConfig);

                function initFirstSlider() {
                    $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
                        firstOwlCarousel.trigger('refresh.owl.carousel');
                    })
                }
                initFirstSlider()

            }
            $(window).ready(initSliders)
            $(window).resize(initSliders);
        })



        $(document).ready(function() {
            $('#best-sell-slider').owlCarousel({
                loop: true,
                margin: 100,
                nav: true,
                dots: false,
                autoplay: true,
                navContainer: '#customNav',
                navText: ['<i class="fa fa-angle-right"></i>', '<i class="fa fa-angle-left"></i>'],
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    500: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    800: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                },
                onDragged: onChangedCallback


            });

        });

        function onChangedCallback(event) {
            if ($("#best-sell-slider .owl-item").first().hasClass("active")) {
                $("body").removeClass("mountainguide-block48.layout1");
                $("body").addClass("zoom-in-seller");
            }

        }
        $(document).ready(function() {
            $('#challenge-peak-slider').owlCarousel({
                loop: true,
                margin: 100,
                nav: true,
                dots: false,
                // autoplay: true,
                navContainer: '#customNavs',
                navText: ['<i class="fa fa-angle-right"></i>', '<i class="fa fa-angle-left"></i>'],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    800: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                },
                onDragged: onChangedCallback


            });

        });

        function onChangedCallback(event) {
            if ($("#best-sell-slider .owl-item").first().hasClass("active")) {
                $("body").removeClass("mountainguide-block48.layout1");
                $("body").addClass("zoom-in-seller");
            }

        }
    </script>
    <script>
        $(document).ready(function() {
            $('#popular-trek-slider').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                // autoplay:true,
                responsive: {
                    0: {
                        items: 1
                    },
                    500: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    800: {
                        items: 2
                    },
                    1000: {
                        items: 2
                    }
                },


            });
        });
        $(document).ready(function() {
            $('#testimonial-slider').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                autoplay: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 2
                    }
                },


            });
        });
        $(document).ready(function() {
            $('#blog-slider').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                autoplay: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    500: {
                        items: 1
                    },
                    768: {
                        items: 1
                    },
                    900: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                },


            });
        });
    </script>
</body>

</html>
