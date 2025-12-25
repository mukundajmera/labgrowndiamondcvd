<?php
/**
 * LGD Diamond Core - Trust & Concierge
 * 
 * Adds trust signals, expert modal, and checkout reassurance.
 * High-ticket conversion optimization layer.
 * 
 * @package LGD_Diamond_Core
 * @since 1.4.0
 */

defined('ABSPATH') or exit;

/**
 * Trust & Concierge Handler
 * 
 * Manages the expert modal, trigger buttons, and checkout trust badges.
 */
class LGD_Trust_Concierge
{

    /**
     * Trust badges configuration
     * @var array
     */
    private $trust_badges = [
        [
            'icon' => '🛡️',
            'label' => 'Lifetime Warranty',
        ],
        [
            'icon' => '🚚',
            'label' => 'Free Insured Shipping',
        ],
        [
            'icon' => '💎',
            'label' => 'Certified Authentic',
        ],
        [
            'icon' => '🔄',
            'label' => '30-Day Returns',
        ],
    ];

    /**
     * Initialize hooks
     */
    public function __construct()
    {
        // Form handling
        add_action('init', [$this, 'handle_form_submission']);

        // Trigger buttons on product page
        add_action('woocommerce_single_product_summary', [$this, 'render_concierge_buttons'], 35);

        // Expert modal in footer
        add_action('wp_footer', [$this, 'render_expert_modal']);

        // Checkout trust badges
        add_action('woocommerce_review_order_before_submit', [$this, 'render_checkout_trust_badges']);

        // Also add trust badges on product page
        add_action('woocommerce_single_product_summary', [$this, 'render_product_trust_badges'], 45);

        // Success message after form submission
        add_action('woocommerce_before_single_product', [$this, 'show_success_message']);
    }

    /**
     * TASK 2: Form Handling
     * 
     * Processes "Ask an Expert" form submissions.
     */
    public function handle_form_submission()
    {
        // Check for our form action
        if (!isset($_POST['lgd_action'])) {
            return;
        }

        // Verify nonce
        if (!isset($_POST['lgd_nonce']) || !wp_verify_nonce($_POST['lgd_nonce'], 'lgd_expert_form')) {
            wp_die('Security check failed.');
        }

        $action = sanitize_text_field($_POST['lgd_action']);

        if ($action === 'ask_expert') {
            $this->process_expert_inquiry();
        } elseif ($action === 'drop_hint') {
            $this->process_drop_hint();
        }
    }

    /**
     * Process Expert Inquiry
     */
    private function process_expert_inquiry()
    {
        // Sanitize inputs
        $name = sanitize_text_field($_POST['lgd_name'] ?? '');
        $email = sanitize_email($_POST['lgd_email'] ?? '');
        $phone = sanitize_text_field($_POST['lgd_phone'] ?? '');
        $question = sanitize_textarea_field($_POST['lgd_question'] ?? '');
        $product_id = absint($_POST['lgd_product_id'] ?? 0);

        // Validate required fields
        if (empty($name) || empty($email) || empty($question)) {
            wp_safe_redirect(add_query_arg('lgd_error', 'missing_fields', wp_get_referer()));
            exit;
        }

        // Get product info
        $product_name = '';
        $product_url = '';
        if ($product_id) {
            $product = wc_get_product($product_id);
            if ($product) {
                $product_name = $product->get_name();
                $product_url = get_permalink($product_id);
            }
        }

        // Prepare email
        $admin_email = get_option('admin_email');
        $site_name = get_bloginfo('name');

        $subject = sprintf('[%s] Diamond Inquiry from %s', $site_name, $name);

        $message = "New Diamond Inquiry\n";
        $message .= "==================\n\n";
        $message .= "Name: {$name}\n";
        $message .= "Email: {$email}\n";
        if ($phone) {
            $message .= "Phone: {$phone}\n";
        }
        $message .= "\n";
        if ($product_name) {
            $message .= "Product: {$product_name}\n";
            $message .= "URL: {$product_url}\n\n";
        }
        $message .= "Question:\n{$question}\n";

        $headers = [
            'From: ' . $site_name . ' <' . $admin_email . '>',
            'Reply-To: ' . $name . ' <' . $email . '>',
            'Content-Type: text/plain; charset=UTF-8',
        ];

        // Send email
        $sent = wp_mail($admin_email, $subject, $message, $headers);

        // Redirect with success/error
        $redirect_url = $product_id ? get_permalink($product_id) : wp_get_referer();

        if ($sent) {
            wp_safe_redirect(add_query_arg('lgd_success', 'inquiry_sent', $redirect_url));
        } else {
            wp_safe_redirect(add_query_arg('lgd_error', 'send_failed', $redirect_url));
        }
        exit;
    }

