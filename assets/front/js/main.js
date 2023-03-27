function popupAnnouncement($this) {
    let closedPopups = [];
    if (sessionStorage.getItem('closedPopups')) {
        closedPopups = JSON.parse(sessionStorage.getItem('closedPopups'));
    }
    
    // if the popup is not in closedPopups Array
    if (closedPopups.indexOf($this.data('popup_id')) == -1) {
        // console.log($this.data('popup_id'));
        $('#' + $this.attr('id')).show();
        let popupDelay = $this.data('popup_delay');

        setTimeout(function() {
            jQuery.magnificPopup.open({
                items: {src: '#' + $this.attr('id')},
                type: 'inline',
                callbacks: {
                    afterClose: function() {
                        // after the popup is closed, store it in the sessionStorage & show next popup
                        closedPopups.push($this.data('popup_id'));
                        sessionStorage.setItem('closedPopups', JSON.stringify(closedPopups));
    
                        // console.log('closed', $this.data('popup_id'));
                        if ($this.next('.popup-wrapper').length > 0) {
                            popupAnnouncement($this.next('.popup-wrapper'));
                        }
                    }
                }
            }, 0);
        }, popupDelay);
    } else {
        if ($this.next('.popup-wrapper').length > 0) {
            popupAnnouncement($this.next('.popup-wrapper'));
        }
    }
}

