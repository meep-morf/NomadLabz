# NomadLabz WordPress Theme

A modern, premium WordPress theme for NomadLabz software solutions company. Features futuristic design with neon mint accents, smooth animations, and headless-ready architecture optimized for Vercel deployment.

## Features

- 🎨 **Modern Design**: Futuristic, clean, high-tech aesthetic with neon mint (#4bffb9) primary color
- ⚡ **Performance Optimized**: Lightweight animations, optimized for Core Web Vitals
- 📱 **Fully Responsive**: Mobile-first design approach
- ♿ **Accessibility Compliant**: WCAG basics implemented
- 🎭 **Smooth Animations**: GSAP-powered animations with scroll triggers
- 🛠️ **Custom Post Types**: Services and Solutions post types included
- 🎛️ **Theme Customizer**: Easy customization of colors and logo
- 🚀 **Vercel Ready**: Optimized for serverless deployment

## Theme Structure

```
nomadlabz-theme/
├── assets/
│   ├── css/
│   │   ├── input.css       # Tailwind CSS source
│   │   └── style.css       # Compiled CSS (generated)
│   ├── js/
│   │   └── main.js         # Theme JavaScript
│   └── images/
│       └── logo.svg        # Default logo
├── template-parts/
│   └── content-none.php    # No content template
├── functions.php            # Theme functions
├── header.php              # Header template
├── footer.php              # Footer template
├── index.php               # Main template
├── page.php                # Page template
├── page-home.php           # Home page template
├── page-services.php       # Services page template
├── page-solutions.php      # Solutions page template
├── page-about.php          # About page template
├── page-contact.php        # Contact page template
├── style.css               # Theme stylesheet (header)
├── tailwind.config.js      # Tailwind configuration
├── postcss.config.js       # PostCSS configuration
└── package.json            # Node dependencies
```

## Installation

### Prerequisites

- WordPress 6.0 or higher
- PHP 8.0 or higher
- Node.js 16+ and npm (for building CSS)

### Setup Steps

1. **Upload Theme**
   - Upload the `nomadlabz-theme` folder to `/wp-content/themes/`
   - Or use WordPress admin: Appearance > Themes > Add New > Upload Theme

2. **Install Dependencies**
   ```bash
   cd wp-content/themes/nomadlabz-theme
   npm install
   ```

3. **Build CSS**
   ```bash
   npm run build:css
   ```
   For development with auto-rebuild:
   ```bash
   npm run watch:css
   ```

4. **Activate Theme**
   - Go to WordPress admin: Appearance > Themes
   - Activate "NomadLabz"

5. **Configure Menu**
   - Go to Appearance > Menus
   - Create a new menu with your pages (Home, Services, Solutions, About, Contact)
   - Assign to "Primary Menu" location

6. **Set Up Pages**
   - Create the following pages:
     - Home (use "Home Page" template)
     - Services (use "Services Page" template)
     - Solutions (use "Solutions Page" template)
     - About (use "About Us Page" template)
     - Contact (use "Contact Page" template)
   - Set Home page as your homepage in Settings > Reading

7. **Customize Theme**
   - Go to Appearance > Customize
   - Upload your logo
   - Adjust primary color if needed

## Page Templates

### Home Page
- Hero section with animated logo and CTA buttons
- Services overview (cards)
- Why Choose Us section
- Technology Stack grid
- Process Flow timeline
- Call-to-action banner

### Services Page
- Grid of service cards
- Each service shows: description, use cases, tech stack
- Custom post type: `service`

### Solutions Page
- Industry-based solutions
- Each solution card with features
- Custom post type: `solution`

### About Us Page
- Vision & Mission
- Focus areas
- Animated statistics
- Company values

### Contact Page
- Google Form embed (update URL in template)
- Contact information
- Custom form fallback

## Custom Post Types

### Services
- **Post Type**: `service`
- **Fields**:
  - Title (default)
  - Content/Description (default)
  - Featured Image (default)
  - Custom Fields (optional):
    - `service_icon` - Emoji or icon code
    - `use_cases` - Newline-separated list
    - `tech_stack` - Comma-separated list

### Solutions
- **Post Type**: `solution`
- **Fields**:
  - Title (default)
  - Content/Description (default)
  - Featured Image (default)

## Customization

### Changing Colors

1. **Via Theme Customizer** (Recommended):
   - Go to Appearance > Customize > Colors
   - Adjust "Primary Color (Neon Mint)"

2. **Via Code**:
   - Edit `tailwind.config.js` - update primary color
   - Rebuild CSS: `npm run build:css`

### Changing Logo

1. **Via Theme Customizer**:
   - Go to Appearance > Customize > Site Identity
   - Upload logo

2. **Via Code**:
   - Replace `/assets/images/logo.svg` with your logo
   - Update `functions.php` if using different path

### Adding Content

- **Services**: Add via Services menu in WordPress admin
- **Solutions**: Add via Solutions menu in WordPress admin
- **Pages**: Edit page content in WordPress admin
- **Menu**: Manage via Appearance > Menus

## Google Form Integration

To use Google Forms on the Contact page:

1. Create a Google Form
2. Get the embed URL (form action URL)
3. Edit `page-contact.php`
4. Replace the iframe `src` with your form URL:
   ```php
   <iframe src="YOUR_GOOGLE_FORM_EMBED_URL" ...>
   ```

## Development

### CSS Development

The theme uses Tailwind CSS. To make changes:

1. Edit `assets/css/input.css`
2. Rebuild: `npm run build:css`
3. For auto-rebuild during development: `npm run watch:css`

### JavaScript Development

Edit `assets/js/main.js` for theme functionality. The theme includes:
- GSAP animations
- Scroll-triggered reveals
- Mobile menu toggle
- Counter animations
- Smooth scrolling

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Performance Notes

- GSAP is loaded from CDN for optimal performance
- CSS is minified in production
- Animations use `will-change` and hardware acceleration
- Images should be optimized before upload

## Security

- All outputs are escaped using WordPress functions (`esc_url`, `esc_html`, `esc_attr`)
- Nonces used for AJAX requests
- Sanitization of customizer inputs
- Follows WordPress coding standards

## Deployment to Vercel

See `DEPLOYMENT.md` for detailed Vercel deployment instructions.

## Support

For issues or questions:
- Check WordPress debug log for errors
- Ensure all dependencies are installed
- Verify PHP version (8.0+)
- Check browser console for JavaScript errors

## License

GPL-2.0-or-later (WordPress Theme License)

## Credits

- **Theme**: NomadLabz Team
- **Framework**: WordPress
- **CSS**: Tailwind CSS
- **Animations**: GSAP
- **Icons**: SVG (from logo)

---

Built with ❤️ for NomadLabz


