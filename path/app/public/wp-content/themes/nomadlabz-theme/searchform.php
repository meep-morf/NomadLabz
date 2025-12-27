<?php
/**
 * Custom search form template
 *
 * @package NomadLabz
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="flex gap-2 max-w-md mx-auto">
        <label for="search-field" class="sr-only">
            <?php echo esc_html__('Search for:', 'nomadlabz'); ?>
        </label>
        <input 
            type="search" 
            id="search-field"
            class="flex-1 px-4 py-3 bg-gray-800 border border-primary/20 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-primary transition-colors" 
            placeholder="<?php echo esc_attr__('Search...', 'nomadlabz'); ?>" 
            value="<?php echo get_search_query(); ?>" 
            name="s"
            required
        />
        <button 
            type="submit" 
            class="px-6 py-3 bg-primary text-black font-semibold rounded-lg hover:bg-primary/90 transition-all duration-300 hover:scale-105"
            aria-label="<?php echo esc_attr__('Search', 'nomadlabz'); ?>"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </button>
    </div>
</form>

