# Deployment & Configuration Guide
## Lab Grown Diamond CVD - WordPress Site

**Version:** 1.0.0  
**Last Updated:** December 27, 2025  
**Purpose:** Complete deployment and configuration instructions for setting up the website

---

## 🚀 Quick Deployment (5 Minutes)

If you have access to SSH and WP-CLI on your hosting:

```bash
# 1. Navigate to your WordPress installation directory
cd /path/to/wordpress

# 2. Make the initialization script executable
chmod +x wp-init.sh

# 3. Run the initialization script
bash wp-init.sh

# 4. Verify the installation
php verify-site.php
```

That's it! Your WordPress site should now be configured and ready to use.

---

## 📋 Detailed Deployment Steps

### Prerequisites

Before starting, ensure you have:

- ✅ WordPress installed (version 5.8 or higher)
- ✅ Database configured and accessible
- ✅ SSH access to your hosting (for script execution)
- ✅ PHP 7.4 or higher
- ✅ MySQL 5.7 or higher / MariaDB 10.3 or higher

### Step 1: Upload Files to Server

Upload the entire repository to your hosting server. You can use:

- **FTP/SFTP** clients (FileZilla, Cyberduck)
- **Git clone** (if hosting supports it)
- **Hosting file manager** (cPanel, Plesk, etc.)

```bash
# If using Git (recommended)
cd /path/to/public_html
git clone https://github.com/mukundajmera/labgrowndiamondcvd.git .

# Or pull latest changes
git pull origin main
```

### Step 2: Configure Database

Ensure your `wp-config.php` has correct database credentials:

```php
define('DB_NAME', 'your_database_name');
define('DB_USER', 'your_database_user');
define('DB_PASSWORD', 'your_database_password');
define('DB_HOST', 'localhost'); // or your DB host
```

### Step 3: Run Initialization Script

#### Option A: Via SSH (Recommended)

```bash
# Navigate to WordPress root
cd /path/to/wordpress

# Make script executable
chmod +x wp-init.sh

# Run initialization
bash wp-init.sh

# The script will:
# - Verify WordPress installation
# - Activate Astra Child theme
# - Install essential plugins
# - Configure WooCommerce
# - Create essential pages
# - Set up menus
# - Optimize database
# - Clear caches
```

#### Option B: Via Hosting Control Panel

If you don't have SSH access:

1. Log in to WordPress admin: `https://yourdomain.com/wp-admin`
2. Navigate to **Appearance > Themes**
3. Activate **Astra Child - Lab Grown Diamond CVD**
4. Follow manual setup steps in `QUICK_START_GUIDE.md`

### Step 4: Verify Installation

Run the verification script to check everything is working:

```bash
# Via CLI
php verify-site.php

# Or via browser
# Navigate to: https://yourdomain.com/verify-site.php
```

The script will check:
- WordPress core installation
- Database connectivity
- Theme activation
- Plugin status
- Essential pages
- File permissions
- PHP configuration

### Step 5: Complete WordPress Admin Setup

Log in to WordPress admin and complete these configurations:

#### A. WooCommerce Setup

```
Dashboard → WooCommerce → Settings

General Tab:
  ✓ Store Address
  ✓ Currency: INR or USD
  ✓ Save Changes

Payments Tab:
  ✓ Enable payment methods
  ✓ Configure Razorpay (India) or Stripe
  ✓ Save Changes

Shipping Tab:
  ✓ Add shipping zones
  ✓ Configure shipping rates
  ✓ Save Changes

Products Tab:
  ✓ Set shop page
  ✓ Configure inventory
  ✓ Save Changes
```

#### B. Contact Form 7

```
Dashboard → Contact → Add New

1. Create "Main Contact Form"
2. Add form fields (see CONTACT_FORM_TEMPLATES.md)
3. Configure mail settings
4. Save and copy shortcode
5. Add shortcode to Contact page
```

#### C. Rank Math SEO

```
Dashboard → Rank Math → Setup Wizard

Follow wizard steps:
  ✓ Import settings (if migrating)
  ✓ Connect Google Search Console
  ✓ Configure sitemap
  ✓ Set up schema
  ✓ Complete setup
```

#### D. LiteSpeed Cache

```
Dashboard → LiteSpeed Cache → Settings

Cache Tab:
  ✓ Enable Cache
  
CSS Settings:
  ✓ Minify CSS
  ✓ Combine CSS
  
JS Settings:
  ✓ Minify JS
  
Media Settings:
  ✓ Lazy Load Images
  ✓ WebP Optimization
  
Save Changes → Purge All
```

