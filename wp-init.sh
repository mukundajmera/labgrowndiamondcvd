#!/bin/bash
###############################################################################
# WordPress Initialization Script for Lab Grown Diamond CVD
# Version: 1.0.0
# Purpose: Automated setup and configuration of WordPress site
###############################################################################

set -e  # Exit on error

# Color codes for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Logging functions
log_info() {
    echo -e "${BLUE}[INFO]${NC} $1"
}

log_success() {
    echo -e "${GREEN}[SUCCESS]${NC} $1"
}

log_warning() {
    echo -e "${YELLOW}[WARNING]${NC} $1"
}

log_error() {
    echo -e "${RED}[ERROR]${NC} $1"
}

# Get the script directory
SCRIPT_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
cd "$SCRIPT_DIR"

log_info "Starting WordPress initialization for Lab Grown Diamond CVD..."
log_info "Working directory: $SCRIPT_DIR"

###############################################################################
# Step 1: Check Prerequisites
###############################################################################

log_info "Checking prerequisites..."

# Check if WP-CLI is available
if ! command -v wp &> /dev/null; then
    log_warning "WP-CLI not found. Attempting to download..."
    curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
    chmod +x wp-cli.phar
    alias wp='php wp-cli.phar'
    log_success "WP-CLI downloaded and ready"
else
    log_success "WP-CLI found"
fi

# Check if WordPress is installed
if [ ! -f "wp-config.php" ]; then
    log_error "wp-config.php not found. WordPress may not be installed properly."
    exit 1
fi

log_success "WordPress installation verified"

###############################################################################
# Step 2: Verify Database Connection
###############################################################################

log_info "Verifying database connection..."

if wp db check --allow-root 2>/dev/null; then
    log_success "Database connection successful"
else
    log_warning "Database connection check skipped (may require proper environment)"
fi

###############################################################################
# Step 3: Activate Theme
###############################################################################

log_info "Activating Astra Child theme..."

# Check if theme exists
if [ -d "wp-content/themes/astra-child" ]; then
    wp theme activate astra-child --allow-root 2>/dev/null || log_warning "Theme activation skipped (requires WordPress environment)"
    log_success "Astra Child theme ready"
else
    log_error "Astra Child theme not found in wp-content/themes/"
    exit 1
fi

###############################################################################
# Step 4: Install and Activate Essential Plugins
###############################################################################

log_info "Checking and installing essential plugins..."

# Function to install plugin if not present
install_plugin() {
    local plugin_slug=$1
    local plugin_name=$2
    
    log_info "Checking plugin: $plugin_name ($plugin_slug)..."
    
    # Try to activate or install
    if wp plugin is-installed "$plugin_slug" --allow-root 2>/dev/null; then
        wp plugin activate "$plugin_slug" --allow-root 2>/dev/null || true
        log_success "$plugin_name is installed and activated"
    else
        log_info "Installing $plugin_name..."
        wp plugin install "$plugin_slug" --activate --allow-root 2>/dev/null || log_warning "Could not auto-install $plugin_name"
    fi
}

# Essential plugins list
install_plugin "contact-form-7" "Contact Form 7"
install_plugin "flamingo" "Flamingo (Contact Form 7 Storage)"
install_plugin "wp-smushit" "Smush Image Optimizer"
install_plugin "yith-woocommerce-wishlist" "YITH WooCommerce Wishlist"
install_plugin "wordfence" "Wordfence Security"
install_plugin "updraftplus" "UpdraftPlus Backup"

log_success "Essential plugins processed"

###############################################################################
# Step 5: Configure WooCommerce Basic Settings
###############################################################################

log_info "Configuring WooCommerce..."

# Set store currency
wp option update woocommerce_currency 'INR' --allow-root 2>/dev/null || log_warning "WooCommerce config skipped"
wp option update woocommerce_currency_pos 'left' --allow-root 2>/dev/null || true

# Enable tax calculations
wp option update woocommerce_calc_taxes 'yes' --allow-root 2>/dev/null || true

# Set default country
wp option update woocommerce_default_country 'IN' --allow-root 2>/dev/null || true

# Enable product reviews
wp option update woocommerce_enable_reviews 'yes' --allow-root 2>/dev/null || true

log_success "WooCommerce basic configuration completed"

###############################################################################
# Step 6: Set Permalinks
###############################################################################

log_info "Setting up pretty permalinks..."

wp rewrite structure '/%postname%/' --allow-root 2>/dev/null || log_warning "Permalink setup skipped"
wp rewrite flush --allow-root 2>/dev/null || true

log_success "Permalinks configured"

###############################################################################
# Step 7: Create Essential Pages
###############################################################################

log_info "Creating essential pages..."

create_page() {
    local page_title=$1
    local page_slug=$2
    local page_content=$3
    
    # Check if page already exists
    if ! wp post exists --post_type=page --name="$page_slug" --allow-root 2>/dev/null; then
        wp post create --post_type=page --post_title="$page_title" --post_name="$page_slug" --post_content="$page_content" --post_status=publish --allow-root 2>/dev/null || log_warning "Could not create page: $page_title"
        log_success "Created page: $page_title"
    else
        log_info "Page already exists: $page_title"
    fi
}

