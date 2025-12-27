# Contact Form 7 Templates
## Lab Grown Diamond CVD

Quick reference for Contact Form 7 form templates.

---

## Main Contact Form (Recommended)

**Form Name**: Main Contact Form  
**Use Case**: General inquiries, product questions, custom design requests

### Form Template

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

### Mail Settings

**Mail Tab**:
```
To: [admin-email]
From: [your-name] <wordpress@yourdomain.com>
Subject: New Contact: [your-subject]
Additional Headers: Reply-To: [your-email]

Message Body:
From: [your-name]
Email: [your-email]
Phone: [your-phone]
Subject: [your-subject]

Message:
[your-message]

---
This email was sent from the contact form on Lab Grown Diamond CVD (https://yourdomain.com)
```

**Mail (2) - Customer Auto-Reply**:
```
✅ Use Mail (2)
To: [your-email]
From: Lab Grown Diamond CVD <noreply@yourdomain.com>
Subject: Thank you for contacting Lab Grown Diamond CVD

Message Body:
Hi [your-name],

Thank you for reaching out to Lab Grown Diamond CVD!

We have received your message regarding: [your-subject]

Our team will review your inquiry and respond within 24 hours during business hours (Monday-Saturday, 10 AM - 7 PM IST).

In the meantime, feel free to:
• Browse our diamond collection: https://yourdomain.com/shop/
• Read our diamond buying guide: https://yourdomain.com/education/
• View our certifications and guarantees: https://yourdomain.com/about/

If you have an urgent inquiry, please call us at +91 98765 43210.

Best regards,
Lab Grown Diamond CVD Team

---
This is an automated message. Please do not reply to this email.
For assistance, contact us at info@labgrowndiamondcvd.com
```

### Messages Tab
```
Message sent successfully: "Thank you for your message. We'll get back to you within 24 hours!"
Message failed to send: "There was an error sending your message. Please try again or email us directly at info@labgrowndiamondcvd.com"
Validation errors: "Please fill in the required fields correctly."
Spam detected: "Your message was flagged as spam. If this is an error, please contact us directly."
Email address invalid: "Please enter a valid email address."
Required field missing: "This field is required."
```

---

## Simple Newsletter Signup Form

**Form Name**: Newsletter Signup  
**Use Case**: Sidebar, footer, or popup newsletter subscription

### Form Template

```html
<div class="newsletter-form">
  <p class="newsletter-intro">Get exclusive diamond deals and education delivered to your inbox!</p>
  
  <label>Your Email
    [email* newsletter-email placeholder "Enter your email address"]
  </label>
  
  [honeypot honeypot-newsletter]
  [submit "Subscribe"]
  
  <p class="newsletter-privacy">We respect your privacy. Unsubscribe anytime.</p>
</div>
```

### Mail Settings

```
To: [admin-email]
From: Newsletter Signup <wordpress@yourdomain.com>
Subject: New Newsletter Subscriber

Message Body:
New newsletter signup:
Email: [newsletter-email]
Date: [_date] [_time]
```

### Additional Actions

Consider integrating with:
- Mailchimp for WordPress plugin
- Newsletter plugin
- Or manually export from Flamingo

---

## Quick Inquiry Form (Product Pages)

**Form Name**: Quick Product Inquiry  
**Use Case**: Embedded on product pages for specific product questions

### Form Template

```html
<div class="quick-inquiry-form">
  <h3>Ask About This Product</h3>
  
  <div class="form-group">
    [hidden product-name default:shortcode_attr]
    [hidden product-url default:shortcode_attr]
    
    <label>Your Name
      [text* inquiry-name placeholder "Your name"]
    </label>
  </div>
  
  <div class="form-group">
    <label>Your Email
      [email* inquiry-email placeholder "Your email"]
    </label>
  </div>
  
  <div class="form-group">
    <label>Phone (optional)
      [tel inquiry-phone placeholder "Your phone number"]
    </label>
  </div>
  
  <div class="form-group">
    <label>Your Question
      [textarea* inquiry-message placeholder "What would you like to know about this diamond?"]
    </label>
  </div>
  
  [honeypot honeypot-inquiry]
  [submit "Send Inquiry"]
</div>
```

### Usage on Product Page

Add this shortcode to product page template:
```php
<?php echo do_shortcode('[contact-form-7 id="456" title="Quick Inquiry" product-name="' . get_the_title() . '" product-url="' . get_permalink() . '"]'); ?>
```

---

## Custom Design Request Form

**Form Name**: Custom Jewelry Design Request  
**Use Case**: Dedicated custom design request page

### Form Template

