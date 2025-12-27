<?php
/**
 * Template Name: Services Page
 *
 * @package NomadLabz
 */

get_header();
?>

<section class="py-20 bg-black">
    <div class="container mx-auto px-4 lg:px-8">
        <header class="text-center mb-16">
            <h1 class="text-5xl md:text-6xl font-bold mb-6 opacity-0" data-scroll-reveal>
                <span class="text-primary">Our Services</span>
            </h1>
            <p class="text-xl text-gray-400 max-w-3xl mx-auto opacity-0" data-scroll-reveal>
                Comprehensive software solutions tailored to transform your business
            </p>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $services = get_posts(array(
                'post_type' => 'service',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC',
            ));

            if ($services) {
                foreach ($services as $index => $service) {
                    $icon = get_post_meta($service->ID, 'service_icon', true);
                    $use_cases = get_post_meta($service->ID, 'use_cases', true);
                    $tech_stack = get_post_meta($service->ID, 'tech_stack', true);
                    ?>
                    <article class="group bg-gray-900/50 border border-primary/20 rounded-lg p-8 hover:border-primary hover:shadow-lg hover:shadow-primary/20 transition-all duration-300 transform hover:-translate-y-2 opacity-0" 
                             data-scroll-reveal data-delay="<?php echo $index * 0.1; ?>">
                        <?php if ($icon): ?>
                            <div class="text-5xl mb-4 transform group-hover:scale-110 transition-transform duration-300">
                                <?php echo esc_html($icon); ?>
                            </div>
                        <?php else: ?>
                            <div class="w-16 h-16 bg-primary/20 rounded-lg flex items-center justify-center mb-4 group-hover:bg-primary/30 transition-colors"></div>
                        <?php endif; ?>

                        <h2 class="text-2xl font-semibold mb-4 text-primary">
                            <?php echo esc_html($service->post_title); ?>
                        </h2>

                        <div class="text-gray-400 mb-6">
                            <?php echo wp_kses_post($service->post_content ?: get_the_excerpt($service->ID)); ?>
                        </div>

                        <?php if ($use_cases): ?>
                            <div class="mb-4">
                                <h3 class="text-sm font-semibold text-primary mb-2">Use Cases:</h3>
                                <ul class="text-sm text-gray-400 space-y-1">
                                    <?php
                                    $cases = explode("\n", $use_cases);
                                    foreach ($cases as $case) {
                                        if (trim($case)) {
                                            echo '<li class="flex items-start"><span class="text-primary mr-2">•</span>' . esc_html(trim($case)) . '</li>';
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <?php if ($tech_stack): ?>
                            <div class="mb-4">
                                <h3 class="text-sm font-semibold text-primary mb-2">Tech Stack:</h3>
                                <div class="flex flex-wrap gap-2">
                                    <?php
                                    $techs = explode(',', $tech_stack);
                                    foreach ($techs as $tech) {
                                        if (trim($tech)) {
                                            echo '<span class="px-3 py-1 bg-primary/10 text-primary text-xs rounded-full border border-primary/20">' . esc_html(trim($tech)) . '</span>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <a href="<?php echo esc_url(get_permalink($service->ID)); ?>" 
                           class="inline-block mt-6 text-primary hover:text-primary/80 font-semibold inline-flex items-center group-hover:translate-x-1 transition-transform">
                            Learn More →
                        </a>
                    </article>
                    <?php
                }
            } else {
                // Default services if none exist
                $default_services = array(
                    array(
                        'icon' => '🤖',
                        'title' => 'AI Automations',
                        'desc' => 'Intelligent automation solutions that streamline workflows, reduce manual effort, and enhance productivity through machine learning and AI technologies.',
                        'use_cases' => "Customer support automation\nData processing and analysis\nWorkflow optimization\nPredictive maintenance",
                        'tech' => 'Python, TensorFlow, OpenAI API, Node.js'
                    ),
                    array(
                        'icon' => '💻',
                        'title' => 'Custom Web Development',
                        'desc' => 'Modern, scalable web applications built with cutting-edge technologies, responsive design, and optimal performance.',
                        'use_cases' => "E-commerce platforms\nBusiness portals\nSaaS applications\nProgressive web apps",
                        'tech' => 'React, Next.js, TypeScript, PHP, MySQL'
                    ),
                    array(
                        'icon' => '📱',
                        'title' => 'Mobile App Development',
                        'desc' => 'Native iOS and Android applications that deliver exceptional user experiences and seamless functionality.',
                        'use_cases' => "Consumer mobile apps\nEnterprise mobile solutions\nCross-platform applications\nMobile-first web apps",
                        'tech' => 'React Native, Swift, Kotlin, Flutter'
                    ),
                    array(
                        'icon' => '☁️',
                        'title' => 'SaaS Platforms',
                        'desc' => 'Cloud-based software solutions that scale with your business, offering subscription models and multi-tenant architecture.',
                        'use_cases' => "Business management tools\nCollaboration platforms\nAnalytics dashboards\nSubscription services",
                        'tech' => 'Node.js, AWS, PostgreSQL, Stripe API'
                    ),
                    array(
                        'icon' => '🔌',
                        'title' => 'API Integrations',
                        'desc' => 'Seamless connectivity between systems, third-party services, and platforms to create unified workflows.',
                        'use_cases' => "Third-party service integration\nPayment gateway integration\nCRM/ERP connectivity\nData synchronization",
                        'tech' => 'REST API, GraphQL, Webhooks, OAuth'
                    ),
                    array(
                        'icon' => '⚙️',
                        'title' => 'Business Process Automation',
                        'desc' => 'Optimize operations with intelligent automation that eliminates repetitive tasks and improves efficiency.',
                        'use_cases' => "Document processing\nEmail automation\nReport generation\nTask scheduling",
                        'tech' => 'Python, Zapier, Airflow, RPA tools'
                    ),
                    array(
                        'icon' => '🚀',
                        'title' => 'Cloud & Deployment Solutions',
                        'desc' => 'Scalable cloud infrastructure and deployment strategies ensuring high availability and performance.',
                        'use_cases' => "AWS/Azure/GCP setup\nCI/CD pipelines\nContainer orchestration\nMonitoring and logging",
                        'tech' => 'Docker, Kubernetes, Terraform, AWS'
                    ),
                );

                foreach ($default_services as $index => $service) {
                    ?>
                    <article class="group bg-gray-900/50 border border-primary/20 rounded-lg p-8 hover:border-primary hover:shadow-lg hover:shadow-primary/20 transition-all duration-300 transform hover:-translate-y-2 opacity-0" 
                             data-scroll-reveal data-delay="<?php echo $index * 0.1; ?>">
                        <div class="text-5xl mb-4 transform group-hover:scale-110 transition-transform duration-300">
                            <?php echo esc_html($service['icon']); ?>
                        </div>

                        <h2 class="text-2xl font-semibold mb-4 text-primary">
                            <?php echo esc_html($service['title']); ?>
                        </h2>

                        <div class="text-gray-400 mb-6">
                            <?php echo esc_html($service['desc']); ?>
                        </div>

                        <div class="mb-4">
                            <h3 class="text-sm font-semibold text-primary mb-2">Use Cases:</h3>
                            <ul class="text-sm text-gray-400 space-y-1">
                                <?php
                                $cases = explode("\n", $service['use_cases']);
                                foreach ($cases as $case) {
                                    if (trim($case)) {
                                        echo '<li class="flex items-start"><span class="text-primary mr-2">•</span>' . esc_html(trim($case)) . '</li>';
                                    }
                                }
                                ?>
                            </ul>
                        </div>

                        <div class="mb-4">
                            <h3 class="text-sm font-semibold text-primary mb-2">Tech Stack:</h3>
                            <div class="flex flex-wrap gap-2">
                                <?php
                                $techs = explode(',', $service['tech']);
                                foreach ($techs as $tech) {
                                    if (trim($tech)) {
                                        echo '<span class="px-3 py-1 bg-primary/10 text-primary text-xs rounded-full border border-primary/20">' . esc_html(trim($tech)) . '</span>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </article>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-primary/10 via-primary/5 to-primary/10">
    <div class="container mx-auto px-4 lg:px-8 text-center">
        <h2 class="text-4xl md:text-5xl font-bold mb-6 opacity-0" data-scroll-reveal>
            Ready to Get Started?
        </h2>
        <p class="text-xl text-gray-300 mb-10 max-w-2xl mx-auto opacity-0" data-scroll-reveal>
            Let's discuss how our services can help transform your business.
        </p>
        <div class="opacity-0" data-scroll-reveal>
            <a href="<?php echo esc_url(home_url('/contact')); ?>" 
               class="inline-block px-8 py-4 bg-primary text-black font-semibold rounded-lg hover:bg-primary/90 transition-all duration-300 hover:scale-105">
                Contact Us
            </a>
        </div>
    </div>
</section>

<?php
get_footer();


