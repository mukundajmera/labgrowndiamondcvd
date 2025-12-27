# WordPress Initialization & Verification Scripts
## Quick Reference Guide

This directory contains automated scripts to initialize and verify your WordPress installation.

---

## 📁 Files

- **wp-init.sh** - Automated WordPress initialization script
- **verify-site.php** - Site health check and verification script
- **DEPLOYMENT_GUIDE.md** - Complete deployment instructions

---

## 🚀 Quick Start

### 1. Initialize WordPress (First Time Setup)

```bash
# Make script executable (if not already)
chmod +x wp-init.sh

# Run initialization
bash wp-init.sh
```

This will:
- ✅ Verify WordPress installation
- ✅ Activate Astra Child theme
- ✅ Install essential plugins (Contact Form 7, Flamingo, Smush, YITH Wishlist, Wordfence, UpdraftPlus)
- ✅ Configure WooCommerce basics
- ✅ Create essential pages (Home, Shop, About, Contact, etc.)
- ✅ Set up navigation menu
- ✅ Configure permalinks
- ✅ Optimize database
- ✅ Clear all caches

**Time:** ~2-5 minutes  
**Requirements:** WP-CLI (auto-downloads if missing)

---

### 2. Verify Installation

After initialization, verify everything is working:

```bash
# Via command line
php verify-site.php

# OR via browser
# Navigate to: https://yourdomain.com/verify-site.php
```

This checks:
- ✅ WordPress core
- ✅ Database connection
- ✅ Theme activation
- ✅ Plugin status
- ✅ Essential pages
- ✅ WooCommerce configuration
- ✅ File permissions
- ✅ PHP configuration
- ✅ Asset files

**Output:** Detailed report with pass/fail status

---

## 📋 What Gets Configured

### Theme
- **Activates:** Astra Child - Lab Grown Diamond CVD
- **Ensures:** All theme assets are in place
- **Registers:** Navigation menus and widget areas

### Plugins Installed & Activated
1. **Contact Form 7** - Contact form functionality
2. **Flamingo** - Contact form submission storage
3. **Smush** - Image optimization
4. **YITH WooCommerce Wishlist** - Wishlist functionality
5. **Wordfence Security** - Security scanning and firewall
6. **UpdraftPlus** - Backup solution

### Pages Created
- Home (set as homepage)
- Shop (set as WooCommerce shop page)
- About Us
- Contact
- Privacy Policy
- Terms and Conditions
- Shipping & Returns

### WordPress Settings
- **Timezone:** Asia/Kolkata (configurable)
- **Permalinks:** Post name structure
- **Homepage:** Static page (Home)
- **Currency:** INR (Indian Rupee)

### Menus
- **Primary Menu** created with: Home, Shop, About, Contact
- **Menu Location:** Assigned to primary navigation

---

## 🔧 Customization

### Change Currency

Edit `wp-init.sh` line ~153:

```bash
# Change from INR to USD
wp option update woocommerce_currency 'USD' --allow-root
```

### Change Timezone

Edit `wp-init.sh` line ~189:

```bash
# Change to your timezone
wp option update timezone_string 'America/New_York' --allow-root
```

### Skip Plugin Installation

Comment out specific plugins in `wp-init.sh` (lines ~129-136):

```bash
# install_plugin "wordfence" "Wordfence Security"  # Commented out
```

---

## 🐛 Troubleshooting

### "wp: command not found"

The script auto-downloads WP-CLI. If it fails:

```bash
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
chmod +x wp-cli.phar
php wp-cli.phar --info
```

### "Permission denied" when running wp-init.sh

```bash
chmod +x wp-init.sh
bash wp-init.sh
```

### "Database connection failed"

Check your `wp-config.php` database credentials:
- DB_NAME
- DB_USER
- DB_PASSWORD
- DB_HOST

### Script hangs or times out

Some operations require WordPress to be accessible. Ensure:
1. Database is running and accessible
2. Web server is running (Apache/Nginx)
3. PHP is properly configured

### Verification shows failures

Run the initialization script again:

```bash
bash wp-init.sh
```

Then verify:

```bash
php verify-site.php
```

---

## 📊 Verification Output Explained

### ✓ Green (Passed)
Everything is working correctly. No action needed.

### ✗ Red (Failed)
Critical issue that needs immediate attention. Examples:
- Missing required plugin
- Database connection failed
- Theme not activated

**Action:** Review the error and fix the issue, then re-run verification.

