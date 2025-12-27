<?php
/**
 * The main template file
 *
 * @package NomadLabz
 */

get_header();
?>

<div class="container mx-auto px-4 lg:px-8 py-12">
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            get_template_part('template-parts/content', get_post_type());
        }
    } else {
        get_template_part('template-parts/content', 'none');
    }
    ?>
</div>

<?php
get_footer();


