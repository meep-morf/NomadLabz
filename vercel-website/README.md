# NomadLabz Website

A fully static, modern website built for Vercel deployment. This project was converted from a WordPress theme to a pure static frontend using HTML, Tailwind CSS, and JavaScript.

## 🚀 Features

- **Fully Static**: No backend required, perfect for Vercel deployment
- **Modern Design**: Clean, professional UI with refined color system
- **Responsive**: Mobile-first design that works on all devices
- **Smooth Animations**: Scroll-based animations using IntersectionObserver
- **Performance Optimized**: Fast loading with no layout shift
- **SEO Friendly**: Semantic HTML and proper meta tags

## 📁 Project Structure

```
vercel-website/
├── index.html          # Home page
├── services.html       # Services page
├── solutions.html      # Solutions page
├── about.html          # About page
├── contact.html        # Contact page
├── css/
│   └── style.css       # Tailwind CSS and custom styles
├── js/
│   ├── main.js         # Main JavaScript (animations, navigation)
│   ├── components.js   # Header and footer components
│   └── contact.js      # Contact form handling
├── assets/             # Images, logos, and other assets
├── package.json        # Dependencies
├── tailwind.config.js  # Tailwind configuration
├── vite.config.js      # Vite build configuration
└── vercel.json         # Vercel deployment configuration
```

## 🛠️ Setup & Development

### Prerequisites

- Node.js 16+ and npm

### Installation

1. Clone the repository:
```bash
git clone https://github.com/meep-morf/NomadLabz.git
cd vercel-website
```

2. Install dependencies:
```bash
npm install
```

3. Start development server:
```bash
npm run dev
```

The site will be available at `http://localhost:3000`

### Build for Production

```bash
npm run build
```

This will create a `dist` folder with optimized static files.

## 🎨 Design System

### Color Palette

- **Charcoal**: Replaces pure black for a softer, premium look
- **Green**: Reduced dominance, used for primary actions
- **Purple**: Subtle accents for depth and visual interest

### Typography

- **Font**: Inter (Google Fonts)
- **Weights**: 300, 400, 500, 600, 700, 800

## 📱 Pages

- **Home** (`index.html`): Hero section, services preview, features, and CTA
- **Services** (`services.html`): Detailed service offerings
- **Solutions** (`solutions.html`): Industry-specific solutions
- **About** (`about.html`): Company mission, values, and team
- **Contact** (`contact.html`): Contact form and information

## 🚀 Deployment to Vercel

### Option 1: Vercel CLI

1. Install Vercel CLI:
```bash
npm i -g vercel
```

2. Deploy:
```bash
vercel
```

### Option 2: GitHub Integration

1. Push your code to GitHub
2. Import the repository in Vercel
3. Vercel will automatically detect the configuration and deploy

### Option 3: Vercel Dashboard

1. Go to [vercel.com](https://vercel.com)
2. Click "New Project"
3. Import your Git repository
4. Vercel will use the `vercel.json` configuration automatically

## 📝 Configuration

### vercel.json

The project includes a `vercel.json` file configured for:
- Build command: `npm run build`
- Output directory: `dist`
- Framework: Vite

### Contact Form

The contact form currently uses a client-side simulation. To enable actual form submission, integrate with:
- **Formspree**: Add your Formspree endpoint in `js/contact.js`
- **Netlify Forms**: Add `netlify` attribute to the form
- **Custom API**: Update the fetch URL in `js/contact.js`

## 🎯 Key Features Implemented

✅ Removed all WordPress dependencies  
✅ Static HTML pages with consistent header/footer  
✅ Scroll-based animations (IntersectionObserver)  
✅ Mobile-responsive navigation  
✅ Refined color system (charcoal, reduced green, purple accents)  
✅ Larger logo sizes in header and footer  
✅ Improved spacing consistency  
✅ No layout shift on load  
✅ Optimized performance  

## 📄 License

All rights reserved © NomadLabz

## 🤝 Support

For questions or support, contact: hello@nomadlabz.com

