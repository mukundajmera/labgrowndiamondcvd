# Assets Guide - LGD Luxury Theme

## Required Images

Upload the following images to complete the homepage design:

### 1. Hero Background Image

**Location**: `/wp-content/themes/lgd-luxury/assets/images/hero-bg.jpg`

**Specifications**:
- **Format**: JPG or PNG
- **Dimensions**: 1920x1080px (minimum)
- **Aspect Ratio**: 16:9
- **File Size**: Under 500KB (optimized)
- **Content**: High-quality lab-grown diamond or luxury jewelry showcase
- **Important**: Image should work well with dark gradient overlay (navy, 40-70% opacity)

**How to Add**:
After uploading the image, add this CSS to your style.css or use WordPress Customizer:

```css
.hero-bg {
    background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/hero-bg.jpg');
}
```

### 2. Category Images

#### Engagement Rings
**Location**: `/wp-content/themes/lgd-luxury/assets/images/engagement-rings.jpg`

**Specifications**:
- **Format**: JPG
- **Dimensions**: 800x1000px (portrait) for large item
- **File Size**: Under 300KB
- **Content**: Showcase of engagement rings on elegant background

#### Fine Jewelry
**Location**: `/wp-content/themes/lgd-luxury/assets/images/fine-jewelry.jpg`

**Specifications**:
- **Format**: JPG
- **Dimensions**: 800x400px (landscape)
- **File Size**: Under 200KB
- **Content**: Fine jewelry pieces (necklaces, earrings, bracelets)

#### Loose Stones
**Location**: `/wp-content/themes/lgd-luxury/assets/images/loose-stones.jpg`

**Specifications**:
- **Format**: JPG
- **Dimensions**: 800x400px (landscape)
- **File Size**: Under 200KB
- **Content**: Loose lab-grown diamonds on premium backdrop

---

## Placeholder Images (Optional)

If you don't have final images ready, you can use these free stock photo sources:

1. **Unsplash**: https://unsplash.com/s/photos/diamond
2. **Pexels**: https://www.pexels.com/search/diamond/
3. **Pixabay**: https://pixabay.com/images/search/diamond/

**Search Terms**:
- "lab grown diamond"
- "engagement ring luxury"
- "fine jewelry"
- "loose diamond"
- "luxury jewelry display"

---

## Image Optimization

Before uploading, optimize your images:

1. **Compress**: Use TinyPNG (https://tinypng.com/) or ImageOptim
2. **Resize**: Use exact dimensions specified above
3. **Format**: JPG for photos, PNG only if transparency needed
4. **Quality**: 80-85% JPG quality is optimal

---

## CSS Background Image Setup

### Option 1: Direct in PHP Template (Recommended)

Edit `front-page.php` line 21:

```php
<div class="hero-bg" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/hero-bg.jpg');"></div>
```

### Option 2: In style.css

Add to your `style.css`:

```css
.hero-bg {
    background-image: url('./assets/images/hero-bg.jpg');
}
```

### Option 3: Via WordPress Customizer

Create a customizer option to allow users to upload hero image via admin panel.

---

## Testing Checklist

After adding images:

- [ ] Hero image loads and covers full viewport
- [ ] Text is readable over hero image (check gradient overlay)
- [ ] Category images load in mosaic grid
- [ ] Hover zoom effect works on category items
- [ ] Images are optimized (page load under 3 seconds)
- [ ] Mobile responsive (images scale properly)

---

## Troubleshooting

### Image Not Showing

1. **Check file path**: Ensure images are in `/wp-content/themes/lgd-luxury/assets/images/`
2. **Check file names**: Names must match exactly (case-sensitive)
3. **Check permissions**: Files should have 644 permissions
4. **Clear cache**: Clear browser cache and WordPress cache plugins
5. **Check console**: Open browser DevTools for 404 errors

### Image Quality Issues

- Ensure images meet minimum dimensions
- Check JPG compression level (should be 80-85%)
- Verify correct color profile (sRGB)

---

## Alternative: Using Existing Images

If you want to use images from the `astra-child` theme:

You can copy images from:
`/wp-content/themes/astra-child/assets/images/`

**Available images**:
- `hero/hero-bg.png` (596KB) - Can be used as hero background
- `categories/engagement-rings.png` (539KB)
- `categories/jewelry.png` (672KB)
- `categories/loose-diamonds.png` (754KB)

**To use them**, update the paths in `front-page.php`:

```php
// Change from:
url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/hero-bg.jpg')

// To:
url('<?php echo get_template_directory_uri(); ?>/../astra-child/assets/images/hero/hero-bg.png')
```

Or copy the files to lgd-luxury theme directory.

---

## Future Enhancements

- Add image lazy loading for performance
- Implement WebP format with JPG fallback
- Add srcset for responsive images
- Consider CDN for image delivery

---

For questions or issues, refer to the main README.md file.
