/**
 * Product Listing Page (PLP) JavaScript
 * Lab Grown Diamond CVD - Phase 1
 */

(function ($) {
    'use strict';

    $(document).ready(function () {

        /**
         * Mobile Filter Toggle
         */
        $('#lgd-filter-toggle').on('click', function () {
            $('.lgd-plp-sidebar').addClass('active');
            $('body').css('overflow', 'hidden');
        });

        $('#lgd-filter-close').on('click', function () {
            $('.lgd-plp-sidebar').removeClass('active');
            $('body').css('overflow', '');
        });

        // Close on click outside
        $(document).on('click', function (e) {
            if (!$(e.target).closest('.lgd-plp-sidebar, #lgd-filter-toggle').length) {
                $('.lgd-plp-sidebar').removeClass('active');
                $('body').css('overflow', '');
            }
        });

        /**
         * Range Slider Updates
         */
        function updateRangeValues() {
            // Carat range
            var caratMin = $('#carat-min').val();
            var caratMax = $('#carat-max').val();
            $('#carat-min-value').text(parseFloat(caratMin).toFixed(1) + 'ct');
            $('#carat-max-value').text(parseFloat(caratMax).toFixed(1) + 'ct');

            // Price range
            var priceMin = $('#price-min').val();
            var priceMax = $('#price-max').val();
            $('#price-min-value').text('₹' + parseInt(priceMin).toLocaleString('en-IN'));
            $('#price-max-value').text('₹' + parseInt(priceMax).toLocaleString('en-IN'));
        }

        $('#carat-min, #carat-max, #price-min, #price-max').on('input', function () {
            updateRangeValues();
        });

        // Initial update
        updateRangeValues();

        /**
         * Apply Filters
         */
        $('#lgd-apply-filters').on('click', function () {
            applyFilters();
        });

        function applyFilters() {
            var filters = {};
            var url = new URL(window.location.href);
            var params = new URLSearchParams(url.search);

            // Clear existing filter params
            var keysToRemove = [];
            for (var key of params.keys()) {
                if (key.includes('diamond_') || key === 'price_min' || key === 'price_max' || 
                    key === 'in_stock' || key === 'has_certificate') {
                    keysToRemove.push(key);
                }
            }
            keysToRemove.forEach(function(key) {
                params.delete(key);
            });

            // Shape
            var shapes = [];
            $('input[name="diamond_shape[]"]:checked').each(function () {
                shapes.push($(this).val());
            });
            if (shapes.length > 0) {
                params.set('diamond_shape', shapes.join(','));
            }

            // Carat
            var caratMin = $('#carat-min').val();
            var caratMax = $('#carat-max').val();
            if (caratMin && caratMin !== '0.3') {
                params.set('carat_min', caratMin);
            }
            if (caratMax && caratMax !== '5') {
                params.set('carat_max', caratMax);
            }

            // Color
            var colors = [];
            $('input[name="diamond_color[]"]:checked').each(function () {
                colors.push($(this).val());
            });
            if (colors.length > 0) {
                params.set('diamond_color', colors.join(','));
            }

            // Clarity
            var clarities = [];
            $('input[name="diamond_clarity[]"]:checked').each(function () {
                clarities.push($(this).val());
            });
            if (clarities.length > 0) {
                params.set('diamond_clarity', clarities.join(','));
            }

            // Cut
            var cuts = [];
            $('input[name="diamond_cut[]"]:checked').each(function () {
                cuts.push($(this).val());
            });
            if (cuts.length > 0) {
                params.set('diamond_cut', cuts.join(','));
            }

            // Lab
            var labs = [];
            $('input[name="diamond_lab[]"]:checked').each(function () {
                labs.push($(this).val());
            });
            if (labs.length > 0) {
                params.set('diamond_lab', labs.join(','));
            }

            // Fluorescence
            var fluorescences = [];
            $('input[name="diamond_fluorescence[]"]:checked').each(function () {
                fluorescences.push($(this).val());
            });
            if (fluorescences.length > 0) {
                params.set('diamond_fluorescence', fluorescences.join(','));
            }

            // Price
            var priceMin = $('#price-min').val();
            var priceMax = $('#price-max').val();
            if (priceMin && priceMin !== '0') {
                params.set('price_min', priceMin);
            }
            if (priceMax && priceMax !== '1000000') {
                params.set('price_max', priceMax);
            }

            // In Stock
            if ($('input[name="in_stock"]').is(':checked')) {
                params.set('in_stock', '1');
            }

            // Has Certificate
            if ($('input[name="has_certificate"]').is(':checked')) {
                params.set('has_certificate', '1');
            }

            // Redirect with filters
            window.location.href = url.pathname + '?' + params.toString();
        }

        /**
         * Clear Filters
         */
        $('#lgd-clear-filters').on('click', function () {
            // Uncheck all checkboxes
            $('.lgd-plp-sidebar input[type="checkbox"]').prop('checked', false);

            // Reset range sliders
            $('#carat-min').val('0.3');
            $('#carat-max').val('5');
            $('#price-min').val('0');
            $('#price-max').val('1000000');

            updateRangeValues();

            // Redirect to clean URL
            window.location.href = window.location.pathname;
        });

        /**
         * Compare Functionality
         */
        var compareList = JSON.parse(localStorage.getItem('compareList') || '[]');
        
        function updateCompareUI() {
            $('.compare-checkbox').each(function () {
                var productId = $(this).data('product-id');
                if (compareList.includes(productId)) {
                    $(this).prop('checked', true);
                }
            });
            
            // Update compare count in header
            var compareCount = compareList.length;
            var compareCountEl = $('#compare-count');
            if (compareCount > 0) {
                compareCountEl.text(compareCount).show();
            } else {
                compareCountEl.hide();
            }
        }

        // Initialize compare UI
        updateCompareUI();

        // Handle compare checkbox change
        $('.compare-checkbox').on('change', function () {
            var productId = parseInt($(this).data('product-id'));
            
            if ($(this).is(':checked')) {
                // Add to compare list (max 4)
                if (compareList.length >= 4) {
                    alert('You can compare maximum 4 products');
                    $(this).prop('checked', false);
                    return;
                }
                if (!compareList.includes(productId)) {
                    compareList.push(productId);
                }
            } else {
                // Remove from compare list
                compareList = compareList.filter(function (id) {
                    return id !== productId;
                });
            }
            
            localStorage.setItem('compareList', JSON.stringify(compareList));
            updateCompareUI();
        });

        /**
         * Quick View Modal (Basic Structure)
         */
        $('.lgd-product-card__quick-view').on('click', function (e) {
            e.preventDefault();
            var productId = $(this).data('product-id');
            
            // This would open a modal with product quick view
            // For now, just navigate to the product page
            // TODO: Implement AJAX quick view modal
            console.log('Quick view for product:', productId);
            
            // Placeholder: Show alert
            alert('Quick view feature coming soon!');
        });

        /**
         * Filter Accordions (for mobile)
         */
        $('.lgd-filter-group__title').on('click', function () {
            if ($(window).width() <= 768) {
                $(this).parent().toggleClass('open');
                $(this).siblings('.lgd-filter-group__content').slideToggle(300);
            }
        });

    });

})(jQuery);
