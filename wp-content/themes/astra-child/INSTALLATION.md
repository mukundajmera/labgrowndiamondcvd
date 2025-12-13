# Installation & Setup Guide
## Astra Child Theme - Lab Grown Diamond CVD

This guide will help you activate and configure the Lab Grown Diamond CVD ecommerce theme.

---

## Prerequisites

Before installing the theme, ensure you have:

1. **WordPress** 5.3 or higher installed
2. **Astra parent theme** installed and activated
3. **WooCommerce plugin** installed and activated
4. **PHP** 7.4 or higher
5. Admin access to your WordPress installation

---

## Step 1: Theme Activation

1. Log in to your WordPress admin dashboard
2. Navigate to **Appearance > Themes**
3. Locate **Astra Child - Lab Grown Diamond CVD**
4. Click **Activate**

✅ **The theme is now active!**

---

## Step 2: Required Plugin Setup

### Install WooCommerce (Required)

1. Go to **Plugins > Add New**
2. Search for "WooCommerce"
3. Click **Install Now**, then **Activate**
4. Follow the WooCommerce setup wizard to configure:
   - Store details (address, currency)
   - Payment gateways
   - Shipping options
   - Tax settings

### Recommended Plugins

Install these for optimal functionality:

- **Hostinger AI Assistant** - For AI-powered content generation
- **All in One SEO Pack** - For SEO optimization
- **Google Site Kit** - For analytics
- **WPForms Lite** - For contact forms
- **LiteSpeed Cache** - For performance optimization

---

## Step 3: Theme Configuration

### A. Color Scheme (Already Configured)

The theme uses these colors automatically:
- Navy Blue: `#0D47A1` (CTAs, trust elements)
- Cobalt Blue: `#2962FF` (Interactive elements)
- Charcoal Black: `#212121` (Headers, footer)
- Pure White: `#FFFFFF` (Backgrounds)
- Light Grey: `#F5F5F5` (Cards, panels)

### B. Customizer Settings

1. Go to **Appearance > Customize > Diamond Theme Settings**

2. Configure the following:

   **WhatsApp Integration:**
   - WhatsApp Number: Enter your business WhatsApp number with country code
     Example: `1234567890` (without + or spaces)

   **Trust Banner:**
   - Enable/Disable the trust banner at the top of the site
   - Default: Enabled

   **Hero Section:**
   - Hero Video URL: Upload or enter URL for background video
     Recommended: MP4 format, 1920x1080, under 5MB
   - Hero Headline: Customize the main headline
     Default: "Ethical Brilliance, Lab-Perfected"

3. Click **Publish** to save changes

---

## Step 4: Set Up Homepage

### Create Homepage Content

1. Go to **Pages > Add New**
2. Title: "Home" (or any name you prefer)
3. **Important**: Leave the content area empty - the theme handles the layout
4. Publish the page

### Set as Front Page

1. Go to **Settings > Reading**
2. Select "A static page" for "Your homepage displays"
3. Choose your newly created "Home" page
4. Click **Save Changes**

✅ **Your custom homepage is now live!**

---

## Step 5: Configure Products

### Add Diamond Products

1. Go to **Products > Add New**
2. Enter product details (name, description, price)
3. Add product images (recommended: 800x800px minimum)
4. Scroll down to **Diamond Specifications** meta box
5. Fill in diamond details:
   - Shape (Round, Princess, Cushion, etc.)
   - Carat weight (e.g., 1.50)
   - Color grade (D-K)
   - Clarity grade (IF-SI2)
   - Cut quality (Excellent, Very Good, Good)
   - Polish, Symmetry, Fluorescence
   - Table %, Depth %
   - Measurements (e.g., 6.50 x 6.48 x 4.01)
   - Certification (GIA or IGI)
   - Certificate Number

6. Set featured image and product gallery
7. Mark as **Featured** for homepage display
8. Publish product

### Product Categories

Create categories for better organization:
- **Loose Diamonds** - Individual stones
- **Engagement Rings** - Ready-made rings
- **Custom Jewelry** - Made-to-order pieces
- **By Shape** - Round, Princess, etc.
- **By Carat** - Under 1ct, 1-2ct, 2ct+

---

## Step 6: B2B Wholesale Setup

### Enable B2B Features

B2B customers register through the standard WooCommerce registration but need admin approval.

### Approve B2B Customers

1. Go to **Users > All Users**
2. Click **Edit** on the user
3. Scroll to **Custom Fields** section
4. Add these meta fields:
   - `b2b_approval_status` = `approved`
   - `b2b_pricing_tier` = `bronze` (or silver, gold, platinum)
   - `b2b_credit_limit` = `10000` (optional)
   - `b2b_account_manager` = `John Doe` (optional)

5. Click **Update User**

### Pricing Tiers

- **Bronze**: 5% discount, $5,000+ annual purchases
- **Silver**: 10% discount, $15,000+ annual purchases
- **Gold**: 15% discount, $50,000+ annual purchases
- **Platinum**: 20% discount, $100,000+ annual purchases

---

## Step 7: Create Essential Pages

### Educational Content

1. Go to **Education > Add New**
2. Create articles like:
   - "Lab-Grown Diamond Buying Guide"
   - "CVD vs HPHT Comparison"
   - "Diamond 4Cs Explained"
   - "How to Choose the Perfect Diamond"
3. Assign to appropriate categories

### Video Library

1. Go to **Videos > Add New**
2. Add video details:
   - Title
   - Description
   - Video URL (YouTube, Vimeo, or direct)
   - Duration
3. Publish

### Testimonials

