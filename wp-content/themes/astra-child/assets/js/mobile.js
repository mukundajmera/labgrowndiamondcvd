/**
 * Mobile-Specific Interactions and Optimizations
 * Touch gestures, mobile navigation, and mobile-first features
 */

(function($) {
    'use strict';

    const MobileOptimizations = {
        isMobile: false,
        touchStartX: 0,
        touchStartY: 0,

        init: function() {
            this.detectMobile();
            if (this.isMobile) {
                this.bindEvents();
                this.initMobileFeatures();
            }
        },

        detectMobile: function() {
            this.isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || 
                           window.innerWidth < 768;
        },

        bindEvents: function() {
            // Touch gestures for image galleries
            $('.product-image-gallery').on('touchstart', this.handleTouchStart.bind(this));
            $('.product-image-gallery').on('touchmove', this.handleTouchMove.bind(this));
            $('.product-image-gallery').on('touchend', this.handleTouchEnd.bind(this));

            // Mobile filter toggle
            $('#mobile-filter-toggle').on('click', this.toggleMobileFilters.bind(this));
            $('.mobile-filter-overlay').on('click', this.closeMobileFilters.bind(this));

            // Mobile search toggle
            $('#mobile-search-toggle').on('click', this.toggleMobileSearch.bind(this));

            // Prevent zoom on input focus
            $('input, select, textarea').on('touchstart', this.preventZoom);

            // Sticky mobile cart button
            $(window).on('scroll', this.updateStickyCart.bind(this));

            // Pull to refresh (disabled by default, enable if needed)
            // this.initPullToRefresh();
        },

        initMobileFeatures: function() {
            // Add tap-friendly classes
            $('a, button, .clickable').addClass('tap-friendly');

            // Initialize mobile navigation
            this.initMobileNav();

            // Initialize swipeable carousels
            this.initSwipeCarousel();

            // Initialize sticky elements
            this.initStickyElements();

            // Lazy load images
            this.initLazyLoading();
        },

        handleTouchStart: function(e) {
            this.touchStartX = e.touches[0].clientX;
            this.touchStartY = e.touches[0].clientY;
        },

        handleTouchMove: function(e) {
            if (!this.touchStartX || !this.touchStartY) {
                return;
            }

            const touchEndX = e.touches[0].clientX;
            const touchEndY = e.touches[0].clientY;

            const diffX = this.touchStartX - touchEndX;
            const diffY = this.touchStartY - touchEndY;

            // Horizontal swipe
            if (Math.abs(diffX) > Math.abs(diffY)) {
                if (Math.abs(diffX) > 50) { // Minimum swipe distance
                    if (diffX > 0) {
                        // Swipe left - next image
                        this.navigateGallery('next');
                    } else {
                        // Swipe right - previous image
                        this.navigateGallery('prev');
                    }
                    this.touchStartX = 0;
                    this.touchStartY = 0;
                }
            }
        },

        handleTouchEnd: function() {
            this.touchStartX = 0;
            this.touchStartY = 0;
        },

        navigateGallery: function(direction) {
            const $gallery = $('.product-image-gallery');
            const $current = $gallery.find('.gallery-image.active');
            const $target = direction === 'next' ? $current.next('.gallery-image') : $current.prev('.gallery-image');

            if ($target.length) {
                $current.removeClass('active');
                $target.addClass('active');
                
                // Update thumbnail
                const index = $target.index();
                $('.gallery-thumbnail').removeClass('active');
                $(`.gallery-thumbnail[data-index="${index}"]`).addClass('active');
            }
        },

        toggleMobileFilters: function(e) {
            e.preventDefault();
            $('.mobile-filter-panel').addClass('active');
            $('.mobile-filter-overlay').addClass('active');
            $('body').addClass('filter-open');
        },

        closeMobileFilters: function() {
            $('.mobile-filter-panel').removeClass('active');
            $('.mobile-filter-overlay').removeClass('active');
            $('body').removeClass('filter-open');
        },

        toggleMobileSearch: function(e) {
            e.preventDefault();
            $('.mobile-search-panel').toggleClass('active');
            if ($('.mobile-search-panel').hasClass('active')) {
                $('.mobile-search-panel input').focus();
            }
        },

        preventZoom: function(e) {
            const $input = $(this);
            $input.css('font-size', '16px'); // Prevent zoom on iOS
        },

        updateStickyCart: function() {
            const scrollTop = $(window).scrollTop();
            const $stickyCart = $('.mobile-sticky-cart');

            if (scrollTop > 300) {
                $stickyCart.addClass('visible');
            } else {
                $stickyCart.removeClass('visible');
            }
        },

        initMobileNav: function() {
            // Handle mobile menu accordion
            $('.mobile-menu-item.has-children > a').on('click', function(e) {
                e.preventDefault();
                const $parent = $(this).parent();
                const $submenu = $parent.find('> .submenu');

                $parent.toggleClass('open');
                $submenu.slideToggle(300);
            });

            // Update active nav item
            $('.mobile-nav-item').each(function() {
                const href = $(this).attr('href');
                if (window.location.href.includes(href)) {
                    $(this).addClass('active');
                }
            });
        },

        initSwipeCarousel: function() {
            $('.swipeable-carousel').each(function() {
                const $carousel = $(this);
                let startX, currentX, isDragging = false;

                $carousel.on('touchstart', function(e) {
                    startX = e.touches[0].clientX;
                    isDragging = true;
                });

                $carousel.on('touchmove', function(e) {
                    if (!isDragging) return;
                    
                    currentX = e.touches[0].clientX;
                    const diff = startX - currentX;

                    // Apply transformation
                    $(this).css('transform', `translateX(-${diff}px)`);
                });

                $carousel.on('touchend', function() {
                    isDragging = false;
                    const diff = startX - currentX;

                    if (Math.abs(diff) > 100) {
                        // Swipe threshold met
                        if (diff > 0) {
                            // Next slide
                            MobileOptimizations.carouselNext($carousel);
                        } else {
                            // Previous slide
                            MobileOptimizations.carouselPrev($carousel);
                        }
                    }

                    // Reset position
                    $(this).css('transform', '');
                });
            });
        },

        carouselNext: function($carousel) {
            const $current = $carousel.find('.carousel-item.active');
            const $next = $current.next('.carousel-item');

            if ($next.length) {
                $current.removeClass('active');
                $next.addClass('active');
                this.updateCarouselPosition($carousel);
            }
        },

        carouselPrev: function($carousel) {
            const $current = $carousel.find('.carousel-item.active');
            const $prev = $current.prev('.carousel-item');

            if ($prev.length) {
                $current.removeClass('active');
                $prev.addClass('active');
                this.updateCarouselPosition($carousel);
            }
        },

        updateCarouselPosition: function($carousel) {
            const $active = $carousel.find('.carousel-item.active');
            const index = $active.index();
            const itemWidth = $active.outerWidth();
            const offset = -1 * index * itemWidth;

            $carousel.css('transform', `translateX(${offset}px)`);
        },

        initStickyElements: function() {
            // Make add-to-cart button sticky on mobile product pages
            if ($('.single-product').length) {
                const $addToCart = $('.single_add_to_cart_button');
                const $stickyContainer = $('<div class="mobile-sticky-cart-container"></div>');
                
                $stickyContainer.append($addToCart.clone());
                $('body').append($stickyContainer);

                // Show/hide based on original button visibility
                $(window).on('scroll', function() {
                    const buttonTop = $addToCart.offset().top;
                    const windowBottom = $(window).scrollTop() + $(window).height();

                    if (buttonTop > windowBottom - 100) {
                        $stickyContainer.addClass('visible');
                    } else {
                        $stickyContainer.removeClass('visible');
                    }
                });
            }
        },

        initLazyLoading: function() {
            if ('IntersectionObserver' in window) {
                const lazyImages = document.querySelectorAll('img.lazy');
                
                const imageObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            img.src = img.dataset.src;
                            img.classList.remove('lazy');
                            img.classList.add('loaded');
                            imageObserver.unobserve(img);
                        }
                    });
                });

                lazyImages.forEach(img => imageObserver.observe(img));
            }
        },

        initPullToRefresh: function() {
            let startY = 0;
            let isPulling = false;

            $(document).on('touchstart', function(e) {
                if ($(window).scrollTop() === 0) {
                    startY = e.touches[0].clientY;
                }
            });

            $(document).on('touchmove', function(e) {
                if (startY > 0) {
                    const currentY = e.touches[0].clientY;
                    const diff = currentY - startY;

                    if (diff > 0 && diff < 100) {
                        isPulling = true;
                        $('.pull-to-refresh-indicator').css('opacity', diff / 100);
                    }

                    if (diff >= 100) {
                        $('.pull-to-refresh-indicator').addClass('active');
                    }
                }
            });

            $(document).on('touchend', function() {
                if (isPulling && $('.pull-to-refresh-indicator').hasClass('active')) {
                    location.reload();
                }

                startY = 0;
                isPulling = false;
                $('.pull-to-refresh-indicator').removeClass('active').css('opacity', 0);
            });
        }
    };

    /**
     * Mobile Payment Options
     */
    const MobilePayments = {
        init: function() {
            this.detectPaymentMethods();
            this.bindEvents();
        },

        detectPaymentMethods: function() {
            // Check for Apple Pay
            if (window.ApplePaySession && ApplePaySession.canMakePayments()) {
                $('.apple-pay-button').show();
            }

            // Check for Google Pay
            if (window.PaymentRequest) {
                $('.google-pay-button').show();
            }
        },

        bindEvents: function() {
            $('.apple-pay-button').on('click', this.processApplePay.bind(this));
            $('.google-pay-button').on('click', this.processGooglePay.bind(this));
        },

        processApplePay: function(e) {
            e.preventDefault();
            
            // Apple Pay implementation
            const priceText = $('.total-price').text().replace(/[$,]/g, '');
            const amount = parseFloat(priceText).toFixed(2);
            
            const paymentRequest = {
                countryCode: 'US',
                currencyCode: 'USD',
                total: {
                    label: 'Lab Grown Diamond CVD',
                    amount: amount
                }
            };

            const session = new ApplePaySession(3, paymentRequest);
            
            session.onvalidatemerchant = (event) => {
                // Validate merchant with your server
                console.log('Validating merchant:', event.validationURL);
            };

            session.onpaymentauthorized = (event) => {
                // Process payment with your server
                console.log('Payment authorized:', event.payment);
            };

            session.begin();
        },

        processGooglePay: function(e) {
            e.preventDefault();
            
            // Google Pay implementation
            const priceText = $('.total-price').text().replace(/[$,]/g, '');
            const amount = parseFloat(priceText).toFixed(2);
            
            const supportedPaymentMethods = [{
                supportedMethods: 'https://google.com/pay',
                data: {
                    merchantId: 'YOUR_MERCHANT_ID',
                    merchantName: 'Lab Grown Diamond CVD'
                }
            }];

            const paymentDetails = {
                total: {
                    label: 'Total',
                    amount: {
                        currency: 'USD',
                        value: amount
                    }
                }
            };

            const request = new PaymentRequest(supportedPaymentMethods, paymentDetails);
            
            request.show()
                .then(paymentResponse => {
                    // Process payment
                    console.log('Payment response:', paymentResponse);
                    return paymentResponse.complete('success');
                })
                .catch(error => {
                    console.error('Payment error:', error);
                });
        }
    };

    /**
     * Mobile-Specific WhatsApp Integration
     */
    const MobileWhatsApp = {
        init: function() {
            this.bindEvents();
        },

        bindEvents: function() {
            $('.whatsapp-inquiry-btn').on('click', this.sendInquiry.bind(this));
            $('.whatsapp-share-btn').on('click', this.shareProduct.bind(this));
        },

        sendInquiry: function(e) {
            e.preventDefault();
            
            const productName = $('.product-title').text();
            const productUrl = window.location.href;
            const whatsappNumber = $(this).data('whatsapp-number');
            
            const message = encodeURIComponent(
                `Hi, I'm interested in: ${productName}\n${productUrl}`
            );
            
            window.location.href = `https://wa.me/${whatsappNumber}?text=${message}`;
        },

        shareProduct: function(e) {
            e.preventDefault();
            
            const productName = $('.product-title').text();
            const productUrl = window.location.href;
            
            const message = encodeURIComponent(
                `Check out this diamond: ${productName}\n${productUrl}`
            );
            
            window.location.href = `whatsapp://send?text=${message}`;
        }
    };

    /**
     * Initialize on document ready
     */
    $(document).ready(function() {
        MobileOptimizations.init();
        MobilePayments.init();
        MobileWhatsApp.init();
    });

    /**
     * Re-check on resize
     */
    $(window).on('resize', function() {
        MobileOptimizations.detectMobile();
    });

})(jQuery);
