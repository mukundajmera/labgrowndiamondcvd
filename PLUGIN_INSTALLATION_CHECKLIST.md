# Plugin Installation & Configuration Checklist
## Lab Grown Diamond CVD E-Commerce

**Date**: _____________  
**Completed By**: _____________

---

## Status Legend
- ✅ = Completed
- ⏳ = In Progress  
- ❌ = Not Started
- 🔄 = Needs Review

---

## Essential Plugins Installation

### 1. WooCommerce (E-Commerce Foundation)

- [ ] Plugin installed and activated
- [ ] Setup wizard completed
- [ ] Store details configured
- [ ] Currency set (INR/USD)
- [ ] Payment gateways configured
  - [ ] Razorpay (India)
  - [ ] Stripe (International)
  - [ ] PayPal (Optional)
- [ ] Shipping zones created
  - [ ] India zone
  - [ ] International zone
- [ ] Tax rates configured
- [ ] Email notifications tested
- [ ] Test product created
- [ ] Test order completed

**Status**: _____ | **Date Completed**: _________

---

### 2. Rank Math SEO (Search Engine Optimization)

- [ ] Plugin installed and activated
- [ ] Setup wizard completed
- [ ] Google Search Console connected
- [ ] Google Analytics connected (optional)
- [ ] Site information configured
  - [ ] Organization name
  - [ ] Logo uploaded
  - [ ] Social profiles added
- [ ] Schema markup enabled
  - [ ] Product schema
  - [ ] Organization schema
  - [ ] BreadcrumbList schema
- [ ] Sitemap generated
  - [ ] Sitemap accessible at /sitemap_index.xml
  - [ ] Products included in sitemap
- [ ] Titles & Meta configured
- [ ] 404 Monitor enabled
- [ ] Redirections enabled

**Status**: _____ | **Date Completed**: _________

---

### 3. LiteSpeed Cache (Performance & Caching)

- [ ] Plugin activated (pre-installed by Hostinger)
- [ ] Cache enabled
- [ ] Page caching configured
- [ ] Browser caching enabled
- [ ] Object cache enabled (if available)
- [ ] CSS minification enabled
- [ ] CSS combination enabled (tested)
- [ ] JS minification enabled
- [ ] JS deferred loading enabled
- [ ] Image lazy loading enabled
- [ ] WebP image support enabled (if available)
- [ ] Database optimization scheduled
- [ ] CDN configured (if using Hostinger CDN)
- [ ] Cache cleared and regenerated
- [ ] Performance tested
  - Desktop PageSpeed: _____ / 100
  - Mobile PageSpeed: _____ / 100

**Status**: _____ | **Date Completed**: _________

---

### 4. Contact Form 7 (Forms & Inquiries)

- [ ] Contact Form 7 plugin installed
- [ ] Contact Form 7 activated
- [ ] Main contact form created
- [ ] Form fields configured
  - [ ] Name (required)
  - [ ] Email (required)
  - [ ] Phone
  - [ ] Subject dropdown
  - [ ] Message textarea
- [ ] Mail settings configured
  - [ ] Admin notification email
  - [ ] Customer auto-reply email
- [ ] Form shortcode copied
- [ ] Contact page created
- [ ] Form embedded in page
- [ ] Test submission completed
- [ ] Email received successfully

**Additional Addons**:
- [ ] Flamingo installed (submission storage)
- [ ] Contact Form 7 Honeypot installed (spam protection)
- [ ] Form submissions visible in Flamingo

**Status**: _____ | **Date Completed**: _________

---

### 5. Smush Image Optimization

- [ ] Smush plugin installed
- [ ] Smush activated
- [ ] Auto-compress new uploads enabled
- [ ] Strip image metadata enabled
- [ ] Resize large images enabled
  - Max width: 1920px
  - Max height: 1920px
- [ ] WebP conversion enabled (if available)
- [ ] Lazy loading configured (or disabled if using LiteSpeed)
- [ ] Bulk Smush initiated
- [ ] Bulk optimization completed
  - Total images optimized: _____
  - Total savings: _____ MB

**Status**: _____ | **Date Completed**: _________

---

### 6. YITH WooCommerce Wishlist