1. Go to **Testimonials > Add New**
2. Enter customer review in the content area
3. Fill in testimonial details:
   - Customer Name
   - Location
   - Rating (1-5 stars)
   - Purchase Date
   - Product Purchased
   - Video URL (optional)
4. Publish

---

## Step 8: Configure Menus

### Create Navigation Menus

1. Go to **Appearance > Menus**

2. Create these menus:

   **Primary Menu (Main Navigation):**
   - Home
   - Shop Diamonds
     - By Shape (submenu)
     - By Carat (submenu)
     - By Price (submenu)
   - Custom Jewelry Builder
   - Education
   - About Us
   - Contact

   **Footer Menus:**
   Create 4 separate menus for footer columns:
   - Footer Menu 1 - About (Our Story, How It Works, Sustainability)
   - Footer Menu 2 - Education (Diamond Guide, CVD Process, FAQs)
   - Footer Menu 3 - Customer Service (Contact, Shipping, Returns, Warranty)
   - Footer Menu 4 - B2B Portal (Wholesale Login, Become a Partner, Resources)

3. Assign menus to locations in **Menu Settings**

---

## Step 9: Additional Configuration

### Permalinks

1. Go to **Settings > Permalinks**
2. Select "Post name" structure
3. Click **Save Changes**

This creates SEO-friendly URLs like:
- `/shop/round-diamond-1-5ct/`
- `/education/lab-grown-guide/`

### WooCommerce Settings

**Products Tab:**
- Shop page: Create and select
- Add to cart behavior: Configure as needed
- Measurements: Set weight/dimension units

**Tax:**
- Enable/disable as needed for your region

**Shipping:**
- Set up shipping zones and methods
- Add free shipping for orders over a threshold

**Payments:**
- Configure payment gateways (Stripe, PayPal, etc.)
- Enable necessary payment methods

---

## Step 10: Testing

### Test Core Functionality

1. **Homepage**: Verify all sections display correctly
2. **Diamond Search**: Test filtering and search functionality
3. **Product Pages**: Check specifications display correctly
4. **Shopping Cart**: Add products and test checkout
5. **B2B Portal**: Log in as approved B2B user
6. **Mobile**: Test on various mobile devices
7. **Forms**: Test contact forms and newsletter signup

### Performance Testing

1. Use Google PageSpeed Insights
2. Target score: 95+ on desktop, 85+ on mobile
3. Enable caching plugins if needed

---

## Step 11: Launch Checklist

Before going live:

- [ ] All products added with specifications
- [ ] Homepage configured and displaying correctly
- [ ] Navigation menus set up
- [ ] Contact information updated
- [ ] Payment gateways tested
- [ ] Shipping methods configured
- [ ] SSL certificate installed (HTTPS)
- [ ] Privacy Policy page created
- [ ] Terms & Conditions page created
- [ ] Return Policy page created
- [ ] Google Analytics configured
- [ ] Backup system in place
- [ ] Mobile responsiveness tested
- [ ] Cross-browser compatibility checked
- [ ] SEO settings configured

---

## Troubleshooting

### Theme Not Showing Properly

**Issue**: Theme looks broken or unstyled

**Solution**:
1. Ensure Astra parent theme is installed
2. Go to **Appearance > Themes**
3. Verify "Astra" is present (not activated, just present)
4. Clear cache (browser and any caching plugins)

### Diamond Specifications Not Appearing

**Issue**: Meta box doesn't show when editing products

**Solution**:
1. Click "Screen Options" at top of edit page
2. Ensure "Diamond Specifications" is checked
3. Scroll down to find the meta box

### B2B Dashboard Not Visible

**Issue**: B2B customer can't see dashboard

**Solution**:
1. Verify user meta fields are set correctly
2. Check `b2b_approval_status` = `approved`
3. User must be logged in
4. Check user role is not "Subscriber"

### WhatsApp Button Not Appearing

**Issue**: WhatsApp button missing

**Solution**:
1. Go to **Appearance > Customize > Diamond Theme Settings**
2. Enter WhatsApp number (with country code, no + or spaces)
3. Click Publish
4. Clear cache

---

## Support & Resources

### Documentation

- Full documentation: See README.md in theme folder
- WooCommerce docs: https://woocommerce.com/documentation/
- Astra docs: https://wpastra.com/docs/

### Getting Help

If you encounter issues:

1. Check WordPress error log: `/wp-content/debug.log`
2. Enable WP_DEBUG in `wp-config.php`:
   ```php
   define('WP_DEBUG', true);
   define('WP_DEBUG_LOG', true);
   ```
3. Review browser console for JavaScript errors
4. Verify all required plugins are active

### Best Practices

- **Backup regularly**: Use a backup plugin or hosting backup
- **Update carefully**: Test updates on staging site first
- **Child theme modifications**: Keep customizations in child theme
- **Performance**: Use caching and optimize images
- **Security**: Keep WordPress, themes, and plugins updated

---

## Next Steps

1. **Add Content**: Start adding products and educational content
2. **Marketing**: Set up Google Analytics and Facebook Pixel
3. **Email Marketing**: Integrate with Mailchimp or Klaviyo
4. **Social Media**: Connect Instagram for social proof
5. **SEO**: Optimize meta descriptions and titles
6. **Testing**: Thoroughly test all features before launch

---

## Version History

- **1.0.0** (2024) - Initial release
  - Complete diamond ecommerce functionality
  - B2B portal with tiered pricing
  - Custom jewelry builder
  - Mobile-first responsive design
  - Trust and conversion elements

---

**Need additional customization?** The theme is fully customizable through WordPress Customizer and standard WordPress/WooCommerce hooks.

**Ready to launch?** Your premium lab-grown diamond ecommerce platform is set up and ready to sell!
