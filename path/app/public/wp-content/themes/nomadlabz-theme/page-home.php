<?php
/**
 * Template Name: Home Page
 *
 * @package NomadLabz
 */

get_header();
?>

<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-black via-primary/5 to-black">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(75,255,185,0.1),transparent_50%)] animate-pulse"></div>
    </div>

    <div class="container mx-auto px-4 lg:px-8 relative z-10 text-center">
        <!-- Logo Animation -->
        <div class="mb-8 opacity-0" id="hero-logo">
            <?php
            $logo_url = nomadlabz_get_logo_url();
            if ($logo_url):
            ?>
                <img src="<?php echo esc_url($logo_url); ?>" 
                     alt="<?php bloginfo('name'); ?>" 
                     class="h-20 md:h-32 w-auto mx-auto">
            <?php endif; ?>
        </div>

        <h1 class="text-5xl md:text-7xl lg:text-8xl font-bold mb-6 opacity-0" id="hero-title">
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-primary to-primary/60">
                AI-Powered
            </span>
            <br>
            <span class="text-white">Software Solutions</span>
        </h1>
        
        <p class="text-xl md:text-2xl text-gray-300 mb-10 max-w-3xl mx-auto opacity-0" id="hero-subtitle">
            End-to-end digital solutions that transform businesses through automation, innovation, and cutting-edge technology.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center opacity-0" id="hero-cta">
            <a href="<?php echo esc_url(home_url('/contact')); ?>" 
               class="px-8 py-4 bg-primary text-black font-semibold rounded-lg hover:bg-primary/90 transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-primary/50">
                Get Started
            </a>
            <a href="<?php echo esc_url(home_url('/contact')); ?>?action=talk" 
               class="px-8 py-4 border-2 border-primary text-primary font-semibold rounded-lg hover:bg-primary/10 transition-all duration-300 hover:scale-105">
                Talk to Us
            </a>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce opacity-0" id="scroll-indicator">
        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </div>
</section>