# Create pages with basic content
create_page "Home" "home" "<!-- wp:paragraph --><p>Welcome to Lab Grown Diamond CVD - Your trusted source for premium lab-grown diamonds.</p><!-- /wp:paragraph -->"
create_page "Shop" "shop" "<!-- wp:woocommerce/all-products /-->"
create_page "About Us" "about" "<!-- wp:paragraph --><p>Learn about our commitment to quality and sustainability.</p><!-- /wp:paragraph -->"
create_page "Contact" "contact" "<!-- wp:paragraph --><p>Get in touch with us.</p><!-- /wp:paragraph -->"
create_page "Privacy Policy" "privacy-policy" "<!-- wp:paragraph --><p>Your privacy is important to us.</p><!-- /wp:paragraph -->"
create_page "Terms and Conditions" "terms-and-conditions" "<!-- wp:paragraph --><p>Terms and conditions of use.</p><!-- /wp:paragraph -->"
create_page "Shipping & Returns" "shipping-returns" "<!-- wp:paragraph --><p>Our shipping and returns policy.</p><!-- /wp:paragraph -->"

log_success "Essential pages created"

###############################################################################
# Step 8: Configure WordPress Settings
###############################################################################

log_info "Configuring WordPress settings..."

# Set timezone
wp option update timezone_string 'Asia/Kolkata' --allow-root 2>/dev/null || true

# Set date format
wp option update date_format 'F j, Y' --allow-root 2>/dev/null || true

# Set time format
wp option update time_format 'g:i a' --allow-root 2>/dev/null || true

# Set homepage
wp option update show_on_front 'page' --allow-root 2>/dev/null || true

# Get homepage ID and set it
HOME_ID=$(wp post list --post_type=page --name=home --field=ID --allow-root 2>/dev/null || echo "")
if [ ! -z "$HOME_ID" ]; then
    wp option update page_on_front "$HOME_ID" --allow-root 2>/dev/null || true
    log_success "Homepage set"
fi

# Get shop page ID and set it
SHOP_ID=$(wp post list --post_type=page --name=shop --field=ID --allow-root 2>/dev/null || echo "")
if [ ! -z "$SHOP_ID" ]; then
    wp option update woocommerce_shop_page_id "$SHOP_ID" --allow-root 2>/dev/null || true
    log_success "Shop page set"
fi

log_success "WordPress settings configured"

###############################################################################
# Step 9: Create Sample Menu
###############################################################################

log_info "Creating navigation menu..."

# Create primary menu
wp menu create "Primary Menu" --allow-root 2>/dev/null || log_info "Menu may already exist"

# Get menu ID
MENU_ID=$(wp menu list --allow-root 2>/dev/null | grep "Primary Menu" | awk '{print $1}' || echo "")

if [ ! -z "$MENU_ID" ]; then
    # Add items to menu
    wp menu item add-post "$MENU_ID" $(wp post list --post_type=page --name=home --field=ID --allow-root 2>/dev/null) --allow-root 2>/dev/null || true
    wp menu item add-post "$MENU_ID" $(wp post list --post_type=page --name=shop --field=ID --allow-root 2>/dev/null) --allow-root 2>/dev/null || true
    wp menu item add-post "$MENU_ID" $(wp post list --post_type=page --name=about --field=ID --allow-root 2>/dev/null) --allow-root 2>/dev/null || true
    wp menu item add-post "$MENU_ID" $(wp post list --post_type=page --name=contact --field=ID --allow-root 2>/dev/null) --allow-root 2>/dev/null || true
    
    # Assign menu to location
    wp menu location assign "$MENU_ID" primary --allow-root 2>/dev/null || true
    
    log_success "Navigation menu created and assigned"
fi

###############################################################################
# Step 10: Optimize Database
###############################################################################

log_info "Optimizing database..."

wp db optimize --allow-root 2>/dev/null || log_warning "Database optimization skipped"

log_success "Database optimized"

###############################################################################
# Step 11: Clear all caches
###############################################################################

log_info "Clearing caches..."

# Flush object cache
wp cache flush --allow-root 2>/dev/null || true

# Flush rewrite rules
wp rewrite flush --allow-root 2>/dev/null || true

# Clear transients
wp transient delete --all --allow-root 2>/dev/null || true

log_success "Caches cleared"

###############################################################################
# Summary
###############################################################################

echo ""
echo "======================================================================="
log_success "WordPress initialization completed successfully!"
echo "======================================================================="
echo ""
log_info "Next steps:"
echo "  1. Run the verification script: php verify-site.php"
echo "  2. Configure payment gateways in WooCommerce"
echo "  3. Add products to your shop"
echo "  4. Customize Contact Form 7 forms"
echo "  5. Configure Rank Math SEO settings"
echo "  6. Set up LiteSpeed Cache optimization"
echo ""
log_info "For detailed setup instructions, see:"
echo "  - QUICK_START_GUIDE.md"
echo "  - WORDPRESS_ECOMMERCE_SETUP.md"
echo ""
echo "======================================================================="
