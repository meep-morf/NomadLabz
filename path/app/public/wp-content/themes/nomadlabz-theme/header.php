<?php
/**
 * The header for our theme
 *
 * @package NomadLabz
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-black text-white antialiased'); ?>>
<?php wp_body_open(); ?>

<header id="masthead" class="fixed top-0 left-0 right-0 z-50 bg-black/80 backdrop-blur-md border-b border-primary/20">
    <nav class="container mx-auto px-4 lg:px-8 py-4">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center space-x-3 group">
                    <?php
                    $logo_url = nomadlabz_get_logo_url();
                    if ($logo_url):
                    ?>
                        <img src="<?php echo esc_url($logo_url); ?>" 
                             alt="<?php bloginfo('name'); ?>" 
                             class="h-10 w-auto transition-transform duration-300 group-hover:scale-105"
                             id="header-logo">
                    <?php else: ?>
                        <span class="text-2xl font-bold text-primary">NomadLabz</span>
                    <?php endif; ?>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center space-x-8" role="navigation" aria-label="Primary Navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'flex items-center space-x-8',
                    'fallback_cb' => false,
                ));
                ?>
            </nav>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-toggle" 
                    class="md:hidden text-primary hover:text-primary/80 transition-colors"
                    aria-label="Toggle menu"
                    aria-expanded="false">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path id="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    <path id="close-icon" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="hidden md:hidden mt-4 pb-4 border-t border-primary/20">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'flex flex-col space-y-4 pt-4',
            ));
            ?>
        </div>
    </nav>
</header>

<main id="main-content" class="pt-20">

