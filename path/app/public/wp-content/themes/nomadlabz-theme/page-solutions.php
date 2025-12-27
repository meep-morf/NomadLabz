<?php
/**
 * Template Name: Solutions Page
 *
 * @package NomadLabz
 */

get_header();
?>

<section class="py-20 bg-black">
    <div class="container mx-auto px-4 lg:px-8">
        <header class="text-center mb-16">
            <h1 class="text-5xl md:text-6xl font-bold mb-6 opacity-0" data-scroll-reveal>
                <span class="text-primary">Industry Solutions</span>
            </h1>
            <p class="text-xl text-gray-400 max-w-3xl mx-auto opacity-0" data-scroll-reveal>
                Tailored solutions for different industries and business models
            </p>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-6xl mx-auto">
            <?php
            $solutions = get_posts(array(
                'post_type' => 'solution',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC',
            ));

            if ($solutions) {
                foreach ($solutions as $index => $solution) {
                    ?>
                    <article class="group bg-gray-900/50 border border-primary/20 rounded-lg p-8 hover:border-primary hover:shadow-lg hover:shadow-primary/20 transition-all duration-300 opacity-0" 
                             data-scroll-reveal data-delay="<?php echo $index * 0.1; ?>">
                        <?php if (has_post_thumbnail($solution->ID)): ?>
                            <div class="mb-6 overflow-hidden rounded-lg">
                                <?php echo get_the_post_thumbnail($solution->ID, 'large', array('class' => 'w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500')); ?>
                            </div>
                        <?php endif; ?>

                        <h2 class="text-3xl font-semibold mb-4 text-primary">
                            <?php echo esc_html($solution->post_title); ?>
                        </h2>

                        <div class="text-gray-400 mb-6 prose prose-invert max-w-none">
                            <?php echo wp_kses_post($solution->post_content ?: get_the_excerpt($solution->ID)); ?>
                        </div>

                        <a href="<?php echo esc_url(get_permalink($solution->ID)); ?>" 
                           class="inline-block text-primary hover:text-primary/80 font-semibold inline-flex items-center group-hover:translate-x-1 transition-transform">
                            Learn More →
                        </a>
                    </article>
                    <?php
                }
            } else {
                // Default solutions if none exist
                $default_solutions = array(
                    array(
                        'title' => 'Startups',
                        'desc' => 'Rapid MVP development, scalable architecture from day one, and cost-effective solutions that grow with your startup. We help you launch faster while maintaining the flexibility to scale.',
                        'features' => array('Quick MVP development', 'Scalable architecture', 'Budget-friendly solutions', 'Rapid iteration cycles')
                    ),
                    array(
                        'title' => 'Enterprises',
                        'desc' => 'Enterprise-grade solutions with robust security, compliance, and integration capabilities. We build systems that handle high traffic, complex workflows, and critical business operations.',
                        'features' => array('Enterprise security', 'High availability', 'Legacy system integration', 'Compliance ready')
                    ),
                    array(
                        'title' => 'E-commerce',
                        'desc' => 'Complete e-commerce solutions from online stores to payment processing, inventory management, and customer analytics. Built for performance, conversion, and growth.',
                        'features' => array('Payment integration', 'Inventory management', 'Order processing', 'Customer analytics')
                    ),
                    array(
                        'title' => 'Education',
                        'desc' => 'Learning management systems, student portals, and educational platforms that enhance the learning experience for students, teachers, and administrators.',
                        'features' => array('LMS platforms', 'Student portals', 'Assessment tools', 'Progress tracking')
                    ),
                    array(
                        'title' => 'Healthcare',
                        'desc' => 'HIPAA-compliant healthcare solutions including patient management systems, telemedicine platforms, and medical record management with the highest security standards.',
                        'features' => array('HIPAA compliance', 'Patient management', 'Telemedicine platforms', 'Secure data handling')
                    ),
                );

                foreach ($default_solutions as $index => $solution) {
                    ?>
                    <article class="group bg-gray-900/50 border border-primary/20 rounded-lg p-8 hover:border-primary hover:shadow-lg hover:shadow-primary/20 transition-all duration-300 opacity-0" 
                             data-scroll-reveal data-delay="<?php echo $index * 0.1; ?>">
                        <h2 class="text-3xl font-semibold mb-4 text-primary">
                            <?php echo esc_html($solution['title']); ?>
                        </h2>

                        <div class="text-gray-400 mb-6">
                            <?php echo esc_html($solution['desc']); ?>
                        </div>

                        <?php if (!empty($solution['features'])): ?>
                            <ul class="space-y-2 mb-6">
                                <?php foreach ($solution['features'] as $feature): ?>
                                    <li class="flex items-start text-gray-300">
                                        <span class="text-primary mr-2 mt-1">✓</span>
                                        <?php echo esc_html($feature); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
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
            Need a Custom Solution?
        </h2>
        <p class="text-xl text-gray-300 mb-10 max-w-2xl mx-auto opacity-0" data-scroll-reveal>
            We work with businesses across all industries to create tailored solutions.
        </p>
        <div class="opacity-0" data-scroll-reveal>
            <a href="<?php echo esc_url(home_url('/contact')); ?>" 
               class="inline-block px-8 py-4 bg-primary text-black font-semibold rounded-lg hover:bg-primary/90 transition-all duration-300 hover:scale-105">
                Get in Touch
            </a>
        </div>
    </div>
</section>

<?php
get_footer();


