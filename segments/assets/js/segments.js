jQuery(document).ready(function($) {
    'use strict';

    /**
     * Toggle menu 
     */
    $('.header-toggle').on('click', function() {
        $('body').toggleClass('navigation-open');
    });

    /**
     * Toggle secondary sidebar
     */
    $('.header-toggle-secondary, .secondary-wrapper .close').on('click', function() {
        $('body').toggleClass('navigation-secondary-open');
    });

    $('.secondary-wrapper, .side-inner').TrackpadScrollEmulator();
    
    /**
     * Scroll
     */
    $(window).scroll(function() {
        if ($(this).scrollTop() > 220){
            $('.header-sticky').addClass('active');
        }
        else{
            $('.header-sticky').removeClass('active');
        }
    });
    
    /**
     * Toggle side
     */
    $('.side-toggle').on('click', function() {
        if ($('body').hasClass('side-xs')) {
            Cookies.remove('side');
        } else {
            Cookies.set('side', 'yes' );
        }

        $('body').toggleClass('side-xs');
    });

    /**
     * Hero particles
     */
    var el = $('#hero-particles');
    if (el.length) {
        particlesJS.load('hero-particles', '/wp-content/themes/segments/assets/particles.json', function() {});
    }

    /**
     * Custom radio & checkbox
     */
    $('input[type=checkbox]').wrap('<div class="checkbox-wrapper"/>');
    $('.checkbox-wrapper').append('<span class="indicator"></span>');

    $('input[type=radio]').wrap('<div class="radio-wrapper"/>');
    $('.radio-wrapper').append('<span class="indicator"></span>');

    /**
     * Tooltipster
     */
    $('.side .widgettitle').tooltipster({
        side: 'right',
        functionBefore: function(instance, helper) {
            instance.content($(helper.origin).text());
        }
    });
    
    /**
     * Alerts
     */
    $('.alert-close').on('click', function() {
        $(this).closest('.alert').remove();
    });
});