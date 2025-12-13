# Deployment Checklist
## Lab Grown Diamond CVD - Phase 1 Production Deployment

### ✅ Pre-Deployment Verification

Before deploying to production, verify the following:

#### 1. Theme Files
- [ ] All 20+ files are present in theme directory
- [ ] No temporary or test files included
- [ ] Assets directory contains required subdirectories (css, js, images)
- [ ] functions.php has no syntax errors
- [ ] All templates follow WordPress coding standards

#### 2. WordPress Setup
- [ ] WordPress 5.8+ installed
- [ ] PHP 7.4+ running
- [ ] MySQL 5.6+ or MariaDB 10.1+
- [ ] Memory limit: 256MB minimum
- [ ] Max execution time: 300 seconds minimum

#### 3. Required Plugins
- [ ] **Astra Theme** (parent theme) activated
- [ ] **WooCommerce 6.0+** installed and activated
- [ ] WooCommerce setup wizard completed
- [ ] Test product created successfully

#### 4. Theme Activation
- [ ] Astra parent theme activated first
- [ ] "Astra Child - Lab Grown Diamond CVD" activated
- [ ] No PHP errors or warnings after activation
- [ ] Homepage displays correctly
- [ ] Shop page displays correctly

---

### ⚙️ Configuration Steps

#### Step 1: WordPress Settings (5 mins)

**Settings > General**
- Site Title: Lab Grown Diamond CVD
- Tagline: (Your tagline)
- WordPress Address (URL): https://labgrowndiamondcvd.com
- Site Address (URL): https://labgrowndiamondcvd.com

**Settings > Reading**
- [ ] Homepage displays: A static page
- [ ] Homepage: (Select your homepage)
- [ ] Posts page: (Select blog page if needed)

**Settings > Permalinks**
- [ ] Set to: Post name
- [ ] Product permalinks: /shop/%product%/
- [ ] Product category: /product-category/

#### Step 2: Menu Configuration (10 mins)

**Appearance > Menus**

Create and configure these menus:

**1. Primary Menu** (Theme Location: Primary Menu)
- Loose Diamonds → /shop/
- Engagement Rings → /engagement-rings/
- Jewellery → /jewellery/
- Design Your Ring → /design-your-ring/
- Education → /education/
- About → /about/
- Trade / For Jewellers → /trade-program/
- Support → /support/

**2. Mobile Menu** (Theme Location: Mobile Menu)
- [ ] Same as Primary Menu or simplified version

**3-6. Footer Menus** (Theme Locations: Footer Menu 1-4)

**Footer Menu 1 - About**
- Our Story → /about/
- Why CVD Diamonds → /why-cvd/
- Sustainability → /sustainability/
- Certifications → /certifications/

**Footer Menu 2 - Education**
- The 4Cs → /education/diamond-4cs/
- CVD vs HPHT → /education/cvd-vs-hpht/
- Diamond Shapes → /education/diamond-shapes/
- Reading Certificates → /education/certifications/
- Ring Size Guide → /education/ring-size-guide/

**Footer Menu 3 - Customer Service**
- Contact Us → /contact/
- Shipping Policy → /shipping-policy/
- Returns & Exchanges → /returns-exchanges/
- Warranty → /warranty/
- Buyback & Upgrade → /buyback-upgrade/
- International Shipping → /international-shipping/

**Footer Menu 4 - B2B Portal**
- Join Trade Program → /trade-program/
- Trade Login → /trade-login/
- Bulk Inventory → /bulk-inventory/
- API Access → /api-access/

#### Step 3: Customizer Settings (10 mins)

**Appearance > Customize > Diamond Theme Settings**

