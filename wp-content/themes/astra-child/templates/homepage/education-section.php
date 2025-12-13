<?php
/**
 * Educational Section - Lab-Grown vs Mined Comparison
 * 
 * @package Astra Child Diamond
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<section class="education-section">
    <div class="container">
        <h2 class="section-title"><?php _e( 'Why Choose Lab-Grown Diamonds?', 'astra-child-diamond' ); ?></h2>
        <p class="section-subtitle"><?php _e( 'Ethical, Sustainable, and Identical to Mined Diamonds', 'astra-child-diamond' ); ?></p>
        
        <!-- Comparison Table -->
        <div class="comparison-wrapper">
            <table class="comparison-table">
                <thead>
                    <tr>
                        <th><?php _e( 'Feature', 'astra-child-diamond' ); ?></th>
                        <th class="highlight"><?php _e( 'Lab-Grown CVD Diamonds', 'astra-child-diamond' ); ?></th>
                        <th><?php _e( 'Mined Diamonds', 'astra-child-diamond' ); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong><?php _e( 'Chemical Composition', 'astra-child-diamond' ); ?></strong></td>
                        <td class="highlight"><?php _e( 'Pure Carbon (C)', 'astra-child-diamond' ); ?></td>
                        <td><?php _e( 'Pure Carbon (C)', 'astra-child-diamond' ); ?></td>
                    </tr>
                    <tr>
                        <td><strong><?php _e( 'Physical Properties', 'astra-child-diamond' ); ?></strong></td>
                        <td class="highlight"><?php _e( 'Identical - Same hardness, brilliance, fire', 'astra-child-diamond' ); ?></td>
                        <td><?php _e( 'Identical', 'astra-child-diamond' ); ?></td>
                    </tr>
                    <tr>
                        <td><strong><?php _e( 'Ethical Sourcing', 'astra-child-diamond' ); ?></strong></td>
                        <td class="highlight"><span class="checkmark">✓</span> <?php _e( '100% Conflict-Free', 'astra-child-diamond' ); ?></td>
                        <td><span class="crossmark">✗</span> <?php _e( 'Often Questionable', 'astra-child-diamond' ); ?></td>
                    </tr>
                    <tr>
                        <td><strong><?php _e( 'Environmental Impact', 'astra-child-diamond' ); ?></strong></td>
                        <td class="highlight"><span class="checkmark">✓</span> <?php _e( 'Minimal Carbon Footprint', 'astra-child-diamond' ); ?></td>
                        <td><span class="crossmark">✗</span> <?php _e( 'High - Mining destroys ecosystems', 'astra-child-diamond' ); ?></td>
                    </tr>
                    <tr>
                        <td><strong><?php _e( 'Price', 'astra-child-diamond' ); ?></strong></td>
                        <td class="highlight"><span class="checkmark">✓</span> <?php _e( '30-40% Less Expensive', 'astra-child-diamond' ); ?></td>
                        <td><?php _e( 'Higher Cost', 'astra-child-diamond' ); ?></td>
                    </tr>
                    <tr>
                        <td><strong><?php _e( 'Quality Control', 'astra-child-diamond' ); ?></strong></td>
                        <td class="highlight"><span class="checkmark">✓</span> <?php _e( 'Precise & Consistent', 'astra-child-diamond' ); ?></td>
                        <td><?php _e( 'Variable Quality', 'astra-child-diamond' ); ?></td>
                    </tr>
                    <tr>
                        <td><strong><?php _e( 'Certification', 'astra-child-diamond' ); ?></strong></td>
                        <td class="highlight"><?php _e( 'IGI / GIA Certified', 'astra-child-diamond' ); ?></td>
                        <td><?php _e( 'IGI / GIA Certified', 'astra-child-diamond' ); ?></td>
                    </tr>
                    <tr>
                        <td><strong><?php _e( 'Production Time', 'astra-child-diamond' ); ?></strong></td>
                        <td class="highlight"><?php _e( '2-4 Weeks', 'astra-child-diamond' ); ?></td>
                        <td><?php _e( 'Millions of Years', 'astra-child-diamond' ); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- CVD Process -->
        <div class="cvd-process-section">
            <h3><?php _e( 'How Are CVD Diamonds Created?', 'astra-child-diamond' ); ?></h3>
            <p><?php _e( 'Chemical Vapor Deposition (CVD) is an advanced technology that grows diamonds in a controlled laboratory environment', 'astra-child-diamond' ); ?></p>
            
            <div class="process-steps">
                <div class="process-step">
                    <div class="process-icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5z"/>
                        </svg>
                    </div>
                    <h4><?php _e( 'Step 1: Seed Crystal', 'astra-child-diamond' ); ?></h4>
                    <p><?php _e( 'A thin slice of diamond seed is placed in a sealed chamber', 'astra-child-diamond' ); ?></p>
                </div>
                
                <div class="process-step">
                    <div class="process-icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17.66 11.2c-.23-.3-.51-.56-.77-.82-.67-.6-1.43-1.03-2.07-1.66C13.33 7.26 13 4.85 13.95 3c-.95.23-1.78.75-2.49 1.32-2.59 2.08-3.61 5.75-2.39 8.9.04.1.08.2.08.33 0 .22-.15.42-.35.5-.23.1-.47.04-.66-.12-.1-.09-.18-.2-.27-.29-1.73-2.24-1.78-5.32-.02-7.66C6.69 7.62 6.1 9.29 6.34 11.09c.25 1.89 1.16 3.52 2.53 4.74 1.43 1.24 3.18 2.01 5.07 2.06.85.03 1.7-.09 2.53-.35 2.39-.76 4.17-2.63 4.75-5.03.23-.96.26-1.94.07-2.91-.23-1.23-.77-2.35-1.63-3.26v.01z"/>
                        </svg>
                    </div>
                    <h4><?php _e( 'Step 2: Ionization', 'astra-child-diamond' ); ?></h4>
                    <p><?php _e( 'Carbon-rich gases are ionized into plasma at extreme temperatures', 'astra-child-diamond' ); ?></p>
                </div>
                
                <div class="process-step">
                    <div class="process-icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 13H5v-2h14v2z"/>
                        </svg>
                    </div>
                    <h4><?php _e( 'Step 3: Crystallization', 'astra-child-diamond' ); ?></h4>
                    <p><?php _e( 'Pure carbon atoms bond to the seed crystal, growing layer by layer', 'astra-child-diamond' ); ?></p>
                </div>
                
                <div class="process-step">
                    <div class="process-icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                    </div>
                    <h4><?php _e( 'Step 4: Cutting & Polishing', 'astra-child-diamond' ); ?></h4>
                    <p><?php _e( 'Expert craftsmen cut and polish the diamond to perfection', 'astra-child-diamond' ); ?></p>
                </div>
            </div>
        </div>
        
        <!-- Key Benefits -->
        <div class="key-benefits">
            <h3><?php _e( 'The Advantages Are Clear', 'astra-child-diamond' ); ?></h3>
            
            <div class="benefits-grid">
                <div class="benefit-card">
                    <div class="benefit-icon">🌱</div>
                    <h4><?php _e( 'Eco-Friendly', 'astra-child-diamond' ); ?></h4>
                    <p><?php _e( 'Zero mining impact, carbon-neutral shipping, sustainable practices', 'astra-child-diamond' ); ?></p>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">🤝</div>
                    <h4><?php _e( '100% Ethical', 'astra-child-diamond' ); ?></h4>
                    <p><?php _e( 'No conflict diamonds, fair labor practices, transparent sourcing', 'astra-child-diamond' ); ?></p>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">💎</div>
                    <h4><?php _e( 'Identical Quality', 'astra-child-diamond' ); ?></h4>
                    <p><?php _e( 'Same physical, chemical, and optical properties as mined diamonds', 'astra-child-diamond' ); ?></p>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">💰</div>
                    <h4><?php _e( 'Better Value', 'astra-child-diamond' ); ?></h4>
                    <p><?php _e( '30-40% less expensive - more diamond for your budget', 'astra-child-diamond' ); ?></p>
                </div>
            </div>
        </div>
        
        <!-- CTA -->
        <div class="education-cta">
            <a href="<?php echo home_url( '/education/' ); ?>" class="btn btn-outline btn-large">
                <?php _e( 'Learn More About Lab-Grown Diamonds', 'astra-child-diamond' ); ?>
            </a>
        </div>
    </div>
</section>

<style>
.education-section {
    padding: var(--spacing-xl) var(--spacing-lg);
    background: var(--color-light-grey);
}

.section-title {
    text-align: center;
    font-size: 2.5rem;
    margin-bottom: var(--spacing-sm);
    color: var(--color-charcoal-black);
}

.section-subtitle {
    text-align: center;
    font-size: 1.1rem;
    color: var(--color-medium-grey);
    margin-bottom: var(--spacing-xl);
}

.comparison-wrapper {
    max-width: 1000px;
    margin: 0 auto var(--spacing-xl);
    overflow-x: auto;
}

.comparison-table {
    width: 100%;
    background: var(--color-pure-white);
    border-radius: var(--radius-md);
    overflow: hidden;
    box-shadow: var(--shadow-card);
}

.comparison-table thead {
    background: var(--gradient-blue-black);
}

.comparison-table th {
    color: var(--color-pure-white);
    padding: var(--spacing-md);
    text-align: left;
    font-size: 1.1rem;
}

.comparison-table th.highlight {
    background: var(--color-cobalt-blue);
}

.comparison-table td {
    padding: var(--spacing-md);
    border-bottom: 1px solid var(--color-light-grey);
}

.comparison-table td.highlight {
    background: rgba(41, 98, 255, 0.05);
    font-weight: 600;
}

.checkmark {
    color: #4CAF50;
    font-weight: 700;
    font-size: 1.2rem;
}

.crossmark {
    color: #F44336;
    font-weight: 700;
    font-size: 1.2rem;
}

.cvd-process-section {
    background: var(--gradient-blue-black);
    color: var(--color-pure-white);
    padding: var(--spacing-xl);
    border-radius: var(--radius-lg);
    margin: var(--spacing-xl) 0;
}

.cvd-process-section h3 {
    color: var(--color-pure-white);
    text-align: center;
    font-size: 2rem;
    margin-bottom: var(--spacing-sm);
}

.cvd-process-section > p {
    text-align: center;
    font-size: 1.1rem;
    margin-bottom: var(--spacing-xl);
    opacity: 0.95;
}

.process-steps {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: var(--spacing-lg);
    max-width: 1200px;
    margin: 0 auto;
}

.process-step {
    text-align: center;
    padding: var(--spacing-md);
}

.process-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto var(--spacing-md);
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.process-step h4 {
    color: var(--color-pure-white);
    margin-bottom: var(--spacing-sm);
}

.process-step p {
    font-size: 0.9rem;
    opacity: 0.9;
}

.key-benefits {
    max-width: 1200px;
    margin: 0 auto var(--spacing-xl);
}

.key-benefits h3 {
    text-align: center;
    font-size: 2rem;
    margin-bottom: var(--spacing-lg);
}

.benefits-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: var(--spacing-lg);
}

.benefit-card {
    background: var(--color-pure-white);
    padding: var(--spacing-lg);
    border-radius: var(--radius-md);
    text-align: center;
    box-shadow: var(--shadow-card);
    transition: transform var(--transition-smooth);
}

.benefit-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-hover);
}

.benefit-icon {
    font-size: 3rem;
    margin-bottom: var(--spacing-sm);
}

.benefit-card h4 {
    margin-bottom: var(--spacing-sm);
    color: var(--color-navy-blue);
}

.benefit-card p {
    font-size: 0.9rem;
    color: var(--color-medium-grey);
}

.education-cta {
    text-align: center;
    margin-top: var(--spacing-xl);
}

@media (max-width: 768px) {
    .section-title {
        font-size: 1.8rem;
    }
    
    .process-steps {
        grid-template-columns: 1fr;
    }
    
    .benefits-grid {
        grid-template-columns: 1fr;
    }
}
</style>
