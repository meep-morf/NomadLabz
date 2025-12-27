<?php
/**
 * Template part for displaying posts
 *
 * @package NomadLabz
 */
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
            <?php
            if (has_excerpt()) {
                the_excerpt();
            } else {
                echo wp_trim_words(get_the_content(), 20, '...');
            }
            ?>
        </div>

        <a href="<?php the_permalink(); ?>" 
           class="text-primary hover:text-primary/80 font-semibold inline-flex items-center group-hover:translate-x-1 transition-transform">
            <?php echo esc_html__('Read More', 'nomadlabz'); ?> →
        </a>
    </div>
</article>