### ⚠ Yellow (Warning)
Non-critical issue but recommended to fix. Examples:
- Optional plugin not installed
- Page missing
- Permalink structure not optimal

**Action:** Consider addressing for optimal functionality.

---

## 🔄 Re-running Scripts

### Safe to Re-run?

**Yes!** Both scripts are safe to run multiple times:

- **wp-init.sh:** Checks if items exist before creating them
- **verify-site.php:** Read-only, doesn't modify anything

### When to Re-run

Re-run `wp-init.sh` when:
- After fresh WordPress installation
- After restoring from backup
- When plugins get deactivated
- After major configuration changes

Re-run `verify-site.php`:
- After any configuration change
- Before deploying to production
- When troubleshooting issues
- As part of maintenance routine

---

## 🚦 What to Do After Scripts Run

### 1. Review Verification Report
```bash
php verify-site.php
```

Look for any RED (✗) items and fix them.

### 2. Complete Manual Configuration

Some settings require manual configuration:

**WooCommerce:**
```
Dashboard → WooCommerce → Settings
- Configure payment gateways (Razorpay, Stripe)
- Set up shipping zones and rates
- Configure tax settings
```

**Contact Forms:**
```
Dashboard → Contact → Contact Forms
- Customize form fields
- Configure email recipients
- Set up auto-responders
```

**Rank Math SEO:**
```
Dashboard → Rank Math → Setup Wizard
- Connect Google Search Console
- Configure sitemap
- Set up schema markup
```

**LiteSpeed Cache:**
```
Dashboard → LiteSpeed Cache → Settings
- Fine-tune cache settings
- Configure CDN (if using)
- Set up image optimization
```

### 3. Add Content

- Create products (see `PRODUCT_SETUP_TEMPLATE.md`)
- Write blog posts
- Customize pages
- Upload images

### 4. Test Everything

- Place test order
- Submit contact form
- Test mobile responsiveness
- Check page load speed

---

## 📖 Additional Documentation

- **DEPLOYMENT_GUIDE.md** - Complete deployment instructions
- **QUICK_START_GUIDE.md** - 30-minute quick setup
- **WORDPRESS_ECOMMERCE_SETUP.md** - Comprehensive setup guide
- **PLUGIN_INSTALLATION_CHECKLIST.md** - Plugin tracking
- **PRODUCT_SETUP_TEMPLATE.md** - Product creation guide
- **CONTACT_FORM_TEMPLATES.md** - Contact form examples

---

## 💡 Tips

1. **Always verify after initialization:**
   ```bash
   bash wp-init.sh && php verify-site.php
   ```

2. **Save verification reports:**
   ```bash
   php verify-site.php > verification-report-$(date +%Y%m%d).txt
   ```

3. **Check before deploying:**
   ```bash
   php verify-site.php
   # Ensure pass rate is 80%+
   ```

4. **Use in staging first:**
   Test scripts in staging environment before production

5. **Keep scripts updated:**
   Pull latest changes from repository regularly

---

## 🎯 Success Criteria

After running scripts successfully, you should have:

- ✅ WordPress responding on your domain
- ✅ Astra Child theme active and styled
- ✅ All essential plugins installed and active
- ✅ WooCommerce shop page accessible
- ✅ Contact form ready to configure
- ✅ Navigation menu working
- ✅ Essential pages created
- ✅ No critical errors in verification

**Pass Rate Target:** 80%+ on verify-site.php

---

## 📞 Support

If you encounter issues:

1. **Check Documentation:**
   - DEPLOYMENT_GUIDE.md
   - WORDPRESS_ECOMMERCE_SETUP.md

2. **Run Verification:**
   ```bash
   php verify-site.php
   ```

3. **Enable Debug Mode:**
   Add to `wp-config.php`:
   ```php
   define('WP_DEBUG', true);
   define('WP_DEBUG_LOG', true);
   ```

4. **Check Logs:**
   - `wp-content/debug.log`
   - Server error logs

5. **Get Help:**
   - WordPress Forums: https://wordpress.org/support/
   - GitHub Issues: Create issue with verification output

---

## 📝 Version History

- **1.0.0** (2025-12-27)
  - Initial release
  - WP-CLI based initialization
  - Comprehensive verification script
  - Auto-plugin installation
  - Page creation automation

---

**Last Updated:** December 27, 2025  
**Version:** 1.0.0  
**Maintained by:** Lab Grown Diamond CVD Team