$(function() {

    "use strict";

    $('.offer-timer').each(function() {
        let $this = $(this);
        let d = new Date($this.data('end_date'));
        let ye = parseInt(new Intl.DateTimeFormat('en', {year: 'numeric'}).format(d));
        let mo = parseInt(new Intl.DateTimeFormat('en', {month: 'numeric'}).format(d));
        let da = parseInt(new Intl.DateTimeFormat('en', {day: '2-digit'}).format(d));
        let t = $this.data('end_time');
        let time = t.split(":");
        let hr = parseInt(time[0]);
        let min = parseInt(time[1]);
        $this.syotimer({
            year: ye,
            month: mo,
            day: da,
            hour: hr,
            minute: min,
        });
    });

    

    $(window).on('load', function(event) {
        if ($(".popup-wrapper").length > 0) {
            let $firstPopup = $(".popup-wrapper").eq(0);
            popupAnnouncement($firstPopup);
        }

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

    // select2
    $('.select2').select2();


    //===== Sticky

    $(window).on('scroll', function(event) {
        var scroll = $(window).scrollTop();
        if (scroll < 110) {
            $(".navigation").removeClass("sticky");
        } else {
            $(".navigation").addClass("sticky");
        }
    });

    //===== Mobile Menu 

    $(".navbar-toggler").on('click', function() {
        $(this).toggleClass('active');
    });

    $(".navbar-nav a").on('click', function() {
        $(".navbar-toggler").removeClass('active');
    });
    var subMenu = $(".sub-menu-bar .navbar-nav .sub-menu");

    if (subMenu.length) {
        subMenu.parent('li').children('a').append(function() {
            return '<button class="sub-nav-toggler"> <i class="fa fa-plus"></i> </button>';
        });
        subMenu.parent('li').children('a').addClass('hasChildren');

    }

    $("a.hasChildren").on('click', function(e) {
        e.preventDefault();

        if (!$(this).next("ul.sub-menu").hasClass("d-block")) {
            $(this).next("ul.sub-menu").removeClass("d-none");
            $(this).next("ul.sub-menu").addClass("d-block");
        } else if (!$(this).next("ul.sub-menu").hasClass("d-none")) {
            $(this).next("ul.sub-menu").removeClass("d-block");
            $(this).next("ul.sub-menu").addClass("d-none");
        }
    })



    // Single Features Active
    $('.instagram-area').on('mouseover', '.instagram-item', function() {
        $('.instagram-item.active').removeClass('active');
        $(this).addClass('active');
    });



    //===== Isotope Project 1

    $('.container').imagesLoaded(function() {
        var $grid = $('.grid').isotope({
            // options
            transitionDuration: '1s'
        });

        // filter items on button click
        $('.project-menu ul').on('click', 'li', function() {
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({
                filter: filterValue
            });
        });

        //for menu active class
        $('.project-menu ul li').on('click', function(event) {
            $(this).siblings('.active').removeClass('active');
            $(this).addClass('active');
            event.preventDefault();
        });
    });

    // Go to Top
    // Scroll Event
    $(window).on('scroll', function() {
        var scrolled = $(window).scrollTop();
        if (scrolled > 300) $('.go-top').addClass('active');
        if (scrolled < 300) $('.go-top').removeClass('active');
    });

    // Click Event
    $('.go-top').on('click', function() {
        $("html, body").animate({
            scrollTop: "0"
        }, 500);
    });



    //===== banner animation slick slider
    function mainSlider() {
        var BasicSlider = $('.banner-slide');
        var BasicSlider2 = $('.banner-slide-2');
        var BasicSlider3 = $('.banner-slide-3');

        BasicSlider.on('init', function(e, slick) {
            var $firstAnimatingElements = $('.banner-area:first-child').find('[data-animation]');
            doAnimations($firstAnimatingElements);
        });
        BasicSlider2.on('init', function(e, slick) {
            var $firstAnimatingElements = $('.banner-area:first-child').find('[data-animation]');
            doAnimations($firstAnimatingElements);
        });
        BasicSlider3.on('init', function(e, slick) {
            var $firstAnimatingElements = $('.banner-area:first-child').find('[data-animation]');
            doAnimations($firstAnimatingElements);
        });
        BasicSlider.on('beforeChange', function(e, slick, currentSlide, nextSlide) {
            var $animatingElements = $('.banner-area[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
            doAnimations($animatingElements);
        });
        BasicSlider2.on('beforeChange', function(e, slick, currentSlide, nextSlide) {
            var $animatingElements = $('.banner-area[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
            doAnimations($animatingElements);
        });
        BasicSlider3.on('beforeChange', function(e, slick, currentSlide, nextSlide) {
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
            responsive: [{
                breakpoint: 1200,
                settings: {
                    dots: false,
                    arrows: false
                }
            }]
        });

        function doAnimations(elements) {
            var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
            elements.each(function() {
                var $this = $(this);
                var $animationDelay = $this.data('delay');
                var $animationType = 'animated ' + $this.data('animation');
                $this.css({
                    'animation-delay': $animationDelay,
                    '-webkit-animation-delay': $animationDelay
                });
                $this.addClass($animationType).one(animationEndEvents, function() {
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
        responsive: [{
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
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
            }
        }]
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
        responsive: [{
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
    $('.language-btn').on('click', function(event) {
        event.preventDefault();
        event.stopPropagation();
        $(this).next('.language-dropdown').toggleClass('open');
    });
    $(document).on('click', function(event) {
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


    // background video initialization for home 5
    if ($("#bgndVideo").length > 0) {
        $("#bgndVideo").YTPlayer();
    }

    // ripple effect initialization for home 4
    if ($("#waterHome").length > 0) {
        $('#waterHome').ripples({
            resolution: 500,
            dropRadius: 20,
            perturbance: 0.04
        });
    }

    // particles effect initialization for home 3
    if ($("#particles-js").length > 0) {
        particlesJS.load('particles-js', 'assets/front/js/particles.json');
    }


    // datepicker & timepicker
    $("#datepicker").datepicker();
    $("input.datepicker").datepicker();
    $('input.timepicker').timepicker();


    // subscribe functionality
    if ($(".subscribeForm").length > 0) {
        $(".subscribeForm").each(function() {
            let $this = $(this);

            $this.on('submit', function(e) {
    
                e.preventDefault();
    
                let formId = $this.attr('id');
                let fd = new FormData(document.getElementById(formId));
    
                $.ajax({
                    url: $this.attr('action'),
                    type: $this.attr('method'),
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if ((data.errors)) {
                            $this.find(".err-email").html(data.errors.email[0]);
                        } else {
                            toastr["success"]("You are subscribed successfully!");
                            $this.trigger('reset');
                            $this.find(".err-email").html('');
                        }
                    }
                });
            });
        });
    }






    //===== WOW js
    new WOW().init();


    // lazy load init
    var lazyLoadInstance = new LazyLoad();



    //===== product quantity

    $(document).on('click', '.add', function() {
        if ($(this).prev().val()) {
            $(this).prev().val(+$(this).prev().val() + 1);
        }
    });
    $(document).on('click', '.sub', function() {
        if ($(this).next().val() > 1) {
            if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
        }
    });
    //===== 

});


$(window).on('load', function(event) {

    //===== Prealoder
    $('#preloader').fadeOut(500);
});