---

## 🔧 Manual Configuration (If Scripts Can't Run)

If you cannot run the initialization scripts, follow these manual steps:

### 1. Activate Theme

```
Dashboard → Appearance → Themes → Activate "Astra Child - Lab Grown Diamond CVD"
```

### 2. Install Plugins Manually

```
Dashboard → Plugins → Add New

Search and install:
  - Contact Form 7
  - Flamingo
  - Smush
  - YITH WooCommerce Wishlist
  - Wordfence Security
  - UpdraftPlus

Click "Install Now" then "Activate" for each
```

### 3. Create Pages

```
Dashboard → Pages → Add New

Create these pages:
  - Home (set as homepage)
  - Shop (set as WooCommerce shop page)
  - About Us
  - Contact
  - Privacy Policy
  - Terms and Conditions
  - Shipping & Returns
```

### 4. Set Homepage

```
Dashboard → Settings → Reading

"Your homepage displays":
  ✓ Select "A static page"
  ✓ Homepage: Home
  ✓ Posts page: Blog (or leave blank)
  ✓ Save Changes
```

### 5. Set Permalinks

```
Dashboard → Settings → Permalinks

✓ Select "Post name"
✓ Save Changes
```

### 6. Create Menu

```
Dashboard → Appearance → Menus

1. Create new menu: "Primary Menu"
2. Add pages: Home, Shop, About, Contact
3. Assign to "Primary Menu" location
4. Save Menu
```

---

## 🔍 Troubleshooting

### Issue: "wp-init.sh: Permission denied"

**Solution:**
```bash
chmod +x wp-init.sh
bash wp-init.sh
```

### Issue: "WP-CLI not found"

**Solution:**
The script will automatically download WP-CLI. If it fails:

```bash
# Download WP-CLI manually
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
chmod +x wp-cli.phar
php wp-cli.phar --info
```

### Issue: "Database connection failed"

**Solution:**
1. Check `wp-config.php` database credentials
2. Verify database exists
3. Check database user permissions
4. Test connection: `php verify-site.php`

### Issue: "Theme not activating"

**Solution:**
1. Verify Astra parent theme is installed
2. Check file permissions: `chmod -R 755 wp-content/themes/`
3. Look for PHP errors: Enable WP_DEBUG in wp-config.php

### Issue: "Plugins not installing"

**Solution:**
1. Check internet connectivity
2. Verify wp-content/plugins/ is writable
3. Install manually via WordPress admin
4. Check for PHP errors in error_log

### Issue: "White screen / 500 error"

**Solution:**
1. Enable WordPress debugging:
   ```php
   define('WP_DEBUG', true);
   define('WP_DEBUG_LOG', true);
   define('WP_DEBUG_DISPLAY', false);
   ```
2. Check wp-content/debug.log for errors
3. Verify PHP version >= 7.4
4. Check file permissions
5. Increase PHP memory limit in wp-config.php:
   ```php
   define('WP_MEMORY_LIMIT', '256M');
   ```

---

## 🔒 Security Checklist

After deployment, secure your site:

- [ ] Change default admin username (not "admin")
- [ ] Use strong passwords (16+ characters)
- [ ] Enable 2FA (Wordfence)
- [ ] Set up automatic backups (UpdraftPlus)
- [ ] Install SSL certificate (HTTPS)
- [ ] Configure Wordfence firewall
- [ ] Limit login attempts
- [ ] Keep WordPress, themes, and plugins updated
- [ ] Delete unused themes and plugins
- [ ] Set proper file permissions (755 for directories, 644 for files)

---

## ⚡ Performance Optimization

After deployment, optimize performance:

- [ ] Enable LiteSpeed Cache
- [ ] Optimize images with Smush
- [ ] Enable lazy loading
- [ ] Minify CSS/JS
- [ ] Enable Gzip compression
- [ ] Use CDN (optional)
- [ ] Optimize database
- [ ] Limit post revisions
- [ ] Remove unused plugins

---

## 📊 Post-Deployment Verification

After completing deployment, verify these items:

1. **Homepage loads correctly**
   - Visit: `https://yourdomain.com`
   - Check: Theme styling applied, no 404s

2. **Shop page works**
   - Visit: `https://yourdomain.com/shop`
   - Check: WooCommerce layout visible

3. **Contact form works**
   - Test sending a message
   - Check: Email received

