/**
 * EGovt Theme JavaScript
 *
 * @package EGovt
 */

(function($) {
    'use strict';

    // Document Ready
    $(document).ready(function() {
        
        // Mobile menu toggle
        $('.menu-toggle').on('click', function() {
            $('.main-nav').toggleClass('active');
        });

        // Back to top button
        $(window).scroll(function() {
            if ($(this).scrollTop() > 300) {
                $('.back-to-top').addClass('visible');
            } else {
                $('.back-to-top').removeClass('visible');
            }
        });

        $('.back-to-top').on('click', function() {
            $('html, body').animate({
                scrollTop: 0
            }, 500);
        });

        // Hero slider functionality
        if ($('.hero-slider').length) {
            let currentSlide = 0;
            const slides = $('.slide');
            const dots = $('.dot');
            
            function showSlide(index) {
                slides.removeClass('active');
                dots.removeClass('active');
                $(slides[index]).addClass('active');
                $(dots[index]).addClass('active');
                currentSlide = index;
            }
            
            dots.on('click', function() {
                const index = $(this).data('index');
                showSlide(index);
            });
            
            // Auto slide
            setInterval(function() {
                let next = (currentSlide + 1) % slides.length;
                showSlide(next);
            }, 5000);
        }

        // Smooth scroll for anchor links
        $('a[href*="#"]').on('click', function(e) {
            if (this.hash !== '') {
                e.preventDefault();
                const hash = this.hash;
                $('html, body').animate({
                    scrollTop: $(hash).offset().top - 70
                }, 800);
            }
        });

    });

})(jQuery);
