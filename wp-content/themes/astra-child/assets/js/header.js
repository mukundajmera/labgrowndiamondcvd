/**
 * Header & Navigation JavaScript
 * Lab Grown Diamond CVD - Phase 1
 */

(function ($) {
    'use strict';

    $(document).ready(function () {
        
        /**
         * Sticky Header
         */
        function stickyHeader() {
            var header = $('.lgd-header');
            var scrollPosition = $(window).scrollTop();
            
            if (scrollPosition > 100) {
                header.addClass('sticky');
            } else {
                header.removeClass('sticky');
            }
        }

        // Initial check
        stickyHeader();

        // On scroll
        $(window).on('scroll', function () {
            stickyHeader();
        });

        /**
         * Mobile Drawer Toggle
         */
        $('.lgd-header__mobile-toggle').on('click', function () {
            $('.lgd-mobile-drawer').addClass('active');
            $('body').css('overflow', 'hidden');
        });

        $('.lgd-mobile-drawer__close, .lgd-mobile-drawer__overlay').on('click', function () {
            $('.lgd-mobile-drawer').removeClass('active');
            $('body').css('overflow', '');
        });

        /**
         * Mobile Menu Accordion
         */
        $('.lgd-mobile-nav .menu-item-has-children > a').on('click', function (e) {
            e.preventDefault();
            var parent = $(this).parent();
            parent.toggleClass('open');
            parent.find('> .sub-menu').slideToggle(300);
        });

        /**
         * Search Overlay Toggle
         */
        $('.lgd-header__search-toggle').on('click', function () {
            $('.lgd-search-overlay').addClass('active');
            $('.lgd-search-input').focus();
            $('body').css('overflow', 'hidden');
        });

        $('.lgd-search-overlay__close').on('click', function () {
            $('.lgd-search-overlay').removeClass('active');
            $('body').css('overflow', '');
        });

        // Close on ESC key
        $(document).on('keyup', function (e) {
            if (e.key === 'Escape' || e.keyCode === 27) {
                $('.lgd-search-overlay').removeClass('active');
                $('.lgd-mobile-drawer').removeClass('active');
                $('body').css('overflow', '');
            }
        });

        /**
         * Mega Menu (Basic Implementation)
         * Shows/hides mega menu on hover for menu items with children
         */
        var megaMenuTimer;

        $('.lgd-nav-menu > .menu-item-has-children').on('mouseenter', function () {
            clearTimeout(megaMenuTimer);
            var menuItem = $(this);
            var megaMenu = $('.lgd-mega-menu');
            
            // Get the menu item slug or ID to load specific mega menu content
            var menuSlug = menuItem.find('> a').attr('href');
            
            // For now, show basic mega menu structure
            // This can be enhanced with AJAX to load dynamic content
            megaMenu.stop().slideDown(200);
        });

        $('.lgd-nav-menu > .menu-item-has-children, .lgd-mega-menu').on('mouseleave', function () {
            megaMenuTimer = setTimeout(function () {
                $('.lgd-mega-menu').stop().slideUp(200);
            }, 300);
        });

        $('.lgd-mega-menu').on('mouseenter', function () {
            clearTimeout(megaMenuTimer);
        });

        /**
         * Update Cart Count on AJAX
         */
        $(document.body).on('added_to_cart removed_from_cart', function (e, fragments, cart_hash, button) {
            updateCartCount();
        });

        function updateCartCount() {
            // Check if WooCommerce params are available
            if (typeof wc_add_to_cart_params === 'undefined' || !wc_add_to_cart_params.ajax_url) {
                return;
            }
            
            $.ajax({
                url: wc_add_to_cart_params.ajax_url,
                type: 'POST',
                data: {
                    action: 'get_cart_count'
                },
                success: function (response) {
                    if (response.success) {
                        var count = response.data.count;
                        var cartCountEl = $('.lgd-header__cart-count');
                        
                        if (count > 0) {
                            if (cartCountEl.length) {
                                cartCountEl.text(count);
                            } else {
                                $('.lgd-header__cart').append('<span class="lgd-header__cart-count">' + count + '</span>');
                            }
                        } else {
                            cartCountEl.remove();
                        }
                    }
                }
            });
        }

        /**
         * Smooth Scroll for Anchor Links
         */
        $('a[href*="#"]:not([href="#"])').on('click', function (e) {
            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') &&
                location.hostname === this.hostname) {
                
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                
                if (target.length) {
                    e.preventDefault();
                    var headerHeight = $('.lgd-header__main').outerHeight();
                    
                    $('html, body').animate({
                        scrollTop: target.offset().top - headerHeight - 20
                    }, 800);
                }
            }
        });

        /**
         * Enhance Search with Autocomplete (Basic)
         */
        var searchTimer;
        $('.lgd-search-input').on('keyup', function () {
            clearTimeout(searchTimer);
            var query = $(this).val();
            
            if (query.length > 2) {
                searchTimer = setTimeout(function () {
                    // This can be enhanced with AJAX autocomplete
                    // For now, it's a placeholder
                }, 300);
            }
        });

    });

})(jQuery);
