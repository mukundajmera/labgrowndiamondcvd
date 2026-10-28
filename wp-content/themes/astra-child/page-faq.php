<?php
/**
 * Template Name: FAQ
 *
 * This template displays the FAQ page.
 *
 * @package Astra Child
 */

get_header();

// Enqueue FAQ specific stylesheet
wp_enqueue_style('lgd-faq-style', get_stylesheet_directory_uri() . '/assets/css/faq.css', array(), '1.0.0', 'all');
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <div class="lgd-faq-page ast-container">
            
            <!-- Hero Section -->
            <section class="lgd-faq-hero">
                <h1 class="lgd-faq-hero__title">Knowledgebase & FAQs</h1>
                <p class="lgd-faq-hero__subtitle">Everything you need to know about our ethical lab-grown diamonds, certifications, and policies.</p>
                
                <div class="lgd-faq-search">
                    <div class="lgd-faq-search__input-wrapper">
                        <svg class="lgd-faq-search__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        <input type="text" id="faq-search-input" class="lgd-faq-search__input" placeholder="Search for questions, terms, or topics..." aria-label="Search FAQs">
                    </div>
                </div>
            </section>

            <!-- Certificate Verification Block -->
            <section class="lgd-faq-cert-verify">
                <div class="lgd-faq-cert-verify__content">
                    <h2 class="lgd-faq-cert-verify__title">Verify Your Certificate</h2>
                    <p class="lgd-faq-cert-verify__text">Every diamond we sell includes an official IGI or GIA grading report and a laser inscription. You can verify your diamond's authenticity directly with the gemological laboratory.</p>
                </div>
                <div class="lgd-faq-cert-verify__links">
                    <a href="https://www.igi.org/verify-your-report" target="_blank" rel="noopener noreferrer" class="lgd-btn lgd-btn--igi">
                        <svg class="lgd-btn__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        Verify IGI Report
                    </a>
                    <a href="https://www.gia.edu/report-check-landing" target="_blank" rel="noopener noreferrer" class="lgd-btn lgd-btn--gia">
                        <svg class="lgd-btn__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        Verify GIA Report
                    </a>
                </div>
            </section>

            <!-- Filter Tabs -->
            <div class="lgd-faq-tabs" role="tablist" aria-label="FAQ Categories">
                <button class="lgd-faq-tabs__btn is-active" role="tab" aria-selected="true" aria-controls="faq-panel-all" id="tab-all" data-target="all">All</button>
                <button class="lgd-faq-tabs__btn" role="tab" aria-selected="false" aria-controls="faq-panel-technology" id="tab-technology" data-target="technology">Technology</button>
                <button class="lgd-faq-tabs__btn" role="tab" aria-selected="false" aria-controls="faq-panel-4cs" id="tab-4cs" data-target="4cs">4Cs & Certs</button>
                <button class="lgd-faq-tabs__btn" role="tab" aria-selected="false" aria-controls="faq-panel-buying" id="tab-buying" data-target="buying">Buying Guide</button>
                <button class="lgd-faq-tabs__btn" role="tab" aria-selected="false" aria-controls="faq-panel-care" id="tab-care" data-target="care">Care & Policies</button>
            </div>

            <!-- FAQ Content -->
            <div class="lgd-faq-content">

                <!-- Category: Technology -->
                <div class="lgd-faq-category" data-category="technology" id="faq-panel-technology" role="tabpanel" aria-labelledby="tab-technology">
                    <h3 class="lgd-faq-category__title">CVD Technology & Manufacturing</h3>
                    
                    <div class="lgd-faq-accordion">
                        <div class="lgd-faq-item">
                            <button class="lgd-faq-item__trigger" aria-expanded="false" aria-controls="faq-ans-1">
                                <span class="lgd-faq-item__title">What is a CVD Lab-Grown Diamond?</span>
                                <span class="lgd-faq-item__icon"></span>
                            </button>
                            <div class="lgd-faq-item__panel" id="faq-ans-1" role="region" hidden>
                                <div class="lgd-faq-item__content">
                                    <p>Chemical Vapor Deposition (CVD) is an advanced technological process used to create diamonds that are optically, physically, and chemically identical to mined diamonds. The process involves placing a diamond seed in a sealed chamber filled with carbon-rich gas. The gases are heated into plasma, allowing carbon atoms to attach to the seed layer by layer, forming a pure diamond crystal.</p>
                                </div>
                            </div>
                        </div>

                        <div class="lgd-faq-item">
                            <button class="lgd-faq-item__trigger" aria-expanded="false" aria-controls="faq-ans-2">
                                <span class="lgd-faq-item__title">Are CVD diamonds "real" diamonds?</span>
                                <span class="lgd-faq-item__icon"></span>
                            </button>
                            <div class="lgd-faq-item__panel" id="faq-ans-2" role="region" hidden>
                                <div class="lgd-faq-item__content">
                                    <p>Yes. Lab-grown diamonds are 100% real diamonds. They have the exact same carbon crystal structure as mined diamonds. Even trained gemologists cannot distinguish them from mined diamonds without highly specialized laboratory equipment.</p>
                                </div>
                            </div>
                        </div>

                        <div class="lgd-faq-item">
                            <button class="lgd-faq-item__trigger" aria-expanded="false" aria-controls="faq-ans-3">
                                <span class="lgd-faq-item__title">What is the difference between CVD and HPHT?</span>
                                <span class="lgd-faq-item__icon"></span>
                            </button>
                            <div class="lgd-faq-item__panel" id="faq-ans-3" role="region" hidden>
                                <div class="lgd-faq-item__content">
                                    <p>Both are valid methods for creating lab-grown diamonds. HPHT (High Pressure High Temperature) mimics the crushing pressure of the earth, while CVD (Chemical Vapor Deposition) builds the diamond atom by atom in a vacuum. CVD is widely considered the superior method for creating colorless gemstones, as it rarely produces metallic inclusions and tends to yield highly pure Type IIa diamonds.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Category: 4Cs & Certs -->
                <div class="lgd-faq-category" data-category="4cs" id="faq-panel-4cs" role="tabpanel" aria-labelledby="tab-4cs">
                    <h3 class="lgd-faq-category__title">IGI/GIA Certification & Laser Inscription</h3>
                    
                    <div class="lgd-faq-accordion">
                        <div class="lgd-faq-item">
                            <button class="lgd-faq-item__trigger" aria-expanded="false" aria-controls="faq-ans-4">
                                <span class="lgd-faq-item__title">Are your diamonds certified?</span>
                                <span class="lgd-faq-item__icon"></span>
                            </button>
                            <div class="lgd-faq-item__panel" id="faq-ans-4" role="region" hidden>
                                <div class="lgd-faq-item__content">
                                    <p>Yes, absolutely. Every central diamond we sell (0.50ct and above) comes with a full grading report from either the International Gemological Institute (IGI) or the Gemological Institute of America (GIA), the two most respected gemological laboratories in the world.</p>
                                </div>
                            </div>
                        </div>

                        <div class="lgd-faq-item">
                            <button class="lgd-faq-item__trigger" aria-expanded="false" aria-controls="faq-ans-5">
                                <span class="lgd-faq-item__title">What is a laser inscription?</span>
                                <span class="lgd-faq-item__icon"></span>
                            </button>
                            <div class="lgd-faq-item__panel" id="faq-ans-5" role="region" hidden>
                                <div class="lgd-faq-item__content">
                                    <p>A laser inscription is a microscopic engraving on the girdle (the outer edge) of the diamond. Our certified diamonds are laser-inscribed with their unique report number, and usually the words "Lab Grown" for full transparency. You can view this inscription under 10x magnification (using a jeweler's loupe).</p>
                                </div>
                            </div>
                        </div>

                        <div class="lgd-faq-item">
                            <button class="lgd-faq-item__trigger" aria-expanded="false" aria-controls="faq-ans-6">
                                <span class="lgd-faq-item__title">What does Type IIa mean?</span>
                                <span class="lgd-faq-item__icon"></span>
                            </button>
                            <div class="lgd-faq-item__panel" id="faq-ans-6" role="region" hidden>
                                <div class="lgd-faq-item__content">
                                    <p>Type IIa is the purest classification of diamonds, characterized by having almost no nitrogen or boron impurities. Less than 2% of mined diamonds are Type IIa (the famous Golconda diamonds). However, nearly all of our high-quality CVD lab-grown diamonds are Type IIa, giving them exceptional brilliance and clarity.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Category: Buying Guide -->
                <div class="lgd-faq-category" data-category="buying" id="faq-panel-buying" role="tabpanel" aria-labelledby="tab-buying">
                    <h3 class="lgd-faq-category__title">Custom Ordering & Shipping</h3>
                    
                    <div class="lgd-faq-accordion">
                        <div class="lgd-faq-item">
                            <button class="lgd-faq-item__trigger" aria-expanded="false" aria-controls="faq-ans-7">
                                <span class="lgd-faq-item__title">How long does shipping take?</span>
                                <span class="lgd-faq-item__icon"></span>
                            </button>
                            <div class="lgd-faq-item__panel" id="faq-ans-7" role="region" hidden>
                                <div class="lgd-faq-item__content">
                                    <p>For loose diamonds in stock, domestic shipping typically takes 2-4 business days. For custom jewelry orders or made-to-order engagement rings, please allow 3-4 weeks for production and quality control before shipping. All our shipments are fully insured and require a signature upon delivery.</p>
                                </div>
                            </div>
                        </div>

                        <div class="lgd-faq-item">
                            <button class="lgd-faq-item__trigger" aria-expanded="false" aria-controls="faq-ans-8">
                                <span class="lgd-faq-item__title">Can I design a custom ring?</span>
                                <span class="lgd-faq-item__icon"></span>
                            </button>
                            <div class="lgd-faq-item__panel" id="faq-ans-8" role="region" hidden>
                                <div class="lgd-faq-item__content">
                                    <p>Yes! We specialize in bespoke jewelry. You can select your perfect lab-grown diamond from our inventory and work with our design team to create a custom setting. The process starts with a CAD (Computer-Aided Design) rendering for your approval before casting.</p>
                                </div>
                            </div>
                        </div>

                        <div class="lgd-faq-item">
                            <button class="lgd-faq-item__trigger" aria-expanded="false" aria-controls="faq-ans-9">
                                <span class="lgd-faq-item__title">Is your shipping secure?</span>
                                <span class="lgd-faq-item__icon"></span>
                            </button>
                            <div class="lgd-faq-item__panel" id="faq-ans-9" role="region" hidden>
                                <div class="lgd-faq-item__content">
                                    <p>Absolutely. We use premium logistics partners for all deliveries. Every package is fully insured for its replacement value until it is signed for by you. The packaging is discreet, giving no indication of the valuable contents inside.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Category: Care & Policies -->
                <div class="lgd-faq-category" data-category="care" id="faq-panel-care" role="tabpanel" aria-labelledby="tab-care">
                    <h3 class="lgd-faq-category__title">Returns, Warranty & Care</h3>
                    
                    <div class="lgd-faq-accordion">
                        <div class="lgd-faq-item">
                            <button class="lgd-faq-item__trigger" aria-expanded="false" aria-controls="faq-ans-10">
                                <span class="lgd-faq-item__title">What is your return policy?</span>
                                <span class="lgd-faq-item__icon"></span>
                            </button>
                            <div class="lgd-faq-item__panel" id="faq-ans-10" role="region" hidden>
                                <div class="lgd-faq-item__content">
                                    <p>We offer a hassle-free 30-day return policy. If you are not completely satisfied with your purchase, you can return it within 30 days of the shipping date for a full refund or exchange. The item must be in its original, unworn condition and accompanied by all original documentation.</p>
                                </div>
                            </div>
                        </div>

                        <div class="lgd-faq-item">
                            <button class="lgd-faq-item__trigger" aria-expanded="false" aria-controls="faq-ans-11">
                                <span class="lgd-faq-item__title">Do you offer a lifetime upgrade policy?</span>
                                <span class="lgd-faq-item__icon"></span>
                            </button>
                            <div class="lgd-faq-item__panel" id="faq-ans-11" role="region" hidden>
                                <div class="lgd-faq-item__content">
                                    <p>Yes. We offer a lifetime diamond upgrade program for all IGI/GIA certified loose diamonds purchased from us. You will receive a credit equal to 100% of the original price toward the purchase of a new diamond that is at least 1.5x the price of the original.</p>
                                </div>
                            </div>
                        </div>

                        <div class="lgd-faq-item">
                            <button class="lgd-faq-item__trigger" aria-expanded="false" aria-controls="faq-ans-12">
                                <span class="lgd-faq-item__title">How should I clean my diamond jewelry?</span>
                                <span class="lgd-faq-item__icon"></span>
                            </button>
                            <div class="lgd-faq-item__panel" id="faq-ans-12" role="region" hidden>
                                <div class="lgd-faq-item__content">
                                    <p>Since lab-grown diamonds share the physical properties of mined diamonds (a 10 on the Mohs scale), they are very durable. To clean them at home, soak the jewelry in a gentle degreasing solution, such as water with a few drops of mild dish soap, for 20-30 minutes. Gently brush with a soft, clean toothbrush, then rinse under warm running water and pat dry with a lint-free cloth.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- No Results Message -->
            <div class="lgd-faq-no-results" id="faq-no-results" style="display: none;">
                <p>No questions found matching your search. Please try a different keyword or contact our support team.</p>
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="lgd-btn lgd-btn--secondary">Contact Support</a>
            </div>

        </div>

    </main>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // Accordion Toggle
    const accordionTriggers = document.querySelectorAll('.lgd-faq-item__trigger');
    
    accordionTriggers.forEach(trigger => {
        trigger.addEventListener('click', function() {
            const panelId = this.getAttribute('aria-controls');
            const panel = document.getElementById(panelId);
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            
            // Close all other accordions (Optional, standard accordion behavior)
            accordionTriggers.forEach(otherTrigger => {
                if (otherTrigger !== this) {
                    otherTrigger.setAttribute('aria-expanded', 'false');
                    const otherPanel = document.getElementById(otherTrigger.getAttribute('aria-controls'));
                    otherPanel.hidden = true;
                }
            });

            // Toggle current
            this.setAttribute('aria-expanded', !isExpanded);
            panel.hidden = isExpanded;
        });
    });

    // Category Tabs
    const tabs = document.querySelectorAll('.lgd-faq-tabs__btn');
    const categories = document.querySelectorAll('.lgd-faq-category');
    const searchInput = document.getElementById('faq-search-input');
    const noResults = document.getElementById('faq-no-results');
    const allFaqItems = document.querySelectorAll('.lgd-faq-item');

    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            // Reset active states
            tabs.forEach(t => {
                t.classList.remove('is-active');
                t.setAttribute('aria-selected', 'false');
            });
            
            // Set current active
            this.classList.add('is-active');
            this.setAttribute('aria-selected', 'true');
            
            const target = this.getAttribute('data-target');
            
            // Reset search when switching tabs
            searchInput.value = '';
            filterFaqs('');
            
            categories.forEach(cat => {
                if (target === 'all' || cat.getAttribute('data-category') === target) {
                    cat.style.display = 'block';
                } else {
                    cat.style.display = 'none';
                }
            });
        });
    });

    // Search Filtering
    searchInput.addEventListener('input', function() {
        const query = this.value.toLowerCase().trim();
        filterFaqs(query);
    });

    function filterFaqs(query) {
        let hasResults = false;

        // Force 'All' tab active during search to search everything
        if (query.length > 0) {
            tabs.forEach(t => {
                if (t.getAttribute('data-target') === 'all') {
                    t.classList.add('is-active');
                    t.setAttribute('aria-selected', 'true');
                } else {
                    t.classList.remove('is-active');
                    t.setAttribute('aria-selected', 'false');
                }
            });
            
            categories.forEach(cat => {
                cat.style.display = 'block'; // Show all categories so we can filter items inside
            });
        }

        categories.forEach(cat => {
            const items = cat.querySelectorAll('.lgd-faq-item');
            let catHasVisibleItems = false;
            
            items.forEach(item => {
                const title = item.querySelector('.lgd-faq-item__title').textContent.toLowerCase();
                const content = item.querySelector('.lgd-faq-item__content').textContent.toLowerCase();
                
                if (title.includes(query) || content.includes(query) || query === '') {
                    item.style.display = 'block';
                    catHasVisibleItems = true;
                    hasResults = true;
                } else {
                    item.style.display = 'none';
                }
            });

            // Hide the category header if no items in it match the search
            if (!catHasVisibleItems && query !== '') {
                cat.style.display = 'none';
            }
        });

        if (hasResults || query === '') {
            noResults.style.display = 'none';
        } else {
            noResults.style.display = 'block';
        }
    }

});
</script>

<?php get_footer(); ?>
