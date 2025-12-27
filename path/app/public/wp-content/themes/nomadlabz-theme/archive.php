<?php
/**
 * The template for displaying archive pages
 *
 * @package NomadLabz
 */

get_header();
?>

<div class="container mx-auto px-4 lg:px-8 py-12">
    <header class="mb-12 text-center">
        <?php
        the_archive_title('<h1 class="text-4xl md:text-5xl font-bold text-primary mb-4">', '</h1>');
        the_archive_description('<div class="text-xl text-gray-400 max-w-3xl mx-auto">', '</div>');
        ?>
    </header>

    <?php if (have_posts()): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            while (have_posts()) {
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('group bg-gray-900/50 border border-primary/20 rounded-lg overflow-hidden hover:border-primary hover:shadow-lg hover:shadow-primary/20 transition-all duration-300 transform hover:-translate-y-2'); ?>>
                    <?php if (has_post_thumbnail()): ?>
                        <a href="<?php the_permalink(); ?>" class="block overflow-hidden">
                            <?php the_post_thumbnail('medium', array('class' => 'w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500')); ?>
                        </a>
                    <?php endif; ?>

                    <div class="p-6">
                        <div class="text-sm text-gray-400 mb-3">
                            <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                <?php echo esc_html(get_the_date()); ?>
                            </time>
                            <?php if (has_category()): ?>
                                <span class="mx-2">•</span>
                                <?php the_category(', '); ?>
                            <?php endif; ?>
                        </div>

                        <h2 class="text-2xl font-semibold mb-3 text-white group-hover:text-primary transition-colors">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>

                        <div class="text-gray-400 mb-4">
                            <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                        </div>

                        <a href="<?php the_permalink(); ?>" 
                           class="text-primary hover:text-primary/80 font-semibold inline-flex items-center group-hover:translate-x-1 transition-transform">
                            <?php echo esc_html__('Read More', 'nomadlabz'); ?> →
                        </a>
                    </div>
                </article>
                <?php
            }
            ?>
        </div>

        <nav class="mt-12 flex justify-center" aria-label="Posts navigation">
            <?php
            the_posts_pagination(array(
                'prev_text' => '<span class="px-4 py-2 bg-gray-900/50 border border-primary/20 text-primary rounded-lg hover:bg-primary/10 transition-colors">' . esc_html__('Previous', 'nomadlabz') . '</span>',
                'next_text' => '<span class="px-4 py-2 bg-gray-900/50 border border-primary/20 text-primary rounded-lg hover:bg-primary/10 transition-colors">' . esc_html__('Next', 'nomadlabz') . '</span>',
            ));
            ?>
        </nav>

    <?php else: ?>
        <div class="text-center py-20">
            <h2 class="text-2xl font-bold text-primary mb-4">
                <?php echo esc_html__('Nothing Found', 'nomadlabz'); ?>
            </h2>
            <p class="text-gray-400 mb-8">
                <?php echo esc_html__('It seems we can\'t find what you\'re looking for.', 'nomadlabz'); ?>
            </p>
            <a href="<?php echo esc_url(home_url('/')); ?>" 
               class="inline-block px-6 py-3 bg-primary text-black font-semibold rounded-lg hover:bg-primary/90 transition-colors">
                <?php echo esc_html__('Return Home', 'nomadlabz'); ?>
            </a>
        </div>
    <?php endif; ?>
</div>

<?php
get_footer();

