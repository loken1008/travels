$(document).ready(function() {
    function initSliders() {
        var sliderConfig = {
            loop: true,
            autoplay: true,
            dots: false,
            nav: true,
            margin: 10,
            autoWidth: true,
            responsive: {
                0: {
                    dotsEach: 3,
                    items: 1,
                    autoWidth: false
                },
                500: {
                    dotsEach: 3,
                    items: 1,
                    autoWidth: false

                },
                768: {
                    dotsEach: 3,
                    items: 2,
                    autoWidth: false

                },
                1100: {
                    dotsEach: 3,
                    items: 2,
                    autoWidth: false

                },
                1200: {
                    dotsEach: 3,
                    items: 3,
                    autoWidth: false
                    
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
        margin: 30,
        nav: true,
        dots: false,
        autoplay: true,
        responsiveClass: true,
        responsive: {
            0: {
                dotsEach: 3,
                items: 1
            },
            500: {
                dotsEach: 3,
                items: 1
            },
            600: {
                dotsEach: 3,
                items: 1
            },
            700: {
                dotsEach: 3,
                items: 1
            },
            800: {
                dotsEach: 3,
                items: 2
            },
            1000: {
                dotsEach: 3,
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
        margin:30,
        nav: true,
        dots: false,
        autoplay: true,
        responsive: {
            0: {
                dotsEach: 3,
                items: 1
            },
            600: {
                dotsEach: 3,
                items: 1
            },
            700: {
                dotsEach: 3,
                items: 1
            },
            800: {
                dotsEach: 3,
                items: 2
            },
            1000: {
                dotsEach: 3,
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
        margin: 40,
        nav: true,
        // autoplay:true,
        responsive: {
            0: {
                dotsEach: 3,
                items: 1
            },
            500: {
                dotsEach: 3,
                items: 1
            },
            768: {
                dotsEach: 3,
                items: 2
            },
            800: {
                dotsEach: 3,
                items: 2
            },
            1100: {
                dotsEach: 3,
                items: 2
            }
        },


    });
});
$(document).ready(function() {
    $('#natural-trek-slider').owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        autoplay:true,
        responsive: {
            0: {
                dotsEach: 3,
                items: 1
            },
            500: {
                dotsEach: 3,
                items: 1
            },
            768: {
                dotsEach: 3,
                items: 2
            },
            800: {
                dotsEach: 3,
                items: 2
            },
            1100: {
                dotsEach: 3,
                items: 3
            }
        },


    });
});
$(document).ready(function() {
    $('#testimonial-slider').owlCarousel({
        loop: true,
        margin:30,
        nav: false,
        autoplay: true,
        responsive: {
            0: {
                dotsEach: 3,
                items: 1
            },
            600: {
                dotsEach: 3,
                items: 1
            },
            1000: {
                dotsEach: 3,
                items: 2
            }
        },


    });
});
$(document).ready(function() {
    $('#blog-slider').owlCarousel({
        loop: true,
        margin:30,
        nav: true,
        autoplay: true,
        responsiveClass: true,
        responsive: {
            0: {
                dotsEach: 3,
                items: 1
            },
            500: {
                dotsEach: 3,
                items: 1
            },
            700: {
                dotsEach: 3,
                items: 2
            },
            900: {
                items: 2
            },
            1100: {
                dotsEach: 3,
                items: 2
            },
            1200:{
                dotsEach: 3,
                items:3
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
$(document).ready(function(){
$(window).scroll(function() {
    if ($(this).scrollTop()>600) {
        $('.make-own-trip-subtitle1:hidden').stop(true, true).fadeIn();
    } else {
        $('.make-own-trip-subtitle1').stop(true, true).fadeOut();
    }
});

$(".make-own-trip-subtitle1").click(function() {

    $('html, body').animate({
        scrollTop: $('html').offset().top
    }, 0);
});
});

$(window).scroll(function() {
    var sticky = $('.container-fluid.details-first-nav'),
        scroll = $(window).scrollTop();

    if (scroll >= 100) sticky.addClass('fixed');
    else sticky.removeClass('fixed');
});

$(window).scroll(function() {
    var sticky = $('.navbar.navbar-expand-lg.mountainguide-block3.layout'),
        scroll1 = $(window).scrollTop();

    if (scroll1 >= 1) sticky.addClass('main-nav-fixed');
    else sticky.removeClass('main-nav-fixed');
});

$(window).scroll(function() {
    var sticky = $('#bookprice'),
        height = $('.scrollheight').height();
    scroll = $(window).scrollTop();

    if (scroll >= 600 && scroll <= height) sticky.addClass('bookprice');
    else sticky.removeClass('bookprice');
});

// showhide
$('[data-toggle="tab"]').click('shown.bs.collapse', function() {
    var googleIframe = $('#map_canvas iframe');
    googleIframe.attr('src', googleIframe.attr('src') + '');
});

$(document).ready(function() {
    $(".invisible-content").hide();
    $(document).on('click', '.travelbtn', function() {
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
// console.clear();

function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "flex";
    evt.currentTarget.className += "active";
    $(evt[0]).addClass("active");
  }


