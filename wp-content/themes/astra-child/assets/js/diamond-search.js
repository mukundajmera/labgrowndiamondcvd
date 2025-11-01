/**
 * Diamond Search Widget JavaScript
 * Interactive diamond filtering and search functionality
 */

(function($) {
    'use strict';

    /**
     * Diamond Search Widget
     */
    const DiamondSearch = {
        init: function() {
            this.bindEvents();
            this.initShapeSelector();
            this.initSliders();
            this.updateResultsCount();
        },

        bindEvents: function() {
            // Shape selection
            $('.shape-option').on('click', this.handleShapeSelection);
            
            // Filter changes
            $('.filter-select, .filter-input').on('change', this.handleFilterChange);
            
            // Price range slider
            $('#price-range-slider').on('input', this.updatePriceDisplay);
            
            // Carat range slider
            $('#carat-range-slider').on('input', this.updateCaratDisplay);
            
            // Search button
            $('#diamond-search-btn').on('click', this.performSearch);
            
            // Reset filters
            $('#reset-filters-btn').on('click', this.resetFilters);
        },

        handleShapeSelection: function(e) {
            e.preventDefault();
            
            // Toggle active class
            $('.shape-option').removeClass('active');
            $(this).addClass('active');
            
            // Store selected shape
            const shape = $(this).data('shape');
            $('#selected-shape').val(shape);
            
            // Update results
            DiamondSearch.updateResultsCount();
        },

        handleFilterChange: function() {
            DiamondSearch.updateResultsCount();
        },

        updatePriceDisplay: function() {
            const min = $('#price-min').val();
            const max = $('#price-max').val();
            $('#price-display').text(`$${min} - $${max}`);
            DiamondSearch.updateResultsCount();
        },

        updateCaratDisplay: function() {
            const min = $('#carat-min').val();
            const max = $('#carat-max').val();
            $('#carat-display').text(`${min}ct - ${max}ct`);
            DiamondSearch.updateResultsCount();
        },

        updateResultsCount: function() {
            // Get all filter values
            const filters = {
                shape: $('#selected-shape').val(),
                carat_min: $('#carat-min').val(),
                carat_max: $('#carat-max').val(),
                color: $('#color-filter').val(),
                clarity: $('#clarity-filter').val(),
                cut: $('#cut-filter').val(),
                price_min: $('#price-min').val(),
                price_max: $('#price-max').val()
            };

            // AJAX call to get count
            $.ajax({
                url: diamondAjax.ajaxurl,
                type: 'POST',
                data: {
                    action: 'get_diamond_count',
                    filters: filters,
                    nonce: diamondAjax.nonce
                },
                success: function(response) {
                    if (response.success) {
                        $('#results-count').text(response.data.count + ' diamonds found');
                    }
                }
            });
        },

        performSearch: function(e) {
            e.preventDefault();
            
            // Show loading state
            $(this).addClass('loading').prop('disabled', true);
            $('.diamond-loader').show();
            
            // Get all filter values
            const filters = {
                shape: $('#selected-shape').val(),
                carat_min: $('#carat-min').val(),
                carat_max: $('#carat-max').val(),
                color: $('#color-filter').val(),
                clarity: $('#clarity-filter').val(),
                cut: $('#cut-filter').val(),
                price_min: $('#price-min').val(),
                price_max: $('#price-max').val(),
                polish: $('#polish-filter').val(),
                symmetry: $('#symmetry-filter').val(),
                fluorescence: $('#fluorescence-filter').val()
            };

            // Redirect to shop with filters
            const queryString = $.param(filters);
            window.location.href = '/shop/?' + queryString;
        },

        resetFilters: function(e) {
            e.preventDefault();
            
            // Reset all form elements
            $('.shape-option').removeClass('active');
            $('.filter-select').prop('selectedIndex', 0);
            $('.filter-input').val('');
            $('#selected-shape').val('');
            
            // Reset sliders
            $('#carat-min').val('0.30');
            $('#carat-max').val('5.00');
            $('#price-min').val('0');
            $('#price-max').val('100000');
            
            // Update displays
            DiamondSearch.updateCaratDisplay();
            DiamondSearch.updatePriceDisplay();
            DiamondSearch.updateResultsCount();
        },

        initShapeSelector: function() {
            // Initialize shape selector with icons
            const shapes = ['round', 'princess', 'cushion', 'oval', 'emerald', 'pear', 'marquise', 'radiant', 'asscher', 'heart'];
            const shapeIcons = {
                'round': '●',
                'princess': '◆',
                'cushion': '◇',
                'oval': '⬭',
                'emerald': '▭',
                'pear': '💧',
                'marquise': '◊',
                'radiant': '⬜',
                'asscher': '▢',
                'heart': '♥'
            };
            
            // Add icons to shape options
            $('.shape-option').each(function() {
                const shape = $(this).data('shape');
                if (shapeIcons[shape]) {
                    $(this).find('.shape-icon').text(shapeIcons[shape]);
                }
            });
        },

        initSliders: function() {
            // Initialize range sliders with tooltips
            $('input[type="range"]').each(function() {
                const min = $(this).attr('min');
                const max = $(this).attr('max');
                const value = $(this).val();
                
                // Create tooltip element
                const tooltip = $('<div class="range-tooltip"></div>');
                $(this).after(tooltip);
                
                // Update tooltip position and value
                $(this).on('input', function() {
                    const percent = (($(this).val() - min) / (max - min)) * 100;
                    tooltip.css('left', percent + '%').text($(this).val());
                });
                
                // Initialize position
                const percent = ((value - min) / (max - min)) * 100;
                tooltip.css('left', percent + '%').text(value);
            });
        }
    };

    /**
     * Live Preview for Diamond Search
     */
    const DiamondPreview = {
        init: function() {
            this.bindEvents();
        },

        bindEvents: function() {
            // Show preview on hover
            $('.product-card').on('mouseenter', this.showPreview);
            $('.product-card').on('mouseleave', this.hidePreview);
        },

        showPreview: function() {
            const previewData = $(this).data('preview');
            if (previewData) {
                // Show preview modal or tooltip
                $('#diamond-preview-modal').html(previewData).fadeIn(200);
            }
        },

        hidePreview: function() {
            $('#diamond-preview-modal').fadeOut(200);
        }
    };

    /**
     * Quick View Modal
     */
    const QuickView = {
        init: function() {
            this.bindEvents();
        },

        bindEvents: function() {
            $('.product-quick-view').on('click', this.openQuickView);
            $('.quick-view-close').on('click', this.closeQuickView);
            $('.quick-view-overlay').on('click', this.closeQuickView);
        },

        openQuickView: function(e) {
            e.preventDefault();
            const productId = $(this).data('product-id');
            
            // Show loading
            $('.quick-view-modal').addClass('loading');
            $('.quick-view-overlay').addClass('active');
            
            // AJAX call to get product details
            $.ajax({
                url: diamondAjax.ajaxurl,
                type: 'POST',
                data: {
                    action: 'get_product_quick_view',
                    product_id: productId,
                    nonce: diamondAjax.nonce
                },
                success: function(response) {
                    if (response.success) {
                        $('.quick-view-content').html(response.data.html);
                        $('.quick-view-modal').removeClass('loading').addClass('active');
                    }
                }
            });
        },

        closeQuickView: function(e) {
            e.preventDefault();
            $('.quick-view-modal').removeClass('active');
            $('.quick-view-overlay').removeClass('active');
        }
    };

    /**
     * Advanced Filters Toggle
     */
    const AdvancedFilters = {
        init: function() {
            this.bindEvents();
        },

        bindEvents: function() {
            $('#toggle-advanced-filters').on('click', this.toggleFilters);
        },

        toggleFilters: function(e) {
            e.preventDefault();
            $('.advanced-filters').slideToggle(300);
            $(this).toggleClass('active');
            
            const text = $(this).hasClass('active') ? 'Hide Advanced Filters' : 'Show Advanced Filters';
            $(this).text(text);
        }
    };

    /**
     * Initialize on document ready
     */
    $(document).ready(function() {
        DiamondSearch.init();
        DiamondPreview.init();
        QuickView.init();
        AdvancedFilters.init();
    });

})(jQuery);