4. **Images load**
   - Upload test image
   - Check: Image displays correctly

5. **Menu displays**
   - Check: Navigation menu visible
   - Test: All links work

6. **Mobile responsive**
   - Test: View on mobile device
   - Check: Layout adapts properly

7. **Performance**
   - Test: https://pagespeed.web.dev/
   - Target: 70+ score

---

## 📞 Getting Help

### Documentation Resources

- **Quick Start:** `QUICK_START_GUIDE.md` - 30-minute setup
- **Full Setup:** `WORDPRESS_ECOMMERCE_SETUP.md` - Complete guide
- **Plugin Checklist:** `PLUGIN_INSTALLATION_CHECKLIST.md` - Track progress
- **Product Setup:** `PRODUCT_SETUP_TEMPLATE.md` - Add products
- **Contact Forms:** `CONTACT_FORM_TEMPLATES.md` - Form templates

### Support Channels

- **WordPress.org Forums:** https://wordpress.org/support/
- **WooCommerce Support:** https://woocommerce.com/document/
- **Hostinger Support:** Via hosting control panel
- **GitHub Issues:** https://github.com/mukundajmera/labgrowndiamondcvd/issues

### Useful Tools

- **Site Health:** WordPress Admin → Tools → Site Health
- **Verification Script:** `php verify-site.php`
- **PageSpeed Insights:** https://pagespeed.web.dev/
- **GTmetrix:** https://gtmetrix.com/

---

## 🎯 What's Next?

After successful deployment:

1. **Add Products** (See `PRODUCT_SETUP_TEMPLATE.md`)
   - Create product categories
   - Add product attributes
   - Upload 10-20 sample products

2. **Configure Payment Gateways**
   - Set up Razorpay (India)
   - Set up Stripe (International)
   - Test checkout process

3. **Customize Contact Forms** (See `CONTACT_FORM_TEMPLATES.md`)
   - Main contact form
   - Newsletter signup
   - Product inquiry form

4. **SEO Setup**
   - Complete Rank Math wizard
   - Submit sitemap to Google
   - Configure schema markup

5. **Performance Optimization**
   - Configure LiteSpeed Cache
   - Optimize images
   - Run performance tests

6. **Content Creation**
   - Write About Us page
   - Create blog posts
   - Add FAQs

7. **Marketing Setup**
   - Connect Google Analytics
   - Set up email marketing
   - Social media integration

---

## 📝 Maintenance Schedule

After deployment, maintain your site regularly:

**Daily:**
- Check Wordfence security alerts
- Monitor order notifications

**Weekly:**
- Review backup status
- Check for plugin/theme updates
- Review analytics

**Monthly:**
- Run full security scan
- Optimize database
- Check site speed
- Update content

**Quarterly:**
- Full backup verification
- Security audit
- Performance review
- Update documentation

---

## ✅ Deployment Checklist

Use this checklist to track your deployment:

- [ ] Files uploaded to server
- [ ] Database configured
- [ ] wp-config.php updated
- [ ] wp-init.sh executed successfully
- [ ] verify-site.php shows all green
- [ ] Astra Child theme activated
- [ ] Essential plugins installed
- [ ] WooCommerce configured
- [ ] Payment gateways set up
- [ ] Contact forms created
- [ ] Essential pages created
- [ ] Menus configured
- [ ] Permalinks set to "Post name"
- [ ] SSL certificate active (HTTPS)
- [ ] Security configured (Wordfence)
- [ ] Backups configured (UpdraftPlus)
- [ ] Performance optimized (LiteSpeed)
- [ ] SEO configured (Rank Math)
- [ ] Site verified with verify-site.php
- [ ] Mobile responsiveness tested
- [ ] Test order completed
- [ ] Contact form tested
- [ ] All documentation reviewed

---

## 🎉 Success!

If you've completed all steps, congratulations! Your Lab Grown Diamond CVD e-commerce website is now deployed and configured.

**Important URLs:**
- **Website:** https://labgrowndiamondcvd.com
- **Admin Panel:** https://labgrowndiamondcvd.com/wp-admin
- **Shop:** https://labgrowndiamondcvd.com/shop
- **Verification:** https://labgrowndiamondcvd.com/verify-site.php

**Next Steps:** See "What's Next?" section above.

**Questions?** Refer to the documentation guides or visit the support channels listed above.

---

**Last Updated:** December 27, 2025  
**Version:** 1.0.0  
**For:** Lab Grown Diamond CVD E-Commerce Platform
