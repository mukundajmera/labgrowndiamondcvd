/**
 * Product Detail Page (PDP) JavaScript
 * Lab Grown Diamond CVD - Phase 1
 */

(function ($) {
    'use strict';

    $(document).ready(function () {

        /**
         * Tab Switching
         */
        $('.lgd-pdp__tab').on('click', function () {
            var tabId = $(this).data('tab');
            
            // Update tab buttons
            $('.lgd-pdp__tab').removeClass('active');
            $(this).addClass('active');
            
            // Update tab content
            $('.lgd-pdp__tab-panel').removeClass('active');
            $('#tab-' + tabId).addClass('active');
        });

        /**
         * Pincode Delivery ETA Checker
         */
        $('.lgd-pincode-check').on('click', function () {
            var pincode = $('.lgd-pincode-input').val();
            
            if (!pincode || pincode.length !== 6) {
                alert('Please enter a valid 6-digit pincode');
                return;
            }
            
            // Mock delivery calculation
            // In production, this would call an API
            var deliveryDays = Math.floor(Math.random() * 5) + 3; // 3-7 days
            var deliveryDate = new Date();
            deliveryDate.setDate(deliveryDate.getDate() + deliveryDays);
            
            var dateStr = deliveryDate.toLocaleDateString('en-IN', {
                weekday: 'short',
                month: 'short',
                day: 'numeric'
            });
            
            $('.lgd-delivery-eta').text('Expected delivery by ' + dateStr).show();
        });

        /**
         * Add Tax Note Below Price
         */
        if ($('.lgd-pdp__summary .price').length && !$('.lgd-tax-note').length) {
            $('.lgd-pdp__summary .price').after('<p class="lgd-tax-note">Inclusive of all taxes</p>');
        }

        /**
         * Certificate Link Enhancement
         */
        $('.lgd-view-certificate-btn').on('click', function (e) {
            // If no actual certificate URL is set, show placeholder
            var href = $(this).attr('href');
            if (href === '#' || !href) {
                e.preventDefault();
                alert('Certificate viewing feature coming soon! Certificate will be available once the order is confirmed.');
            }
        });

        /**
         * 360° Viewer Toggle (if available)
         */
        if ($('.lgd-pdp__360-viewer').length) {
            // Placeholder for future 360° viewer implementation
            // This would integrate with a 360° image viewer library
        }

        /**
         * Image Gallery Enhancement
         */
        if ($('.woocommerce-product-gallery').length) {
            // Ensure gallery is properly initialized
            // WooCommerce should handle this, but we can add enhancements
        }

        /**
         * Smooth Scroll to Tabs
         */
        $('a[href^="#tab-"]').on('click', function (e) {
            e.preventDefault();
            var target = $(this).attr('href').replace('#tab-', '');
            
            // Activate the tab
            $('.lgd-pdp__tab[data-tab="' + target + '"]').trigger('click');
            
            // Scroll to tabs section
            $('html, body').animate({
                scrollTop: $('.lgd-pdp__specs-section').offset().top - 100
            }, 600);
        });

        /**
         * Add to Compare from PDP
         */
        $('.lgd-pdp').on('click', '.add-to-compare', function (e) {
            e.preventDefault();
            
            var productId = $(this).data('product-id');
            var compareList = JSON.parse(localStorage.getItem('compareList') || '[]');
            
            if (compareList.length >= 4) {
                alert('You can compare maximum 4 products');
                return;
            }
            
            if (!compareList.includes(productId)) {
                compareList.push(productId);
                localStorage.setItem('compareList', JSON.stringify(compareList));
                
                // Update compare count in header
                var compareCount = compareList.length;
                $('#compare-count').text(compareCount).show();
                
                // Show feedback
                $(this).text('Added to Compare').prop('disabled', true);
            }
        });

        /**
         * Quantity Input Enhancement
         */
        $('.quantity input').on('change', function () {
            var min = parseInt($(this).attr('min')) || 1;
            var max = parseInt($(this).attr('max')) || 999;
            var val = parseInt($(this).val());
            
            if (val < min) {
                $(this).val(min);
            } else if (val > max) {
                $(this).val(max);
            }
        });

        /**
         * Virtual Consultation Modal (Basic)
         */
        $('.lgd-pdp__consultation-btn').on('click', function (e) {
            // If the link is just a placeholder, show alert
            var href = $(this).attr('href');
            if (href === '#' || href.includes('book-consultation')) {
                e.preventDefault();
                alert('Virtual consultation booking feature coming soon! Please contact us via WhatsApp or phone for immediate assistance.');
            }
        });

        /**
         * Product Variation Select Enhancement
         */
        if ($('.variations select').length) {
            $('.variations select').on('change', function () {
                // Trigger any necessary updates
                // WooCommerce handles this, but we can add custom behavior
            });
        }

    });

})(jQuery);