    /**
     * Process Drop a Hint
     */
    private function process_drop_hint()
    {
        // Sanitize inputs
        $your_name = sanitize_text_field($_POST['lgd_your_name'] ?? '');
        $your_email = sanitize_email($_POST['lgd_your_email'] ?? '');
        $hint_name = sanitize_text_field($_POST['lgd_hint_name'] ?? '');
        $hint_email = sanitize_email($_POST['lgd_hint_email'] ?? '');
        $hint_message = sanitize_textarea_field($_POST['lgd_hint_message'] ?? '');
        $product_id = absint($_POST['lgd_product_id'] ?? 0);

        // Validate required fields
        if (empty($your_name) || empty($your_email) || empty($hint_email)) {
            wp_safe_redirect(add_query_arg('lgd_error', 'missing_fields', wp_get_referer()));
            exit;
        }

        // Get product info
        if (!$product_id) {
            wp_safe_redirect(add_query_arg('lgd_error', 'no_product', wp_get_referer()));
            exit;
        }

        $product = wc_get_product($product_id);
        if (!$product) {
            wp_safe_redirect(add_query_arg('lgd_error', 'invalid_product', wp_get_referer()));
            exit;
        }

        $product_name = $product->get_name();
        $product_url = get_permalink($product_id);
        $product_price = $product->get_price_html();
        $product_image = wp_get_attachment_image_url($product->get_image_id(), 'medium');

        // Prepare email
        $site_name = get_bloginfo('name');
        $subject = sprintf('%s sent you a hint from %s! 💎', $your_name, $site_name);

        $message = "Someone special is dropping a hint! 💝\n\n";
        $message .= "{$your_name} thought you might love this:\n\n";
        $message .= "━━━━━━━━━━━━━━━━━━━━━━\n";
        $message .= "{$product_name}\n";
        $message .= "Price: " . wp_strip_all_tags($product_price) . "\n";
        $message .= "View it here: {$product_url}\n";
        $message .= "━━━━━━━━━━━━━━━━━━━━━━\n\n";

        if ($hint_message) {
            $message .= "Personal message: \"{$hint_message}\"\n\n";
        }

        $message .= "— From {$site_name}";

        $headers = [
            'From: ' . $site_name . ' <' . get_option('admin_email') . '>',
            'Reply-To: ' . $your_name . ' <' . $your_email . '>',
            'Content-Type: text/plain; charset=UTF-8',
        ];

        // Send email
        $sent = wp_mail($hint_email, $subject, $message, $headers);

        // Redirect
        $redirect_url = get_permalink($product_id);

        if ($sent) {
            wp_safe_redirect(add_query_arg('lgd_success', 'hint_sent', $redirect_url));
        } else {
            wp_safe_redirect(add_query_arg('lgd_error', 'send_failed', $redirect_url));
        }
        exit;
    }

    /**
     * Show Success Message
     */
    public function show_success_message()
    {
        if (isset($_GET['lgd_success'])) {
            $message = '';
            switch ($_GET['lgd_success']) {
                case 'inquiry_sent':
                    $message = 'Thank you! A diamond expert will contact you within 24 hours.';
                    break;
                case 'hint_sent':
                    $message = 'Your hint has been sent! 💝';
                    break;
            }
            if ($message) {
                echo '<div class="lgd-success-notice">' . esc_html($message) . '</div>';
            }
        }

        if (isset($_GET['lgd_error'])) {
            $message = '';
            switch ($_GET['lgd_error']) {
                case 'missing_fields':
                    $message = 'Please fill in all required fields.';
                    break;
                case 'send_failed':
                    $message = 'Something went wrong. Please try again or call us directly.';
                    break;
            }
            if ($message) {
                echo '<div class="lgd-error-notice">' . esc_html($message) . '</div>';
            }
        }
    }

    /**
     * TASK 1.2: Render Concierge Buttons
     */
    public function render_concierge_buttons()
    {
        global $product;

        if (!$product) {
            return;
        }
        ?>
        <div class="lgd-concierge-buttons">
            <button type="button" class="lgd-ask-expert-btn" data-modal="expert">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                </svg>
                <span>Ask an Expert</span>
            </button>
            <button type="button" class="lgd-drop-hint-btn" data-modal="hint">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path
                        d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                    </path>
                </svg>
                <span>Drop a Hint</span>
            </button>
        </div>
        <?php
    }