- [ ] Plugin installed
- [ ] Plugin activated
- [ ] Wishlist page created/configured
- [ ] "Add to Wishlist" button position set
- [ ] Button text customized
- [ ] Icon style configured
- [ ] Button colors configured
  - Default color: #212121
  - Hover color: #2962FF
  - Added color: #0D47A1
- [ ] Wishlist functionality tested
- [ ] Button visible on product pages
- [ ] Wishlist page accessible

**Status**: _____ | **Date Completed**: _________

---

### 7. Wordfence Security

- [ ] Plugin installed
- [ ] Plugin activated
- [ ] Email configured for alerts
- [ ] Initial scan completed
- [ ] Firewall configured
  - [ ] Learning mode enabled (first week)
  - [ ] Extended protection enabled
- [ ] Login security configured
  - [ ] 2FA enabled for admin accounts
  - [ ] CAPTCHA enabled on login page
  - [ ] Failed login limit: 5 attempts
  - [ ] Lockout duration: 20 minutes
- [ ] Rate limiting configured
- [ ] Scan schedule set (daily)
- [ ] Security notifications configured
- [ ] Admin username changed from "admin"

**Status**: _____ | **Date Completed**: _________

---

## Backup & Security Plugins

### 8. UpdraftPlus Backup (Recommended)

- [ ] Plugin installed
- [ ] Plugin activated
- [ ] Backup schedule configured
  - [ ] Files backup: Weekly
  - [ ] Database backup: Daily
- [ ] Remote storage connected
  - [ ] Google Drive OR
  - [ ] Dropbox OR
  - [ ] Amazon S3
- [ ] Retention period set (4 weeks)
- [ ] Include in backup:
  - [ ] Plugins
  - [ ] Themes
  - [ ] Uploads
  - [ ] Database
  - [ ] Other WordPress directories
- [ ] Test backup completed
- [ ] Test restore verified

**Status**: _____ | **Date Completed**: _________

---

## Optional But Recommended Plugins

### 9. WP Mail SMTP (Email Delivery)

- [ ] Plugin installed
- [ ] Plugin activated
- [ ] SMTP service configured
  - [ ] Gmail OR
  - [ ] SendGrid OR
  - [ ] Mailgun
- [ ] From email set
- [ ] From name set
- [ ] Test email sent successfully

**Status**: _____ | **Date Completed**: _________

---

### 10. Mailchimp for WordPress (Email Marketing)

- [ ] Plugin installed
- [ ] Plugin activated
- [ ] Mailchimp account connected
- [ ] Default list selected
- [ ] Newsletter signup form created
- [ ] Form embedded in website
- [ ] Double opt-in configured
- [ ] Welcome email sequence created

**Status**: _____ | **Date Completed**: _________

---

### 11. Google Analytics for WordPress (MonsterInsights)

OR Google Site Kit (Already Installed)

- [ ] Plugin configured
- [ ] Google Analytics connected
- [ ] Tracking code verified
- [ ] E-commerce tracking enabled
- [ ] Events tracking configured
- [ ] Dashboard widget visible

**Status**: _____ | **Date Completed**: _________

---

### 12. Really Simple SSL (Force HTTPS)

- [ ] SSL certificate installed by hosting
- [ ] Plugin installed (if needed)
- [ ] Plugin activated
- [ ] HTTPS forced across site
- [ ] Mixed content warnings fixed
- [ ] All URLs updated to HTTPS
- [ ] HTTP to HTTPS redirects working

**Status**: _____ | **Date Completed**: _________

---

### 13. Advanced Custom Fields (ACF) ✅ Already Installed

- [x] Plugin active
- [ ] Diamond specification fields created (if not already)
- [ ] Field groups assigned to products
- [ ] Fields displaying on product pages

**Status**: _____ | **Date Completed**: _________

---

## Payment Gateway Plugins

### 14. Razorpay for WooCommerce (India Payments)

- [ ] Plugin installed
- [ ] Plugin activated
- [ ] Razorpay account created
- [ ] API keys generated
  - [ ] Test mode keys
  - [ ] Live mode keys
- [ ] Payment methods enabled
  - [ ] Credit/Debit cards
  - [ ] UPI
  - [ ] Net banking
  - [ ] Wallets
