$(document).ready(function() {
    "use strict";

    /* ----------------------------------------------------------------------
        Flickr
    ---------------------------------------------------------------------- */

    $(".flickr-cbox").jflickrfeed({
        limit: 9,
        qstrings: {
            id: "52617155@N08"
        },
        itemTemplate: '<li>' + '<a href="{{image}}" title="{{title}}">' + '<img src="{{image_s}}" alt="{{title}}" />' + '</a>' + '</li>'
    }, function(data) {

        $(".flickr-cbox a").nivoLightbox({
            effect: "fadeScale"
        });

    });

    /* ----------------------------------------------------------------------
        Typed
    ---------------------------------------------------------------------- */

    $(".typed").typed({
        strings: ["Responsive", "Multipurpose", "Clean", "Modern"],
        typeSpeed: 100,
        backDelay: 500,
        loop: true
    });

    $(".typed2").typed({
        strings: ["First sentence", "Second sentence", "Third sentence"],
        typeSpeed: 100,
        backDelay: 500,
        loop: true
    });

    /* ----------------------------------------------------------------------
        Bootstrap - submenu
    ---------------------------------------------------------------------- */

    $("[data-submenu]").submenupicker();

    /* ----------------------------------------------------------------------
        Bootstrap - Tooltip/popover
    ---------------------------------------------------------------------- */

    $("[data-toggle=tooltip]").tooltip();
    $("[data-toggle=popover]").popover();

    /* ----------------------------------------------------------------------
        Sticky
    ---------------------------------------------------------------------- */

    var header = $("#header");
    $(window).on("scroll", function() {
        if ($(this).scrollTop() > 65) {
            header.addClass("sticky-header sticky-slideInDown");
        } else {
            header.removeClass("sticky-header sticky-slideInDown");
        }
    });
    header.sticky({
        topSpacing: 0
    });

    /* ----------------------------------------------------------------------
        Back to Top
    ---------------------------------------------------------------------- */

    var backtotop = $("#back-to-top");
    $(window).on("scroll", function() {
        if ($(this).scrollTop() > 100) {
            backtotop.fadeIn();
        } else {
            backtotop.fadeOut();
        }
    });
    backtotop.on("click", "a", function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    /* ----------------------------------------------------------------------
        Skill Bar
    ---------------------------------------------------------------------- */

    $(".skillbar-percent").each(function() {
        $(this).animate({
            width: $(this).attr("data-percent")
        }, 3000);
    });

    /* ----------------------------------------------------------------------
        Accordion
    ---------------------------------------------------------------------- */

    $(".accordion-content").hide();
    $(".accordion-content.opened").show();
    $(".accordion-container").on("click", "h4", function() {
        $(this).next().slideToggle(300).siblings("div:visible").slideUp(300);
        $(this).toggleClass("active");
        $(this).siblings("h4").removeClass("active");
        return false;
    });

    /* ----------------------------------------------------------------------
        Toggle
    ---------------------------------------------------------------------- */

    $(".toggle-content").hide();
    $(".toggle-content.opened").show();
    $(".toggle-container").on("click", "h4", function() {
        $(this).next().slideToggle(300);
        $(this).toggleClass("active");
        return false;
    });

    /* ----------------------------------------------------------------------
        Easy Tabs
    ---------------------------------------------------------------------- */

    $(".tab-container").easytabs({
        updateHash: false,
        animate: false
    });

    $(".tab-side-container").easytabs({
        updateHash: false,
        animate: false,
        tabActiveClass: "selected-tab",
        panelActiveClass: "displayed"
    });

    /* ----------------------------------------------------------------------
        Nivo Lightbox
    ---------------------------------------------------------------------- */

    $(".nivo-lightbox").nivoLightbox({
        effect: "fadeScale"
    });

    $(".nivo-lightbox-video").nivoLightbox({
        effect: "fade"
    });

    /* ----------------------------------------------------------------------
        ContactForm
    ---------------------------------------------------------------------- */

    // Validation
    var commentform = $(".commentForm");
    var commentform2 = $(".commentForm2");
    var commentform3 = $(".commentForm3");
    var commentform4 = $(".commentForm4");
    commentform.validate();
    commentform2.validate();
    commentform3.validate();
    commentform4.validate();

    // Ajax Form
    var options = {
        target: ".message",
        url: "contact.php",
        resetForm: true
    };
    var options2 = {
        target: ".message2",
        url: "contact2.php",
        resetForm: true
    };
    var options3 = {
        target: ".message3",
        url: "contact3.php",
        resetForm: true
    };
    var options4 = {
        target: ".message4",
        url: "contact4.php",
        resetForm: true
    };
    commentform.ajaxForm(options);
    commentform2.ajaxForm(options2);
    commentform3.ajaxForm(options3);
    commentform4.ajaxForm(options4);

    /* ----------------------------------------------------------------------
        mb-YTPlayer
    ---------------------------------------------------------------------- */

    $(".mbyt-player").mb_YTPlayer();

    /* ----------------------------------------------------------------------
        Simple Placeholder
    ---------------------------------------------------------------------- */

    $("input[placeholder]").simplePlaceholder();
    $("textarea[placeholder]").simplePlaceholder();

    /* ----------------------------------------------------------------------
        Top Panel
    ---------------------------------------------------------------------- */

    $("#toppanel").on("click", ".toppanel-button", function() {
        $(".toppanel").slideToggle("slow");
        $(this).toggleClass("active");
        return false;
    });

    /* ----------------------------------------------------------------------
        Bottom Panel
    ---------------------------------------------------------------------- */

    $("#bottompanel").on("click", ".bottompanel-button", function() {
        $(".bottompanel").slideToggle("slow");
        $(this).toggleClass("active");
        return false;
    });

    /* ----------------------------------------------------------------------
        Fake Loader
    ---------------------------------------------------------------------- */

    $("#fakeloader").fakeLoader({
        timeToHide: 1200,
        bgColor: "#4ca6ff",
        spinner: "spinner7",
        zIndex: "9999999"
    });

    /* ----------------------------------------------------------------------
        Hover Effect Da Thumbs
    ---------------------------------------------------------------------- */

    $(".da-thumbs").each(function() {
        $(this).hoverdir();
    });

    /* ----------------------------------------------------------------------
        SmoothScroll
    ---------------------------------------------------------------------- */

    smoothScroll.init({
        speed: 1000,
        easing: "easeInOutCubic",
        offset: 0,
        updateURL: false
    });

    /* ----------------------------------------------------------------------
        Chart Waypoint
    ---------------------------------------------------------------------- */

    $(".chart").waypoint(function(direction) {
        $(this.element).easyPieChart({
            easing: "easeOutBounce",
            onStep: function(from, to, percent) {
                $(this.el).find(".percent").text(Math.round(percent));
            }
        });
    }, {
        offset: "90%"
    });

    /* ----------------------------------------------------------------------
        Animated Waypoint
    ---------------------------------------------------------------------- */

    var animated = $(".animated");
    animated.css("opacity", 0);
    animated.waypoint(function(direction) {
        $(this.element).css("opacity", 1);
    }, {
        offset: "90%"
    });

    animated.waypoint(function(direction) {
        $(this.element).addClass($(this.element).data("animation"));
    }, {
        offset: "90%"
    });

    /* ----------------------------------------------------------------------
        Owl Carousel
    ---------------------------------------------------------------------- */

    // slider
    $(".owl-slider").owlCarousel({
        pagination: true,
        navigation: true,
        autoPlay: 10000,
        navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        transitionStyle: "fade",
        addClassActive: true,
        afterMove: previousslide,
        beforeMove: nextslide,
        singleItem: true
    });
    $(".owl-slider .active .owl-fadeInUp").addClass("animated fadeInUp");
    $(".owl-slider .active .owl-fadeInDown").addClass("animated fadeInDown");
    $(".owl-slider .active .owl-fadeInLeft").addClass("animated fadeInLeft");
    $(".owl-slider .active .owl-fadeInRight").addClass("animated fadeInRight");
    $(".owl-slider .active .owl-bounceIn").addClass("animated bounceIn");

    function previousslide() {
        $(".owl-slider .active .owl-fadeInUp").addClass("animated fadeInUp");
        $(".owl-slider .active .owl-fadeInDown").addClass("animated fadeInDown");
        $(".owl-slider .active .owl-fadeInLeft").addClass("animated fadeInLeft");
        $(".owl-slider .active .owl-fadeInRight").addClass("animated fadeInRight");
        $(".owl-slider .active .owl-bounceIn").addClass("animated bounceIn");
    }

    function nextslide() {
        $(".owl-slider .active .owl-fadeInUp").removeClass("animated fadeInUp");
        $(".owl-slider .active .owl-fadeInDown").removeClass("animated fadeInDown");
        $(".owl-slider .active .owl-fadeInLeft").removeClass("animated fadeInLeft");
        $(".owl-slider .active .owl-fadeInRight").removeClass("animated fadeInRight");
        $(".owl-slider .active .owl-bounceIn").removeClass("animated bounceIn");
    }

    // Five images
    $(".owl-image").owlCarousel({
        items: 5,
        navigation: true,
        navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        pagination: false
    });

    // Three images
    $(".owl-image3").owlCarousel({
        items: 3,
        autoPlay: true,
        navigation: true,
        navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        pagination: false
    });

    // single
    $(".owl-single").owlCarousel({
        pagination: true,
        navigation: false,
        transitionStyle: "backSlide",
        singleItem: true
    });

    // testimonial
    $(".owl-testimonial").owlCarousel({
        singleItem: true,
        autoPlay: 5000,
        navigation: false,
        paginationSpeed: 1000,
        autoHeight: true,
        stopOnHover: true,
        goToFirstSpeed: 2000,
        transitionStyle: "fade"
    });

    // client
    $(".owl-client").owlCarousel({
        items: 7,
        autoPlay: true,
        navigation: false,
        pagination: false
    });

    // shop single
    var sync1 = $("#sync1");
    var sync2 = $("#sync2");
    sync1.owlCarousel({
        singleItem: true,
        slideSpeed: 1000,
        navigation: false,
        pagination: false,
        afterAction: syncPosition,
        responsiveRefreshRate: 200,
    });
    sync2.owlCarousel({
        items: 3,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [979, 3],
        itemsTablet: [768, 3],
        itemsMobile: [479, 3],
        navigation: true,
        navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        pagination: false,
        responsiveRefreshRate: 100,
        afterInit: function(el) {
            el.find(".owl-item").eq(0).addClass("synced");
        }
    });

    function syncPosition(el) {
        var current = this.currentItem;
        sync2
            .find(".owl-item")
            .removeClass("synced")
            .eq(current)
            .addClass("synced")
        if (sync2.data("owlCarousel") !== undefined) {
            center(current)
        }
    }
    sync2.on("click", ".owl-item", function(e) {
        e.preventDefault();
        var number = $(this).data("owlItem");
        sync1.trigger("owl.goTo", number);
    });

    function center(number) {
        var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
        var num = number;
        var found = false;
        for (var i in sync2visible) {
            if (num === sync2visible[i]) {
                var found = true;
            }
        }
        if (found === false) {
            if (num > sync2visible[sync2visible.length - 1]) {
                sync2.trigger("owl.goTo", num - sync2visible.length + 2)
            } else {
                if (num - 1 === -1) {
                    num = 0;
                }
                sync2.trigger("owl.goTo", num);
            }
        } else if (num === sync2visible[sync2visible.length - 1]) {
            sync2.trigger("owl.goTo", sync2visible[1])
        } else if (num === sync2visible[0]) {
            sync2.trigger("owl.goTo", num - 1)
        }
    }

    /* ----------------------------------------------------------------------
            Isotope
        ---------------------------------------------------------------------- */

    $(window).on("load", function() {

        // Isotope FitRows
        var $container = $(".isotope").isotope({
            itemSelector: ".element-item",
            layoutMode: "fitRows"
        });

        $(".filters").on("click", "button", function() {
            var filterValue = $(this).attr("data-filter");
            $container.isotope({
                filter: filterValue
            });
        });

        $(".button-group").each(function(i, buttonGroup) {
            var $buttonGroup = $(buttonGroup);
            $buttonGroup.on("click", "button", function() {
                $buttonGroup.find(".is-checked").removeClass("is-checked");
                $(this).addClass("is-checked");
            });
        });

        // Isotope Fullwidth
        var $container2 = $(".isotope-fullwidth").isotope({
            itemSelector: ".element-item",
            layoutMode: "fitRows"
        });

        $(".filters-fullwidth").on("click", "button", function() {
            var filterValue = $(this).attr("data-filter");
            $container2.isotope({
                filter: filterValue
            });
        });

        $(".button-group2").each(function(i, buttonGroup2) {
            var $buttonGroup2 = $(buttonGroup2);
            $buttonGroup2.on("click", "button", function() {
                $buttonGroup2.find(".is-checked").removeClass("is-checked");
                $(this).addClass("is-checked");
            });
        });

        // Isotope Masonry Post
        var $container3 = $(".isotope-masonry-post").isotope({
            itemSelector: ".element-item",
            layoutMode: "masonry"
        });

        $(".filters-masonry-post").on("click", "button", function() {
            var filterValue = $(this).attr("data-filter");
            $container3.isotope({
                filter: filterValue
            });
        });

        $(".button-group3").each(function(i, buttonGroup3) {
            var $buttonGroup3 = $(buttonGroup3);
            $buttonGroup3.on("click", "button", function() {
                $buttonGroup3.find(".is-checked").removeClass("is-checked");
                $(this).addClass("is-checked");
            });
        });

        // Isotope Masonry
        var $container4 = $(".isotope-masonry").isotope({
            itemSelector: ".grid-item",
            percentPosition: true,
            masonry: {
                columnWidth: ".grid-sizer"
            }
        })

        $(".filters-masonry").on("click", "button", function() {
            var filterValue = $(this).attr("data-filter");
            $container4.isotope({
                filter: filterValue
            });
        });

        $(".button-group4").each(function(i, buttonGroup4) {
            var $buttonGroup4 = $(buttonGroup4);
            $buttonGroup4.on("click", "button", function() {
                $buttonGroup4.find(".is-checked").removeClass("is-checked");
                $(this).addClass("is-checked");
            });
        });

        // Isotope select menu
        var $container5 = $(".isotope-shop").isotope({
            itemSelector: ".element-item",
            layoutMode: "fitRows"
        });

        $(".filters-shop").on("change", function() {
            var filterValue = this.value;
            $container5.isotope({
                filter: filterValue
            });
        });

    });


});