```html
<div class="custom-design-form">
  <h2>Custom Jewelry Design Request</h2>
  <p>Tell us about your dream piece, and our designers will bring it to life!</p>
  
  <div class="form-row">
    <div class="form-col-half">
      <label>Your Name (required)
        [text* design-name placeholder "Your name"]
      </label>
    </div>
    <div class="form-col-half">
      <label>Your Email (required)
        [email* design-email placeholder "Your email"]
      </label>
    </div>
  </div>
  
  <div class="form-row">
    <div class="form-col-half">
      <label>Phone Number (required)
        [tel* design-phone placeholder "+91 98765 43210"]
      </label>
    </div>
    <div class="form-col-half">
      <label>Budget Range (INR)
        [select design-budget "₹25,000 - ₹50,000" "₹50,000 - ₹1,00,000" "₹1,00,000 - ₹2,00,000" "₹2,00,000 - ₹5,00,000" "₹5,00,000+"]
      </label>
    </div>
  </div>
  
  <div class="form-row">
    <label>Jewelry Type
      [select* design-type "Engagement Ring" "Wedding Band" "Necklace" "Earrings" "Bracelet" "Pendant" "Other"]
    </label>
  </div>
  
  <div class="form-row">
    <label>Preferred Diamond Shape
      [checkbox design-shape "Round" "Princess" "Cushion" "Emerald" "Oval" "Pear" "Heart" "Not Sure"]
    </label>
  </div>
  
  <div class="form-row">
    <label>Preferred Metal
      [checkbox design-metal "White Gold" "Yellow Gold" "Rose Gold" "Platinum" "Silver" "Not Sure"]
    </label>
  </div>
  
  <div class="form-row">
    <label>Design Inspiration/Details (required)
      [textarea* design-details placeholder "Describe your design vision, inspiration, or reference images you have in mind..." rows:8]
    </label>
  </div>
  
  <div class="form-row">
    <label>Upload Inspiration Images (optional)
      [file design-images limit:5242880 filetypes:jpg|jpeg|png|pdf]
    </label>
    <small>Max 5MB, formats: JPG, PNG, PDF</small>
  </div>
  
  <div class="form-row">
    <label>Timeline
      [select design-timeline "No Rush" "Within 2 Weeks" "Within 1 Month" "Within 3 Months" "Special Date (specify in notes)"]
    </label>
  </div>
  
  <div class="form-row">
    <label>Additional Notes
      [textarea design-notes placeholder "Any other details we should know?"]
    </label>
  </div>
  
  [honeypot honeypot-design]
  [submit "Submit Design Request"]
</div>
```

---

## Wholesale/B2B Inquiry Form

**Form Name**: B2B Wholesale Inquiry  
**Use Case**: Wholesale customer registration and inquiries

### Form Template

```html
<div class="b2b-inquiry-form">
  <h2>Wholesale Partnership Inquiry</h2>
  <p>Join our network of wholesale partners and access exclusive pricing and inventory.</p>
  
  <h3>Business Information</h3>
  
  <div class="form-row">
    <div class="form-col-half">
      <label>Business Name (required)
        [text* b2b-business placeholder "Your company name"]
      </label>
    </div>
    <div class="form-col-half">
      <label>Business Type
        [select* b2b-type "Retail Jewelry Store" "Online Retailer" "Jewelry Designer" "Wholesaler" "Manufacturer" "Other"]
      </label>
    </div>
  </div>
  
  <div class="form-row">
    <div class="form-col-half">
      <label>Years in Business
        [select b2b-years "Less than 1 year" "1-3 years" "3-5 years" "5-10 years" "10+ years"]
      </label>
    </div>
    <div class="form-col-half">
      <label>Tax ID / GST Number
        [text b2b-tax placeholder "GST/Tax ID"]
      </label>
    </div>
  </div>
  
  <h3>Contact Information</h3>
  
  <div class="form-row">
    <div class="form-col-half">
      <label>Contact Name (required)
        [text* b2b-name placeholder "Primary contact name"]
      </label>
    </div>
    <div class="form-col-half">
      <label>Title/Position
        [text b2b-title placeholder "Owner, Manager, etc."]
      </label>
    </div>
  </div>
  
  <div class="form-row">
    <div class="form-col-half">
      <label>Email (required)
        [email* b2b-email placeholder "Business email"]
      </label>
    </div>
    <div class="form-col-half">
      <label>Phone (required)
        [tel* b2b-phone placeholder "Business phone"]
      </label>
    </div>
  </div>
  
  <div class="form-row">
    <label>Business Address
      [textarea b2b-address placeholder "Complete business address"]
    </label>
  </div>
  
  <h3>Purchase Information</h3>
  
  <div class="form-row">
    <label>Expected Monthly Purchase Volume
      [select b2b-volume "Under $5,000" "$5,000 - $15,000" "$15,000 - $50,000" "$50,000 - $100,000" "$100,000+"]
    </label>
  </div>
  
  <div class="form-row">
    <label>Product Categories of Interest
      [checkbox b2b-interests "Loose Diamonds" "Engagement Rings" "Fine Jewelry" "Custom Designs" "All Products"]
    </label>
  </div>
  
  <div class="form-row">
    <label>How did you hear about us?
      [select b2b-source "Google Search" "Trade Show" "Referral" "Social Media" "Industry Publication" "Other"]
    </label>
  </div>
  
  <div class="form-row">
    <label>Additional Information
      [textarea b2b-notes placeholder "Tell us more about your business and requirements..."]
    </label>
  </div>
  
  [acceptance b2b-terms] I agree to the wholesale terms and conditions and authorize credit verification.
  
  [honeypot honeypot-b2b]
  [submit "Submit B2B Application"]
</div>
```

