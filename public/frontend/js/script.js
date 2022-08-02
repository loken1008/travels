!(function (e) {
    "use strict";
    e(window).on("scroll", function () {
        e(this).scrollTop() > 200
            ? e(".scrollup").fadeIn()
            : e(".scrollup").fadeOut();
    }),
        e(".scrollup").on("click", function () {
            return e("html, body").animate({ scrollTop: 0 }, 1e3), !1;
        });
    var t = e(".main-navigation");
    e(window).scroll(function () {
        e(this).scrollTop() > 100
            ? t.addClass("fixed-header")
            : t.removeClass("fixed-header");
    }),
        e(document).ready(function () {
            var t = e(".dropdown");
            e(window).innerWidth() > 767 &&
                t.on({
                    mouseenter: function () {
                        t.clearQueue(),
                            e(this).find(">.dropdown-menu").addClass("show");
                    },
                    mouseleave: function () {
                        e(this).find(">.dropdown-menu").removeClass("show");
                    },
                }),
                e(window).innerWidth() < 768 &&
                    t.on("click", function (t) {
                        t.stopPropagation(),
                            e(this).siblings().removeClass("show"),
                            e(this)
                                .siblings()
                                .find(">.dropdown-menu")
                                .removeClass("show"),
                            e(this)
                                .siblings()
                                .find(">.dropdown-menu")
                                .parent()
                                .removeClass("show"),
                            e(this).find(">.dropdown-menu").toggleClass("show"),
                            e(this)
                                .siblings(">.dropdown-menu")
                                .toggleClass("show");
                    });
        });
    var i = e("[data-background]");
    i.length > 0 &&
        i.each(function () {
            var t, i, a;
            return (
                (a = e(this)),
                (t = e(this).attr("data-background")),
                (i = e(this).attr("data-background-mobile")),
                "#" === a.attr("data-background").substr(0, 1)
                    ? a.css("background-color", t)
                    : a.attr("data-background-mobile") && device.mobile()
                    ? a.css("background-image", "url(" + i + ")")
                    : a.css("background-image", "url(" + t + ")")
            );
        });
    var a = e(".gallery-filter li");
    a.length &&
        a.on("click", function (t) {
            e(this).siblings(".active").removeClass("active"),
                e(this).addClass("active"),
                t.preventDefault();
        });
    var s,
        o,
        n,
        r,
        l,
        c = e(".gallery-filter");
    if (
        (c.length &&
            c.on("click", "a", function () {
                e("#filters button").removeClass("current"),
                    e(this).addClass("current");
                var t = e(this).attr("data-filter");
                e(this)
                    .parents(".gallery-filter-item")
                    .next()
                    .isotope({ filter: t });
            }),
        e.fn.imagesLoaded && e(".gallery:not(.gallery-masonry)").length > 0)
    ) {
        var d = e(".gallery:not(.gallery-masonry)");
        imagesLoaded(d, function () {
            setTimeout(function () {
                d.isotope({
                    itemSelector: ".gallery-item",
                    layoutMode: "fitRows",
                    filter: "*",
                }),
                    e(window).trigger("resize");
            }, 500);
        });
    }
    e("#sidebar-carousel").owlCarousel({
        loop: !0,
        margin: 10,
        dots: !0,
        nav: !1,
        autoplayHoverPause: !1,
        autoplay: !0,
        smartSpeed: 1500,
        navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>',
        ],
        responsive: {
            0: { items: 1, center: !1 },
            480: { items: 1, center: !1 },
            600: { items: 1, center: !1 },
            768: { items: 1 },
            992: { items: 1 },
            1200: { items: 1 },
        },
    }),
        e("#baner-slider").owlCarousel({
            loop: !0,
            margin: 0,
            dots: !1,
            nav: !1,
            autoplayHoverPause: !1,
            autoplay: !0,
            smartSpeed: 1500,
            navText: [
                '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>',
            ],
            responsive: {
                0: { items: 1, center: !1 },
                480: { items: 1, center: !1 },
                600: { items: 1, center: !1 },
                768: { items: 1 },
                992: { items: 1 },
                1200: { items: 1 },
            },
        }),
        e(".specialplaces_carousel").owlCarousel({
            loop: !0,
            autoplay: !0,
            autoplayHoverPause: !1,
            smartSpeed: 700,
            items: 3,
            margin: 30,
            dots: !1,
            nav: !0,
            navText: [
                '<i class="fa fa-chevron-left"></i>',
                '<i class="fa fa-chevron-right"></i>',
            ],
            responsive: {
                0: { items: 1 },
                480: { items: 1 },
                600: { items: 1 },
                768: { items: 2 },
                992: { items: 3 },
                1200: { items: 3 },
            },
        }),
        e(".specialpackages_carousel").owlCarousel({
            loop: !0,
            autoplay: !0,
            autoplayHoverPause: !1,
            smartSpeed: 700,
            items: 3,
            margin: 30,
            dots: !1,
            nav: !0,
            navText: [
                '<i class="fa fa-chevron-left"></i>',
                '<i class="fa fa-chevron-right"></i>',
            ],
            responsive: {
                0: { items: 1 },
                480: { items: 1 },
                600: { items: 1 },
                768: { items: 2 },
                992: { items: 3 },
                1200: { items: 3 },
            },
        }),
        e(".popular-trekking").owlCarousel({
            loop: !0,
            autoplay: !0,
            autoplayHoverPause: !1,
            smartSpeed: 700,
            items: 2,
            margin: 30,
            dots: !1,
            nav: !0,
            navText: [
                '<i class="fa fa-chevron-left"></i>',
                '<i class="fa fa-chevron-right"></i>',
            ],
            responsive: {
                0: { items: 1 },
                480: { items: 1 },
                600: { items: 1 },
                768: { items: 2 },
                992: { items: 2 },
                1200: { items: 2 },
            },
        }),
        e("#testimonials-carousel-4").owlCarousel({
            loop: !1,
            autoplay: 2e3,
            autoplayHoverPause: !1,
            smartSpeed: 700,
            items: 1,
            margin: 30,
            dots: !1,
            nav: !1,
            navText: [
                '<i class="flaticon-left-arrow"></i>',
                '<i class="flaticon-right-arrow"></i>',
            ],
            responsive: {
                0: { items: 1 },
                480: { items: 1 },
                600: { items: 1 },
                800: { items: 1 },
                1024: { items: 1 },
                1200: { items: 1 },
            },
        }),
        e(".testimonials_slide").owlCarousel({
            loop: !0,
            autoplay: 2e3,
            autoplayHoverPause: !0,
            smartSpeed: 700,
            items: 3,
            margin: 10,
            dots: !1,
            nav: !0,
            navText: [
                '<i class="fa fa-chevron-left"></i>',
                '<i class="fa fa-chevron-right"></i>',
            ],
            responsive: {
                0: { items: 1 },
                480: { items: 2 },
                600: { items: 2 },
                768: { items: 3 },
                992: { items: 3 },
                1200: { items: 3 },
            },
        }),
        e("#client_carousel").owlCarousel({
            loop: !0,
            autoplay: 2e3,
            autoplayHoverPause: !0,
            smartSpeed: 700,
            items: 6,
            margin: 30,
            dots: !1,
            nav: !0,
            navText: [
                '<i class="flaticon-back-1"></i>',
                '<i class="flaticon-next"></i>',
            ],
            responsive: {
                0: { items: 2 },
                480: { items: 3 },
                600: { items: 3 },
                800: { items: 4 },
                1024: { items: 6 },
                1200: { items: 6 },
            },
        }),
        e(".flexslider").flexslider({ animation: "slide", controlNav: !1 }),
        e(document).ready(function () {
            var t = e(".slick-slider-one");
            t.on("init", function (t, i) {
                e(".animated").addClass("activate fadeInUp");
            }),
                t.slick({
                    autoplay: !0,
                    autoplaySpeed: 3e3,
                    pauseOnHover: !1,
                    dots: !0,
                });
            var i = e(".animated");
            t.on("afterChange", function (e, t, a) {
                i.removeClass("off"), i.addClass("activate fadeInUp");
            }),
                t.on("beforeChange", function (e, t, a) {
                    i.removeClass("activate fadeInUp"), i.addClass("off");
                });
        }),
        e(".lightbox-image").magnificPopup({
            type: "image",
            removalDelay: 500,
            mainClass: "mfp-fade",
            gallery: { enabled: !0, navigateByImgClick: !0, preload: [0, 1] },
            retina: {
                ratio: 1,
                replaceSrc: function (e, t) {
                    return e.src.replace(/\.\w+$/, function (e) {
                        return "@2x" + e;
                    });
                },
            },
        }),
        (s = e(window)),
        (o = window.pageYOffset || document.documentElement.scrollTop),
        (n = []),
        (r = []),
        e('[data-type="content"]').each(function (t, i) {
            var a = e(this);
            (a.__speed = a.data("speed") || 1),
                (a.__fgOffset = a.offset().top),
                n.push(a);
        }),
        e('[data-type="parallax"]').each(function () {
            var t = e(this);
            (t.__speed = t.data("speed") || 1),
                (t.__fgOffset = t.offset().top),
                r.push(t);
        }),
        s.on("scroll resize", function () {
            (o = window.pageYOffset || document.documentElement.scrollTop),
                n.forEach(function (e) {
                    var t = e.__fgOffset - o / e.__speed;
                    e.css("top", t);
                }),
                r.forEach(function (e) {
                    var t = -(o - e.__fgOffset) / e.__speed;
                    e.css({ backgroundPosition: "50% " + t + "px" });
                });
        }),
        s.trigger("scroll"),
        ((l = function (e, t, i) {
            (this.toRotate = t),
                (this.el = e),
                (this.loopNum = 0),
                (this.period = parseInt(i, 10) || 2e3),
                (this.txt = ""),
                this.tick(),
                (this.isDeleting = !1);
        }).prototype.tick = function () {
            var e = this.loopNum % this.toRotate.length,
                t = this.toRotate[e];
            this.isDeleting
                ? (this.txt = t.substring(0, this.txt.length - 1))
                : (this.txt = t.substring(0, this.txt.length + 1)),
                (this.el.innerHTML =
                    '<span class="wrap">' + this.txt + "</span>");
            var i = this,
                a = 300 - 100 * Math.random();
            this.isDeleting && (a /= 2),
                this.isDeleting || this.txt !== t
                    ? this.isDeleting &&
                      "" === this.txt &&
                      ((this.isDeleting = !1), this.loopNum++, (a = 500))
                    : ((a = this.period), (this.isDeleting = !0)),
                setTimeout(function () {
                    i.tick();
                }, a);
        }),
        (window.onload = function () {
            for (
                var e = document.getElementsByClassName("txt-rotate"), t = 0;
                t < e.length;
                t++
            ) {
                var i = e[t].getAttribute("data-rotate"),
                    a = e[t].getAttribute("data-period");
                i && new l(e[t], JSON.parse(i), a);
            }
            var s = document.createElement("style");
            (s.type = "text/css"),
                (s.innerHTML =
                    ".txt-rotate > .wrap { border-right: 0.08em solid #666 }"),
                document.body.appendChild(s);
        }),
        e(document).on("click", ".widget-categories-list a", function () {
            var t = e(this).closest("li");
            e(this);
            if (t.children("ul").length > 0)
                return e(this).closest("li").children("ul").slideToggle(), !1;
        }),
        e(window).on("load", function () {
            var t;
            (t = e(".preloader")).length && t.delay(400).fadeOut(500);
        }),
        e(document).on("ready", function () {}),
        e(window).on("scroll", function () {}),
        e(window).on("resize", function () {});
})(window.jQuery);

    
