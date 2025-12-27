/**
 * NomadLabz Theme JavaScript
 * Handles animations, interactions, and dynamic behavior
 */

(function() {
    'use strict';

    // Wait for DOM to be ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    function init() {
        initGSAP();
        initMobileMenu();
        initScrollReveal();
        initCounterAnimation();
        initHeroAnimation();
        initSmoothScroll();
    }

    // Initialize GSAP Animations
    function initGSAP() {
        if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
            console.warn('GSAP not loaded, falling back to CSS animations');
            return;
        }

        // Register ScrollTrigger plugin
        if (typeof ScrollTrigger !== 'undefined') {
            gsap.registerPlugin(ScrollTrigger);
        }
        // Register ScrollTo plugin if available
        if (typeof ScrollToPlugin !== 'undefined') {
            gsap.registerPlugin(ScrollToPlugin);
        }

        // Smooth scroll behavior
        gsap.config({
            nullTargetWarn: false,
            trialWarn: false
        });
    }

    // Mobile Menu Toggle
    function initMobileMenu() {
        const toggle = document.getElementById('mobile-menu-toggle');
        const menu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');

        if (!toggle || !menu) return;

        toggle.addEventListener('click', function() {
            const isHidden = menu.classList.contains('hidden');
            
            if (isHidden) {
                menu.classList.remove('hidden');
                menuIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
                toggle.setAttribute('aria-expanded', 'true');
            } else {
                menu.classList.add('hidden');
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
                toggle.setAttribute('aria-expanded', 'false');
            }
        });
    }

    // Scroll Reveal Animation
    function initScrollReveal() {
        const elements = document.querySelectorAll('[data-scroll-reveal]');

        if (elements.length === 0) return;

        if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
            elements.forEach((element, index) => {
                const delay = parseFloat(element.getAttribute('data-delay')) || 0;
                
                gsap.fromTo(element, 
                    {
                        opacity: 0,
                        y: 50,
                    },
                    {
                        opacity: 1,
                        y: 0,
                        duration: 0.8,
                        delay: delay,
                        ease: 'power3.out',
                        scrollTrigger: {
                            trigger: element,
                            start: 'top 80%',
                            end: 'bottom 20%',
                            toggleActions: 'play none none none',
                        }
                    }
                );
            });
        } else {
            // Fallback using Intersection Observer
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            elements.forEach(element => {
                element.style.opacity = '0';
                element.style.transform = 'translateY(50px)';
                element.style.transition = 'opacity 0.8s ease-out, transform 0.8s ease-out';
                observer.observe(element);
            });
        }
    }

    // Counter Animation
    function initCounterAnimation() {
        const counters = {
            'stat-projects': 100,
            'stat-clients': 50,
            'stat-years': 5
        };

        if (typeof gsap !== 'undefined') {
            Object.keys(counters).forEach(id => {
                const element = document.getElementById(id);
                if (!element) return;

                const target = counters[id];
                const isAnimated = element.dataset.animated === 'true';

                ScrollTrigger.create({
                    trigger: element,
                    start: 'top 80%',
                    once: true,
                    onEnter: () => {
                        if (!isAnimated) {
                            element.dataset.animated = 'true';
                            gsap.to({ value: 0 }, {
                                value: target,
                                duration: 2,
                                ease: 'power2.out',
                                onUpdate: function() {
                                    const value = Math.ceil(this.targets()[0].value);
                                    element.textContent = value + (target === 5 ? '+' : '+');
                                }
                            });
                        }
                    }
                });
            });
        }
    }

    // Hero Section Animation
    function initHeroAnimation() {
        if (typeof gsap === 'undefined') {
            // Fallback: Show elements immediately
            const heroElements = document.querySelectorAll('#hero-logo, #hero-title, #hero-subtitle, #hero-cta, #scroll-indicator');
            heroElements.forEach(el => {
                if (el) el.style.opacity = '1';
            });
            return;
        }

        const tl = gsap.timeline();

        // Logo animation
        const logo = document.getElementById('hero-logo');
        if (logo) {
            tl.fromTo(logo, 
                { opacity: 0, scale: 0.8 },
                { opacity: 1, scale: 1, duration: 0.8, ease: 'power3.out' }
            );
        }

        // Title animation
        const title = document.getElementById('hero-title');
        if (title) {
            tl.fromTo(title,
                { opacity: 0, y: 30 },
                { opacity: 1, y: 0, duration: 0.8, ease: 'power3.out' },
                '-=0.4'
            );
        }

        // Subtitle animation
        const subtitle = document.getElementById('hero-subtitle');
        if (subtitle) {
            tl.fromTo(subtitle,
                { opacity: 0, y: 20 },
                { opacity: 1, y: 0, duration: 0.8, ease: 'power3.out' },
                '-=0.4'
            );
        }

        // CTA buttons animation
        const cta = document.getElementById('hero-cta');
        if (cta) {
            tl.fromTo(cta,
                { opacity: 0, y: 20 },
                { opacity: 1, y: 0, duration: 0.8, ease: 'power3.out' },
                '-=0.4'
            );
        }

        // Scroll indicator animation
        const scrollIndicator = document.getElementById('scroll-indicator');
        if (scrollIndicator) {
            tl.fromTo(scrollIndicator,
                { opacity: 0 },
                { opacity: 1, duration: 0.5, ease: 'power2.out' },
                '-=0.2'
            );
        }
    }

    // Smooth Scroll for anchor links
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href === '#' || href === '#main-content') {
                    e.preventDefault();
                    return;
                }

                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    
                    if (typeof gsap !== 'undefined') {
                        gsap.to(window, {
                            duration: 1,
                            scrollTo: {
                                y: target,
                                offsetY: 80
                            },
                            ease: 'power2.inOut'
                        });
                    } else {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }
            });
        });
    }

    // Header Logo Animation on Load
    const headerLogo = document.getElementById('header-logo');
    if (headerLogo && typeof gsap !== 'undefined') {
        gsap.fromTo(headerLogo,
            { opacity: 0, scale: 0.9 },
            { opacity: 1, scale: 1, duration: 0.6, ease: 'power2.out', delay: 0.2 }
        );
    }

    // Contact Form Handling (if custom form is used)
    const contactForm = document.getElementById('nomadlabz-contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const messageDiv = document.getElementById('form-message');
            
            // Simple form validation
            const name = formData.get('name');
            const email = formData.get('email');
            const message = formData.get('message');

            if (!name || !email || !message) {
                showFormMessage(messageDiv, 'Please fill in all fields.', 'error');
                return;
            }

            // Here you would typically send the data via AJAX
            // For now, just show a success message
            showFormMessage(messageDiv, 'Thank you for your message! We will get back to you soon.', 'success');
            this.reset();
        });
    }

    function showFormMessage(element, message, type) {
        if (!element) return;

        element.className = type === 'success' 
            ? 'mt-4 p-4 rounded-lg bg-green-500/20 border border-green-500 text-green-400'
            : 'mt-4 p-4 rounded-lg bg-red-500/20 border border-red-500 text-red-400';
        
        element.textContent = message;
        element.classList.remove('hidden');

        setTimeout(() => {
            element.classList.add('hidden');
        }, 5000);
    }

})();

