<?php
/**
 * Real-Time Diamond Price & Carat Value Calculator Component
 */

if (!defined('ABSPATH')) {
    die;
}

// Ensure the currency switcher class is available
global $lgd_currency_switcher;

$active_currency = 'USD';
if (isset($lgd_currency_switcher)) {
    $active_currency = $lgd_currency_switcher->get_active_currency();
}

$usd_active_class = $active_currency === 'USD' ? ' active' : '';
$inr_active_class = $active_currency === 'INR' ? ' active' : '';
?>

<div class="lgd-price-calculator">
    <div class="calculator-header">
        <h3><?php _e('Diamond Price Estimator', 'astra-child-diamond'); ?></h3>
        <p><?php _e('Estimate the value of a lab-grown diamond based on the 4Cs.', 'astra-child-diamond'); ?></p>
    </div>

    <div class="calculator-inputs">
        <div class="input-group carat-group">
            <label for="calc-carat"><?php _e('Carat Weight', 'astra-child-diamond'); ?>: <span id="calc-carat-display">1.00</span></label>
            <input type="range" id="calc-carat" name="calc-carat" min="0.5" max="5.0" step="0.05" value="1.00" aria-label="<?php _e('Carat Weight', 'astra-child-diamond'); ?>">
        </div>

        <div class="input-group">
            <label for="calc-cut"><?php _e('Cut', 'astra-child-diamond'); ?></label>
            <select id="calc-cut" name="calc-cut" aria-label="<?php _e('Cut', 'astra-child-diamond'); ?>">
                <option value="ideal"><?php _e('Ideal', 'astra-child-diamond'); ?></option>
                <option value="excellent" selected><?php _e('Excellent', 'astra-child-diamond'); ?></option>
                <option value="very_good"><?php _e('Very Good', 'astra-child-diamond'); ?></option>
                <option value="good"><?php _e('Good', 'astra-child-diamond'); ?></option>
            </select>
        </div>

        <div class="input-group">
            <label for="calc-color"><?php _e('Color', 'astra-child-diamond'); ?></label>
            <select id="calc-color" name="calc-color" aria-label="<?php _e('Color', 'astra-child-diamond'); ?>">
                <option value="d">D</option>
                <option value="e">E</option>
                <option value="f" selected>F</option>
                <option value="g">G</option>
                <option value="h">H</option>
                <option value="i">I</option>
                <option value="j">J</option>
            </select>
        </div>

        <div class="input-group">
            <label for="calc-clarity"><?php _e('Clarity', 'astra-child-diamond'); ?></label>
            <select id="calc-clarity" name="calc-clarity" aria-label="<?php _e('Clarity', 'astra-child-diamond'); ?>">
                <option value="if">IF</option>
                <option value="vvs1">VVS1</option>
                <option value="vvs2">VVS2</option>
                <option value="vs1" selected>VS1</option>
                <option value="vs2">VS2</option>
                <option value="si1">SI1</option>
                <option value="si2">SI2</option>
            </select>
        </div>
    </div>

    <div class="calculator-results">
        <div class="price-display">
            <h4><?php _e('Estimated Lab-Grown Value', 'astra-child-diamond'); ?></h4>
            <div class="lgd-dual-price" data-active="<?php echo esc_attr($active_currency); ?>">
                <span class="currency-pill price-usd<?php echo $usd_active_class; ?>" data-currency="USD">
                    <span class="currency-symbol">$</span>
                    <span class="currency-amount" id="calc-price-usd">0.00</span>
                </span>
                <span class="currency-separator"> / </span>
                <span class="currency-pill price-inr<?php echo $inr_active_class; ?>" data-currency="INR">
                    <span class="currency-symbol">₹</span>
                    <span class="currency-amount" id="calc-price-inr">0</span>
                </span>
            </div>
        </div>

        <div class="comparison-delta">
            <h4><?php _e('Traditional Mined Equivalent', 'astra-child-diamond'); ?></h4>
            <div class="lgd-dual-price mined-price" data-active="<?php echo esc_attr($active_currency); ?>">
                <span class="currency-pill price-usd<?php echo $usd_active_class; ?>" data-currency="USD">
                    <span class="currency-symbol">$</span>
                    <span class="currency-amount" id="calc-mined-usd">0.00</span>
                </span>
                <span class="currency-separator"> / </span>
                <span class="currency-pill price-inr<?php echo $inr_active_class; ?>" data-currency="INR">
                    <span class="currency-symbol">₹</span>
                    <span class="currency-amount" id="calc-mined-inr">0</span>
                </span>
            </div>
            <div class="savings-badge">
                <?php _e('You Save', 'astra-child-diamond'); ?> <span id="calc-savings-percent">70</span>%
            </div>
        </div>
    </div>
</div>