```
Header Settings:
- Header Announcement Bar Text: "Free Shipping on Orders Above ₹50,000 | IGI/GIA Certified"

Contact Information:
- Contact Email: info@labgrowndiamondcvd.com
- Contact Phone: +91 XXXXX XXXXX
- WhatsApp Number: 91XXXXXXXXXX (format: country code + number, no + or spaces)

Social Media:
- Facebook URL: https://facebook.com/yourpage
- Instagram URL: https://instagram.com/yourpage
- YouTube URL: https://youtube.com/yourchannel

Social Proof Stats:
- Customer Reviews Count: 500+
- Diamonds Sold Count: 5,000+
- Jewellers Served Count: 200+

Other:
- Engraving Free Characters: 20
```

**Save & Publish**

#### Step 4: Upload Required Images (15 mins)

Upload these images to the theme directory:

**Hero Section:**
- `/wp-content/themes/astra-child/assets/images/hero/hero-bg.png`
  - Recommended size: 1920x1080px
  - Format: JPG or PNG
  - Max file size: 500KB (optimized)

**Category Images:**
- `/wp-content/themes/astra-child/assets/images/categories/loose-diamonds.png`
- `/wp-content/themes/astra-child/assets/images/categories/engagement-rings.png`
- `/wp-content/themes/astra-child/assets/images/categories/jewelry.png`
- `/wp-content/themes/astra-child/assets/images/categories/custom-design.png`
  - Recommended size: 800x600px each
  - Format: JPG or PNG
  - Max file size: 200KB each

**Diamond Shape Icons (Optional but recommended):**
- `/wp-content/themes/astra-child/assets/images/diamonds/round.png`
- `/wp-content/themes/astra-child/assets/images/diamonds/princess.png`
- `/wp-content/themes/astra-child/assets/images/diamonds/cushion.png`
- `/wp-content/themes/astra-child/assets/images/diamonds/oval.png`
- `/wp-content/themes/astra-child/assets/images/diamonds/emerald.png`
- `/wp-content/themes/astra-child/assets/images/diamonds/pear.png`
  - Recommended size: 200x200px each
  - Format: PNG with transparency
  - Max file size: 50KB each

#### Step 5: Create Required Pages (20 mins)

Create these pages via **Pages > Add New**:

**Main Pages:**
- [ ] About Us (slug: /about/)
- [ ] Contact (slug: /contact/)
- [ ] Support (slug: /support/)
- [ ] Education (slug: /education/) - Hub page
- [ ] Trade Program (slug: /trade-program/)
- [ ] Design Your Ring (slug: /design-your-ring/) - Placeholder for Phase 2

**Education Pages (Under /education/):**
- [ ] The 4Cs (slug: /education/diamond-4cs/)
- [ ] CVD vs HPHT (slug: /education/cvd-vs-hpht/)
- [ ] Diamond Shapes (slug: /education/diamond-shapes/)
- [ ] Reading Certificates (slug: /education/certifications/)
- [ ] Ring Size Guide (slug: /education/ring-size-guide/)

**Policy Pages:**
- [ ] Shipping Policy (slug: /shipping-policy/)
- [ ] Returns & Exchanges (slug: /returns-exchanges/)
- [ ] Warranty (slug: /warranty/)
- [ ] Buyback & Lifetime Upgrade (slug: /buyback-upgrade/)
- [ ] International Shipping (slug: /international-shipping/)
- [ ] Privacy Policy (slug: /privacy-policy/)
- [ ] Terms & Conditions (slug: /terms-conditions/)
- [ ] Cookie Policy (slug: /cookie-policy/)

**B2B Pages (Optional for Phase 1):**
- [ ] Trade Login (slug: /trade-login/)
- [ ] Bulk Inventory (slug: /bulk-inventory/)
- [ ] API Access (slug: /api-access/)

#### Step 6: WooCommerce Configuration (15 mins)

**WooCommerce > Settings > General**
- [ ] Store Address: (Your address)
- [ ] Currency: INR (₹)
- [ ] Currency Position: Left

**WooCommerce > Settings > Products**
- [ ] Shop page: (Select shop page)
- [ ] Add to cart behavior: Redirect to cart (optional)
- [ ] Enable reviews: Yes

