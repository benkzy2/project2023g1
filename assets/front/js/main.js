$(function () {

    "use strict";

    //===== Prealoder

    $(window).on('load', function (event) {
        $('#preloader').delay(500).fadeOut(500);

        // isotope initialize
        $('.grid').isotope({
            // set itemSelector so .grid-sizer is not used in layout
            itemSelector: '.single-gallery',
            percentPosition: true,
            masonry: {
                // set to the element
                columnWidth: '.grid-sizer'
            }
        });
    });


    //===== Sticky

    $(window).on('scroll', function (event) {
        var scroll = $(window).scrollTop();
        if (scroll < 110) {
            $(".navigation").removeClass("sticky");
        } else {
            $(".navigation").addClass("sticky");
        }
    });

    //===== Mobile Menu 

    $(".navbar-toggler").on('click', function () {
        $(this).toggleClass('active');
    });

    $(".navbar-nav a").on('click', function () {
        $(".navbar-toggler").removeClass('active');
    });
    var subMenu = $(".sub-menu-bar .navbar-nav .sub-menu");

    if (subMenu.length) {
        subMenu.parent('li').children('a').append(function () {
            return '<button class="sub-nav-toggler"> <i class="fa fa-angle-down"></i> </button>';
        });

        var subMenuToggler = $(".sub-menu-bar .navbar-nav .sub-nav-toggler");

        subMenuToggler.on('click', function () {
            $(this).parent().parent().children(".sub-menu").slideToggle();
            return false
        });

    }



    // Single Features Active
    $('.instagram-area').on('mouseover', '.instagram-item', function () {
        $('.instagram-item.active').removeClass('active');
        $(this).addClass('active');
    });



    //===== Isotope Project 1

    $('.container').imagesLoaded(function () {
        var $grid = $('.grid').isotope({
            // options
            transitionDuration: '1s'
        });

        // filter items on button click
        $('.project-menu ul').on('click', 'li', function () {
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({
                filter: filterValue
            });
        });

        //for menu active class
        $('.project-menu ul li').on('click', function (event) {
            $(this).siblings('.active').removeClass('active');
            $(this).addClass('active');
            event.preventDefault();
        });
    });

    // Go to Top
    // Scroll Event
    $(window).on('scroll', function () {
        var scrolled = $(window).scrollTop();
        if (scrolled > 300) $('.go-top').addClass('active');
        if (scrolled < 300) $('.go-top').removeClass('active');
    });

    // Click Event
    $('.go-top').on('click', function () {
        $("html, body").animate({
            scrollTop: "0"
        }, 500);
    });



    //===== banner animation slick slider
    function mainSlider() {
        var BasicSlider = $('.banner-slide');
        var BasicSlider2 = $('.banner-slide-2');
        var BasicSlider3 = $('.banner-slide-3');

        BasicSlider.on('init', function (e, slick) {
            var $firstAnimatingElements = $('.banner-area:first-child').find('[data-animation]');
            doAnimations($firstAnimatingElements);
        });
        BasicSlider2.on('init', function (e, slick) {
            var $firstAnimatingElements = $('.banner-area:first-child').find('[data-animation]');
            doAnimations($firstAnimatingElements);
        });
        BasicSlider3.on('init', function (e, slick) {
            var $firstAnimatingElements = $('.banner-area:first-child').find('[data-animation]');
            doAnimations($firstAnimatingElements);
        });
        BasicSlider.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
            var $animatingElements = $('.banner-area[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
            doAnimations($animatingElements);
        });
        BasicSlider2.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
            var $animatingElements = $('.banner-area[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
            doAnimations($animatingElements);
        });
        BasicSlider3.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
            var $animatingElements = $('.banner-area[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
            doAnimations($animatingElements);
        });

        BasicSlider.slick({
            autoplay: true,
            autoplaySpeed: 6000,
            dots: false,
            fade: true,
            arrows: true,
            prevArrow: '<span class="prev"><i class="fa fa-angle-left"></i> </span>',
            nextArrow: '<span class="next"> <i class="fa fa-angle-right"></i></span>',
            rtl: rtl == 1 ? true : false,
            responsive: [

                {
                    breakpoint: 1200,
                    settings: {
                        dots: false,
                        arrows: false
                    }
                }
            ]
        });

        BasicSlider2.slick({
            autoplay: false,
            autoplaySpeed: 10000,
            dots: false,
            fade: true,
            arrows: true,
            prevArrow: '<span class="prev"><i class="fa fa-angle-left"></i> </span>',
            nextArrow: '<span class="next"> <i class="fa fa-angle-right"></i></span>',
            rtl: rtl == 1 ? true : false,
            responsive: [

                {
                    breakpoint: 1200,
                    settings: {
                        dots: false,
                        arrows: false
                    }
                }
            ]
        });
        BasicSlider3.slick({
            autoplay: false,
            autoplaySpeed: 10000,
            dots: false,
            fade: true,
            arrows: true,
            prevArrow: '<span class="prev"><i class="fa fa-angle-left"></i> </span>',
            nextArrow: '<span class="next"> <i class="fa fa-angle-right"></i></span>',
            rtl: rtl == 1 ? true : false,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        dots: false,
                        arrows: false
                    }
                }
            ]
        });

        function doAnimations(elements) {
            var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
            elements.each(function () {
                var $this = $(this);
                var $animationDelay = $this.data('delay');
                var $animationType = 'animated ' + $this.data('animation');
                $this.css({
                    'animation-delay': $animationDelay,
                    '-webkit-animation-delay': $animationDelay
                });
                $this.addClass($animationType).one(animationEndEvents, function () {
                    $this.removeClass($animationType);
                });
            });
        }
    }
    mainSlider();


    //===== seller Active slick slider
    $('.fress-active').slick({
        dots: false,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 2800,
        arrows: true,
        prevArrow: '<span class="prev"><i class="fa fa-angle-left"></i></span>',
        nextArrow: '<span class="next"><i class="fa fa-angle-right"></i></span>',
        speed: 1000,
        slidesToShow: 4,
        slidesToScroll: 1,
        rtl: rtl == 1 ? true : false,
        responsive: [
            {
                breakpoint: 1201,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });


    $('.special-items').slick({
        dots: false,
        infinite: true,
        autoplay: false,
        autoplaySpeed: 6000,
        arrows: true,
        prevArrow: '<span class="prev"><i class="fa fa-angle-left"></i></span>',
        nextArrow: '<span class="next"><i class="fa fa-angle-right"></i></span>',
        speed: 1000,
        slidesToShow: 2,
        slidesToScroll: 1,
        rtl: rtl == 1 ? true : false,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });


    //===== seller Active slick slider
    $('.client-active').slick({
        dots: false,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 2800,
        arrows: false,
        speed: 1500,
        slidesToShow: 1,
        slidesToScroll: 1,
        rtl: rtl == 1 ? true : false
    });



    //===== seller Active slick slider
    $('.client-active-2').slick({
        dots: false,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 2800,
        arrows: false,
        speed: 1500,
        slidesToShow: 2,
        slidesToScroll: 1,
        rtl: rtl == 1 ? true : false,
        responsive: [

            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    //===== seller Active slick slider
    $('.team-active').slick({
        dots: false,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 2800,
        arrows: false,
        speed: 1500,
        slidesToShow: 2,
        slidesToScroll: 1,
        rtl: rtl == 1 ? true : false,
        responsive: [

            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });




    //===== seller Active slick slider
    $('.instagram-active').slick({
        dots: false,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 2800,
        arrows: false,
        speed: 1500,
        slidesToShow: 8,
        slidesToScroll: 1,
        rtl: rtl == 1 ? true : false,
        responsive: [
            {
                breakpoint: 1201,
                settings: {
                    slidesToShow: 7,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 5,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 5,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 3,
                }
            }
        ]
    });



    //===== seller Active slick slider

    $('.shop-thumb').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: '<span class="prev"><i class="fa fa-angle-left"></i></span>',
        nextArrow: '<span class="next"><i class="fa fa-angle-right"></i></span>',
        fade: false,
        asNavFor: '.shop-thumb-active',
        rtl: rtl == 1 ? true : false
    });
    $('.shop-thumb-active').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.shop-thumb',
        dots: false,
        centerMode: true,
        arrows: true,
        prevArrow: '<span class="prev"><i class="fa fa-angle-left"></i></span>',
        nextArrow: '<span class="next"><i class="fa fa-angle-right"></i></span>',
        centerPadding: "0",
        focusOnSelect: true,
        rtl: rtl == 1 ? true : false
    });


    // language dropdown toggle on clicking button
    $('.language-btn').on('click', function (event) {
        event.preventDefault();
        event.stopPropagation();
        $(this).next('.language-dropdown').toggleClass('open');
    });
    $(document).on('click', function (event) {
        if ($('.language-dropdown').hasClass('open')) {
            $('.language-dropdown').removeClass('open');
        }
    });

    //====== Magnific Popup

    $('.video-popup').magnificPopup({
        type: 'iframe'
        // other options
    });


    //===== Magnific Popup

    $('.image-popup').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        },
        image: {
            titleSrc: 'title'
        }
    });


    //===== niceSelect js

    $('select').niceSelect();


    // datepicker & timepicker
    $( "#datepicker" ).datepicker();
    $('input.timepicker').timepicker();


    // subscribe functionality
    if ($("#subscribeForm").length > 0) {
        $("#subscribeForm").on('submit', function (e) {

            e.preventDefault();

            let formId = $(this).attr('id');
            let fd = new FormData(document.getElementById(formId));
            let $this = $(this);

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: fd,
                contentType: false,
                processData: false,
                success: function (data) {
                    if ((data.errors)) {
                        $(".err-email").html(data.errors.email[0]);
                    } else {
                        toastr["success"]("You are subscribed successfully!");
                        $this.trigger('reset');
                        $(".err-email").html('');
                    }
                }
            });
        });
    }


    if (is_announcement == 1) {
        // trigger announcement banner base on sessionStorage
        let announcement = sessionStorage.getItem('announcement') != null ? false : true;
        if (announcement) {
            setTimeout(function () {
                $('.announcement-banner').trigger('click');
            }, announcement_delay * 1000);
        }
    }

    // announcement banner magnific popup
    if (is_announcement == 1) {

        $('.announcement-banner').magnificPopup({
            type: 'image',
            mainClass: 'mfp-fade',
            callbacks: {
                open: function () {
                    $.magnificPopup.instance.close = function () {
                        // Do whatever else you need to do here
                        sessionStorage.setItem("announcement", "closed");

                        // Call the original close method to close the announcement
                        $.magnificPopup.proto.close.call(this);
                    };
                }
            }
        });
    }






    //===== WOW js
    new WOW().init();



    //===== product quantity

    $('.add').on('click', function () {
        if ($(this).prev().val()) {
            $(this).prev().val(+$(this).prev().val() + 1);
        }
    });
    $('.sub').on('click', function () {
        if ($(this).next().val() > 1) {
            if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
        }
    });





    //===== 









});
