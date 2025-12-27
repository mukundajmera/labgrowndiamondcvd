#!/bin/bash
###############################################################################
# Pre-Deployment Validation Script
# Verifies repository structure before deployment
###############################################################################

# Color codes
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m'

PASSED=0
FAILED=0
WARNINGS=0

log_success() {
    echo -e "${GREEN}✓${NC} $1"
    ((PASSED++))
}

log_error() {
    echo -e "${RED}✗${NC} $1"
    ((FAILED++))
}

log_warning() {
    echo -e "${YELLOW}⚠${NC} $1"
    ((WARNINGS++))
}

log_info() {
    echo -e "${BLUE}ℹ${NC} $1"
}

log_header() {
    echo ""
    echo -e "${BLUE}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
    echo -e "${BLUE}$1${NC}"
    echo -e "${BLUE}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
}

# Get script directory
SCRIPT_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
cd "$SCRIPT_DIR"

log_header "Pre-Deployment Validation - Lab Grown Diamond CVD"
log_info "Repository: $SCRIPT_DIR"

# Test 1: WordPress Core Files
log_header "1. WordPress Core Files"

if [ -f "wp-config.php" ]; then
    log_success "wp-config.php exists"
else
    log_error "wp-config.php missing"
fi

if [ -f "wp-load.php" ]; then
    log_success "wp-load.php exists"
else
    log_error "wp-load.php missing"
fi

if [ -f "index.php" ]; then
    log_success "index.php exists"
else
    log_error "index.php missing"
fi

if [ -d "wp-content" ]; then
    log_success "wp-content directory exists"
else
    log_error "wp-content directory missing"
fi

if [ -d "wp-admin" ]; then
    log_success "wp-admin directory exists"
else
    log_error "wp-admin directory missing"
fi

if [ -d "wp-includes" ]; then
    log_success "wp-includes directory exists"
else
    log_error "wp-includes directory missing"
fi

# Test 2: Theme Files
log_header "2. Theme Files"

THEME_DIR="wp-content/themes/astra-child"

if [ -d "$THEME_DIR" ]; then
    log_success "Astra Child theme directory exists"
else
    log_error "Astra Child theme directory missing"
    exit 1
fi

# Check critical theme files
THEME_FILES=(
    "$THEME_DIR/style.css"
    "$THEME_DIR/functions.php"
    "$THEME_DIR/header.php"
    "$THEME_DIR/footer.php"
)

for file in "${THEME_FILES[@]}"; do
    if [ -f "$file" ]; then
        log_success "$(basename $file) exists"
    else
        log_error "$(basename $file) missing"
    fi
done

# Test 3: Theme Assets
log_header "3. Theme Assets"

THEME_ASSETS=(
    "$THEME_DIR/assets/css/header.css"
    "$THEME_DIR/assets/css/footer.css"
    "$THEME_DIR/assets/css/custom.css"
    "$THEME_DIR/assets/css/homepage.css"
    "$THEME_DIR/assets/css/plp.css"
    "$THEME_DIR/assets/css/pdp.css"
    "$THEME_DIR/assets/css/mobile-enhancements.css"
    "$THEME_DIR/assets/js/header.js"
    "$THEME_DIR/assets/js/diamond-search.js"
    "$THEME_DIR/assets/js/jewelry-builder.js"
    "$THEME_DIR/assets/js/comparison.js"
    "$THEME_DIR/assets/js/mobile.js"
    "$THEME_DIR/assets/js/plp.js"
    "$THEME_DIR/assets/js/pdp.js"
)

for asset in "${THEME_ASSETS[@]}"; do
    if [ -f "$asset" ]; then
        log_success "$(basename $asset) exists"
    else
        log_error "$(basename $asset) missing"
    fi
done

# Test 4: Theme Includes
log_header "4. Theme PHP Includes"

THEME_INCLUDES=(
    "$THEME_DIR/inc/woocommerce-customizations.php"
    "$THEME_DIR/inc/woocommerce-product-customizations.php"
    "$THEME_DIR/inc/auto-setup.php"
    "$THEME_DIR/inc/b2b-portal.php"
    "$THEME_DIR/inc/diamond-filters.php"
    "$THEME_DIR/inc/custom-post-types.php"
    "$THEME_DIR/inc/ajax-handlers.php"
    "$THEME_DIR/includes/class-lgd-automator.php"
)

for include in "${THEME_INCLUDES[@]}"; do
    if [ -f "$include" ]; then
        log_success "$(basename $include) exists"
    else
        log_error "$(basename $include) missing"
    fi
done

# Test 5: PHP Syntax Check
log_header "5. PHP Syntax Validation"

PHP_FILES=(
    "$THEME_DIR/functions.php"
    "$THEME_DIR/inc/woocommerce-customizations.php"
    "$THEME_DIR/inc/auto-setup.php"
    "$THEME_DIR/includes/class-lgd-automator.php"
)

