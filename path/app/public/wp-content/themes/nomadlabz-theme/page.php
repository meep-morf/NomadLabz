<?php
/**
 * The template for displaying all pages
 *
 * @package NomadLabz
 */

get_header();

$page_slug = get_post_field('post_name', get_post());
?>

<?php
// Check for custom page templates
if (locate_template("page-{$page_slug}.php") !== '') {
    get_template_part('page', $page_slug);
} else {
    // Default page template
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('container mx-auto px-4 lg:px-8 py-12'); ?>>
        <header class="mb-8">
            <h1 class="text-4xl md:text-5xl font-bold text-primary mb-4">
                <?php the_title(); ?>
            </h1>
        </header>

        <div class="prose prose-invert prose-lg max-w-none">
            <?php
            the_content();
            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'nomadlabz'),
                'after'  => '</div>',
            ));
            ?>
        </div>
    </article>
    <?php
}

get_footer();