---

## Form Styling (CSS)

Add this to your theme's custom CSS or style.css:

```css
/* Contact Form 7 Custom Styling */
.contact-form-grid,
.newsletter-form,
.quick-inquiry-form,
.custom-design-form,
.b2b-inquiry-form {
  max-width: 800px;
  margin: 0 auto;
}

.form-row {
  margin-bottom: 20px;
  display: flex;
  gap: 15px;
  flex-wrap: wrap;
}

.form-col-half {
  flex: 1;
  min-width: 280px;
}

.form-input,
.form-select,
.form-textarea,
.wpcf7-form-control.wpcf7-text,
.wpcf7-form-control.wpcf7-email,
.wpcf7-form-control.wpcf7-tel,
.wpcf7-form-control.wpcf7-select,
.wpcf7-form-control.wpcf7-textarea {
  width: 100%;
  padding: 12px 15px;
  border: 1px solid #ddd;
  border-radius: 4px;
  font-size: 16px;
  transition: border-color 0.3s ease;
}

.form-input:focus,
.form-select:focus,
.form-textarea:focus,
.wpcf7-form-control:focus {
  outline: none;
  border-color: #2962FF;
  box-shadow: 0 0 0 3px rgba(41, 98, 255, 0.1);
}

.wpcf7-form label {
  display: block;
  margin-bottom: 8px;
  font-weight: 500;
  color: #212121;
}

.wpcf7-submit,
.btn-primary {
  background-color: #2962FF;
  color: #ffffff;
  padding: 14px 32px;
  border: none;
  border-radius: 4px;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
  transition: background-color 0.3s ease;
  width: auto;
  display: inline-block;
}

.wpcf7-submit:hover,
.btn-primary:hover {
  background-color: #0D47A1;
}

.wpcf7-not-valid-tip {
  color: #d32f2f;
  font-size: 14px;
  margin-top: 5px;
}

.wpcf7-response-output {
  margin: 20px 0;
  padding: 15px;
  border-radius: 4px;
}

.wpcf7-mail-sent-ok {
  background-color: #e8f5e9;
  color: #2e7d32;
  border: 1px solid #81c784;
}

.wpcf7-validation-errors,
.wpcf7-mail-sent-ng {
  background-color: #ffebee;
  color: #c62828;
  border: 1px solid #ef5350;
}

/* Newsletter form specific */
.newsletter-form {
  background: #f5f5f5;
  padding: 30px;
  border-radius: 8px;
  text-align: center;
}

.newsletter-intro {
  font-size: 18px;
  margin-bottom: 20px;
  color: #212121;
}

.newsletter-privacy {
  font-size: 12px;
  color: #666;
  margin-top: 10px;
}

/* Mobile responsive */
@media (max-width: 768px) {
  .form-row {
    flex-direction: column;
    gap: 0;
  }
  
  .form-col-half {
    min-width: 100%;
  }
}
```

---

## Installation Instructions

1. **Install Contact Form 7**
   ```
   Dashboard → Plugins → Add New → Search "Contact Form 7"
   Install → Activate
   ```

2. **Install Addons**
   - Flamingo (submission storage)
   - Contact Form 7 Honeypot (spam protection)

3. **Create Form**
   ```
   Dashboard → Contact → Add New
   Copy template from above
   Paste into form editor
   Configure mail settings
   Save
   ```

4. **Get Shortcode**
   ```
   Copy shortcode shown after saving
   Example: [contact-form-7 id="123" title="Contact Form"]
   ```

5. **Embed in Page**
   ```
   Dashboard → Pages → Edit page
   Paste shortcode where you want form
   Publish
   ```

---

## Testing Checklist

- [ ] Form displays correctly on page
- [ ] All fields validate properly
- [ ] Required fields marked with *
- [ ] Spam protection active (honeypot)
- [ ] Email sends to admin
- [ ] Auto-reply sends to customer
- [ ] Submissions stored in Flamingo
- [ ] Success message displays after submission
- [ ] Error messages display correctly
- [ ] Mobile responsive
- [ ] reCAPTCHA working (if added)

---

**Last Updated**: December 27, 2025  
**Version**: 1.0.0  
**Plugin**: Contact Form 7
