# Quick Start Guide - NomadLabz Theme

## Prerequisites

1. **WordPress Installation** (6.0+)
2. **PHP 8.0 or higher**
3. **Node.js 16+** (for building CSS)
4. **npm** (comes with Node.js)

## Installation Steps

### 1. Install Theme Files

Copy the `nomadlabz-theme` folder to your WordPress installation:
```
wp-content/themes/nomadlabz-theme/
```

### 2. Install Dependencies & Build CSS

```bash
cd wp-content/themes/nomadlabz-theme
npm install
npm run build:css
```

### 3. Activate Theme

1. Log into WordPress admin
2. Go to **Appearance > Themes**
3. Find "NomadLabz" theme
4. Click **Activate**

### 4. Create Pages

Create the following pages in WordPress admin (Pages > Add New):

1. **Home**
   - Title: "Home"
   - Template: Select "Home Page" from Page Attributes
   - Publish

2. **Services**
   - Title: "Services"
   - Template: Select "Services Page" from Page Attributes
   - Publish

3. **Solutions**
   - Title: "Solutions"
   - Template: Select "Solutions Page" from Page Attributes
   - Publish

4. **About**
   - Title: "About Us"
   - Template: Select "About Us Page" from Page Attributes
   - Publish

5. **Contact**
   - Title: "Contact"
   - Template: Select "Contact Page" from Page Attributes
   - Publish

### 5. Set Up Menu

1. Go to **Appearance > Menus**
2. Create a new menu (e.g., "Main Menu")
3. Add all pages to the menu (Home, Services, Solutions, About, Contact)
4. Under "Menu Settings", check "Primary Menu"
5. Click **Save Menu**

### 6. Set Homepage

1. Go to **Settings > Reading**
2. Select "A static page"
3. Set "Homepage" to your "Home" page
4. Click **Save Changes**

### 7. Upload Logo (Optional)

1. Go to **Appearance > Customize > Site Identity**
2. Click "Select Logo"
3. Upload your logo image
4. Click **Publish**

### 8. Add Services (Optional)

1. Go to **Services > Add New** (in WordPress admin)
2. Add service title, description, featured image
3. In "Custom Fields" section, add:
   - `service_icon` - Emoji or icon (e.g., 🤖)
   - `use_cases` - Use cases (one per line)
   - `tech_stack` - Technologies (comma-separated)
4. Publish

### 9. Add Solutions (Optional)

1. Go to **Solutions > Add New** (in WordPress admin)
2. Add solution title, description, featured image
3. Publish

## Default Content

The theme includes default content if no Services or Solutions are added. You can customize this by:
- Adding Services via the admin panel
- Adding Solutions via the admin panel
- Editing page templates directly

## Customization

### Change Primary Color

1. Go to **Appearance > Customize > Colors**
2. Adjust "Primary Color (Neon Mint)"
3. Click **Publish**

### Update Google Form (Contact Page)

1. Edit the Contact page template: `page-contact.php`
2. Find the iframe with Google Form
3. Replace the `src` URL with your Google Form embed URL

## Troubleshooting

### Styles Not Loading
- Run: `npm run build:css` in theme directory
- Clear browser cache
- Check file permissions

### Menu Not Showing
- Ensure menu is assigned to "Primary Menu" location
- Check that pages are added to the menu

### Animations Not Working
- Check browser console for JavaScript errors
- Verify GSAP CDN is accessible
- Ensure JavaScript is enabled in browser

### Logo Not Displaying
- Check logo path in Theme Customizer
- Verify logo file exists in `/assets/images/`
- Check file permissions

## Development Mode

For development with auto-rebuild of CSS:

```bash
npm run watch:css
```

This will automatically rebuild CSS when you edit `assets/css/input.css`.

## Next Steps

- Customize page content in WordPress admin
- Add your Services and Solutions
- Update Contact form URL
- Customize colors via Theme Customizer
- Review `README.md` for detailed documentation
- Check `DEPLOYMENT.md` for deployment instructions

---

**Need Help?** Check the main README.md for detailed documentation.

