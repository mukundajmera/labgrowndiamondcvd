# LGD Luxury Child Theme

World-class minimalist luxury child theme for Lab-Grown CVD Diamonds. Premium design inspired by James Allen and Vrai.

## Theme Information

- **Theme Name**: LGD Luxury - Lab Grown Diamond
- **Parent Theme**: Astra
- **Version**: 1.0.0
- **Author**: Lab Grown Diamond CVD

## Design System

### Color Palette (CSS Variables)

- `--navy: #001f3f` - Primary Brand
- `--cobalt: #0047AB` - Call to Actions
- `--platinum: #F5F5F5` - Backgrounds
- `--white: #ffffff` - White
- `--gold: #D4AF37` - Accents/Borders

### Typography

- **Headings**: Playfair Display (Serif) - Weights: 400, 700
- **Body**: Montserrat (Sans-Serif) - Weights: 300, 400, 500, 600

### Spacing

- Luxury whitespace: 80px+ vertical padding
- Section spacing: 100px

## Features

### Homepage (front-page.php)

1. **Hero Section (Static)**
   - Full viewport height (90vh minimum)
   - Background image with gradient overlay
   - Centered headline and subtext
   - Dual CTAs (Primary: Cobalt, Secondary: White outline)

2. **Diamond Hunt Widget**
   - Overlapping design (-50px margin)
   - 4 filter placeholders: SHAPE, CARAT, COLOR, PRICE
   - Search button
   - Ready for plugin integration

3. **Trust Indicators**
   - 3-column grid layout
   - SVG icons for: Certified, 360° Inspection, Lifetime Warranty
   - Responsive design

4. **Category Mosaic**
   - Bento box / 2x2 grid layout
   - Hover zoom effect (scale 1.05)
   - Categories: Engagement Rings (large), Fine Jewelry, Loose Stones

### WooCommerce Customizations

- Removed sorting dropdown from shop page
- Removed result count
- 3 columns on desktop, 2 on mobile
- Price moved below product title
- "Add to Cart" changed to "View Details" for variable products

### Theme Modifications

- **Sidebar Removal**: Default Astra sidebar removed from all pages
- **WooCommerce Support**: Full WooCommerce integration
- **Responsive Design**: Mobile-first approach

## Installation

1. Upload the `lgd-luxury` folder to `/wp-content/themes/`
2. Activate the theme in WordPress admin
3. Ensure Astra theme is installed (parent theme)

## Required Assets

Add the following images to `/wp-content/themes/lgd-luxury/assets/images/`:

- `hero-bg.jpg` - Hero section background (recommended: 1920x1080)
- `engagement-rings.jpg` - Engagement rings category image
- `fine-jewelry.jpg` - Fine jewelry category image
- `loose-stones.jpg` - Loose stones category image

### Adding Hero Background Image

Update the `.hero-bg` class in your child theme or use inline styles:

```css
.hero-bg {
    background-image: url('path/to/your/hero-image.jpg');
}
```

Or add via customizer/inline style in front-page.php.

## Customization

### Modifying Colors

Edit CSS variables in `style.css`:

```css
:root {
    --navy: #001f3f;
    --cobalt: #0047AB;
    --platinum: #F5F5F5;
    --white: #ffffff;
    --gold: #D4AF37;
}
```

### Modifying Typography

Update font imports and variables in `style.css`:

```css
@import url('https://fonts.googleapis.com/css2?family=Your+Font:wght@weights&display=swap');

:root {
    --font-heading: 'Your Font', serif;
    --font-body: 'Your Font', sans-serif;
}
```

## File Structure

```
lgd-luxury/
├── assets/
│   └── images/
│       ├── hero-bg.jpg (to be added)
│       ├── engagement-rings.jpg (to be added)
│       ├── fine-jewelry.jpg (to be added)
│       └── loose-stones.jpg (to be added)
├── woocommerce/
│   └── archive-product.php
├── front-page.php
├── functions.php
├── style.css
└── README.md
```

## Browser Support

- Modern browsers (Chrome, Firefox, Safari, Edge - last 2 versions)
- Mobile responsive
- CSS Grid and Flexbox support required

## Credits

- Parent Theme: [Astra](https://wpastra.com/)
- Fonts: Google Fonts (Playfair Display, Montserrat)

## License

GNU General Public License v2 or later
