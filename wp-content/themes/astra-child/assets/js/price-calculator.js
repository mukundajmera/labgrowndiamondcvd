/**
 * Real-Time Diamond Price & Carat Value Calculator Component
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        if ($('.lgd-price-calculator').length === 0) {
            return;
        }

        const baseRateUsd = 800; // Base price for 1 carat, F, VS1, Excellent (USD)
        const inrExchangeRate = 83; // Will be fetched from data attributes if possible, fallback to 83

        // Multipliers for 4Cs
        const multipliers = {
            cut: {
                ideal: 1.1,
                excellent: 1.0,
                very_good: 0.9,
                good: 0.8
            },
            color: {
                d: 1.3,
                e: 1.15,
                f: 1.0,
                g: 0.9,
                h: 0.8,
                i: 0.7,
                j: 0.6
            },
            clarity: {
                if: 1.4,
                vvs1: 1.25,
                vvs2: 1.15,
                vs1: 1.0,
                vs2: 0.9,
                si1: 0.8,
                si2: 0.7
            }
        };

        function calculatePrice() {
            const carat = parseFloat($('#calc-carat').val());
            const cut = $('#calc-cut').val();
            const color = $('#calc-color').val();
            const clarity = $('#calc-clarity').val();

            // Exponential price curve for carat weight
            let lgdPriceUsd = baseRateUsd * Math.pow(carat, 1.8);
            
            lgdPriceUsd *= multipliers.cut[cut];
            lgdPriceUsd *= multipliers.color[color];
            lgdPriceUsd *= multipliers.clarity[clarity];

            // Mined diamond multiplier (starts at 3.5x for 0.5ct, up to 6x for 5ct)
            const minedMultiplier = 3.0 + (carat * 0.6);
            let minedPriceUsd = lgdPriceUsd * minedMultiplier;

            // Calculate INR
            const lgdPriceInr = lgdPriceUsd * inrExchangeRate;
            const minedPriceInr = minedPriceUsd * inrExchangeRate;

            // Savings percentage
            const savingsPercent = Math.round(((minedPriceUsd - lgdPriceUsd) / minedPriceUsd) * 100);

            // Update UI
            $('#calc-carat-display').text(carat.toFixed(2));
            
            // Format numbers
            const formatNumber = (num, decimals = 0) => {
                return num.toLocaleString('en-US', { minimumFractionDigits: decimals, maximumFractionDigits: decimals });
            };

            $('#calc-price-usd').text(formatNumber(lgdPriceUsd, 2));
            $('#calc-price-inr').text(formatNumber(lgdPriceInr, 0));
            
            $('#calc-mined-usd').text(formatNumber(minedPriceUsd, 2));
            $('#calc-mined-inr').text(formatNumber(minedPriceInr, 0));

            $('#calc-savings-percent').text(savingsPercent);
        }

        // Event listeners
        $('#calc-carat, #calc-cut, #calc-color, #calc-clarity').on('input change', function() {
            calculatePrice();
        });

        // Initialize
        calculatePrice();
    });

})(jQuery);
