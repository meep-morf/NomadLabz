<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @package NomadLabz
 */
?>

<section class="text-center py-20">
    <h1 class="text-4xl font-bold text-primary mb-4">Nothing Found</h1>
    <p class="text-gray-400 mb-8">It seems we can't find what you're looking for.</p>
    <a href="<?php echo esc_url(home_url('/')); ?>" 
       class="inline-block px-6 py-3 bg-primary text-black font-semibold rounded hover:bg-primary/90 transition-colors">
        Return Home
    </a>
</section>