for php_file in "${PHP_FILES[@]}"; do
    if php -l "$php_file" > /dev/null 2>&1; then
        log_success "$(basename $php_file) syntax OK"
    else
        log_error "$(basename $php_file) has syntax errors"
    fi
done

# Test 6: Plugins Directory
log_header "6. Installed Plugins"

PLUGIN_DIR="wp-content/plugins"

if [ -d "$PLUGIN_DIR" ]; then
    log_success "Plugins directory exists"
    
    # Count plugins
    PLUGIN_COUNT=$(find "$PLUGIN_DIR" -maxdepth 1 -type d | wc -l)
    log_info "Found $((PLUGIN_COUNT - 1)) plugin directories"
    
    # Check for essential plugins
    ESSENTIAL_PLUGINS=(
        "woocommerce"
        "litespeed-cache"
        "seo-by-rank-math"
        "advanced-custom-fields"
    )
    
    for plugin in "${ESSENTIAL_PLUGINS[@]}"; do
        if [ -d "$PLUGIN_DIR/$plugin" ]; then
            log_success "Plugin exists: $plugin"
        else
            log_warning "Plugin missing: $plugin (will be installed)"
        fi
    done
else
    log_error "Plugins directory missing"
fi

# Test 7: Deployment Scripts
log_header "7. Deployment Scripts"

if [ -f "wp-init.sh" ]; then
    log_success "wp-init.sh exists"
    
    if [ -x "wp-init.sh" ]; then
        log_success "wp-init.sh is executable"
    else
        log_warning "wp-init.sh is not executable (run: chmod +x wp-init.sh)"
    fi
else
    log_error "wp-init.sh missing"
fi

if [ -f "verify-site.php" ]; then
    log_success "verify-site.php exists"
else
    log_error "verify-site.php missing"
fi

# Test 8: Documentation
log_header "8. Documentation Files"

DOCS=(
    "README_SETUP.md"
    "DEPLOYMENT_GUIDE.md"
    "SCRIPTS_README.md"
    "QUICK_START_GUIDE.md"
    "WORDPRESS_ECOMMERCE_SETUP.md"
    "PLUGIN_INSTALLATION_CHECKLIST.md"
    "PRODUCT_SETUP_TEMPLATE.md"
    "CONTACT_FORM_TEMPLATES.md"
)

for doc in "${DOCS[@]}"; do
    if [ -f "$doc" ]; then
        log_success "$doc exists"
    else
        log_warning "$doc missing"
    fi
done

# Test 9: File Permissions
log_header "9. File Permissions"

# Check if wp-content is writable
if [ -w "wp-content" ]; then
    log_success "wp-content is writable"
else
    log_error "wp-content is not writable"
fi

# Check if uploads directory exists
if [ -d "wp-content/uploads" ]; then
    if [ -w "wp-content/uploads" ]; then
        log_success "wp-content/uploads is writable"
    else
        log_error "wp-content/uploads is not writable"
    fi
else
    log_warning "wp-content/uploads does not exist (will be created)"
fi

# Test 10: .gitignore
log_header "10. Version Control"

if [ -f ".gitignore" ]; then
    log_success ".gitignore exists"
    
    # Check if uploads is ignored
    if grep -q "uploads" .gitignore; then
        log_success "uploads directory is gitignored"
    else
        log_warning "uploads directory not in .gitignore"
    fi
else
    log_warning ".gitignore missing"
fi

# Summary
log_header "VALIDATION SUMMARY"

TOTAL=$((PASSED + FAILED + WARNINGS))
PASS_RATE=0
if [ $TOTAL -gt 0 ]; then
    PASS_RATE=$(( (PASSED * 100) / TOTAL ))
fi

echo ""
echo -e "${GREEN}✓${NC} Passed: $PASSED"
echo -e "${RED}✗${NC} Failed: $FAILED"
echo -e "${YELLOW}⚠${NC} Warnings: $WARNINGS"
log_info "Total Checks: $TOTAL"
log_info "Pass Rate: $PASS_RATE%"
echo ""

if [ $FAILED -gt 0 ]; then
    echo -e "${RED}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
    echo -e "${RED}VALIDATION FAILED${NC}"
    echo -e "${RED}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
    echo ""
    log_error "$FAILED critical issues found. Please fix before deployment."
    echo ""
    exit 1
else
    echo -e "${GREEN}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
    echo -e "${GREEN}VALIDATION PASSED${NC}"
    echo -e "${GREEN}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
    echo ""
    log_success "All critical checks passed! Repository is ready for deployment."
    echo ""
    
    if [ $WARNINGS -gt 0 ]; then
        log_warning "$WARNINGS warnings found. Review recommended but not blocking."
        echo ""
    fi
    
    log_info "Next steps:"
    echo "  1. Deploy to your hosting server"
    echo "  2. Run: bash wp-init.sh"
    echo "  3. Run: php verify-site.php"
    echo "  4. See DEPLOYMENT_GUIDE.md for complete instructions"
    echo ""
    exit 0
fi
