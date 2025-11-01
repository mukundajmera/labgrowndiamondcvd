/**
 * Custom Jewelry Builder JavaScript
 * Interactive jewelry customization tool
 */

(function($) {
    'use strict';

    const JewelryBuilder = {
        currentStep: 1,
        totalSteps: 4,
        selections: {
            setting: null,
            diamond: null,
            metal: null,
            engraving: null
        },
        prices: {
            setting: 0,
            diamond: 0,
            metal: 0,
            engraving: 0
        },

        init: function() {
            this.bindEvents();
            this.updateStepDisplay();
            this.updatePriceCalculator();
        },

        bindEvents: function() {
            // Step navigation
            $('.step-next-btn').on('click', this.nextStep.bind(this));
            $('.step-prev-btn').on('click', this.prevStep.bind(this));
            $('.builder-step').on('click', this.jumpToStep.bind(this));

            // Setting selection
            $('.setting-option').on('click', this.selectSetting.bind(this));

            // Diamond selection
            $('.diamond-option').on('click', this.selectDiamond.bind(this));

            // Metal selection
            $('.metal-option').on('click', this.selectMetal.bind(this));

            // Engraving
            $('#engraving-text').on('input', this.updateEngraving.bind(this));

            // Save design
            $('#save-design-btn').on('click', this.saveDesign.bind(this));

            // Share design
            $('#share-design-btn').on('click', this.shareDesign.bind(this));

            // Schedule video call
            $('#schedule-call-btn').on('click', this.scheduleCall.bind(this));

            // Add to cart
            $('#add-custom-to-cart').on('click', this.addToCart.bind(this));
        },

        nextStep: function(e) {
            e.preventDefault();
            
            if (this.validateCurrentStep()) {
                if (this.currentStep < this.totalSteps) {
                    this.currentStep++;
                    this.updateStepDisplay();
                    this.scrollToBuilder();
                }
            }
        },

        prevStep: function(e) {
            e.preventDefault();
            
            if (this.currentStep > 1) {
                this.currentStep--;
                this.updateStepDisplay();
                this.scrollToBuilder();
            }
        },

        jumpToStep: function(e) {
            const step = $(e.currentTarget).data('step');
            if (step && step <= this.currentStep) {
                this.currentStep = step;
                this.updateStepDisplay();
                this.scrollToBuilder();
            }
        },

        updateStepDisplay: function() {
            // Update step indicators
            $('.builder-step').each((index, element) => {
                const stepNum = index + 1;
                const $step = $(element);
                
                $step.removeClass('active completed');
                
                if (stepNum < this.currentStep) {
                    $step.addClass('completed');
                } else if (stepNum === this.currentStep) {
                    $step.addClass('active');
                }
            });

            // Show/hide step content
            $('.builder-step-content').hide();
            $(`.builder-step-content[data-step="${this.currentStep}"]`).fadeIn(300);

            // Update navigation buttons
            $('.step-prev-btn').prop('disabled', this.currentStep === 1);
            
            if (this.currentStep === this.totalSteps) {
                $('.step-next-btn').hide();
                $('.step-complete-btn').show();
            } else {
                $('.step-next-btn').show();
                $('.step-complete-btn').hide();
            }
        },

        validateCurrentStep: function() {
            let isValid = true;
            let message = '';

            switch(this.currentStep) {
                case 1:
                    if (!this.selections.setting) {
                        isValid = false;
                        message = 'Please select a setting design.';
                    }
                    break;
                case 2:
                    if (!this.selections.diamond) {
                        isValid = false;
                        message = 'Please select a diamond.';
                    }
                    break;
                case 3:
                    if (!this.selections.metal) {
                        isValid = false;
                        message = 'Please select a metal type.';
                    }
                    break;
            }

            if (!isValid) {
                this.showNotification(message, 'error');
            }

            return isValid;
        },

        selectSetting: function(e) {
            e.preventDefault();
            
            const $option = $(e.currentTarget);
            const settingId = $option.data('setting-id');
            const settingPrice = parseFloat($option.data('price'));
            const settingName = $option.data('name');

            // Update selection
            $('.setting-option').removeClass('active');
            $option.addClass('active');

            this.selections.setting = settingId;
            this.prices.setting = settingPrice;

            // Update 3D preview
            this.update3DPreview('setting', settingId);

            // Update price calculator
            this.updatePriceCalculator();

            // Update summary
            this.updateSummary('setting', settingName, settingPrice);

            this.showNotification('Setting selected successfully!', 'success');
        },

        selectDiamond: function(e) {
            e.preventDefault();
            
            const $option = $(e.currentTarget);
            const diamondId = $option.data('diamond-id');
            const diamondPrice = parseFloat($option.data('price'));
            const diamondSpecs = $option.data('specs');

            // Update selection
            $('.diamond-option').removeClass('active');
            $option.addClass('active');

            this.selections.diamond = diamondId;
            this.prices.diamond = diamondPrice;

            // Update 3D preview
            this.update3DPreview('diamond', diamondId);

            // Update price calculator
            this.updatePriceCalculator();

            // Update summary
            this.updateSummary('diamond', diamondSpecs, diamondPrice);

            this.showNotification('Diamond selected successfully!', 'success');
        },

        selectMetal: function(e) {
            e.preventDefault();
            
            const $option = $(e.currentTarget);
            const metalType = $option.data('metal');
            const metalPrice = parseFloat($option.data('price'));

            // Update selection
            $('.metal-option').removeClass('active');
            $option.addClass('active');

            this.selections.metal = metalType;
            this.prices.metal = metalPrice;

            // Update 3D preview
            this.update3DPreview('metal', metalType);

            // Update price calculator
            this.updatePriceCalculator();

            // Update summary
            this.updateSummary('metal', metalType, metalPrice);

            this.showNotification('Metal selected successfully!', 'success');
        },

        updateEngraving: function(e) {
            const text = $(e.target).val();
            this.selections.engraving = text;

            // Get pricing configuration from localized script
            const config = typeof jewelryBuilderConfig !== 'undefined' ? jewelryBuilderConfig.pricing : {
                engraving_base: 50,
                engraving_per_char: 2,
                engraving_free_chars: 20
            };

            // Calculate engraving price
            if (text.length > 0) {
                this.prices.engraving = config.engraving_base;
                if (text.length > config.engraving_free_chars) {
                    this.prices.engraving += (text.length - config.engraving_free_chars) * config.engraving_per_char;
                }
            } else {
                this.prices.engraving = 0;
            }

            // Update 3D preview
            this.update3DPreview('engraving', text);

            // Update price calculator
            this.updatePriceCalculator();

            // Update summary
            this.updateSummary('engraving', text, this.prices.engraving);
        },

        update3DPreview: function(type, value) {
            // This would integrate with a 3D rendering library
            // For now, we'll just update a placeholder
            $('#3d-preview-placeholder').attr('data-' + type, value);
            
            // Trigger animation
            $('.builder-preview').addClass('updating');
            setTimeout(() => {
                $('.builder-preview').removeClass('updating');
            }, 500);
        },

        updatePriceCalculator: function() {
            const total = this.prices.setting + this.prices.diamond + this.prices.metal + this.prices.engraving;

            // Update price breakdown
            $('#setting-price').text('$' + this.prices.setting.toFixed(2));
            $('#diamond-price').text('$' + this.prices.diamond.toFixed(2));
            $('#metal-price').text('$' + this.prices.metal.toFixed(2));
            $('#engraving-price').text('$' + this.prices.engraving.toFixed(2));
            $('#total-price').text('$' + total.toFixed(2));

            // Animate price change
            $('.price-calculator').addClass('price-updated');
            setTimeout(() => {
                $('.price-calculator').removeClass('price-updated');
            }, 300);
        },

        updateSummary: function(type, value, price) {
            const summaryItem = `
                <div class="summary-item">
                    <span class="summary-label">${type}:</span>
                    <span class="summary-value">${value}</span>
                    <span class="summary-price">$${price.toFixed(2)}</span>
                </div>
            `;

            $(`#summary-${type}`).html(summaryItem);
        },

        saveDesign: function(e) {
            e.preventDefault();
            
            const designData = {
                action: 'save_custom_jewelry_design',
                selections: this.selections,
                prices: this.prices,
                nonce: diamondAjax.nonce
            };

            $.ajax({
                url: diamondAjax.ajaxurl,
                type: 'POST',
                data: designData,
                success: (response) => {
                    if (response.success) {
                        const designId = response.data.design_id;
                        this.showNotification('Design saved successfully!', 'success');
                        
                        // Update URL with design ID
                        const newUrl = window.location.pathname + '?design=' + designId;
                        window.history.pushState({path: newUrl}, '', newUrl);
                    } else {
                        this.showNotification('Failed to save design.', 'error');
                    }
                },
                error: () => {
                    this.showNotification('Failed to save design.', 'error');
                }
            });
        },

        shareDesign: function(e) {
            e.preventDefault();
            
            const designUrl = window.location.href;
            const shareText = 'Check out my custom jewelry design!';

            // Copy to clipboard
            navigator.clipboard.writeText(designUrl).then(() => {
                this.showNotification('Design link copied to clipboard!', 'success');
            });

            // Open share dialog
            if (navigator.share) {
                navigator.share({
                    title: 'Custom Jewelry Design',
                    text: shareText,
                    url: designUrl
                }).catch(err => console.log('Error sharing:', err));
            }
        },

        scheduleCall: function(e) {
            e.preventDefault();
            
            // Open scheduling modal
            $('#schedule-call-modal').fadeIn(300);
        },

        addToCart: function(e) {
            e.preventDefault();
            
            if (!this.validateAllSteps()) {
                this.showNotification('Please complete all steps before adding to cart.', 'error');
                return;
            }

            // Show loading
            $(e.currentTarget).addClass('loading').prop('disabled', true);

            const cartData = {
                action: 'add_custom_jewelry_to_cart',
                selections: this.selections,
                prices: this.prices,
                nonce: diamondAjax.nonce
            };

            $.ajax({
                url: diamondAjax.ajaxurl,
                type: 'POST',
                data: cartData,
                success: (response) => {
                    if (response.success) {
                        this.showNotification('Added to cart successfully!', 'success');
                        
                        // Redirect to cart or show success message
                        setTimeout(() => {
                            window.location.href = response.data.cart_url;
                        }, 1500);
                    } else {
                        this.showNotification('Failed to add to cart.', 'error');
                        $(e.currentTarget).removeClass('loading').prop('disabled', false);
                    }
                },
                error: () => {
                    this.showNotification('Failed to add to cart.', 'error');
                    $(e.currentTarget).removeClass('loading').prop('disabled', false);
                }
            });
        },

        validateAllSteps: function() {
            return this.selections.setting && 
                   this.selections.diamond && 
                   this.selections.metal;
        },

        scrollToBuilder: function() {
            $('html, body').animate({
                scrollTop: $('.jewelry-builder').offset().top - 100
            }, 500);
        },

        showNotification: function(message, type) {
            const notification = `
                <div class="builder-notification ${type}">
                    ${message}
                </div>
            `;

            const $notification = $(notification);
            $('body').append($notification);

            setTimeout(() => {
                $notification.addClass('show');
            }, 100);

            setTimeout(() => {
                $notification.removeClass('show');
                setTimeout(() => {
                    $notification.remove();
                }, 300);
            }, 3000);
        }
    };

    /**
     * Visual Comparison Tool for Diamonds
     */
    const DiamondComparison = {
        init: function() {
            this.bindEvents();
        },

        bindEvents: function() {
            $('#compare-diamonds-btn').on('click', this.showComparison.bind(this));
            $('.comparison-close').on('click', this.hideComparison.bind(this));
        },

        showComparison: function(e) {
            e.preventDefault();
            
            const selectedDiamonds = $('.diamond-option.selected');
            if (selectedDiamonds.length < 2) {
                JewelryBuilder.showNotification('Please select at least 2 diamonds to compare.', 'error');
                return;
            }

            // Build comparison table
            const comparisonHtml = this.buildComparisonTable(selectedDiamonds);
            $('#comparison-content').html(comparisonHtml);
            $('#comparison-modal').fadeIn(300);
        },

        hideComparison: function() {
            $('#comparison-modal').fadeOut(300);
        },

        buildComparisonTable: function(diamonds) {
            // Build HTML comparison table
            let html = '<table class="comparison-table"><thead><tr><th>Specification</th>';
            
            diamonds.each(function() {
                html += `<th>${$(this).data('name')}</th>`;
            });
            
            html += '</tr></thead><tbody>';
            
            const specs = ['carat', 'color', 'clarity', 'cut', 'price'];
            
            specs.forEach(spec => {
                html += `<tr><td>${spec.charAt(0).toUpperCase() + spec.slice(1)}</td>`;
                
                diamonds.each(function() {
                    html += `<td>${$(this).data(spec)}</td>`;
                });
                
                html += '</tr>';
            });
            
            html += '</tbody></table>';
            
            return html;
        }
    };

    /**
     * Initialize on document ready
     */
    $(document).ready(function() {
        if ($('.jewelry-builder').length) {
            JewelryBuilder.init();
            DiamondComparison.init();
        }
    });

})(jQuery);
