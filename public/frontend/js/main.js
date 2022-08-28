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
                items: 2
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


$(document).ready(function(){
  document.addEventListener('DOMContentLoaded', function () {
     var frames = document.getElementById('frames');
     frames.addEventListener('click', function (e) {
        if (e.target.classList.contains('item1')) {
          e.target.parentNode.scrollLeft = e.target.offsetLeft;
        }
    });
 });
      
});

$(window).scroll(function() {
    if ($(this).scrollTop()) {
        $('.make-own-trip-subtitle1:hidden').stop(true, true).fadeIn();
    } else {
        $('.make-own-trip-subtitle1').stop(true, true).fadeOut();
    }
});

$(".make-own-trip-subtitle1").click(function() {
    $('html, body').animate({
        scrollTop: $('html').offset().top
    }, 1000);
});

$(window).scroll(function() {
    var sticky = $('.container-fluid.details-first-nav'),
        scroll = $(window).scrollTop();

    if (scroll >= 100) sticky.addClass('fixed');
    else sticky.removeClass('fixed');
});

$(window).scroll(function() {
    var sticky = $('.navbar.navbar-expand-lg.mountainguide-block3.layout'),
        scroll = $(window).scrollTop();

    if (scroll >= 100) sticky.addClass('main-nav-fixed');
    else sticky.removeClass('main-nav-fixed');
});

$(window).scroll(function() {
    var sticky = $('#bookprice'),
        height = $('.scrollheight').height();
    scroll = $(window).scrollTop();

    if (scroll >= 10 && scroll <= height) sticky.addClass('bookprice');
    else sticky.removeClass('bookprice');
});