    /**
     * TASK 1.1: Render Expert Modal
     */
    public function render_expert_modal()
    {
        if (!is_product()) {
            return;
        }

        global $product;
        $product_id = $product ? $product->get_id() : 0;
        ?>
        <!-- Expert Modal Overlay -->
        <div id="lgd-modal-overlay" class="lgd-modal-overlay"></div>

        <!-- Ask an Expert Modal -->
        <div id="lgd-expert-modal" class="lgd-modal" role="dialog" aria-modal="true" aria-labelledby="lgd-modal-title-expert">
            <div class="lgd-modal-content">
                <button type="button" class="lgd-modal-close" aria-label="Close">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>

                <h3 id="lgd-modal-title-expert" class="lgd-modal-title">💎 Ask a Diamond Expert</h3>
                <p class="lgd-modal-subtitle">Get personalized advice from our certified gemologists.</p>

                <form method="post" class="lgd-modal-form">
                    <input type="hidden" name="lgd_action" value="ask_expert">
                    <input type="hidden" name="lgd_product_id" value="<?php echo esc_attr($product_id); ?>">
                    <?php wp_nonce_field('lgd_expert_form', 'lgd_nonce'); ?>

                    <div class="lgd-form-row">
                        <input type="text" name="lgd_name" placeholder="Your Name *" required>
                    </div>

                    <div class="lgd-form-row lgd-form-row-half">
                        <input type="email" name="lgd_email" placeholder="Email *" required>
                        <input type="tel" name="lgd_phone" placeholder="Phone (Optional)">
                    </div>

                    <div class="lgd-form-row">
                        <textarea name="lgd_question" placeholder="Your question about this diamond..." rows="4"
                            required></textarea>
                    </div>

                    <button type="submit" class="lgd-form-submit">Send Question</button>
                </form>
            </div>
        </div>

        <!-- Drop a Hint Modal -->
        <div id="lgd-hint-modal" class="lgd-modal" role="dialog" aria-modal="true" aria-labelledby="lgd-modal-title-hint">
            <div class="lgd-modal-content">
                <button type="button" class="lgd-modal-close" aria-label="Close">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>

                <h3 id="lgd-modal-title-hint" class="lgd-modal-title">💝 Drop a Hint</h3>
                <p class="lgd-modal-subtitle">Let someone special know what you're dreaming about.</p>

                <form method="post" class="lgd-modal-form">
                    <input type="hidden" name="lgd_action" value="drop_hint">
                    <input type="hidden" name="lgd_product_id" value="<?php echo esc_attr($product_id); ?>">
                    <?php wp_nonce_field('lgd_expert_form', 'lgd_nonce'); ?>

                    <div class="lgd-form-row lgd-form-row-half">
                        <input type="text" name="lgd_your_name" placeholder="Your Name *" required>
                        <input type="email" name="lgd_your_email" placeholder="Your Email *" required>
                    </div>

                    <div class="lgd-form-row lgd-form-row-half">
                        <input type="text" name="lgd_hint_name" placeholder="Recipient's Name">
                        <input type="email" name="lgd_hint_email" placeholder="Recipient's Email *" required>
                    </div>

                    <div class="lgd-form-row">
                        <textarea name="lgd_hint_message" placeholder="Add a personal message (optional)..."
                            rows="3"></textarea>
                    </div>

                    <button type="submit" class="lgd-form-submit">Send Hint 💌</button>
                </form>
            </div>
        </div>

        <script>
            (function () {
                'use strict';

                const overlay = document.getElementById('lgd-modal-overlay');
                const expertModal = document.getElementById('lgd-expert-modal');
                const hintModal = document.getElementById('lgd-hint-modal');
                const expertBtn = document.querySelector('.lgd-ask-expert-btn');
                const hintBtn = document.querySelector('.lgd-drop-hint-btn');
                const closeBtns = document.querySelectorAll('.lgd-modal-close');

                function openModal(modal) {
                    if (!modal || !overlay) return;
                    overlay.classList.add('lgd-modal-active');
                    modal.classList.add('lgd-modal-active');
                    document.body.style.overflow = 'hidden';
                }

                function closeAllModals() {
                    if (overlay) overlay.classList.remove('lgd-modal-active');
                    if (expertModal) expertModal.classList.remove('lgd-modal-active');
                    if (hintModal) hintModal.classList.remove('lgd-modal-active');
                    document.body.style.overflow = '';
                }

                if (expertBtn) {
                    expertBtn.addEventListener('click', function () {
                        openModal(expertModal);
                    });
                }

                if (hintBtn) {
                    hintBtn.addEventListener('click', function () {
                        openModal(hintModal);
                    });
                }

                closeBtns.forEach(function (btn) {
                    btn.addEventListener('click', closeAllModals);
                });

                if (overlay) {
                    overlay.addEventListener('click', closeAllModals);
                }

                document.addEventListener('keydown', function (e) {
                    if (e.key === 'Escape') {
                        closeAllModals();
                    }
                });
            })();
        </script>
        <?php
    }

    /**
     * TASK 1.3: Render Checkout Trust Badges
     */
    public function render_checkout_trust_badges()
    {
        ?>
        <div class="lgd-checkout-trust-badges">
            <?php foreach ($this->trust_badges as $badge): ?>
                <div class="lgd-trust-badge-item">
                    <span class="lgd-trust-icon"><?php echo esc_html($badge['icon']); ?></span>
                    <span class="lgd-trust-label"><?php echo esc_html($badge['label']); ?></span>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
    }

    /**
     * Render Product Page Trust Badges
     */
    public function render_product_trust_badges()
    {
        ?>
        <div class="lgd-product-trust-badges">
            <?php foreach ($this->trust_badges as $badge): ?>
                <div class="lgd-trust-badge-item">
                    <span class="lgd-trust-icon"><?php echo esc_html($badge['icon']); ?></span>
                    <span class="lgd-trust-label"><?php echo esc_html($badge['label']); ?></span>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
    }
}

// Initialize
new LGD_Trust_Concierge();
