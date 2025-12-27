# Deployment Guide: NomadLabz Theme on Vercel

This guide will help you deploy a WordPress site with the NomadLabz theme to Vercel.

## Important Considerations

WordPress traditionally requires PHP and MySQL, which Vercel doesn't natively support. You have two main options:

### Option 1: Headless WordPress (Recommended)
Use WordPress as a headless CMS with Vercel hosting a Next.js/React frontend.

### Option 2: Vercel with WordPress Hosting
Deploy WordPress backend separately (e.g., on a traditional host or WP Engine) and use Vercel for static assets/CDN.

## Option 1: Headless WordPress Setup

### Prerequisites

1. WordPress installation (hosted separately)
2. Next.js project
3. Vercel account

### Steps

1. **Set Up WordPress Backend**
   - Host WordPress on a traditional host (WP Engine, SiteGround, etc.)
   - Install WPGraphQL or REST API plugin
   - Configure CORS for your Vercel domain

2. **Create Next.js Frontend**
   ```bash
   npx create-next-app@latest nomadlabz-frontend
   cd nomadlabz-frontend
   ```

3. **Install WordPress Integration**
   ```bash
   npm install @apollo/client graphql
   # or for REST API
   npm install axios
   ```

4. **Migrate Theme Styles**
   - Copy CSS from theme's `assets/css/style.css`
   - Copy JavaScript animations to Next.js components
   - Adapt PHP templates to React/Next.js components

5. **Deploy to Vercel**
   ```bash
   vercel
   ```

## Option 2: Hybrid Approach (WordPress + Static Assets)

This approach keeps WordPress on a traditional host but optimizes static delivery.

### Steps

1. **Host WordPress Separately**
   - Deploy WordPress to WP Engine, Kinsta, or similar
   - Install the NomadLabz theme
   - Configure the site normally

2. **Use Vercel for Static Assets (Optional)**
   - Deploy theme assets to Vercel
   - Update theme to use Vercel CDN URLs for assets
   - This requires modifying theme file paths

3. **CDN Configuration**
   - Use Cloudflare or similar CDN
   - Cache static assets (CSS, JS, images)
   - Configure caching rules

## Option 3: Serverless WordPress (Advanced)

### Using WP2Static or Similar

1. **Install WP2Static Plugin**
   - Export WordPress site as static HTML
   - This creates a static version of your site

2. **Deploy Static Export to Vercel**
   ```bash
   # After exporting with WP2Static
   vercel --prod
   ```

3. **Limitations**
   - No dynamic content updates
   - Need to regenerate and redeploy for changes
   - Contact forms won't work without backend

## Recommended Setup for NomadLabz Theme

Given the theme's structure, here's the recommended approach:

### Step-by-Step: Traditional WordPress Hosting with Vercel CDN

1. **Deploy WordPress**
   - Use a managed WordPress host (WP Engine, Kinsta, SiteGround)
   - Install WordPress and upload NomadLabz theme
   - Complete WordPress setup

2. **Optimize for Performance**
   - Install caching plugin (WP Rocket, W3 Total Cache)
   - Enable object caching (Redis/Memcached)
   - Optimize images
   - Use CDN (Cloudflare or Vercel Edge Network via proxy)

3. **Use Vercel for Edge Functions (Optional)**
   - Set up Vercel Edge Functions for API routes
   - Proxy WordPress REST API through Vercel
   - Cache responses at edge

4. **Deploy Static Assets to Vercel (Advanced)**
   - Extract theme assets (CSS, JS, images)
   - Deploy to Vercel
   - Update theme to load assets from Vercel URLs

### vercel.json Configuration (if using hybrid)

```json
{
  "version": 2,
  "builds": [
    {
      "src": "package.json",
      "use": "@vercel/static-build"
    }
  ],
  "routes": [
    {
      "src": "/wp-content/themes/nomadlabz-theme/assets/(.*)",
      "dest": "/assets/$1"
    }
  ],
  "headers": [
    {
      "source": "/wp-content/themes/nomadlabz-theme/assets/(.*)",
      "headers": [
        {
          "key": "Cache-Control",
          "value": "public, max-age=31536000, immutable"
        }
      ]
    }
  ]
}
```

## Environment Variables

If using headless approach, set these in Vercel:

- `WORDPRESS_API_URL` - Your WordPress site URL
- `WORDPRESS_API_KEY` - API key (if using authentication)

## Build Configuration

### For Static Export (WP2Static)

```json
{
  "buildCommand": "wp2static export",
  "outputDirectory": "wp2static-output"
}
```

### For Next.js (Headless)

```json
{
  "buildCommand": "npm run build",
  "outputDirectory": ".next"
}
```

## Post-Deployment Checklist

- [ ] Test all pages load correctly
- [ ] Verify animations work
- [ ] Check mobile responsiveness
- [ ] Test contact form
- [ ] Verify logo displays
- [ ] Check navigation menu
- [ ] Test custom post types (Services, Solutions)
- [ ] Verify theme customizer settings
- [ ] Check Core Web Vitals scores
- [ ] Test on multiple browsers

## Troubleshooting

### Assets Not Loading
- Check file paths in theme
- Verify asset URLs are correct
- Check CORS settings if using headless

### Animations Not Working
- Verify GSAP CDN links are accessible
- Check browser console for errors
- Ensure JavaScript is enqueued correctly

### Styles Not Applied
- Rebuild CSS: `npm run build:css`
- Clear browser cache
- Check CSS file path in `functions.php`

### Contact Form Issues
- Update Google Form embed URL
- Check iframe permissions
- Verify form is public

## Performance Optimization Tips

1. **Image Optimization**
   - Use WebP format
   - Implement lazy loading
   - Use appropriate image sizes

2. **CSS/JS Optimization**
   - Minify files (already done for CSS)
   - Defer JavaScript loading
   - Remove unused CSS

3. **Caching**
   - Enable browser caching
   - Use CDN caching
   - Implement service workers (PWA)

4. **Database Optimization**
   - Optimize WordPress database
   - Use object caching
   - Minimize database queries

## Alternative: Using Vercel's WordPress Integration

Vercel now offers WordPress integration through partners. Check:
- Vercel's WordPress marketplace
- Headless WordPress hosting options
- WordPress.com VIP for enterprise

## Support Resources

- [Vercel Documentation](https://vercel.com/docs)
- [WordPress Codex](https://codex.wordpress.org/)
- [WP2Static Documentation](https://wp2static.com/docs/)
- [Headless WordPress Guide](https://www.wpengine.com/resources/headless-wordpress/)

## Notes

- The NomadLabz theme is designed to work best with traditional WordPress hosting
- For full functionality, WordPress backend is required
- Consider headless architecture for better performance on Vercel
- Static export works but requires regeneration for updates

---

**Recommendation**: For production use, host WordPress on a managed WordPress hosting service (WP Engine, Kinsta, etc.) and use Vercel/Cloudflare CDN for static asset delivery and edge caching.