**WooCommerce > Settings > Shipping**
- [ ] Add shipping zone: India
- [ ] Add shipping methods (Free shipping, Flat rate, etc.)

**WooCommerce > Settings > Payments**
- [ ] Enable payment gateways:
  - UPI
  - Credit/Debit Cards
  - Net Banking
  - EMI (if available)

**WooCommerce > Settings > Emails**
- [ ] Configure email templates
- [ ] Test email sending

---

### 🧪 Testing Checklist

#### Functionality Testing

**Navigation:**
- [ ] Header menu works on desktop
- [ ] Mobile menu opens/closes correctly
- [ ] Search overlay opens/closes
- [ ] Footer links work
- [ ] Breadcrumbs display correctly

**Homepage:**
- [ ] Hero displays with background image
- [ ] All 8 sections render
- [ ] CTAs link to correct pages
- [ ] Diamond finder form works
- [ ] Stats display from customizer

**Product Listing:**
- [ ] Products display in grid
- [ ] Filters work (test Shape, Color, Clarity)
- [ ] Sort options work
- [ ] Compare checkbox adds to list
- [ ] Mobile filters slide in
- [ ] Pagination works
- [ ] Badges display correctly

**Product Detail:**
- [ ] Images load correctly
- [ ] Specs display from custom fields
- [ ] Tabs switch correctly
- [ ] Add to Cart works
- [ ] Pincode checker works (basic)
- [ ] Trust blocks display
- [ ] Related products show

**Cart:**
- [ ] Cart items display
- [ ] Quantity update works
- [ ] Remove item works
- [ ] Coupon code applies
- [ ] Trust badges display
- [ ] Totals calculate correctly

**Checkout:**
- [ ] Checkout page loads
- [ ] Form fields work
- [ ] Payment options display
- [ ] Order can be placed

#### Responsive Testing

Test on these devices/sizes:
- [ ] Desktop (1920x1080)
- [ ] Laptop (1366x768)
- [ ] Tablet Portrait (768x1024)
- [ ] Tablet Landscape (1024x768)
- [ ] Mobile Large (414x896) - iPhone XR
- [ ] Mobile Medium (375x667) - iPhone 8
- [ ] Mobile Small (320x568) - iPhone SE

#### Browser Testing

Test on:
- [ ] Chrome (latest)
- [ ] Firefox (latest)
- [ ] Safari (latest)
- [ ] Edge (latest)
- [ ] Mobile Safari (iOS)
- [ ] Mobile Chrome (Android)

#### Performance Testing

- [ ] Run Google PageSpeed Insights
  - Target: 80+ on mobile
  - Target: 90+ on desktop
- [ ] Check GTmetrix
  - Target: A grade
  - Target: < 3s load time
- [ ] Test on slow 3G
  - Should still be usable

#### Accessibility Testing

- [ ] Test keyboard navigation
- [ ] Test with screen reader
- [ ] Check color contrast (use WAVE tool)
- [ ] Verify alt text on images
- [ ] Check form labels

#### SEO Testing

- [ ] Meta titles present
- [ ] Meta descriptions present
- [ ] Headings hierarchy correct (H1 > H2 > H3)
- [ ] Images have alt text
- [ ] URLs are clean
- [ ] Sitemap generates correctly
- [ ] Robots.txt allows indexing

---

### 🔐 Security Checklist

- [ ] WordPress is up to date
- [ ] All plugins are up to date
- [ ] Strong admin passwords set
- [ ] SSL certificate installed (HTTPS)
- [ ] Security plugin installed (e.g., Wordfence)
- [ ] Login attempt limiting enabled
- [ ] Database prefix is not default (wp_)
- [ ] File permissions correct (folders 755, files 644)
- [ ] wp-config.php secured
- [ ] Disable file editing in wp-config.php

---

### 🚀 Go-Live Steps

1. **Backup Everything**
   - [ ] Database backup created
   - [ ] Files backup created
   - [ ] Backup downloaded and stored safely

