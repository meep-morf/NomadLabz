# Setup Instructions for NomadLabz WordPress Theme

## Quick Preview (Without WordPress)

To see a static preview of the theme design:

1. Open `preview.html` in your web browser
2. This shows the basic design and layout
3. Note: This is a static preview - full functionality requires WordPress

## Full WordPress Setup

### Option 1: Local WordPress Installation (Recommended for Development)

1. **Install Local by Flywheel, XAMPP, or MAMP**
   - Download from their official websites
   - Create a new WordPress site

2. **Copy Theme Files**
   - Copy `wp-content/themes/nomadlabz-theme/` to your WordPress installation's `wp-content/themes/` folder

3. **Install Dependencies**
   ```bash
   cd wp-content/themes/nomadlabz-theme
   npm install
   npm run build:css
   ```

4. **Activate Theme**
   - Go to WordPress admin > Appearance > Themes
   - Activate "NomadLabz"

5. **Follow QUICK-START.md** for complete setup instructions

### Option 2: Use Existing WordPress Installation

1. **Upload Theme**
   - Upload `nomadlabz-theme` folder to `/wp-content/themes/` via FTP or file manager
   - Or use WordPress admin: Appearance > Themes > Add New > Upload Theme

2. **Install Dependencies**
   - SSH into your server
   - Navigate to theme directory
   - Run: `npm install && npm run build:css`

3. **Activate and Configure**
   - Follow QUICK-START.md instructions

## What You Need

- WordPress 6.0+
- PHP 8.0+
- Node.js 16+ (for CSS build)
- MySQL database (usually included with WordPress installers)

## Next Steps

After setup, see `QUICK-START.md` for:
- Creating pages
- Setting up menus
- Adding content
- Customization options

For deployment instructions, see `DEPLOYMENT.md`


