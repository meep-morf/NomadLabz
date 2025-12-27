<?php
/**
 * The template for displaying all single posts
 *
 * @package NomadLabz
 */

get_header();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('container mx-auto px-4 lg:px-8 py-12 max-w-4xl'); ?>>
    <header class="mb-8">
        <?php if (has_post_thumbnail()): ?>
            <div class="mb-8 rounded-lg overflow-hidden">
                <?php the_post_thumbnail('large', array('class' => 'w-full h-auto')); ?>
            </div>
        <?php endif; ?>

        <h1 class="text-4xl md:text-5xl font-bold text-primary mb-4">
            <?php the_title(); ?>
        </h1>

        <div class="flex items-center space-x-4 text-sm text-gray-400">
            <time datetime="<?php echo esc_attr(get_the_date('c')); ?>" class="post-date">
                <?php echo esc_html(get_the_date()); ?>
            </time>
            <?php if (get_the_author()): ?>
                <span class="separator">•</span>
                <span class="post-author">
                    <?php echo esc_html__('By', 'nomadlabz'); ?> <?php the_author(); ?>
                </span>
            <?php endif; ?>
            <?php if (has_category()): ?>
                <span class="separator">•</span>
                <span class="post-categories">
                    <?php the_category(', '); ?>
                </span>
            <?php endif; ?>
        </div>
    </header>

    <div class="prose prose-invert prose-lg max-w-none mb-8">
        <?php
        the_content();
        
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'nomadlabz'),
            'after'  => '</div>',
        ));
        ?>
    </div>

    <?php if (has_tag()): ?>
        <div class="mb-8 pt-8 border-t border-primary/20">
            <div class="flex flex-wrap gap-2">
                <?php
                $tags = get_the_tags();
                foreach ($tags as $tag) {
                    echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '" class="px-3 py-1 bg-primary/10 text-primary text-sm rounded-full border border-primary/20 hover:bg-primary/20 transition-colors">' . esc_html($tag->name) . '</a>';
                }
                ?>
            </div>
        </div>
    <?php endif; ?>

    <footer class="mt-12 pt-8 border-t border-primary/20">
        <nav class="flex justify-between items-center">
            <div>
                <?php
                $prev_post = get_previous_post();
                if ($prev_post):
                ?>
                    <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>" 
                       class="text-primary hover:text-primary/80 transition-colors inline-flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        <?php echo esc_html__('Previous Post', 'nomadlabz'); ?>
                    </a>
                <?php endif; ?>
            </div>
            <div>
                <?php
                $next_post = get_next_post();
                if ($next_post):
                ?>
                    <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" 
                       class="text-primary hover:text-primary/80 transition-colors inline-flex items-center">
                        <?php echo esc_html__('Next Post', 'nomadlabz'); ?>
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                <?php endif; ?>
            </div>
        </nav>
    </footer>
</article>

<?php
get_footer();