2. **Switch DNS**
   - [ ] DNS records updated to point to production server
   - [ ] Propagation verified (can take 24-48 hours)

3. **Update URLs**
   - [ ] Update WordPress URLs if domain changed
   - [ ] Search/replace old URLs in database
   - [ ] Update WooCommerce URLs

4. **Enable Caching**
   - [ ] Install caching plugin (e.g., WP Rocket, W3 Total Cache)
   - [ ] Configure page caching
   - [ ] Configure browser caching
   - [ ] Configure CDN (if using)

5. **Submit to Search Engines**
   - [ ] Submit sitemap to Google Search Console
   - [ ] Submit sitemap to Bing Webmaster Tools
   - [ ] Submit to Google My Business (if applicable)

6. **Set Up Analytics**
   - [ ] Google Analytics installed
   - [ ] Google Tag Manager (optional)
   - [ ] Facebook Pixel (if using)
   - [ ] Goals and conversions configured

7. **Set Up Monitoring**
   - [ ] Uptime monitoring (e.g., UptimeRobot)
   - [ ] Error logging enabled
   - [ ] Performance monitoring

---

### 📊 Post-Launch Monitoring

**Week 1:**
- [ ] Monitor uptime daily
- [ ] Check error logs daily
- [ ] Monitor page load times
- [ ] Check form submissions work
- [ ] Verify orders are processing
- [ ] Test payment gateways
- [ ] Monitor mobile performance

**Week 2-4:**
- [ ] Review analytics data
- [ ] Check search console for errors
- [ ] Monitor conversion rates
- [ ] Gather user feedback
- [ ] Check bounce rates
- [ ] Review heatmaps (if using Hotjar)

---

### 🐛 Common Issues & Solutions

**Issue: Styles not loading**
- Solution: Clear browser cache and WordPress cache
- Check: File permissions on CSS files
- Verify: Theme is properly activated

**Issue: Menus not showing**
- Solution: Create menus and assign to locations
- Check: Theme location assignments in Menus page

**Issue: Products not displaying**
- Solution: Check WooCommerce shop page is set
- Verify: Products are published (not draft)
- Check: Product visibility settings

**Issue: Images broken**
- Solution: Verify image paths are correct
- Check: Images exist in /assets/images/
- Regenerate: Thumbnails using plugin

**Issue: Filters not working**
- Solution: Check products have custom field data
- Verify: Field names match exactly
- Test: With fresh product data

**Issue: Mobile menu not opening**
- Solution: Check jQuery is loaded
- Verify: No JavaScript errors in console
- Clear: Browser cache

---

### 📞 Support Contacts

**Technical Support:**
- WordPress.org Forums: https://wordpress.org/support/
- WooCommerce Support: https://woocommerce.com/my-account/create-a-ticket/

**Hosting Support:**
- Contact your hosting provider for server issues

**Theme Support:**
- Refer to PHASE1_IMPLEMENTATION_GUIDE.md
- Check theme documentation

---

### ✅ Final Launch Checklist

Before announcing launch:
- [ ] All pages load without errors
- [ ] All forms work and send emails
- [ ] All links are functional (no 404s)
- [ ] Test purchase can be completed end-to-end
- [ ] Mobile experience is smooth
- [ ] All images load correctly
- [ ] Footer displays correctly
- [ ] Contact information is correct
- [ ] Social media links work
- [ ] Analytics tracking works
- [ ] Backup system is in place
- [ ] Team trained on WordPress admin
- [ ] Documentation provided to team

---

## 🎉 You're Ready to Launch!

Once all items are checked off, your site is production-ready. 

**Remember:**
- Monitor closely for first 48 hours
- Have rollback plan ready (backups)
- Keep emergency contact list handy
- Celebrate the launch! 🚀

---

**Last Updated:** 2025-12-13
**Version:** 1.0.0 (Phase 1 Complete)
