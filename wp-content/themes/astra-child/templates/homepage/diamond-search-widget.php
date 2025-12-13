<?php
/**
 * Diamond Search Widget Template
 * Interactive diamond search with live preview
 * 
 * @package Astra Child Diamond
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<section class="diamond-search-widget">
    <h2 class="search-widget-title"><?php _e( 'Find Your Perfect Diamond', 'astra-child-diamond' ); ?></h2>
    <p class="search-widget-subtitle"><?php _e( 'Use our advanced search to filter diamonds by your exact specifications', 'astra-child-diamond' ); ?></p>
    
    <form id="diamond-search-form" class="search-filters">
        <input type="hidden" id="selected-shape" name="shape" value="" />
        
        <!-- Shape Selector -->
        <div class="filter-group full-width">
            <label class="filter-label"><?php _e( 'Select Shape', 'astra-child-diamond' ); ?></label>
            <div class="shape-selector">
                <?php
                $shapes = array(
                    'round' => '●',
                    'princess' => '◆',
                    'cushion' => '◇',
                    'oval' => '⬭',
                    'emerald' => '▭',
                    'pear' => '💧',
                    'marquise' => '◊',
                    'radiant' => '⬜',
                    'asscher' => '▢',
                    'heart' => '♥'
                );
                
                foreach ( $shapes as $shape => $icon ) {
                    echo '<div class="shape-option" data-shape="' . esc_attr( $shape ) . '" title="' . esc_attr( ucfirst( $shape ) ) . '">';
                    echo '<span class="shape-icon">' . $icon . '</span>';
                    echo '<span class="shape-label">' . esc_html( ucfirst( $shape ) ) . '</span>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
        
        <!-- Carat Range -->
        <div class="filter-group">
            <label class="filter-label"><?php _e( 'Carat Weight', 'astra-child-diamond' ); ?></label>
            <div class="range-slider-wrapper">
                <input type="range" id="carat-min" name="carat_min" min="0.30" max="5.00" step="0.01" value="0.30" class="filter-range" />
                <input type="range" id="carat-max" name="carat_max" min="0.30" max="5.00" step="0.01" value="5.00" class="filter-range" />
                <div id="carat-display" class="range-display">0.30ct - 5.00ct</div>
            </div>
        </div>
        
        <!-- Price Range -->
        <div class="filter-group">
            <label class="filter-label"><?php _e( 'Price Range', 'astra-child-diamond' ); ?></label>
            <div class="range-slider-wrapper">
                <input type="range" id="price-min" name="price_min" min="0" max="100000" step="500" value="0" class="filter-range" />
                <input type="range" id="price-max" name="price_max" min="0" max="100000" step="500" value="100000" class="filter-range" />
                <div id="price-display" class="range-display">$0 - $100,000</div>
            </div>
        </div>
        
        <!-- Color Grade -->
        <div class="filter-group">
            <label class="filter-label"><?php _e( 'Color Grade', 'astra-child-diamond' ); ?></label>
            <select id="color-filter" name="color" class="filter-select">
                <option value=""><?php _e( 'All Colors', 'astra-child-diamond' ); ?></option>
                <?php
                $colors = array( 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K' );
                foreach ( $colors as $color ) {
                    echo '<option value="' . esc_attr( $color ) . '">' . esc_html( $color ) . '</option>';
                }
                ?>
            </select>
        </div>
        
        <!-- Clarity Grade -->
        <div class="filter-group">
            <label class="filter-label"><?php _e( 'Clarity Grade', 'astra-child-diamond' ); ?></label>
            <select id="clarity-filter" name="clarity" class="filter-select">
                <option value=""><?php _e( 'All Clarities', 'astra-child-diamond' ); ?></option>
                <?php
                $clarities = array( 'IF', 'VVS1', 'VVS2', 'VS1', 'VS2', 'SI1', 'SI2' );
                foreach ( $clarities as $clarity ) {
                    echo '<option value="' . esc_attr( $clarity ) . '">' . esc_html( $clarity ) . '</option>';
                }
                ?>
            </select>
        </div>
        
        <!-- Cut Quality -->
        <div class="filter-group">
            <label class="filter-label"><?php _e( 'Cut Quality', 'astra-child-diamond' ); ?></label>
            <select id="cut-filter" name="cut" class="filter-select">
                <option value=""><?php _e( 'All Cuts', 'astra-child-diamond' ); ?></option>
                <option value="excellent"><?php _e( 'Excellent', 'astra-child-diamond' ); ?></option>
                <option value="very-good"><?php _e( 'Very Good', 'astra-child-diamond' ); ?></option>
                <option value="good"><?php _e( 'Good', 'astra-child-diamond' ); ?></option>
            </select>
        </div>
        
        <!-- Advanced Filters Toggle -->
        <div class="filter-group full-width">
            <button type="button" id="toggle-advanced-filters" class="btn btn-outline">
                <?php _e( 'Show Advanced Filters', 'astra-child-diamond' ); ?>
            </button>
        </div>
        
        <!-- Advanced Filters -->
        <div class="advanced-filters" style="display: none;">
            <div class="filter-group">
                <label class="filter-label"><?php _e( 'Polish', 'astra-child-diamond' ); ?></label>
                <select id="polish-filter" name="polish" class="filter-select">
                    <option value=""><?php _e( 'Any', 'astra-child-diamond' ); ?></option>
                    <option value="excellent"><?php _e( 'Excellent', 'astra-child-diamond' ); ?></option>
                    <option value="very-good"><?php _e( 'Very Good', 'astra-child-diamond' ); ?></option>
                    <option value="good"><?php _e( 'Good', 'astra-child-diamond' ); ?></option>
                </select>
            </div>
            
            <div class="filter-group">
                <label class="filter-label"><?php _e( 'Symmetry', 'astra-child-diamond' ); ?></label>
                <select id="symmetry-filter" name="symmetry" class="filter-select">
                    <option value=""><?php _e( 'Any', 'astra-child-diamond' ); ?></option>
                    <option value="excellent"><?php _e( 'Excellent', 'astra-child-diamond' ); ?></option>
                    <option value="very-good"><?php _e( 'Very Good', 'astra-child-diamond' ); ?></option>
                    <option value="good"><?php _e( 'Good', 'astra-child-diamond' ); ?></option>
                </select>
            </div>
            
            <div class="filter-group">
                <label class="filter-label"><?php _e( 'Fluorescence', 'astra-child-diamond' ); ?></label>
                <select id="fluorescence-filter" name="fluorescence" class="filter-select">
                    <option value=""><?php _e( 'Any', 'astra-child-diamond' ); ?></option>
                    <option value="none"><?php _e( 'None', 'astra-child-diamond' ); ?></option>
                    <option value="faint"><?php _e( 'Faint', 'astra-child-diamond' ); ?></option>
                    <option value="medium"><?php _e( 'Medium', 'astra-child-diamond' ); ?></option>
                    <option value="strong"><?php _e( 'Strong', 'astra-child-diamond' ); ?></option>
                </select>
            </div>
        </div>
        
        <!-- Search Button -->
        <div class="filter-group full-width">
            <button type="submit" id="diamond-search-btn" class="btn btn-primary btn-large">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" style="margin-right: 8px;">
                    <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                </svg>
                <?php _e( 'Search Diamonds', 'astra-child-diamond' ); ?>
            </button>
        </div>
        
        <!-- Results Count -->
        <div id="results-count" class="search-results-count"></div>
    </form>
</section>

<style>
.search-widget-subtitle {
    text-align: center;
    color: var(--color-medium-grey);
    margin-bottom: var(--spacing-lg);
}

.full-width {
    grid-column: 1 / -1;
}

.range-slider-wrapper {
    position: relative;
}

.range-display {
    text-align: center;
    font-weight: 600;
    color: var(--color-navy-blue);
    margin-top: var(--spacing-xs);
}

.filter-range {
    width: 100%;
    margin-bottom: var(--spacing-xs);
}

.btn-large {
    width: 100%;
    font-size: 1.1rem;
    padding: var(--spacing-md) var(--spacing-lg);
    display: flex;
    align-items: center;
    justify-content: center;
}

.search-results-count {
    text-align: center;
    font-size: 1.1rem;
    color: var(--color-navy-blue);
    font-weight: 600;
    padding: var(--spacing-sm);
}

.advanced-filters {
    grid-column: 1 / -1;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: var(--spacing-md);
    padding-top: var(--spacing-md);
    border-top: 2px solid var(--color-light-grey);
}
</style>