<!-- Services Overview -->
<section class="py-20 bg-black">
    <div class="container mx-auto px-4 lg:px-8">
        <h2 class="text-4xl md:text-5xl font-bold text-center mb-4 opacity-0" data-scroll-reveal>
            Our Services
        </h2>
        <p class="text-xl text-gray-400 text-center mb-12 max-w-2xl mx-auto opacity-0" data-scroll-reveal>
            Comprehensive solutions tailored to your business needs
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $services = get_posts(array(
                'post_type' => 'service',
                'posts_per_page' => 6,
                'orderby' => 'menu_order',
                'order' => 'ASC',
            ));

            if ($services) {
                foreach ($services as $index => $service) {
                    ?>
                    <div class="group bg-gray-900/50 border border-primary/20 rounded-lg p-6 hover:border-primary hover:shadow-lg hover:shadow-primary/20 transition-all duration-300 opacity-0" 
                         data-scroll-reveal data-delay="<?php echo $index * 0.1; ?>">
                        <div class="mb-4">
                            <?php
                            $icon = get_post_meta($service->ID, 'service_icon', true);
                            if ($icon) {
                                echo '<span class="text-4xl">' . esc_html($icon) . '</span>';
                            } else {
                                echo '<div class="w-12 h-12 bg-primary/20 rounded-lg flex items-center justify-center group-hover:bg-primary/30 transition-colors"></div>';
                            }
                            ?>
                        </div>
                        <h3 class="text-xl font-semibold mb-3 text-primary group-hover:text-primary/90">
                            <?php echo esc_html($service->post_title); ?>
                        </h3>
                        <p class="text-gray-400 mb-4">
                            <?php echo esc_html(get_the_excerpt($service->ID)); ?>
                        </p>
                        <a href="<?php echo esc_url(get_permalink($service->ID)); ?>" 
                           class="text-primary hover:text-primary/80 font-semibold inline-flex items-center group-hover:translate-x-1 transition-transform">
                            Learn More →
                        </a>
                    </div>
                    <?php
                }
            } else {
                // Default services if none exist
                $default_services = array(
                    array('title' => 'AI Automations', 'desc' => 'Intelligent automation solutions that streamline your workflows'),
                    array('title' => 'Custom Web Development', 'desc' => 'Modern, scalable web applications built to perfection'),
                    array('title' => 'Mobile App Development', 'desc' => 'Native iOS and Android apps that deliver exceptional experiences'),
                    array('title' => 'SaaS Platforms', 'desc' => 'Cloud-based software solutions that scale with your business'),
                    array('title' => 'API Integrations', 'desc' => 'Seamless connectivity between your systems and services'),
                    array('title' => 'Business Process Automation', 'desc' => 'Optimize operations with intelligent automation'),
                );
                
                foreach ($default_services as $index => $service) {
                    ?>
                    <div class="group bg-gray-900/50 border border-primary/20 rounded-lg p-6 hover:border-primary hover:shadow-lg hover:shadow-primary/20 transition-all duration-300 opacity-0" 
                         data-scroll-reveal data-delay="<?php echo $index * 0.1; ?>">
                        <div class="w-12 h-12 bg-primary/20 rounded-lg flex items-center justify-center mb-4 group-hover:bg-primary/30 transition-colors"></div>
                        <h3 class="text-xl font-semibold mb-3 text-primary">
                            <?php echo esc_html($service['title']); ?>
                        </h3>
                        <p class="text-gray-400">
                            <?php echo esc_html($service['desc']); ?>
                        </p>
                    </div>
                    <?php
                }
            }
            ?>
        </div>

        <div class="text-center mt-12 opacity-0" data-scroll-reveal>
            <a href="<?php echo esc_url(home_url('/services')); ?>" 
               class="inline-block px-8 py-4 border-2 border-primary text-primary font-semibold rounded-lg hover:bg-primary/10 transition-all duration-300">
                View All Services
            </a>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-20 bg-gray-900/30">
    <div class="container mx-auto px-4 lg:px-8">
        <h2 class="text-4xl md:text-5xl font-bold text-center mb-4 opacity-0" data-scroll-reveal>
            Why Choose Us
        </h2>
        <p class="text-xl text-gray-400 text-center mb-16 max-w-2xl mx-auto opacity-0" data-scroll-reveal>
            We combine cutting-edge technology with proven expertise
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php
            $features = array(
                array('icon' => '🚀', 'title' => 'Innovation First', 'desc' => 'Always at the forefront of technology trends'),
                array('icon' => '⚡', 'title' => 'Lightning Fast', 'desc' => 'Rapid development without compromising quality'),
                array('icon' => '🔒', 'title' => 'Secure & Scalable', 'desc' => 'Enterprise-grade security and infinite scalability'),
            );

            foreach ($features as $index => $feature) {
                ?>
                <div class="text-center opacity-0" data-scroll-reveal data-delay="<?php echo $index * 0.15; ?>">
                    <div class="text-6xl mb-4 transform hover:scale-110 transition-transform duration-300">
                        <?php echo esc_html($feature['icon']); ?>
                    </div>
                    <h3 class="text-2xl font-semibold mb-3 text-primary">
                        <?php echo esc_html($feature['title']); ?>
                    </h3>
                    <p class="text-gray-400">
                        <?php echo esc_html($feature['desc']); ?>
                    </p>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>

<!-- Technology Stack -->
<section class="py-20 bg-black">
    <div class="container mx-auto px-4 lg:px-8">
        <h2 class="text-4xl md:text-5xl font-bold text-center mb-16 opacity-0" data-scroll-reveal>
            Our Technology Stack
        </h2>

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">
            <?php
            $tech_stack = array('React', 'Node.js', 'Python', 'PHP', 'AWS', 'Docker', 'Kubernetes', 'TensorFlow', 'PostgreSQL', 'MongoDB', 'GraphQL', 'TypeScript');
            
            foreach ($tech_stack as $index => $tech) {
                ?>
                <div class="group text-center opacity-0" data-scroll-reveal data-delay="<?php echo ($index % 6) * 0.1; ?>">
                    <div class="bg-gray-900/50 border border-primary/20 rounded-lg p-6 hover:border-primary hover:shadow-lg hover:shadow-primary/20 transition-all duration-300 transform hover:scale-105">
                        <div class="text-3xl font-bold text-primary mb-2">
                            <?php echo esc_html(strtoupper(substr($tech, 0, 2))); ?>
                        </div>
                        <div class="text-sm text-gray-400">
                            <?php echo esc_html($tech); ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>

<!-- Process Flow -->
<section class="py-20 bg-gray-900/30">
    <div class="container mx-auto px-4 lg:px-8">
        <h2 class="text-4xl md:text-5xl font-bold text-center mb-16 opacity-0" data-scroll-reveal>
            Our Process
        </h2>

        <div class="max-w-4xl mx-auto">
            <div class="relative">
                <!-- Timeline Line -->
                <div class="absolute left-1/2 transform -translate-x-1/2 w-0.5 h-full bg-primary/30 hidden md:block"></div>

                <?php
                $process_steps = array(
                    array('step' => '01', 'title' => 'Discovery', 'desc' => 'We understand your business needs and goals'),
                    array('step' => '02', 'title' => 'Strategy', 'desc' => 'Crafting a tailored solution architecture'),
                    array('step' => '03', 'title' => 'Development', 'desc' => 'Building with cutting-edge technologies'),
                    array('step' => '04', 'title' => 'Deployment', 'desc' => 'Seamless launch and cloud deployment'),
                    array('step' => '05', 'title' => 'Support', 'desc' => 'Ongoing maintenance and optimization'),
                );

                foreach ($process_steps as $index => $step) {
                    $is_even = $index % 2 === 0;
                    ?>
                    <div class="relative mb-12 md:mb-20 opacity-0" data-scroll-reveal data-delay="<?php echo $index * 0.1; ?>">
                        <div class="flex flex-col md:flex-row items-center <?php echo $is_even ? 'md:flex-row-reverse' : ''; ?>">
                            <div class="w-full md:w-5/12 mb-6 md:mb-0 <?php echo $is_even ? 'md:text-right' : ''; ?>">
                                <div class="bg-gray-900/50 border border-primary/20 rounded-lg p-6 hover:border-primary transition-all duration-300">
                                    <span class="text-primary font-bold text-2xl"><?php echo esc_html($step['step']); ?></span>
                                    <h3 class="text-2xl font-semibold mb-2 text-white mt-2">
                                        <?php echo esc_html($step['title']); ?>
                                    </h3>
                                    <p class="text-gray-400">
                                        <?php echo esc_html($step['desc']); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center z-10 mx-auto md:mx-0">
                                <span class="text-black font-bold"><?php echo esc_html($step['step']); ?></span>
                            </div>
                            <div class="w-full md:w-5/12"></div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>

<!-- CTA Banner -->
<section class="py-20 bg-gradient-to-r from-primary/10 via-primary/5 to-primary/10">
    <div class="container mx-auto px-4 lg:px-8 text-center">
        <h2 class="text-4xl md:text-5xl font-bold mb-6 opacity-0" data-scroll-reveal>
            Ready to Transform Your Business?
        </h2>
        <p class="text-xl text-gray-300 mb-10 max-w-2xl mx-auto opacity-0" data-scroll-reveal>
            Let's discuss how we can help you achieve your goals with innovative software solutions.
        </p>
        <div class="opacity-0" data-scroll-reveal>
            <a href="<?php echo esc_url(home_url('/contact')); ?>" 
               class="inline-block px-8 py-4 bg-primary text-black font-semibold rounded-lg hover:bg-primary/90 transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-primary/50">
                Get Started Today
            </a>
        </div>
    </div>
</section>

<?php
get_footer();


