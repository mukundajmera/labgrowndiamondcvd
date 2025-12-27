# WordPress E-Commerce Setup Guide
## Lab Grown Diamond CVD - Production-Ready Configuration

**Last Updated**: December 27, 2025  
**Version**: 1.0.0  
**Objective**: Complete production-ready WordPress foundation for jewelry e-commerce

---

## Table of Contents

1. [Current Status](#current-status)
2. [Prerequisites](#prerequisites)
3. [Theme Configuration](#theme-configuration)
4. [Plugin Installation & Configuration](#plugin-installation--configuration)
5. [WooCommerce Product Setup](#woocommerce-product-setup)
6. [Forms & Contact Setup](#forms--contact-setup)
7. [Performance Optimization](#performance-optimization)
8. [Security Hardening](#security-hardening)
9. [Verification Checklist](#verification-checklist)
10. [Troubleshooting](#troubleshooting)

---

## Current Status

### ✅ Already Installed

- **WordPress**: Latest version
- **Astra Theme**: Parent theme installed
- **Astra Child Theme**: Custom diamond e-commerce child theme (active)
- **WooCommerce**: E-commerce foundation (active)
- **Rank Math SEO**: SEO optimization plugin (active)
- **LiteSpeed Cache**: Performance & caching (active)
- **Advanced Custom Fields**: Custom meta fields (active)
- **Google Site Kit**: Analytics integration (active)

### ❌ Issues to Address

1. Complete theme configuration
2. Configure missing essential plugins
3. Set up product categories and attributes
4. Install and configure Contact Form 7
5. Install image optimization plugin (Smush)
6. Install security plugin (Wordfence)
7. Install wishlist plugin (YITH)
8. Optimize performance settings
9. Create sample products with proper structure

---

## Prerequisites

Before proceeding, ensure you have:

- [x] WordPress admin access
- [x] FTP/SFTP access (if needed for manual uploads)
- [x] Database backup capability
- [x] SSL certificate installed (HTTPS)
- [x] Hostinger hosting account access

---

## Theme Configuration

### Current Theme: Astra Child - Lab Grown Diamond CVD

The custom child theme is already installed with extensive features:
- Modern blue-black-white-grey color scheme
- Advanced diamond search widget
- 360° product viewer placeholders
- Custom jewelry builder interface
- B2B wholesale portal
- Mobile-first responsive design

### Theme Customization Steps

1. **Access WordPress Customizer**
   ```
   Dashboard → Appearance → Customize
   ```

2. **Configure Logo** (`Appearance → Customize → Site Identity`)
   - Upload logo: Recommended size 300x80px
   - Location: `/wp-content/themes/astra-child/assets/images/logo.svg`
   - Site Title: "Lab Grown Diamond CVD"
   - Tagline: "Ethical Brilliance, Lab-Perfected"

3. **Color Scheme** (Already configured in theme)
   - Primary Navy Blue: `#0D47A1`
   - Accent Cobalt Blue: `#2962FF`
   - Charcoal Black: `#212121`
   - Pure White: `#FFFFFF`
   - Light Grey: `#F5F5F5`

4. **Typography** (Already configured)
   - Headings: Playfair Display (Google Fonts)
   - Body: Montserrat (Google Fonts)

5. **WhatsApp Integration** (`Customize → Diamond Theme Settings`)
   - Enter WhatsApp Business number: `[YOUR_NUMBER]` (without + or spaces)
   - Example: `919876543210` for India (+91)

6. **Homepage Setup**
   - Go to `Settings → Reading`
   - Select "A static page"
   - Homepage: Select "Home" page
   - Click "Save Changes"

---

## Plugin Installation & Configuration

### 1. WooCommerce Configuration ✅ (Already Installed)

**Complete Setup Wizard** (if not done):

```
Dashboard → WooCommerce → Setup Wizard
```

#### Basic Settings

1. **Store Details** (`WooCommerce → Settings → General`)
   - Store Address: [Your Jaipur, Rajasthan address]
   - City: Jaipur
   - Country/State: India / Rajasthan
   - Postcode: [Your postal code]
   - Currency: INR (₹) OR USD ($)
   - Currency Position: Left with space (₹ 1,999)
   - Thousand Separator: ,
   - Decimal Separator: .
   - Number of Decimals: 2

2. **Payment Gateways** (`WooCommerce → Settings → Payments`)
   
   **Install & Enable**:
   - ✅ **Razorpay** (Recommended for India)
     ```
     Plugins → Add New → Search "Razorpay" → Install → Activate
     Get API keys from: https://dashboard.razorpay.com/
     ```
   
   - ✅ **Stripe** (International payments)
     ```
     WooCommerce → Settings → Payments → Stripe → Set up
     Get API keys from: https://dashboard.stripe.com/
     ```
   
   - ✅ **PayPal** (Optional)
     ```
     WooCommerce → Settings → Payments → PayPal → Enable
     Enter PayPal email address
     ```

3. **Shipping Zones** (`WooCommerce → Settings → Shipping`)
   
   **Zone 1: India**
   - Zone regions: India
   - Shipping methods:
     - Free shipping (orders over ₹50,000)
     - Flat rate (₹500 for orders under ₹50,000)
     - Local pickup (Optional)
   
   **Zone 2: International**
   - Zone regions: Rest of World
   - Shipping methods:
     - Flat rate ($150 USD)
     - Or calculate via shipping plugin

4. **Tax Settings** (`WooCommerce → Settings → Tax`)
   - Enable tax rates: Yes
   - Enter tax based on: Customer billing address
   - GST for India: 3% (or applicable rate)
   - Add tax rates for applicable states

5. **Product Settings** (`WooCommerce → Settings → Products`)
   
   **General Tab**:
   - Shop page: [Auto-created, or select custom page]
   - Add to cart behavior: Redirect to cart page (optional)
   
   **Inventory Tab**:
   - ✅ Enable stock management
   - Hold stock (minutes): 60
   - Notifications:
     - Low stock threshold: 5
     - Out of stock threshold: 0
   - Out of stock visibility: Hide
   
   **Advanced Tab**:
   - Enable REST API: ✅ Yes

---

### 2. Rank Math SEO Configuration ✅ (Already Installed)

**Complete Setup Wizard** (if not done):

```
Dashboard → Rank Math → Setup Wizard
```

#### Configuration Steps

1. **Connect Google Services**
   - Connect Google Search Console
   - Connect Google Analytics
   - Import data from previous SEO plugin (if applicable)

2. **Site Settings** (`Rank Math → General Settings`)
   - Site type: Online Shop / E-commerce
   - Organization Name: "Lab Grown Diamond CVD"
   - Upload Logo (same as site logo)
   - Social Profiles:
     - Facebook: [Your Facebook page URL]
     - Instagram: [Your Instagram profile]
     - LinkedIn: [Your LinkedIn page]
     - YouTube: [Your YouTube channel]

3. **Schema Markup** (`Rank Math → General Settings → Schema`)
   - Enable Product schema for WooCommerce products
   - Enable Organization schema
   - Enable BreadcrumbList schema
   - Enable Article schema for blog posts

4. **Titles & Meta** (`Rank Math → Titles & Meta`)
   
   **Products Tab**:
   - SEO Title: `%title% | %sitename%`
   - Meta Description: `%excerpt%`
   - Schema Type: Product (auto-enabled)
   
   **Pages Tab**:
   - SEO Title: `%title% | %sitename%`
   - Meta Description: `%excerpt%`
   
   **Posts Tab**:
   - SEO Title: `%title% | %sitename%`
   - Meta Description: `%excerpt%`

5. **Sitemap Settings** (`Rank Math → Sitemap Settings`)
   - ✅ Enable sitemap
   - Include: Posts, Pages, Products, Categories
   - Exclude: Media, Tags, Authors
   - Links per sitemap: 200
   - Images in sitemap: ✅ Yes
   
   **Test Sitemap**: Visit `https://yourdomain.com/sitemap_index.xml`

6. **404 Monitor & Redirections**
   - Enable 404 Monitor: ✅ Yes
   - Enable Redirections: ✅ Yes
   - Monitor 404 errors and create redirects as needed

---

### 3. LiteSpeed Cache Optimization ✅ (Already Installed)

**Recommended Settings** (since Hostinger supports LiteSpeed):

```
Dashboard → LiteSpeed Cache → Settings
```

#### Cache Configuration

1. **Cache Tab**
   - ✅ Enable Cache
   - ✅ Cache Logged-in Users: No (unless needed)
   - ✅ Cache Commenters: No
   - ✅ Cache REST API: Yes
   - ✅ Cache Mobile: Yes
   - ✅ Cache URIs: Leave default
   - ✅ Do Not Cache URIs: `/cart/*, /checkout/*, /my-account/*`

2. **CSS Settings**
   - ✅ CSS Minify: Yes
   - ✅ CSS Combine: Yes (test this - may break some styles)
   - ✅ Generate UCSS: Yes (for better performance)
   - Load CSS Asynchronously: Yes

3. **JS Settings**
   - ✅ JS Minify: Yes
   - ✅ JS Combine: No (can break functionality - test carefully)
   - ✅ Load JS Deferred: Yes

4. **Media Settings**
   - ✅ Lazy Load Images: Yes
   - ✅ Lazy Load Iframes: Yes
   - ✅ Add Missing Sizes: Yes
   - ✅ Responsive Placeholder: Yes
   - WebP Image Replacement: ✅ Yes (if server supports)

5. **Database Optimization**
   - ✅ Auto cleanup: Enable
   - ✅ Revisions: Keep 3
   - ✅ Auto-drafts: Clean weekly
   - Schedule: Weekly on Sunday 3:00 AM

6. **CDN** (If using Hostinger CDN or Cloudflare)
   - Enable CDN: ✅ Yes
   - CDN URL: [Your CDN URL from Hostinger]
   - Include Images: ✅ Yes
   - Include CSS: ✅ Yes
   - Include JS: ✅ Yes

**Performance Testing**:
```
After configuration:
1. Clear all cache
2. Visit homepage and shop page
3. Run Google PageSpeed Insights
4. Target: Desktop 90+, Mobile 80+
```

---

### 4. Contact Form 7 Installation ⚠️ (TO INSTALL)

**Installation Steps**:

```
Dashboard → Plugins → Add New → Search "Contact Form 7"
Click "Install Now" → Activate
```

#### Additional Required Plugins

1. **Flamingo** (Stores form submissions in database)
   ```
   Plugins → Add New → Search "Flamingo" → Install → Activate
   ```

2. **Contact Form 7 Honeypot** (Spam protection)
   ```
   Plugins → Add New → Search "Contact Form 7 Honeypot" → Install → Activate
   ```

#### Create Main Contact Form

```
Dashboard → Contact → Add New
```

**Form Template** (copy and paste):

```html
<div class="contact-form-grid">
  <div class="form-row">
    <div class="form-col-half">
      <label>Your Name (required)
        [text* your-name autocomplete:name placeholder "John Doe" class:form-input]
      </label>
    </div>
    <div class="form-col-half">
      <label>Your Email (required)
        [email* your-email autocomplete:email placeholder "john@example.com" class:form-input]
      </label>
    </div>
  </div>
  
  <div class="form-row">
    <div class="form-col-half">
      <label>Phone Number
        [tel your-phone autocomplete:tel placeholder "+91 98765 43210" class:form-input]
      </label>
    </div>
    <div class="form-col-half">
      <label>Subject (required)
        [select* your-subject class:form-select "Product Inquiry" "Custom Design Request" "Bulk/Wholesale Order" "Certification Question" "General Question"]
      </label>
    </div>
  </div>
  
  <div class="form-row">
    <label>Message (required)
      [textarea* your-message placeholder "Tell us about your requirements..." class:form-textarea rows:6]
    </label>
  </div>
  
  <div class="form-row">
    [honeypot honeypot-field]
    [submit class:btn-primary "Send Message"]
  </div>
</div>
```

**Mail Configuration** (`Mail` tab):

```
To: [your-admin-email@domain.com]
From: [your-name] <wordpress@yourdomain.com>
Subject: New Contact: [your-subject]
Message Body:
---
From: [your-name] <[your-email]>
Phone: [your-phone]
Subject: [your-subject]

Message:
[your-message]

---
Sent from: https://yourdomain.com
```

**Mail (2) - Auto-Reply** (Enable this tab):

```
✅ Use Mail (2)
To: [your-email]
From: Lab Grown Diamond CVD <noreply@yourdomain.com>
Subject: Thank you for contacting us
Message Body:
---
Hi [your-name],

Thank you for reaching out to Lab Grown Diamond CVD!

We have received your message regarding: [your-subject]

Our team will review your inquiry and respond within 24 hours.

In the meantime, feel free to browse our collection:
https://yourdomain.com/shop/

Best regards,
Lab Grown Diamond CVD Team

---
This is an automated message. Please do not reply to this email.
```

**Save Form** and copy the shortcode (e.g., `[contact-form-7 id="123" title="Contact Form"]`)

**Usage**:
- Create a "Contact" page
- Paste the shortcode in the page content
- Publish

---

### 5. Smush Image Optimization ⚠️ (TO INSTALL)

**Installation**:

```
Dashboard → Plugins → Add New → Search "Smush"
Click "Install Now" → Activate
```

#### Configuration

1. **Basic Settings** (`Dashboard → Smush → Settings`)
   - ✅ Automatically compress new uploads
   - ✅ Strip my image metadata (removes EXIF data)
   - ✅ Resize full-size images
     - Max width: 1920px
     - Max height: 1920px
   - ✅ Detect and show incorrectly sized images

2. **WebP Conversion** (Pro feature, but check if available)
   - ✅ Enable WebP conversion
   - ✅ Serve WebP images (if server supports)

3. **Lazy Load**
   - Note: LiteSpeed Cache already handles this
   - Keep disabled to avoid conflicts

4. **Bulk Optimization**
   ```
   Dashboard → Smush → Bulk Smush
   Click "Bulk Smush Now"
   Wait for completion (may take 10-30 minutes)
   ```

---

### 6. YITH WooCommerce Wishlist ⚠️ (TO INSTALL)

**Installation**:

```
Dashboard → Plugins → Add New → Search "YITH WooCommerce Wishlist"
Click "Install Now" → Activate
```

#### Configuration

```
Dashboard → YITH → Wishlist Settings
```

**General Tab**:
- Wishlist page: Auto-create or select existing page
- Enable wishlist: ✅ Yes
- Enable "Add to Wishlist" on product pages: ✅ Yes
- Position: After "Add to Cart" button

**Appearance Tab**:
- "Add to Wishlist" text: "Save to Wishlist"
- Icon style: Heart icon
- Colors:
  - Default: #212121 (black)
  - Hover: #2962FF (cobalt blue)
  - Added: #0D47A1 (navy blue)

---

### 7. Wordfence Security ⚠️ (TO INSTALL)

**Installation**:

```
Dashboard → Plugins → Add New → Search "Wordfence Security"
Click "Install Now" → Activate
```

#### Initial Setup

1. **Email Setup**
   - Enter admin email for security alerts
   - Select alert frequency: Critical issues only

2. **Firewall Configuration** (`Wordfence → Firewall`)
   - Optimization mode: Extended Protection (recommended)
   - Learning Mode: Enable for 1 week initially
   - After 1 week: Switch to "Enabled and Protecting"

3. **Scan Settings** (`Wordfence → Scan`)
   - Enable automatic scans: ✅ Yes
   - Scan frequency: Daily
   - Scan types: All (core files, themes, plugins, malware)

4. **Login Security** (`Wordfence → Login Security`)
   - ✅ Enable 2FA for administrators
   - ✅ Enable CAPTCHA on login page
   - Login lockout: 5 failed attempts
   - Lockout duration: 20 minutes

5. **Rate Limiting**
   - Human traffic: 240 requests/minute
   - Crawler traffic: 60 requests/minute
   - Block immediately: After 480 requests/minute

**Security Best Practices**:
- Change admin username from "admin" to something unique
- Use strong passwords (16+ characters)
- Enable 2FA for all admin accounts
- Keep WordPress, themes, and plugins updated

---

## WooCommerce Product Setup

### Product Categories Structure

```
Dashboard → Products → Categories
```

**Create these categories** (with hierarchical structure):

```
📁 Loose Diamonds (parent)
  ├── Round Cut
  ├── Princess Cut
  ├── Cushion Cut
  ├── Emerald Cut
  ├── Oval Cut
  ├── Pear Cut
  ├── Heart Cut
  └── Marquise Cut

📁 By Carat Weight (parent)
  ├── Under 0.50ct
  ├── 0.50 - 0.99ct
  ├── 1.00 - 1.49ct
  ├── 1.50 - 1.99ct
  ├── 2.00 - 2.99ct
  └── 3.00ct and Above

📁 By Color Grade (parent)
  ├── D-E (Colorless)
  ├── F-G (Near Colorless)
  └── H-I-J (Nearly Colorless)

📁 By Clarity (parent)
  ├── FL-IF (Flawless)
  ├── VVS1-VVS2 (Very Very Slightly Included)
  ├── VS1-VS2 (Very Slightly Included)
  └── SI1-SI2 (Slightly Included)

📁 Certified Diamonds (parent)
  ├── IGI Certified
  ├── GIA Certified
  └── Other Certifications

📁 Engagement Rings (parent)
📁 Wedding Bands (parent)
📁 Custom Jewelry (parent)
```

**For each category**:
- Add description (50-100 words)
- Upload category thumbnail image (500x500px)
- Set display type: Products
- Enable in menu: Yes

---

### Product Attributes Setup

```
Dashboard → Products → Attributes
```

**Create these global attributes**:

#### 1. Carat Weight
```
Name: Carat Weight
Slug: carat
Enable Archives: Yes
Type: Select

Terms (values):
0.25, 0.30, 0.40, 0.50, 0.60, 0.70, 0.75, 0.80, 0.90, 
1.00, 1.10, 1.20, 1.25, 1.30, 1.40, 1.50, 1.60, 1.70, 1.75, 1.80, 1.90,
2.00, 2.10, 2.20, 2.25, 2.30, 2.40, 2.50, 2.60, 2.70, 2.75, 2.80, 2.90,
3.00, 3.50, 4.00, 4.50, 5.00+
```

#### 2. Color Grade
```
Name: Color Grade
Slug: color
Enable Archives: Yes
Type: Select

Terms (values):
D, E, F, G, H, I, J, K
```

#### 3. Clarity Grade
```
Name: Clarity Grade
Slug: clarity
Enable Archives: Yes
Type: Select

Terms (values):
FL, IF, VVS1, VVS2, VS1, VS2, SI1, SI2
```

#### 4. Cut Quality
```
Name: Cut Quality
Slug: cut
Enable Archives: Yes
Type: Select

Terms (values):
Excellent, Very Good, Good, Fair, Poor
```

#### 5. Diamond Shape
```
Name: Diamond Shape
Slug: shape
Enable Archives: Yes
Type: Select

Terms (values):
Round, Princess, Cushion, Emerald, Oval, Pear, Heart, Marquise, Radiant, Asscher
```

#### 6. Certification
```
Name: Certification
Slug: certification
Enable Archives: Yes
Type: Select

Terms (values):
IGI, GIA, GCAL, Polikellet, Other, None
```

#### 7. Diamond Type
```
Name: Diamond Type
Slug: diamond-type
Enable Archives: Yes
Type: Select

Terms (values):
CVD, HPHT
```

#### 8. Polish
```
Name: Polish
Slug: polish
Enable Archives: Yes
Type: Select

Terms (values):
Excellent, Very Good, Good, Fair, Poor
```

#### 9. Symmetry
```
Name: Symmetry
Slug: symmetry
Enable Archives: Yes
Type: Select

Terms (values):
Excellent, Very Good, Good, Fair, Poor
```

#### 10. Fluorescence
```
Name: Fluorescence
Slug: fluorescence
Enable Archives: Yes
Type: Select

Terms (values):
None, Faint, Medium, Strong, Very Strong
```

---

### Sample Product Creation Template

**Example: 1.50 Carat Round CVD Diamond**

```
Dashboard → Products → Add New
```

#### Basic Information

**Product Name**:
```
1.50 Carat Round Lab Grown Diamond - D Color - VVS1 Clarity - IGI Certified
```

**Product Short Description** (100-150 words):
```
Exceptional 1.50 carat round brilliant cut lab-grown diamond with stunning D color and VVS1 clarity. 

This ethically created CVD diamond features an excellent cut grade, ensuring maximum brilliance and fire. Certified by IGI (International Gemological Institute) with detailed grading report included.

Perfect for custom engagement rings, fine jewelry, or as a standalone investment piece. Our lab-grown diamonds are chemically, physically, and optically identical to mined diamonds, offering superior value and environmental responsibility.

Certificate Number: IGI-123456789
Shape: Round Brilliant
Carat: 1.50ct
Color: D (Colorless)
Clarity: VVS1
Cut: Excellent
Polish: Excellent
Symmetry: Excellent
Fluorescence: None

100% conflict-free | Lifetime warranty | 30-day returns
```

**Full Product Description** (300-500 words):
```
## Stunning 1.50 Carat Lab-Grown Diamond

Discover the perfect balance of size, quality, and value with this magnificent 1.50 carat round brilliant cut lab-grown diamond. Created using advanced Chemical Vapor Deposition (CVD) technology, this diamond represents the pinnacle of modern gemology.

### The 4Cs Breakdown

**Carat Weight: 1.50ct**
At 1.50 carats, this diamond offers substantial presence without overwhelming the setting. It's the perfect size for a statement engagement ring or centerpiece jewelry.

**Color Grade: D (Colorless)**
D color is the highest grade on the diamond color scale. This diamond is completely colorless, allowing maximum light reflection and incredible brilliance.

**Clarity Grade: VVS1 (Very, Very Slightly Included)**
VVS1 clarity means inclusions are virtually impossible to see even under 10x magnification. This diamond is eye-clean with exceptional transparency.

**Cut Grade: Excellent**
The excellent cut grade ensures optimal light performance. Every facet is precisely angled to maximize brilliance, fire, and scintillation.

### CVD Technology Advantage

Our lab-grown diamonds are created using Chemical Vapor Deposition technology in controlled laboratory environments. This process results in:

- **Identical Properties**: Chemically, physically, and optically the same as mined diamonds
- **Superior Quality**: Fewer impurities and better clarity than most natural diamonds
- **Ethical Sourcing**: 100% conflict-free with transparent supply chain
- **Environmental Responsibility**: Minimal environmental impact compared to mining
- **Better Value**: 40-60% more affordable than equivalent mined diamonds

### Certification & Grading

Every diamond includes:
- IGI (International Gemological Institute) certification
- Detailed grading report with measurements
- Laser inscription with certificate number
- Sealed certificate packaging

### Perfect For

- Engagement ring centerpiece
- Custom jewelry design
- Diamond stud earrings
- Pendant or necklace
- Investment piece
- Anniversary gift

### Our Guarantee

- **Lifetime Warranty**: Against manufacturing defects
- **30-Day Returns**: No questions asked
- **Price Match**: We'll match any competitor's price
- **Expert Support**: Free consultation with our gemologists
- **Secure Shipping**: Fully insured delivery worldwide

### Technical Specifications

- Measurements: 7.32 x 7.35 x 4.55 mm
- Table %: 57.0%
- Depth %: 62.1%
- Crown Height: 15.5%
- Pavilion Depth: 43.0%
- Girdle: Medium, Faceted
- Culet: None
- Polish: Excellent
- Symmetry: Excellent
- Fluorescence: None

Transform your jewelry vision into reality with this exceptional lab-grown diamond.
```

#### Product Data Settings

**General Tab**:
- Regular price: ₹1,25,000 (or $1,500 USD)
- Sale price: (optional) ₹1,10,000
- SKU: `LGDC-RD-150-D-VVS1-001`

**Inventory Tab**:
- ✅ Manage stock
- Stock quantity: 1 (unique diamond)
- Allow backorders: Do not allow
- Stock status: In stock

**Shipping Tab**:
- Weight: 0.01 kg
- Dimensions: Leave blank (small item)
- Shipping class: Precious Items (create if needed)

**Attributes Tab**:
Add these attributes with values:
- Carat Weight: 1.50
- Color Grade: D
- Clarity Grade: VVS1
- Cut Quality: Excellent
- Diamond Shape: Round
- Certification: IGI
- Diamond Type: CVD
- Polish: Excellent
- Symmetry: Excellent
- Fluorescence: None

**Advanced Tab**:
- Purchase note: "This unique diamond comes with IGI certification and lifetime warranty."
- Enable reviews: ✅ Yes

#### Product Images

**Featured Image** (main product image):
- High-resolution front view
- Minimum: 1500x1500px
- Format: JPG or PNG

**Product Gallery** (4-8 images):
1. Top view (table)
2. Side view (profile)
3. Certificate image
4. 360° rotation (if available)
5. On hand reference (scale)
6. Close-up of facets
7. Certification logo
8. Packaging (optional)

#### Product Categories

Select applicable categories:
- [x] Loose Diamonds → Round Cut
- [x] By Carat Weight → 1.00 - 1.49ct
- [x] By Color Grade → D-E (Colorless)
- [x] By Clarity → VVS1-VVS2
- [x] Certified Diamonds → IGI Certified

#### Product Tags

Add relevant tags:
```
lab-grown, CVD, round diamond, 1.5 carat, D color, VVS1, IGI certified, 
engagement ring, ethical diamond, colorless, excellent cut
```

#### SEO Settings (Rank Math)

**Focus Keyword**: `1.50 carat lab grown diamond`

**SEO Title** (auto-generated or customize):
```
1.50 Carat Round Lab Grown Diamond - D/VVS1 - IGI Certified
```

**Meta Description**:
```
Stunning 1.50ct round lab-grown diamond with D color & VVS1 clarity. IGI certified, excellent cut. Ethical, affordable alternative to mined diamonds. Free shipping.
```

#### Featured Product

- [x] Mark as "Featured product" (for homepage display)

**Publish Product** ✅

---

### Bulk Product Import (Optional)

For importing multiple products:

1. **Export Sample CSV**
   ```
   Dashboard → Products → All Products
   Click "Export" button
   Download sample CSV
   ```

2. **Prepare Product Data**
   - Use CSV template
   - Add product data (name, price, SKU, attributes)
   - Include image URLs or upload images first

3. **Import Products**
   ```
   Dashboard → Products → All Products
   Click "Import" button
   Upload CSV file
   Map columns
   Import
   ```

**CSV Template Available**: `/wp-content/themes/astra-child/inventory-template.csv`

---

## Forms & Contact Setup

### Contact Page Setup

1. **Create Contact Page**
   ```
   Dashboard → Pages → Add New
   Title: "Contact Us"
   ```

2. **Add Contact Form Shortcode**
   ```
   Paste the shortcode from Contact Form 7:
   [contact-form-7 id="123" title="Contact Form"]
   ```

3. **Add Additional Content**
   ```html
   <div class="contact-info-section">
     <h2>Get in Touch</h2>
     <p>Have questions about our lab-grown diamonds? Our expert team is here to help.</p>
     
     <div class="contact-details">
       <div class="contact-item">
         <h3>📍 Location</h3>
         <p>
           Lab Grown Diamond CVD<br>
           [Your Address]<br>
           Jaipur, Rajasthan, India
         </p>
       </div>
       
       <div class="contact-item">
         <h3>📞 Phone</h3>
         <p><a href="tel:+919876543210">+91 98765 43210</a></p>
       </div>
       
       <div class="contact-item">
         <h3>✉️ Email</h3>
         <p><a href="mailto:info@labgrowndiamondcvd.com">info@labgrowndiamondcvd.com</a></p>
       </div>
       
       <div class="contact-item">
         <h3>⏰ Business Hours</h3>
         <p>
           Monday - Saturday: 10:00 AM - 7:00 PM<br>
           Sunday: Closed
         </p>
       </div>
     </div>
   </div>
   ```

4. **Publish Page**

### Newsletter Signup (Optional)

**Option 1: Use Contact Form 7**
```
Create simple newsletter form:
[email* your-email placeholder "Enter your email"]
[submit "Subscribe"]
```

**Option 2: Install Mailchimp Plugin**
```
Plugins → Add New → Search "Mailchimp for WordPress"
Install and configure with Mailchimp account
```

---

## Performance Optimization

### Performance Checklist

#### 1. Image Optimization
- [x] Smush installed and bulk optimization complete
- [x] WebP format enabled (if supported)
- [x] Lazy loading enabled (LiteSpeed Cache)
- [ ] All product images under 300KB
- [ ] Logo under 50KB

#### 2. Caching
- [x] LiteSpeed Cache configured
- [x] Browser caching enabled
- [x] Object caching enabled (if available)
- [x] Database cleanup scheduled

#### 3. CSS/JS Optimization
- [x] CSS minification enabled
- [x] JS minification enabled
- [ ] Remove unused CSS/JS (test carefully)
- [x] Defer non-critical JavaScript

#### 4. Database Optimization
- [x] Clean up post revisions (keep last 3)
- [x] Remove auto-drafts weekly
- [x] Clean transients regularly
- [ ] Optimize database tables monthly

#### 5. CDN Setup (Optional but Recommended)
- [ ] Hostinger CDN enabled (check with hosting)
- [ ] Or use Cloudflare free plan
- [ ] Configure CDN URL in LiteSpeed Cache

### Performance Testing Tools

**Run these tests after optimization**:

1. **Google PageSpeed Insights**
   ```
   URL: https://pagespeed.web.dev/
   Test: Homepage, Shop Page, Product Page
   Target: Desktop 90+, Mobile 80+
   ```

2. **GTmetrix**
   ```
   URL: https://gtmetrix.com/
   Test: Full page analysis
   Target: Grade A, Load time < 3s
   ```

3. **WebPageTest**
   ```
   URL: https://www.webpagetest.org/
   Test: Multiple locations
   Target: First Contentful Paint < 2s
   ```

### Core Web Vitals Targets

- **LCP (Largest Contentful Paint)**: < 2.5 seconds
- **FID (First Input Delay)**: < 100 milliseconds
- **CLS (Cumulative Layout Shift)**: < 0.1

---

## Security Hardening

### Security Checklist

#### 1. WordPress Core Security
- [x] WordPress updated to latest version
- [x] All plugins updated
- [x] All themes updated
- [x] Unused plugins deleted
- [x] Unused themes deleted

#### 2. Login Security
- [x] Wordfence installed and configured
- [x] 2FA enabled for admin accounts
- [ ] Change admin username from "admin"
- [ ] Strong passwords enforced (16+ characters)
- [x] Limit login attempts (via Wordfence)
- [ ] Change default WordPress login URL (optional)

#### 3. File Permissions
```bash
# Recommended file permissions
Directories: 755
Files: 644
wp-config.php: 400 or 440
```

**To set via SSH**:
```bash
cd /path/to/wordpress
find . -type d -exec chmod 755 {} \;
find . -type f -exec chmod 644 {} \;
chmod 400 wp-config.php
```

#### 4. Database Security
- [ ] Use strong database password
- [ ] Change database table prefix from wp_ to something unique
- [ ] Regular database backups (daily)

#### 5. SSL/HTTPS
- [x] SSL certificate installed
- [x] Force HTTPS (via hosting or plugin)
- [ ] Update URLs in database to HTTPS
- [ ] Check for mixed content warnings

**Force HTTPS in wp-config.php**:
```php
define('FORCE_SSL_ADMIN', true);
if (strpos($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') !== false)
    $_SERVER['HTTPS']='on';
```

#### 6. Backup Strategy

**Install Backup Plugin**:
```
Recommended: UpdraftPlus (free)
Plugins → Add New → Search "UpdraftPlus"
Install → Activate
```

**Backup Schedule**:
- Files: Weekly (Sundays 2:00 AM)
- Database: Daily (3:00 AM)
- Retention: Keep 4 weeks of backups
- Storage: Google Drive / Dropbox / S3

**Backup Configuration**:
```
Dashboard → UpdraftPlus → Settings
Include in backup:
  ✅ Plugins
  ✅ Themes
  ✅ Uploads
  ✅ Database
  ✅ Other WP directories

Remote Storage:
  Select: Google Drive or Dropbox
  Authenticate and select folder
```

#### 7. Regular Security Scans
- [x] Wordfence daily scans enabled
- [ ] Review security alerts weekly
- [ ] Update plugins/themes within 1 week of release
- [ ] Monitor 404 errors and suspicious activity

#### 8. Additional Security Measures
```php
// Add to wp-config.php (if not already present)

// Disable file editing from admin
define('DISALLOW_FILE_EDIT', true);

// Limit post revisions
define('WP_POST_REVISIONS', 3);

// Set auto-save interval
define('AUTOSAVE_INTERVAL', 300); // 5 minutes

// Increase memory limit if needed
define('WP_MEMORY_LIMIT', '256M');
```

---

## Verification Checklist

### Phase 1: Theme & Core Setup ✅

- [ ] WordPress updated to latest version
- [ ] Astra parent theme installed
- [ ] Astra Child theme activated
- [ ] Logo uploaded and visible
- [ ] Color scheme displaying correctly
- [ ] Typography (Playfair Display + Montserrat) loaded
- [ ] Homepage set to static page
- [ ] Mobile responsive test (320px, 768px, 1440px)
- [ ] Navigation menu works on desktop + mobile
- [ ] Footer displays correctly

### Phase 2: WooCommerce Setup ✅

- [ ] WooCommerce activated and setup wizard complete
- [ ] Store address configured (Jaipur, India)
- [ ] Currency set (INR or USD)
- [ ] Payment gateways configured
  - [ ] Razorpay (India)
  - [ ] Stripe (International)
  - [ ] PayPal (Optional)
- [ ] Shipping zones created
  - [ ] India zone with rates
  - [ ] International zone with rates
- [ ] Tax rates configured (GST for India)
- [ ] Product categories created (10+ categories)
- [ ] Product attributes created (10 attributes)
- [ ] At least 5 sample products published
- [ ] Products display correctly on shop page
- [ ] Add to cart functionality works
- [ ] Cart page displays correctly
- [ ] Checkout page loads without errors
- [ ] Test order completed successfully

### Phase 3: Plugin Configuration ✅

- [ ] Rank Math SEO
  - [ ] Setup wizard completed
  - [ ] Connected to Google Search Console
  - [ ] Sitemap generated and accessible
  - [ ] Schema markup enabled for products
  - [ ] Social profiles added
- [ ] LiteSpeed Cache
  - [ ] Cache enabled and working
  - [ ] CSS/JS minification enabled
  - [ ] Lazy loading enabled
  - [ ] Database cleanup scheduled
  - [ ] Cache cleared and regenerated
- [ ] Contact Form 7
  - [ ] Main contact form created
  - [ ] Form displays correctly
  - [ ] Email sending works (test submission)
  - [ ] Auto-reply email working
  - [ ] Flamingo storing submissions
- [ ] Smush Image Optimization
  - [ ] Bulk optimization completed
  - [ ] WebP enabled (if available)
  - [ ] Auto-compress new uploads enabled
- [ ] YITH Wishlist
  - [ ] Activated and configured
  - [ ] Add to wishlist button visible on products
  - [ ] Wishlist page functional
- [ ] Wordfence Security
  - [ ] Firewall learning mode active
  - [ ] Daily scans scheduled
  - [ ] 2FA enabled for admin
  - [ ] Login security configured

### Phase 4: Performance ✅

Run tests and verify:
- [ ] Google PageSpeed Desktop: 85+ score
- [ ] Google PageSpeed Mobile: 75+ score
- [ ] LCP (Largest Contentful Paint): < 3.0s
- [ ] FID (First Input Delay): < 100ms
- [ ] CLS (Cumulative Layout Shift): < 0.1
- [ ] No JavaScript console errors
- [ ] All images lazy loading
- [ ] WebP images serving (if enabled)

### Phase 5: Functionality Testing ✅

- [ ] Homepage loads without errors
- [ ] Shop page displays products correctly
- [ ] Product filtering works (by category, attributes)
- [ ] Single product page shows:
  - [ ] Product images (gallery)
  - [ ] Product specifications
  - [ ] Add to cart button
  - [ ] Related products
  - [ ] Wishlist button
- [ ] Search functionality works
- [ ] Contact form submits successfully
- [ ] Email notifications received
- [ ] Mobile navigation works
- [ ] WhatsApp button functional (if configured)

### Phase 6: Security ✅

- [ ] SSL certificate active (HTTPS)
- [ ] Admin username changed from "admin"
- [ ] Strong passwords set for all accounts
- [ ] 2FA enabled for admin accounts
- [ ] Wordfence firewall active
- [ ] Automatic backups scheduled
- [ ] Login attempts limited
- [ ] File permissions correct (755/644)
- [ ] wp-config.php secured (400 permission)
- [ ] Database prefix not wp_ (if changed)

### Phase 7: SEO & Marketing ✅

- [ ] Sitemap accessible: `yourdomain.com/sitemap_index.xml`
- [ ] Google Search Console connected
- [ ] Google Analytics connected (if using)
- [ ] Meta descriptions set for key pages
- [ ] Product schema markup present (test with Google Rich Results)
- [ ] Social sharing working (Facebook, Twitter, etc.)
- [ ] All images have alt text
- [ ] Permalinks set to "Post name" structure

---

## Troubleshooting

### Common Issues & Solutions

#### Issue 1: Theme Looks Broken

**Symptoms**: Missing styles, layout issues, no colors

**Solutions**:
1. Verify Astra parent theme is installed (not just activated)
2. Clear all caches:
   ```
   LiteSpeed Cache → Purge All
   Browser: Ctrl+Shift+R (hard refresh)
   ```
3. Check if custom CSS files are loading:
   ```
   Right-click page → Inspect Element → Network tab
   Look for 404 errors on CSS files
   ```
4. Verify file permissions:
   ```
   wp-content/themes/astra-child/ should be 755
   CSS files should be 644
   ```

#### Issue 2: WooCommerce Pages Not Found (404)

**Symptoms**: Shop, Cart, Checkout pages show 404 error

**Solutions**:
1. Flush permalinks:
   ```
   Settings → Permalinks
   Click "Save Changes" (don't change anything)
   ```
2. Verify WooCommerce pages exist:
   ```
   WooCommerce → Settings → Advanced → Page setup
   Re-create missing pages
   ```

#### Issue 3: Contact Form Not Sending Emails

**Symptoms**: Form submits but no emails received

**Solutions**:
1. Check spam folder first
2. Verify SMTP is configured correctly
3. Install SMTP plugin:
   ```
   Plugins → Add New → Search "WP Mail SMTP"
   Configure with Gmail or SendGrid
   ```
4. Test email functionality:
   ```
   Contact → Contact Forms → Select form → Mail tab
   Send test email
   ```
5. Check Flamingo inbox:
   ```
   Dashboard → Flamingo → Inbound Messages
   Submissions should appear here even if email fails
   ```

#### Issue 4: Images Not Optimizing

**Symptoms**: Smush not compressing images

**Solutions**:
1. Check image file permissions (should be 644)
2. Verify enough disk space available
3. Try manual optimization:
   ```
   Media → Library
   Click on image → Smush individual image
   ```
4. Check error log:
   ```
   Dashboard → Smush → View errors
   ```

#### Issue 5: Slow Website Performance

**Symptoms**: PageSpeed score below 70, slow loading

**Solutions**:
1. Clear all caches
2. Disable plugins one by one to identify issues
3. Check for large images:
   ```
   Media → Library → Filter by "Image"
   Sort by file size → Optimize large images
   ```
4. Enable additional caching:
   ```
   LiteSpeed Cache → Object Cache → Enable
   ```
5. Consider using CDN (Cloudflare free tier)

#### Issue 6: Products Not Showing on Shop Page

**Symptoms**: Shop page is empty or shows "No products found"

**Solutions**:
1. Verify products are published (not draft)
2. Check product visibility:
   ```
   Products → Edit product
   Product Data → Catalog visibility → "Shop and search"
   ```
3. Clear WooCommerce transients:
   ```
   WooCommerce → Status → Tools
   Clear transients
   ```
4. Rebuild product lookup tables:
   ```
   WooCommerce → Status → Tools
   Regenerate product lookup tables
   ```

#### Issue 7: Checkout Page Errors

**Symptoms**: Can't complete checkout, payment errors

**Solutions**:
1. Test with default theme (Twenty Twenty-Four):
   ```
   Appearance → Themes → Activate Twenty Twenty-Four
   Test checkout → Switch back to Astra Child
   ```
2. Check payment gateway settings
3. Verify SSL is active (https://)
4. Check for JavaScript errors:
   ```
   Right-click → Inspect → Console tab
   Fix any errors shown
   ```

#### Issue 8: Wishlist Button Not Appearing

**Symptoms**: No "Add to Wishlist" button on products

**Solutions**:
1. Verify YITH Wishlist is activated
2. Check plugin settings:
   ```
   YITH → Wishlist → Settings
   Show "Add to Wishlist" button → Enabled
   ```
3. Clear cache
4. Check for theme conflicts:
   ```
   Try temporarily with default theme
   ```

#### Issue 9: Security Scan Failures

**Symptoms**: Wordfence reports vulnerabilities

**Solutions**:
1. Update all plugins and themes immediately
2. Review specific vulnerability:
   ```
   Wordfence → Scan Results
   Read details and follow recommendations
   ```
3. Delete unused plugins and themes
4. Check for malware:
   ```
   Wordfence → Scan → Start New Scan
   ```

#### Issue 10: Mobile Display Issues

**Symptoms**: Site looks broken on mobile devices

**Solutions**:
1. Test responsive design:
   ```
   Chrome → F12 → Toggle device toolbar
   Test at 320px, 375px, 768px, 1024px
   ```
2. Check mobile CSS is loading:
   ```
   wp-content/themes/astra-child/assets/css/mobile-enhancements.css
   ```
3. Disable caching temporarily to test:
   ```
   LiteSpeed Cache → Settings → Cache → Disable
   Test mobile → Re-enable cache
   ```

---

## Next Steps After Setup

### 1. Content Creation (Week 1-2)

- [ ] Add 20-50 products with full specifications
- [ ] Upload high-quality product images
- [ ] Create educational blog posts
  - "What is CVD Diamond?"
  - "How to Choose a Diamond"
  - "CVD vs HPHT Comparison"
  - "Diamond Certification Guide"
- [ ] Create About Us page
- [ ] Create FAQ page
- [ ] Create Shipping & Returns policy
- [ ] Create Privacy Policy
- [ ] Create Terms & Conditions

### 2. Marketing Setup (Week 2-3)

- [ ] Install Google Analytics 4
- [ ] Install Facebook Pixel
- [ ] Set up Google Merchant Center (for Shopping ads)
- [ ] Create social media accounts:
  - Facebook Business Page
  - Instagram Business Account
  - LinkedIn Company Page
  - YouTube Channel
- [ ] Email marketing setup:
  - Install Mailchimp plugin
  - Create welcome email sequence
  - Create abandoned cart emails
- [ ] Set up WhatsApp Business

### 3. Advanced Features (Week 3-4)

- [ ] Create custom jewelry builder page (if not auto-created by theme)
- [ ] Set up B2B wholesale portal
- [ ] Configure tiered pricing for wholesale customers
- [ ] Add product comparison functionality
- [ ] Implement advanced product filters
- [ ] Create video content library
- [ ] Add testimonials section

### 4. Testing & Launch (Week 4-5)

- [ ] Comprehensive testing on all devices
- [ ] Test complete purchase flow
- [ ] Test email notifications
- [ ] Test payment gateways with real transactions (small amounts)
- [ ] Check for broken links
- [ ] Verify all forms work
- [ ] Performance testing and optimization
- [ ] Security audit
- [ ] Backup verification
- [ ] Soft launch to limited audience
- [ ] Gather feedback and make adjustments
- [ ] Official launch

### 5. Post-Launch Maintenance

**Daily**:
- Monitor orders and inquiries
- Respond to customer messages
- Check for security alerts

**Weekly**:
- Review analytics data
- Update product inventory
- Check for plugin updates
- Backup verification

**Monthly**:
- Performance audit
- SEO review
- Content updates
- Security scan
- Database optimization
- Update WordPress core, plugins, themes

---

## Support Resources

### Official Documentation
- **WordPress**: https://wordpress.org/documentation/
- **WooCommerce**: https://woocommerce.com/documentation/
- **Astra Theme**: https://wpastra.com/docs/
- **Rank Math**: https://rankmath.com/kb/
- **LiteSpeed Cache**: https://docs.litespeedtech.com/

### Community Support
- **WordPress Forums**: https://wordpress.org/support/
- **WooCommerce Forums**: https://wordpress.org/support/plugin/woocommerce/
- **Facebook Groups**: Search for "WordPress WooCommerce"
- **Reddit**: r/WordPress, r/WooCommerce

### Professional Help
For advanced customization or technical issues:
- **Hostinger Support**: Via hosting panel
- **WordPress Developers**: Upwork, Fiverr, Codeable
- **Theme Developer**: Contact if theme-specific issues

---

## Conclusion

This comprehensive guide covers the complete setup of a production-ready WordPress e-commerce platform for lab-grown diamond sales. Following these steps will result in:

✅ Professional jewelry e-commerce website  
✅ Fully functional WooCommerce store  
✅ Optimized performance (85+ PageSpeed)  
✅ Search engine optimized (Rank Math)  
✅ Secure and hardened (Wordfence + SSL)  
✅ Mobile-responsive design  
✅ Working contact forms  
✅ Image optimization  
✅ Automated backups  

**Estimated Time**: 20-30 hours total
**Cost**: $0-$200 (depending on premium plugins chosen)

**Remember**: Start with the free alternatives first, then upgrade to premium plugins as your business grows and revenue increases.

---

**Last Updated**: December 27, 2025  
**Version**: 1.0.0  
**Author**: WordPress E-Commerce Setup Team

For questions or support with this setup guide, contact your development team or refer to the support resources listed above.
