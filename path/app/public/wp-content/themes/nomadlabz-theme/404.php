<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package NomadLabz
 */

get_header();
?>

<section class="min-h-screen flex items-center justify-center py-20">
    <div class="container mx-auto px-4 lg:px-8 text-center">
        <div class="max-w-2xl mx-auto">
            <!-- 404 Animation -->
            <div class="mb-8 opacity-0" id="404-animation" data-scroll-reveal>
                <h1 class="text-9xl md:text-[12rem] font-bold text-primary mb-4">
                    404
                </h1>
                <div class="w-24 h-1 bg-primary mx-auto"></div>
            </div>

            <h2 class="text-4xl md:text-5xl font-bold mb-6 text-white opacity-0" data-scroll-reveal data-delay="0.1">
                <?php echo esc_html__('Page Not Found', 'nomadlabz'); ?>
            </h2>

            <p class="text-xl text-gray-400 mb-10 max-w-xl mx-auto opacity-0" data-scroll-reveal data-delay="0.2">
                <?php echo esc_html__('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'nomadlabz'); ?>
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center opacity-0" data-scroll-reveal data-delay="0.3">
                <a href="<?php echo esc_url(home_url('/')); ?>" 
                   class="px-8 py-4 bg-primary text-black font-semibold rounded-lg hover:bg-primary/90 transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-primary/50">
                    <?php echo esc_html__('Go to Homepage', 'nomadlabz'); ?>
                </a>
                <a href="javascript:history.back()" 
                   class="px-8 py-4 border-2 border-primary text-primary font-semibold rounded-lg hover:bg-primary/10 transition-all duration-300 hover:scale-105">
                    <?php echo esc_html__('Go Back', 'nomadlabz'); ?>
                </a>
            </div>

            <!-- Search Form -->
            <div class="mt-12 opacity-0" data-scroll-reveal data-delay="0.4">
                <h3 class="text-2xl font-semibold mb-6 text-primary">
                    <?php echo esc_html__('Search Our Site', 'nomadlabz'); ?>
                </h3>
                <?php get_search_form(); ?>
            </div>

            <!-- Quick Links -->
            <div class="mt-16 opacity-0" data-scroll-reveal data-delay="0.5">
                <p class="text-gray-400 mb-6">
                    <?php echo esc_html__('Or visit these popular pages:', 'nomadlabz'); ?>
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <?php
                    $popular_pages = array(
                        array('title' => 'Home', 'url' => home_url('/')),
                        array('title' => 'Services', 'url' => home_url('/services')),
                        array('title' => 'Solutions', 'url' => home_url('/solutions')),
                        array('title' => 'About', 'url' => home_url('/about')),
                        array('title' => 'Contact', 'url' => home_url('/contact')),
                    );

                    foreach ($popular_pages as $page) {
                        echo '<a href="' . esc_url($page['url']) . '" class="px-4 py-2 bg-gray-900/50 border border-primary/20 text-primary rounded-lg hover:bg-primary/10 hover:border-primary transition-all duration-300">' . esc_html($page['title']) . '</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();

