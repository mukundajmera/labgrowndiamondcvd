/**
 * Product Detail Page (PDP) JavaScript
 * Lab Grown Diamond CVD - Phase 1
 */

(function ($) {
    'use strict';

    /**
     * Utility function to show notifications
     */
    function showNotification(message, type) {
        type = type || 'info';
        var bgColor = type === 'error' ? '#e74c3c' : '#0047AB';
        
        var notification = $('<div class="lgd-notification">' + message + '</div>');
        notification.css({
            'position': 'fixed',
            'top': '20px',
            'right': '20px',
            'background': bgColor,
            'color': '#fff',
            'padding': '15px 20px',
            'border-radius': '4px',
            'box-shadow': '0 4px 12px rgba(0,0,0,0.15)',
            'z-index': '9999',
            'max-width': '300px',
            'font-size': '14px',
            'line-height': '1.5'
        });
        
        $('body').append(notification);
        setTimeout(function() {
            notification.fadeOut(300, function() { $(this).remove(); });
        }, 3000);
    }

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
                showNotification('Please enter a valid 6-digit pincode', 'error');
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
                showNotification('Certificate will be available once the order is confirmed. Please contact us for more details.', 'info');
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
                showNotification('You can compare maximum 4 products. Please remove one to add another.', 'error');
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
                showNotification('Virtual consultation booking coming soon! Please contact us via phone or WhatsApp for immediate assistance.', 'info');
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
