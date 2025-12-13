# Hero Assets for Luxury Homepage

## Current Implementation: Static Image

The homepage currently uses a **static background image** for the hero section instead of a video for better performance and immediate availability.

**Current File:** `/wp-content/themes/astra-child/assets/images/hero/hero-bg.png`

### Image Specifications:
- **Format:** PNG or JPG
- **Resolution:** 1920x1080 (Full HD) minimum
- **Aspect Ratio:** 16:9
- **File Size:** Optimized for web (under 1MB recommended)
- **Content:** High-quality diamond showcase or luxury aesthetic
- **Important:** Ensure good contrast for white text overlay readability

---

## Optional: Upgrade to Video (Future Enhancement)

If you want to upgrade to a video background in the future:

**File Name:** `hero-diamond.mp4`

**Location:** `/wp-content/themes/astra-child/assets/videos/hero-diamond.mp4`

### Video Specifications:
- **Format:** MP4 (H.264 codec recommended)
- **Resolution:** 1920x1080 (Full HD) minimum
- **Aspect Ratio:** 16:9
- **Duration:** 10-30 seconds (looping video)
- **File Size:** Optimized for web (under 5MB recommended)
- **Content:** Showcasing lab-grown diamonds with luxury aesthetic
- **Audio:** Not required (video will be muted)

### To Switch to Video:
Modify `front-page.php` hero section to replace the background-image with a video element:

```php
<div class="luxury-hero__video-container">
    <video class="luxury-hero__video" autoplay muted loop playsinline>
        <source src="<?php echo get_stylesheet_directory_uri(); ?>/assets/videos/hero-diamond.mp4" type="video/mp4">
    </video>
    <div class="luxury-hero__overlay"></div>
</div>
```

And update CSS to restore video-specific styles.
