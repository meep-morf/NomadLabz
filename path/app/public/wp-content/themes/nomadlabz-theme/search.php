<?php
/**
 * The template for displaying search results
 *
 * @package NomadLabz
 */

get_header();
?>

<div class="container mx-auto px-4 lg:px-8 py-12">
    <header class="mb-12">
        <h1 class="text-4xl md:text-5xl font-bold text-primary mb-4">
            <?php
            printf(
                esc_html__('Search Results for: %s', 'nomadlabz'),
                '<span class="text-white">' . get_search_query() . '</span>'
            );
            ?>
        </h1>
        <p class="text-xl text-gray-400">
            <?php
            global $wp_query;
            if ($wp_query->found_posts) {
                printf(
                    esc_html(_n('%s result found', '%s results found', $wp_query->found_posts, 'nomadlabz')),
                    number_format_i18n($wp_query->found_posts)
                );
            }
            ?>
        </p>
    </header>

    <?php if (have_posts()): ?>
        <div class="space-y-8 mb-12">
            <?php
            while (have_posts()) {
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('bg-gray-900/50 border border-primary/20 rounded-lg p-8 hover:border-primary transition-all duration-300'); ?>>
                    <div class="flex flex-col md:flex-row gap-6">
                        <?php if (has_post_thumbnail()): ?>
                            <div class="md:w-1/3 flex-shrink-0">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium', array('class' => 'w-full h-48 md:h-full object-cover rounded-lg')); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <div class="flex-1">
                            <div class="flex items-center space-x-4 text-sm text-gray-400 mb-3">
                                <?php
                                $post_type = get_post_type();
                                $post_type_object = get_post_type_object($post_type);
                                if ($post_type_object) {
                                    echo '<span class="px-3 py-1 bg-primary/10 text-primary rounded-full text-xs">' . esc_html($post_type_object->labels->singular_name) . '</span>';
                                }
                                ?>
                                <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                    <?php echo esc_html(get_the_date()); ?>
                                </time>
                            </div>

                            <h2 class="text-2xl md:text-3xl font-semibold mb-3 text-white hover:text-primary transition-colors">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>

                            <div class="text-gray-400 mb-4">
                                <?php echo wp_trim_words(get_the_excerpt(), 30, '...'); ?>
                            </div>

                            <a href="<?php the_permalink(); ?>" 
                               class="text-primary hover:text-primary/80 font-semibold inline-flex items-center hover:translate-x-1 transition-transform">
                                <?php echo esc_html__('Read More', 'nomadlabz'); ?> →
                            </a>
                        </div>
                    </div>
                </article>
                <?php
            }
            ?>
        </div>

        <nav class="flex justify-center" aria-label="Search results navigation">
            <?php
            the_posts_pagination(array(
                'prev_text' => '<span class="px-4 py-2 bg-gray-900/50 border border-primary/20 text-primary rounded-lg hover:bg-primary/10 transition-colors">' . esc_html__('Previous', 'nomadlabz') . '</span>',
                'next_text' => '<span class="px-4 py-2 bg-gray-900/50 border border-primary/20 text-primary rounded-lg hover:bg-primary/10 transition-colors">' . esc_html__('Next', 'nomadlabz') . '</span>',
            ));
            ?>
        </nav>

    <?php else: ?>
        <div class="text-center py-20">
            <div class="text-6xl mb-6">🔍</div>
            <h2 class="text-3xl font-bold text-primary mb-4">
                <?php echo esc_html__('No Results Found', 'nomadlabz'); ?>
            </h2>
            <p class="text-xl text-gray-400 mb-10 max-w-xl mx-auto">
                <?php echo esc_html__('Sorry, but nothing matched your search terms. Please try again with different keywords.', 'nomadlabz'); ?>
            </p>

            <div class="max-w-md mx-auto mb-10">
                <?php get_search_form(); ?>
            </div>

            <div class="mt-12">
                <p class="text-gray-400 mb-6">
                    <?php echo esc_html__('Or browse our site:', 'nomadlabz'); ?>
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="<?php echo esc_url(home_url('/')); ?>" 
                       class="px-6 py-3 bg-primary text-black font-semibold rounded-lg hover:bg-primary/90 transition-colors">
                        <?php echo esc_html__('Home', 'nomadlabz'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/services')); ?>" 
                       class="px-6 py-3 border-2 border-primary text-primary font-semibold rounded-lg hover:bg-primary/10 transition-colors">
                        <?php echo esc_html__('Services', 'nomadlabz'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/solutions')); ?>" 
                       class="px-6 py-3 border-2 border-primary text-primary font-semibold rounded-lg hover:bg-primary/10 transition-colors">
                        <?php echo esc_html__('Solutions', 'nomadlabz'); ?>
                    </a>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php
get_footer();

