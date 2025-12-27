# WordPress Performance Optimization Guide - PART 3A
## Lab Grown Diamond CVD - Peak Performance & Testing

**Objective**: Optimize website for peak performance, complete SEO setup, conduct comprehensive testing, and prepare for launch.

**Prerequisites**: Complete PART 1 (plugins) and PART 2A (page creation) before starting this guide.

**Time Required**: 4-6 hours for complete optimization  
**Target Results**: PageSpeed 90+ (Desktop), 80+ (Mobile), LCP < 2.5s

---

## Table of Contents

1. [Performance Optimization](#performance-optimization)
2. [Image Optimization Audit](#image-optimization-audit)
3. [CSS/JS Optimization](#cssjs-optimization)
4. [Font Optimization](#font-optimization)
5. [Database Optimization](#database-optimization)
6. [CDN Setup](#cdn-setup)
7. [Lazy Loading Configuration](#lazy-loading-configuration)
8. [Caching Strategy](#caching-strategy)
9. [Performance Testing](#performance-testing)
10. [Troubleshooting Performance Issues](#troubleshooting-performance-issues)

---

## Performance Optimization Overview

### Current Performance Baseline

Before optimization, test your site:

```
1. Visit: https://pagespeed.web.dev/
2. Enter your URL
3. Test both Mobile and Desktop
4. Note current scores
5. Review Core Web Vitals:
   - LCP (Largest Contentful Paint)
   - FID (First Input Delay)
   - CLS (Cumulative Layout Shift)
```

**Target Metrics After Optimization**:
- **PageSpeed Desktop**: 90-100
- **PageSpeed Mobile**: 80-95
- **LCP**: < 2.5 seconds
- **FID**: < 100 milliseconds
- **CLS**: < 0.1
- **Total Page Size**: < 3MB
- **Total Requests**: < 50
- **First Contentful Paint**: < 1.8s
- **Time to Interactive**: < 3.8s

---

## STEP 1: Image Optimization Audit

### A. Install Media Cleaner Plugin

**Purpose**: Find and remove unused images that bloat your site

```
Dashboard → Plugins → Add New
Search: "Media Cleaner"
Install: Media Cleaner by Jordy Meow (free)
Activate
```

### B. Run Media Cleaner Scan

```
Dashboard → Media → Cleaner
Click "Scan"
Wait for scan to complete (may take 5-15 minutes)
```

**Review Results**:
```
Review "Unused Media" tab
Check images before deleting (some may be used in CSS/JS)
Select unused images
Click "Delete" (this moves to trash, not permanent)
Empty WordPress trash after verifying site works
```

**Warning**: Always backup before deleting media files!

### C. Bulk Image Optimization with Smush

**If not already done in PART 1**:

```
Dashboard → Smush → Bulk Smush
Click "Bulk Smush Now"
Wait for completion (10-30 minutes depending on image count)
```

**Verify Settings**:
```
Dashboard → Smush → Settings

Basic:
✅ Automatically compress new uploads
✅ Strip my image metadata (EXIF data)

Advanced:
✅ Resize full-size images
   - Max width: 1920px
   - Max height: 1920px
✅ Detect and show incorrectly sized images
```

### D. Enable and Verify WebP Format

**Enable WebP in Smush**:
```
Dashboard → Smush → Settings → WebP

✅ Enable WebP conversion
✅ Serve WebP images
Save Changes
```

**Verify WebP is Working**:
```
Method 1 - Browser Inspection:
1. Visit your homepage
2. Right-click on an image → Inspect
3. Check Network tab for image file
4. Look for .webp extension
5. If showing .jpg/.png, WebP may not be active

Method 2 - Direct URL Test:
1. Copy image URL from your site
2. Add .webp to end of URL
3. If image loads, WebP is working
4. If 404 error, WebP conversion failed

Method 3 - PageSpeed Insights:
1. Run PageSpeed test
2. Check "Opportunities" section
3. Should NOT show "Serve images in next-gen formats"
4. If it does, WebP isn't working properly
```

**Troubleshooting WebP**:
```
If WebP not working:

1. Check Server Support:
   - LiteSpeed: Native WebP support ✅
   - Apache: Requires mod_rewrite and mod_headers
   - Nginx: Requires configuration

2. Check .htaccess Rules:
   Dashboard → Smush → Settings → WebP → View .htaccess rules
   Copy rules
   Paste into .htaccess file (via FTP or File Manager)

3. Alternative - Use LiteSpeed Cache WebP:
   Dashboard → LiteSpeed Cache → Image Optimization
   Enable WebP replacement
```

### E. Image Optimization Checklist

After optimization, verify:

- [ ] All images compressed (check Media Library for optimization %)
- [ ] WebP format enabled and serving
- [ ] No images larger than 1920px width
- [ ] Product images optimized (800x800px ideal)
- [ ] Featured images optimized (1200x630px for social sharing)
- [ ] No images over 300KB file size
- [ ] Unused images deleted
- [ ] Image lazy loading enabled (covered in Step 6)

---

## STEP 2: CSS/JS Optimization

### Using WP Rocket (Premium - Recommended)

**If you have WP Rocket installed from PART 1**:

```
Dashboard → WP Rocket → File Optimization
```

**CSS Optimization**:
```
CSS Files:
✅ Minify CSS files
✅ Combine CSS files
   Warning: Test this - may break some theme styles
   If layout breaks: Disable and test page by page

✅ Optimize CSS delivery (Critical CSS)
   Generates critical CSS automatically
   Improves First Contentful Paint
   
Remove Unused CSS:
✅ Remove Unused CSS (if available in your WP Rocket version)
   Beta feature - test carefully
```

**JavaScript Optimization**:
```
JavaScript Files:
✅ Minify JavaScript files

✅ Combine JavaScript files
   Warning: Test carefully - can break interactive elements
   If JS errors occur: Disable or exclude problematic files
   
✅ Load JavaScript deferred
   Delays JS loading until HTML is parsed
   Major performance improvement
   
✅ Delay JavaScript execution
   For non-critical JS (analytics, social widgets)
   Enter patterns to delay:
   - gtag
   - analytics
   - facebook
   - twitter
   - instagram
```

**JS Exclusions** (if combining breaks functionality):
```
Exclude from combining/defer:
- jQuery (/wp-includes/js/jquery/jquery.min.js)
- WooCommerce scripts if checkout breaks
- Contact Form 7 if form breaks
- Any plugin that breaks when optimized

Add exclusions in: WP Rocket → File Optimization → JavaScript → Excluded files
```

**After Configuration**:
```
1. Clear WP Rocket cache: WP Rocket → Clear Cache
2. Test all critical functions:
   - Homepage loads correctly
   - Product pages display
   - Add to cart works
   - Checkout functions
   - Contact forms submit
   - Mobile menu opens
3. If anything breaks: Disable last setting, clear cache, re-test
```

---

### Using LiteSpeed Cache (Free Alternative)

**If using LiteSpeed Cache instead of WP Rocket**:

```
Dashboard → LiteSpeed Cache → Page Optimization
```

**CSS Settings**:
```
CSS Settings:
✅ CSS Minify
✅ CSS Combine
✅ Generate UCSS (Unique CSS - removes unused CSS)
✅ Load CSS Asynchronously

CSS Excludes (if needed):
- Add critical CSS files that break when combined
```

**JavaScript Settings**:
```
JS Settings:
✅ JS Minify
⚠️ JS Combine (test carefully - often breaks functionality)
✅ Load JS Deferred

JS Excludes (commonly needed):
- jquery
- woocommerce
- Any plugin JS that breaks
```

**After Configuration**:
```
LiteSpeed Cache → Purge → Purge All
Test all functionality
```

---

## STEP 3: Font Optimization

### Identify Font Sources

**Check what fonts you're using**:
```
Method 1 - Theme Settings:
Dashboard → Appearance → Customize → Typography
Check font families selected

Method 2 - Inspect Page:
Right-click page → Inspect → Network tab
Filter: Font
Reload page
See what font files are loading and from where
```

### Google Fonts Optimization

**Option A: Preload Fonts (WP Rocket)**:
```
Dashboard → WP Rocket → Preload

Preload Fonts:
Enter font URLs from Google Fonts

Example:
https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Montserrat:wght@400;500;600&display=swap

This tells browser to load fonts early
```

**Option B: Self-Host Google Fonts** (Best Performance):

Using OMGF Plugin (recommended):
```
1. Install Plugin:
   Dashboard → Plugins → Add New
   Search: "OMGF" (Optimize My Google Fonts)
   Install → Activate

2. Configure:
   Dashboard → Settings → Optimize Google Fonts
   ✅ Optimize Google Fonts
   ✅ Remove Google Fonts
   ✅ Preload (select font weights used on homepage)
   Save & Optimize

3. Verify:
   Check PageSpeed Insights
   Should not show "Reduce unused CSS" for Google Fonts
   Fonts should load from your domain, not googleapis.com
```

**Option C: Elementor/Astra Built-in Font Loading**:
```
If using Astra theme:
Dashboard → Appearance → Astra Options → Performance
✅ Load Google Fonts Locally
Save

If using Elementor:
Dashboard → Elementor → Settings → Features
✅ Enable Font Display Swap
Save
```

### Font Loading Best Practices

**Add font-display: swap to CSS**:
```css
/* This is usually automatic with modern themes/plugins */
/* But if you need to add manually: */

@font-face {
  font-family: 'Playfair Display';
  font-style: normal;
  font-weight: 400;
  font-display: swap; /* Prevents invisible text while loading */
  src: url('/path/to/font.woff2') format('woff2');
}
```

**Limit Font Weights**:
```
Only load font weights you actually use:
- Headings: 600 or 700 (bold)
- Body text: 400 (regular)
- Optional: 500 (medium)

Remove unused weights:
- 100 (thin)
- 200 (extra-light)
- 300 (light)
- 800 (extra-bold)
- 900 (black)

Every weight = extra HTTP request and KB
```

### Font Optimization Checklist

- [ ] Google Fonts loaded locally (not from googleapis.com)
- [ ] Only necessary font weights loaded (typically 2-3 weights)
- [ ] font-display: swap enabled
- [ ] Fonts preloaded (critical fonts only)
- [ ] No font-related CLS (layout shift)
- [ ] Fallback fonts defined in CSS

---

## STEP 4: Database Optimization

### One-Time Cleanup (WP Rocket)

```
Dashboard → WP Rocket → Database
```

**Run These Cleanups**:
```
✅ Post Revisions
   Keep: Last 3 revisions (or use default)
   Click "Revisions" → "Clean"
   
✅ Auto Drafts
   Click "Auto Drafts" → "Clean"
   
✅ Trashed Posts
   Click "Trashed Posts" → "Clean"
   
✅ Spam Comments
   Click "Spam Comments" → "Clean"
   
✅ Trashed Comments
   Click "Trashed Comments" → "Clean"
   
✅ Expired Transients
   Click "Expired Transients" → "Clean"
   
✅ All Transients
   Click "All Transients" → "Clean"
   Note: Transients will regenerate as needed
   
✅ Database Tables (optional)
   Click "Optimize Tables" → "Optimize"
   Defragments database for better performance
```

**Schedule Automatic Cleanup**:
```
Automatic Cleanup:
✅ Enable automatic cleanup
Schedule: Daily, Weekly, or Monthly
Recommended: Weekly on Sunday at 3:00 AM

Items to Auto-clean:
✅ Post revisions
✅ Auto drafts
✅ Trashed posts
✅ Spam comments
✅ Trashed comments
✅ Expired transients

Save Changes
```

### Database Optimization (LiteSpeed Cache Alternative)

```
Dashboard → LiteSpeed Cache → Database
```

**Run Optimizations**:
```
Click each "Clean" button:
- Clean all revisions (keep last 3)
- Clean all auto drafts
- Clean all trashed posts
- Clean all spam comments
- Clean all trashed comments
- Clean all expired transients
- Clean all transient options
- Optimize tables
```

**Schedule Auto-cleanup**:
```
Auto Cleanup Settings:
Enable: Yes
Frequency: Weekly
Day: Sunday
Time: 3:00 AM
Save
```

### Manual Database Optimization (phpMyAdmin)

**For advanced users only**:

```
1. Access phpMyAdmin:
   Hostinger Control Panel → Databases → phpMyAdmin
   
2. Select your WordPress database

3. Check All Tables:
   Click "Check All"
   
4. From Dropdown: "Optimize table"
   Click "Go"
   
5. Repeat monthly for best performance
```

### Database Optimization Checklist

- [ ] Post revisions cleaned (keeping last 3)
- [ ] Auto-drafts removed
- [ ] Spam/trash comments deleted
- [ ] Transients cleaned
- [ ] Database tables optimized
- [ ] Automatic cleanup scheduled (weekly)
- [ ] Database size reduced (check before/after size)

---

## STEP 5: CDN Setup

### Option A: Hostinger CDN (If Available)

**Check if Hostinger CDN is available**:
```
1. Login to Hostinger Control Panel
2. Navigate to Website section
3. Look for "CDN" option
4. If available, proceed below
```

**Enable Hostinger CDN**:
```
1. Hostinger Control Panel → CDN
2. Enable CDN
3. Copy CDN URL provided (e.g., cdn-yoursite.hostinger.com)
4. Wait 5-10 minutes for activation
```

**Configure WP Rocket for Hostinger CDN**:
```
Dashboard → WP Rocket → CDN

CDN Settings:
✅ Enable Content Delivery Network
CDN CNAME(s): [Paste Hostinger CDN URL]
Example: cdn-labgrowndiamondcvd.hostinger.com

CDN Files to Include:
✅ CSS
✅ JavaScript
✅ Images
✅ Fonts
✅ Videos

Exclude Files (if needed):
- Any files that break when served from CDN

Save Changes
Clear Cache
```

**Verify CDN Working**:
```
1. Visit your website
2. Right-click → View Page Source
3. Search for "cdn-" or your CDN URL
4. Image/CSS/JS URLs should show CDN domain
5. If not, clear cache and wait 10 minutes
```

---

### Option B: Cloudflare CDN (Free - Recommended if no Hostinger CDN)

**Sign Up and Add Site**:
```
1. Visit: https://cloudflare.com
2. Click "Sign Up" (free account)
3. Add a Site → Enter: labgrowndiamondcvd.com
4. Select: Free plan
5. Continue
```

**Cloudflare will scan your DNS records**:
```
Review DNS records detected
Verify all records are correct
Click "Continue"
```

**Change Nameservers** (Critical Step):
```
Cloudflare provides 2 nameservers:
Example:
- ns1.cloudflare.com
- ns2.cloudflare.com

Update nameservers at Hostinger:
1. Hostinger Control Panel → Domains
2. Select your domain
3. DNS / Nameservers section
4. Change nameservers to Cloudflare's
5. Save

Wait: 2-24 hours for propagation
You'll get email when active
```

**Cloudflare Configuration** (After Activation):

**A. Speed Optimization Settings**:
```
Cloudflare Dashboard → Speed → Optimization

Auto Minify:
✅ JavaScript
✅ CSS
✅ HTML

Brotli Compression:
✅ Enable

Rocket Loader:
⚠️ Test this - may break some scripts
   If JavaScript errors occur, disable

Early Hints:
✅ Enable (improves performance)

Image Optimization (requires paid plan):
- Not available on free plan
- Use Smush/WP Rocket instead
```

**B. Caching Configuration**:
```
Cloudflare Dashboard → Caching → Configuration

Browser Cache TTL:
Select: 1 year (recommended for static assets)

Crawler Hints:
✅ Enable

Always Online:
✅ Enable (shows cached version if site down)
```

**C. Page Rules** (Important for WordPress):
```
Cloudflare Dashboard → Rules → Page Rules

Rule 1 - Bypass Cache for Admin:
URL Pattern: *labgrowndiamondcvd.com/wp-admin*
Settings:
- Cache Level: Bypass
- Disable Security
- Disable Performance
Save and Deploy

Rule 2 - Bypass Cache for WooCommerce Cart/Checkout:
URL Pattern: *labgrowndiamondcvd.com/cart*
Settings:
- Cache Level: Bypass
Save and Deploy

Rule 3 - Bypass Cache for My Account:
URL Pattern: *labgrowndiamondcvd.com/my-account*
Settings:
- Cache Level: Bypass
Save and Deploy

Rule 4 - Cache Everything for Static Pages:
URL Pattern: *labgrowndiamondcvd.com/*
Settings:
- Cache Level: Cache Everything
- Edge Cache TTL: 1 month
Save and Deploy

Note: Free plan allows 3 page rules
Prioritize admin bypass and cache everything
```

**D. Security Settings** (Recommended):
```
Cloudflare Dashboard → Security → Settings

Security Level: Medium (balance security and accessibility)

Bot Fight Mode:
✅ Enable

Challenge Passage: 30 minutes

Browser Integrity Check:
✅ Enable
```

**E. SSL/TLS Settings**:
```
Cloudflare Dashboard → SSL/TLS

SSL/TLS Encryption Mode:
Select: Full (strict)
Requires valid SSL on your server (Hostinger provides this)

Always Use HTTPS:
✅ Enable

Automatic HTTPS Rewrites:
✅ Enable
```

**Verify Cloudflare is Active**:
```
Method 1 - DNS Check:
Visit: https://www.whatsmydns.net/
Enter: labgrowndiamondcvd.com
Type: NS (Nameserver)
Should show Cloudflare nameservers globally

Method 2 - Headers Check:
Visit: https://www.webpagetest.org/
Test your site
View response headers
Should see "cf-ray" and "cf-cache-status" headers

Method 3 - Cloudflare Dashboard:
Should show "Active" status
Overview should show traffic statistics
```

**Cloudflare + WP Rocket Integration**:
```
Dashboard → WP Rocket → Add-ons

Cloudflare:
✅ Enable
Enter Cloudflare API Key:
  1. Cloudflare → My Profile → API Tokens
  2. Create Token OR use Global API Key
  3. Copy key
  4. Paste in WP Rocket
Select Domain: labgrowndiamondcvd.com
Save Changes

This allows WP Rocket to automatically purge Cloudflare cache
```

---

### CDN Verification Checklist

- [ ] CDN service activated (Hostinger or Cloudflare)
- [ ] Nameservers updated (if using Cloudflare)
- [ ] DNS propagation complete
- [ ] WP Rocket configured with CDN URLs
- [ ] Images loading from CDN
- [ ] CSS/JS loading from CDN
- [ ] Admin area excluded from CDN cache
- [ ] Cart/Checkout excluded from CDN cache
- [ ] PageSpeed shows CDN being used
- [ ] No broken images or styles

---

## STEP 6: Lazy Loading Configuration

### WP Rocket Lazy Load Settings

```
Dashboard → WP Rocket → Media
```

**Image Lazy Loading**:
```
LazyLoad:
✅ Enable for images
   Delays loading images until user scrolls to them
   Major performance improvement

Replace YouTube iframe with preview image:
✅ Enable
   Loads YouTube player only when clicked
   Saves bandwidth
```

**Iframe & Video Lazy Loading**:
```
✅ Enable for iframes and videos
   Delays loading embeds (YouTube, Vimeo, Google Maps)
   
Exclude patterns (if needed):
- First image in posts (loads immediately)
- Hero images (loads immediately)
- Logo images (loads immediately)

Format:
- Add class: skip-lazy
- Add to exclusions: .hero-image, .logo
```

**Lazy Load Exclusions**:
```
Images to EXCLUDE from lazy load:
1. Logo (always visible)
2. Hero/banner images (above the fold)
3. First product image on shop page
4. Critical UI elements

Add exclusions:
WP Rocket → Media → Images → Excluded Images
Enter: logo, hero-banner, featured-image-1
```

### LiteSpeed Cache Lazy Load (Alternative)

```
Dashboard → LiteSpeed Cache → Media Settings
```

**Lazy Load Configuration**:
```
Lazy Load Images:
✅ Enable

Lazy Load Iframes:
✅ Enable

Basic Image Placeholder:
Select: Grey placeholder OR Base64 image

Responsive Placeholder:
✅ Enable (prevents layout shift)

Lazy Load Exclusions:
Add classes/URLs to exclude:
- logo
- hero-image
- above-fold-content
```

### Test Lazy Loading

**Verify lazy load is working**:
```
1. Open your homepage
2. Right-click → Inspect → Network tab
3. Filter: Images
4. Refresh page
5. Note image requests
6. Scroll down slowly
7. Watch new images load as you scroll
8. Images should load progressively, not all at once
```

**Check for CLS (Cumulative Layout Shift)**:
```
After enabling lazy load:
1. Run PageSpeed Insights test
2. Check CLS score
3. Should be < 0.1
4. If higher: Images missing width/height attributes
5. Fix: WP Rocket → Media → Add missing image dimensions
```

---

## STEP 7: Caching Strategy

### WP Rocket Cache Configuration

```
Dashboard → WP Rocket → Cache
```

**Page Caching**:
```
✅ Enable caching for mobile devices
   Serves cached version to mobile users
   
✅ Enable caching for logged-in WordPress users
   ⚠️ Be careful - may cache personalized content
   Recommended: Leave disabled if using WooCommerce cart

Separate cache for mobile:
✅ Enable if mobile theme differs from desktop
❌ Disable if using responsive theme (recommended)
```

**Cache Lifespan**:
```
Preload Cache:
✅ Enable
   Automatically refreshes cache before it expires
   Ensures visitors get fast cached pages

Activate sitemap-based cache preloading:
✅ Enable
Sitemap URL: https://labgrowndiamondcvd.com/sitemap_index.xml
   Uses Rank Math sitemap to preload pages
```

**Cache Exclusions**:
```
Never cache these URLs:
/cart/*
/checkout/*
/my-account/*
/wc-api/*
(.*)add-to-cart=(.*)

These ensure WooCommerce dynamic pages work correctly
```

### Browser Caching

**Already handled by WP Rocket or LiteSpeed Cache**

**Verify browser caching is active**:
```
1. Open browser DevTools
2. Network tab
3. Reload page
4. Click on any image/CSS/JS file
5. Check Headers
6. Look for: Cache-Control: max-age=31536000
7. This means 1 year browser cache
```

### Object Caching (Advanced - Optional)

**If server supports Redis or Memcached**:

```
Check with hosting:
Contact Hostinger support → "Does my plan include Redis/Memcached?"

If Yes - Install Redis Object Cache Plugin:
1. Dashboard → Plugins → Add New
2. Search: "Redis Object Cache"
3. Install → Activate
4. Dashboard → Settings → Redis
5. Click "Enable Object Cache"
6. Verify: "Status: Connected"

Benefits:
- Faster database queries
- Reduced server load
- Better handling of traffic spikes
```

---

## STEP 8: Performance Testing

### Google PageSpeed Insights

**Run Comprehensive Test**:
```
1. Visit: https://pagespeed.web.dev/
2. Enter: https://labgrowndiamondcvd.com
3. Click "Analyze"
4. Wait for test to complete (30-60 seconds)
```

**Review Results**:

**Desktop Score**:
```
Target: 90-100 (green)
Acceptable: 80-89 (orange)
Poor: <80 (red)

Core Web Vitals:
✅ LCP < 2.5s (green)
✅ FID < 100ms (green)
✅ CLS < 0.1 (green)
```

**Mobile Score**:
```
Target: 80-95 (green)
Acceptable: 70-79 (orange)
Poor: <70 (red)

Mobile is typically 10-15 points lower than desktop
```

**Fix Opportunities**:
```
PageSpeed provides specific recommendations:
- Eliminate render-blocking resources
- Reduce unused CSS/JavaScript
- Properly size images
- Enable text compression
- Reduce server response times

Address top 3 opportunities first
```

### GTmetrix Testing

**Alternative performance test**:
```
1. Visit: https://gtmetrix.com/
2. Enter URL
3. Select Test Location: India (if available)
4. Click "Test your site"
```

**Review GTmetrix Scores**:
```
Performance Grade: Target A (90%+)
Structure Grade: Target A (90%+)

Key Metrics:
- Fully Loaded Time: Target < 3 seconds
- Total Page Size: Target < 3MB
- Requests: Target < 50
```

### WebPageTest (Advanced)

**Detailed performance analysis**:
```
1. Visit: https://www.webpagetest.org/
2. Enter URL
3. Test Location: Mumbai, India (closest to target audience)
4. Browser: Chrome
5. Connection: 4G LTE
6. Number of Tests: 3 (for average)
7. Run Test
```

**Review Waterfall Chart**:
```
Identify performance bottlenecks:
- Longest loading resources
- Blocking scripts
- Third-party delays
- Server response time issues
```

### Lighthouse (Chrome DevTools)

**Local testing**:
```
1. Open site in Chrome
2. Right-click → Inspect
3. Click "Lighthouse" tab
4. Select:
   ✅ Performance
   ✅ Accessibility
   ✅ Best Practices
   ✅ SEO
5. Device: Mobile or Desktop
6. Click "Analyze page load"
```

**Benefits**:
- No throttling limits (can test unlimited times)
- Local testing without external factors
- See exact performance metrics
```

### Performance Testing Checklist

Test on these pages:
- [ ] Homepage
- [ ] Shop page
- [ ] Single product page
- [ ] About page
- [ ] Contact page

All pages should meet targets:
- [ ] Desktop PageSpeed: 85+
- [ ] Mobile PageSpeed: 75+
- [ ] LCP: < 2.5s
- [ ] FID: < 100ms
- [ ] CLS: < 0.1
- [ ] Fully Loaded: < 3s
- [ ] Page Size: < 3MB
- [ ] Requests: < 50

---

## STEP 9: Advanced Optimizations

### Critical CSS (WP Rocket)

```
Dashboard → WP Rocket → File Optimization → CSS

✅ Optimize CSS delivery
   Automatically generates critical CSS
   Inlines above-the-fold CSS
   Defers non-critical CSS
   
Wait 2-3 minutes after enabling
Clear cache
Test homepage
```

### Preloading

**Preload Key Resources**:
```
Dashboard → WP Rocket → Preload

Preload Fonts:
https://fonts.googleapis.com/css2?family=Playfair+Display...

Preload Links:
/shop/
/about/
/contact/

Preload Cache:
✅ Enable preload
✅ Preload sitemap
```

### DNS Prefetch

**Speed up external resource loading**:
```
Dashboard → WP Rocket → Advanced → DNS Prefetch

Add these domains:
//fonts.googleapis.com
//fonts.gstatic.com
//www.googletagmanager.com
//www.google-analytics.com
//connect.facebook.net

Tells browser to resolve DNS early
```

### Reduce HTTP Requests

**Audit and minimize requests**:
```
Tools → Use GTmetrix or WebPageTest
Check: Total Requests count

Reduce by:
- Combining CSS/JS (already done)
- Removing unnecessary plugins
- Using CSS sprites for icons
- Limiting external scripts (social widgets, tracking)

Target: < 50 requests per page
```

### Optimize Web Fonts

**Subset fonts to reduce size**:
```
Use only character sets you need:
- Latin (English)
- Latin Extended (European languages)

Google Fonts:
https://fonts.googleapis.com/css2?family=Playfair+Display&text=ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789

This loads only specified characters
Reduces font file size by 70%+
```

---

## STEP 10: Troubleshooting Performance Issues

### Common Issues and Fixes

**Issue 1: Low PageSpeed Score Despite Optimizations**

**Diagnosis**:
```
Run PageSpeed Insights
Check "Diagnostics" section
Common culprits:
- Large images (>300KB)
- Render-blocking resources
- Third-party scripts (Analytics, Facebook Pixel)
- Server response time (>600ms)
```

**Fixes**:
```
1. Further compress images
2. Enable critical CSS
3. Delay non-essential scripts
4. Contact hosting about server speed
5. Consider upgrading hosting plan
```

---

**Issue 2: Layout Shifts (High CLS)**

**Diagnosis**:
```
CLS > 0.1 = poor user experience
Caused by:
- Images without width/height
- Ads/embeds loading late
- Web fonts causing FOIT/FOUT
```

**Fixes**:
```
1. WP Rocket → Media → Add missing image dimensions
2. Set font-display: swap
3. Reserve space for ads/embeds in CSS
4. Preload critical fonts
```

---

**Issue 3: Slow Server Response (High TTFB)**

**Diagnosis**:
```
Time to First Byte > 600ms
Check in:
- GTmetrix → Timings → Wait time
- WebPageTest → First Byte Time
```

**Fixes**:
```
1. Enable object caching (Redis/Memcached)
2. Optimize database queries
3. Upgrade hosting plan
4. Use CDN (already implemented)
5. Contact hosting support
```

---

**Issue 4: JavaScript Errors After Optimization**

**Diagnosis**:
```
Symptoms:
- Broken sliders
- Non-functional buttons
- Console errors
```

**Fixes**:
```
1. WP Rocket → File Optimization
2. Disable "Combine JavaScript"
3. Add problematic files to exclusions
4. Test one file at a time to identify issue
5. Keep minification but disable combining
```

---

**Issue 5: Images Not Lazy Loading**

**Diagnosis**:
```
All images load immediately
Network tab shows all image requests at once
```

**Fixes**:
```
1. Check if lazy load is enabled
2. Clear all caches
3. Disable conflicting lazy load plugins
4. Check browser console for errors
5. Verify images have proper HTML structure
```

---

## Performance Optimization Summary

### Final Checklist

**Image Optimization** ✅
- [ ] All images compressed with Smush
- [ ] WebP format enabled and verified
- [ ] No images over 300KB
- [ ] Unused images deleted
- [ ] Image dimensions specified

**CSS/JS Optimization** ✅
- [ ] CSS minified
- [ ] CSS combined (if not breaking layout)
- [ ] Critical CSS enabled
- [ ] JS minified
- [ ] JS deferred
- [ ] Delay JavaScript execution enabled

**Font Optimization** ✅
- [ ] Fonts loaded locally or preloaded
- [ ] Only necessary weights loaded
- [ ] font-display: swap enabled
- [ ] Font subsetting considered

**Database Optimization** ✅
- [ ] Database cleaned
- [ ] Tables optimized
- [ ] Auto-cleanup scheduled
- [ ] Post revisions limited

**CDN Setup** ✅
- [ ] CDN activated (Hostinger or Cloudflare)
- [ ] CDN configured in WP Rocket
- [ ] Nameservers updated (if Cloudflare)
- [ ] CDN verified working

**Lazy Loading** ✅
- [ ] Images lazy loading
- [ ] Iframes lazy loading
- [ ] Exclusions configured
- [ ] No CLS issues

**Caching** ✅
- [ ] Page caching enabled
- [ ] Browser caching active
- [ ] Cache preloading enabled
- [ ] Object caching (if available)

**Testing Results** ✅
- [ ] PageSpeed Desktop: 90+
- [ ] PageSpeed Mobile: 80+
- [ ] LCP: < 2.5s
- [ ] FID: < 100ms
- [ ] CLS: < 0.1
- [ ] GTmetrix Grade: A
- [ ] Page load: < 3s

---

## Next Steps

After completing PART 3A Performance Optimization:

1. **PART 3B: SEO Completion** (Coming next)
   - Complete Rank Math setup
   - Submit sitemaps
   - Set up Google Search Console
   - Create robots.txt
   - Schema markup verification

2. **PART 3C: Final Testing**
   - Cross-browser testing
   - Mobile device testing
   - Functionality testing
   - Security testing
   - Load testing

3. **PART 3D: Launch Preparation**
   - Pre-launch checklist
   - Backup verification
   - DNS configuration
   - Go-live procedure
   - Post-launch monitoring

---

**Last Updated**: December 27, 2025  
**Version**: 1.0.0  
**Part**: 3A - Performance Optimization  
**Next**: Part 3B - SEO Completion & Testing
