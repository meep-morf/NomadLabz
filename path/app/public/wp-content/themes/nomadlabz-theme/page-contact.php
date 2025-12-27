<?php
/**
 * Template Name: Contact Page
 *
 * @package NomadLabz
 */

get_header();
?>

<section class="py-20 bg-black">
    <div class="container mx-auto px-4 lg:px-8 max-w-6xl">
        <header class="text-center mb-16">
            <h1 class="text-5xl md:text-6xl font-bold mb-6 opacity-0" data-scroll-reveal>
                <span class="text-primary">Get in Touch</span>
            </h1>
            <p class="text-xl text-gray-400 max-w-3xl mx-auto opacity-0" data-scroll-reveal>
                Let's discuss how we can help transform your business with innovative software solutions
            </p>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="opacity-0" data-scroll-reveal>
                <div class="bg-gray-900/50 border border-primary/20 rounded-lg p-8">
                    <h2 class="text-2xl font-semibold mb-6 text-primary">Send us a Message</h2>
                    
                    <!-- Google Form Embed -->
                    <div class="contact-form-container">
                        <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSfEXAMPLE/viewform?embedded=true" 
                                width="100%" 
                                height="600" 
                                frameborder="0" 
                                marginheight="0" 
                                marginwidth="0"
                                class="w-full rounded-lg bg-gray-800"
                                id="contact-form">
                            Loading…
                        </iframe>
                        <p class="text-sm text-gray-500 mt-4 text-center">
                            If the form doesn't load, <a href="https://docs.google.com/forms/d/e/1FAIpQLSfEXAMPLE/viewform" 
                            target="_blank" class="text-primary hover:underline">click here to open it in a new tab</a>
                        </p>
                    </div>

                    <!-- Alternative: Custom Contact Form -->
                    <form id="nomadlabz-contact-form" class="hidden space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Name</label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   required
                                   class="w-full px-4 py-3 bg-gray-800 border border-primary/20 rounded-lg text-white focus:outline-none focus:border-primary transition-colors">
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   required
                                   class="w-full px-4 py-3 bg-gray-800 border border-primary/20 rounded-lg text-white focus:outline-none focus:border-primary transition-colors">
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-300 mb-2">Message</label>
                            <textarea id="message" 
                                      name="message" 
                                      rows="6" 
                                      required
                                      class="w-full px-4 py-3 bg-gray-800 border border-primary/20 rounded-lg text-white focus:outline-none focus:border-primary transition-colors"></textarea>
                        </div>

                        <button type="submit" 
                                class="w-full px-6 py-4 bg-primary text-black font-semibold rounded-lg hover:bg-primary/90 transition-all duration-300 hover:scale-105">
                            Send Message
                        </button>

                        <div id="form-message" class="hidden mt-4 p-4 rounded-lg"></div>
                    </form>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="opacity-0" data-scroll-reveal data-delay="0.1">
                <div class="space-y-8">
                    <div class="bg-gray-900/50 border border-primary/20 rounded-lg p-8">
                        <h2 class="text-2xl font-semibold mb-6 text-primary">Contact Information</h2>
                        
                        <div class="space-y-6">
                            <div class="flex items-start">
                                <div class="w-12 h-12 bg-primary/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-semibold text-white mb-1">Email</h3>
                                    <a href="mailto:contact@nomadlabz.com" class="text-gray-400 hover:text-primary transition-colors">
                                        contact@nomadlabz.com
                                    </a>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="w-12 h-12 bg-primary/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-semibold text-white mb-1">Location</h3>
                                    <p class="text-gray-400">
                                        Remote Worldwide<br>
                                        Available Globally
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="w-12 h-12 bg-primary/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-semibold text-white mb-1">Response Time</h3>
                                    <p class="text-gray-400">
                                        We typically respond within 24 hours
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-r from-primary/10 via-primary/5 to-primary/10 border border-primary/20 rounded-lg p-8">
                        <h3 class="text-xl font-semibold mb-4 text-primary">Why Choose Us?</h3>
                        <ul class="space-y-3 text-gray-300">
                            <li class="flex items-start">
                                <span class="text-primary mr-2 mt-1">✓</span>
                                <span>Expert team with years of experience</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-primary mr-2 mt-1">✓</span>
                                <span>Custom solutions tailored to your needs</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-primary mr-2 mt-1">✓</span>
                                <span>Cutting-edge technology and best practices</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-primary mr-2 mt-1">✓</span>
                                <span>Dedicated support throughout your journey</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();