- [ ] Webhooks configured
- [ ] Test payment completed
- [ ] Switched to live mode

**Status**: _____ | **Date Completed**: _________

---

### 15. WooCommerce Stripe Gateway

- [ ] Plugin installed (may be bundled with WooCommerce)
- [ ] Plugin activated
- [ ] Stripe account created
- [ ] API keys configured
  - [ ] Test mode keys
  - [ ] Live mode keys
- [ ] Payment methods enabled
  - [ ] Credit/Debit cards
  - [ ] Apple Pay
  - [ ] Google Pay
- [ ] Webhooks configured
- [ ] Test payment completed
- [ ] Switched to live mode

**Status**: _____ | **Date Completed**: _________

---

## Plugin Updates & Maintenance

### Regular Maintenance Checklist

**Weekly Tasks**:
- [ ] Check for plugin updates
- [ ] Check for theme updates
- [ ] Review security scan results
- [ ] Check backup success
- [ ] Monitor 404 errors

**Monthly Tasks**:
- [ ] Update all plugins
- [ ] Update WordPress core
- [ ] Review and clean database
- [ ] Check website performance
- [ ] Security audit
- [ ] Review analytics data

**Quarterly Tasks**:
- [ ] Review and remove unused plugins
- [ ] Review and remove unused themes
- [ ] Full site audit
- [ ] Backup verification (test restore)
- [ ] Update documentation

---

## Plugin Compatibility Notes

### Known Issues & Conflicts

**Plugin Conflicts to Watch**:
- LiteSpeed Cache + Smush Lazy Load (disable one)
- Multiple security plugins (choose Wordfence OR another, not both)
- Multiple caching plugins (use only LiteSpeed Cache)

**Performance Impact**:
- Heavy plugins (check monthly):
  - [ ] Monitor database size
  - [ ] Monitor page load times
  - [ ] Monitor plugin load times

**Testing After Plugin Installation**:
- [ ] Test homepage
- [ ] Test shop page
- [ ] Test product pages
- [ ] Test checkout process
- [ ] Test contact forms
- [ ] Check for JavaScript errors
- [ ] Check mobile responsiveness

---

## Deactivated/Removed Plugins Log

| Plugin Name | Date Removed | Reason | Replaced By |
|-------------|--------------|--------|-------------|
| | | | |
| | | | |
| | | | |

---

## Plugin Performance Tracking

| Plugin Name | Load Time | Database Queries | Memory Usage | Last Checked |
|-------------|-----------|------------------|--------------|--------------|
| WooCommerce | | | | |
| Rank Math | | | | |
| LiteSpeed Cache | | | | |
| Wordfence | | | | |
| Contact Form 7 | | | | |

**Tools to measure**:
- Query Monitor plugin (temporary install for debugging)
- P3 Plugin Profiler
- New Relic (if available)

---

## Final Verification

### All Essential Plugins Active

- [ ] WooCommerce
- [ ] Rank Math SEO
- [ ] LiteSpeed Cache
- [ ] Contact Form 7
- [ ] Smush
- [ ] YITH Wishlist
- [ ] Wordfence Security
- [ ] UpdraftPlus Backup
- [ ] Payment Gateway(s)

### Configuration Complete

- [ ] All plugins configured according to documentation
- [ ] No plugin conflicts detected
- [ ] Performance within acceptable range
- [ ] Security measures in place
- [ ] Backups running automatically
- [ ] Email delivery working
- [ ] All forms functional

### Testing Complete

- [ ] Full site functionality tested
- [ ] Mobile responsiveness verified
- [ ] Payment processing tested
- [ ] Email notifications working
- [ ] Security scan passed
- [ ] Performance benchmarks met

---

## Sign-off

**Completed By**: _____________________________  
**Date**: _____________________________  
**Signature**: _____________________________

**Reviewed By**: _____________________________  
**Date**: _____________________________  
**Signature**: _____________________________

---

**Notes & Comments**:
________________________________________________________________
________________________________________________________________
________________________________________________________________
________________________________________________________________

---

**Last Updated**: December 27, 2025  
**Version**: 1.0.0
