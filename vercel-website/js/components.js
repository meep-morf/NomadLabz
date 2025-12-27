/**
 * Reusable components for header and footer
 * These replace the WordPress header.php and footer.php
 */

/**
 * Utility function to get current page name
 */
function getCurrentPage() {
  const path = window.location.pathname;
  if (path === '/' || path.endsWith('index.html') || path.endsWith('/')) return 'home';
  if (path.includes('services')) return 'services';
  if (path.includes('solutions')) return 'solutions';
  if (path.includes('about')) return 'about';
  if (path.includes('contact')) return 'contact';
  return 'home';
}

/**
 * Generate header HTML
 */
function generateHeader() {
  const currentPage = getCurrentPage();
  
  return `
    <header id="main-header" class="fixed top-0 left-0 right-0 z-50 bg-transparent transition-all duration-300">
      <nav class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
          <!-- Logo - Increased size -->
          <div class="flex-shrink-0">
            <a href="index.html" class="flex items-center">
              <img src="assets/logo.svg" alt="NomadLabz" class="h-12 md:h-16 w-auto" onerror="this.src='assets/logo.png'; this.onerror=null;">
              <span class="ml-3 text-2xl md:text-3xl font-bold text-charcoal-900">NomadLabz</span>
            </a>
          </div>
          
          <!-- Desktop Navigation -->
          <div class="hidden md:flex md:items-center md:space-x-8">
            <a href="index.html" class="nav-link ${currentPage === 'home' ? 'nav-link-active' : ''}">Home</a>
            <a href="services.html" class="nav-link ${currentPage === 'services' ? 'nav-link-active' : ''}">Services</a>
            <a href="solutions.html" class="nav-link ${currentPage === 'solutions' ? 'nav-link-active' : ''}">Solutions</a>
            <a href="about.html" class="nav-link ${currentPage === 'about' ? 'nav-link-active' : ''}">About</a>
            <a href="contact.html" class="nav-link ${currentPage === 'contact' ? 'nav-link-active' : ''}">Contact</a>
            <a href="contact.html" class="btn-primary">Get Started</a>
          </div>
          
          <!-- Mobile menu button -->
          <div class="md:hidden">
            <button id="mobile-menu-button" type="button" class="text-charcoal-700 hover:text-charcoal-900 focus:outline-none">
              <svg id="menu-icon" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
              <svg id="close-icon" class="h-6 w-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
        
        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="hidden md:hidden">
          <div class="px-2 pt-2 pb-3 space-y-1 bg-white rounded-lg mt-4 shadow-lg">
            <a href="index.html" class="block px-3 py-2 rounded-md text-base font-medium text-charcoal-700 hover:bg-charcoal-50 ${currentPage === 'home' ? 'bg-charcoal-100' : ''}">Home</a>
            <a href="services.html" class="block px-3 py-2 rounded-md text-base font-medium text-charcoal-700 hover:bg-charcoal-50 ${currentPage === 'services' ? 'bg-charcoal-100' : ''}">Services</a>
            <a href="solutions.html" class="block px-3 py-2 rounded-md text-base font-medium text-charcoal-700 hover:bg-charcoal-50 ${currentPage === 'solutions' ? 'bg-charcoal-100' : ''}">Solutions</a>
            <a href="about.html" class="block px-3 py-2 rounded-md text-base font-medium text-charcoal-700 hover:bg-charcoal-50 ${currentPage === 'about' ? 'bg-charcoal-100' : ''}">About</a>
            <a href="contact.html" class="block px-3 py-2 rounded-md text-base font-medium text-charcoal-700 hover:bg-charcoal-50 ${currentPage === 'contact' ? 'bg-charcoal-100' : ''}">Contact</a>
            <a href="contact.html" class="block px-3 py-2 rounded-md text-base font-medium btn-primary text-center mt-4">Get Started</a>
          </div>
        </div>
      </nav>
    </header>
  `;
}

/**
 * Generate footer HTML
 */
function generateFooter() {
  return `
    <footer class="bg-charcoal-900 text-white">
      <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 md:gap-12">
          <!-- Logo and Description -->
          <div class="col-span-1 md:col-span-2">
            <div class="flex items-center mb-4">
              <img src="assets/logo.svg" alt="NomadLabz" class="h-12 md:h-16 w-auto" onerror="this.src='assets/logo.png'; this.onerror=null;">
              <span class="ml-3 text-2xl md:text-3xl font-bold">NomadLabz</span>
            </div>
            <p class="text-charcoal-300 mb-6 max-w-md">
              Empowering businesses with innovative digital solutions. We transform ideas into reality through cutting-edge technology and creative excellence.
            </p>
            <div class="flex space-x-4">
              <a href="#" class="text-charcoal-400 hover:text-white transition-colors duration-200">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                </svg>
              </a>
              <a href="#" class="text-charcoal-400 hover:text-white transition-colors duration-200">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                </svg>
              </a>
              <a href="#" class="text-charcoal-400 hover:text-white transition-colors duration-200">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                </svg>
              </a>
            </div>
          </div>
          
          <!-- Quick Links -->
          <div>
            <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
            <ul class="space-y-2">
              <li><a href="index.html" class="text-charcoal-300 hover:text-white transition-colors duration-200">Home</a></li>
              <li><a href="services.html" class="text-charcoal-300 hover:text-white transition-colors duration-200">Services</a></li>
              <li><a href="solutions.html" class="text-charcoal-300 hover:text-white transition-colors duration-200">Solutions</a></li>
              <li><a href="about.html" class="text-charcoal-300 hover:text-white transition-colors duration-200">About</a></li>
              <li><a href="contact.html" class="text-charcoal-300 hover:text-white transition-colors duration-200">Contact</a></li>
            </ul>
          </div>
          
          <!-- Contact Info -->
          <div>
            <h3 class="text-lg font-semibold mb-4">Contact</h3>
            <ul class="space-y-2 text-charcoal-300">
              <li>Email: hello@nomadlabz.com</li>
              <li>Phone: +1 (555) 123-4567</li>
              <li>Address: 123 Innovation St, Tech City, TC 12345</li>
            </ul>
          </div>
        </div>
        
        <div class="border-t border-charcoal-800 mt-12 pt-8 text-center text-charcoal-400">
          <p>&copy; ${new Date().getFullYear()} NomadLabz. All rights reserved.</p>
        </div>
      </div>
    </footer>
  `;
}

/**
 * Initialize header and footer on page load
 */
document.addEventListener('DOMContentLoaded', () => {
  // Insert header
  const headerPlaceholder = document.getElementById('header-placeholder');
  if (headerPlaceholder) {
    headerPlaceholder.outerHTML = generateHeader();
  }
  
  // Insert footer
  const footerPlaceholder = document.getElementById('footer-placeholder');
  if (footerPlaceholder) {
    footerPlaceholder.outerHTML = generateFooter();
  }
  
  // Reinitialize mobile menu after header is inserted
  setTimeout(() => {
    if (typeof initMobileMenu === 'function') {
      initMobileMenu();
    }
  }, 100);
});

