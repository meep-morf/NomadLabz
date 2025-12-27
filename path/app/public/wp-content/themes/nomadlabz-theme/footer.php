<?php
/**
 * The footer for our theme
 *
 * @package NomadLabz
 */
?>

</main><!-- #main-content -->

<footer id="colophon" class="bg-black border-t border-primary/20 py-12 mt-20">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            <!-- Brand Column -->
            <div class="col-span-1 md:col-span-2">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-block mb-4">
                    <?php
                    $logo_url = nomadlabz_get_logo_url();
                    if ($logo_url):
                    ?>
                        <img src="<?php echo esc_url($logo_url); ?>" 
                             alt="<?php bloginfo('name'); ?>" 
                             class="h-8 w-auto">
                    <?php else: ?>
                        <span class="text-xl font-bold text-primary">NomadLabz</span>
                    <?php endif; ?>
                </a>
                <p class="text-gray-400 text-sm max-w-md">
                    <?php bloginfo('description'); ?><?php echo !get_bloginfo('description') ? 'End-to-end software solutions powered by AI and automation.' : ''; ?>
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-primary font-semibold mb-4">Quick Links</h3>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'space-y-2',
                    'depth' => 1,
                ));
                ?>
            </div>

            <!-- Contact -->
            <div>
                <h3 class="text-primary font-semibold mb-4">Contact</h3>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li>
                        <a href="<?php echo esc_url(home_url('/contact')); ?>" 
                           class="hover:text-primary transition-colors">
                            Get in Touch
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/services')); ?>" 
                           class="hover:text-primary transition-colors">
                            Our Services
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-primary/20 pt-8">
            <p class="text-center text-sm text-gray-500">
                &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>


