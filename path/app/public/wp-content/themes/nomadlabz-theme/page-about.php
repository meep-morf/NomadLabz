<?php
/**
 * Template Name: About Us Page
 *
 * @package NomadLabz
 */

get_header();
?>

<!-- Hero Section -->
<section class="py-20 bg-black">
    <div class="container mx-auto px-4 lg:px-8">
        <header class="text-center mb-16">
            <h1 class="text-5xl md:text-6xl font-bold mb-6 opacity-0" data-scroll-reveal>
                <span class="text-primary">About NomadLabz</span>
            </h1>
            <p class="text-xl text-gray-400 max-w-3xl mx-auto opacity-0" data-scroll-reveal>
                Pioneering the future of software solutions through innovation, AI, and automation
            </p>
        </header>
    </div>
</section>

<!-- Vision & Mission -->
<section class="py-20 bg-gray-900/30">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 max-w-6xl mx-auto">
            <div class="opacity-0" data-scroll-reveal>
                <div class="bg-gray-900/50 border border-primary/20 rounded-lg p-8 hover:border-primary transition-all duration-300">
                    <h2 class="text-3xl font-semibold mb-4 text-primary">Our Vision</h2>
                    <p class="text-gray-300 text-lg leading-relaxed">
                        To be the leading force in transforming businesses through cutting-edge software solutions that leverage the power of artificial intelligence, automation, and cloud technologies. We envision a world where technology seamlessly integrates with business processes, enabling unprecedented growth and innovation.
                    </p>
                </div>
            </div>

            <div class="opacity-0" data-scroll-reveal data-delay="0.1">
                <div class="bg-gray-900/50 border border-primary/20 rounded-lg p-8 hover:border-primary transition-all duration-300">
                    <h2 class="text-3xl font-semibold mb-4 text-primary">Our Mission</h2>
                    <p class="text-gray-300 text-lg leading-relaxed">
                        To deliver exceptional software solutions that empower businesses to achieve their goals. We combine technical expertise with a deep understanding of business needs, creating scalable, secure, and innovative platforms that drive digital transformation and sustainable growth.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Focus Areas -->
<section class="py-20 bg-black">
    <div class="container mx-auto px-4 lg:px-8">
        <h2 class="text-4xl md:text-5xl font-bold text-center mb-16 opacity-0" data-scroll-reveal>
            What We Focus On
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <?php
            $focus_areas = array(
                array(
                    'icon' => '🧠',
                    'title' => 'Innovation',
                    'desc' => 'Staying at the forefront of technology trends and emerging solutions'
                ),
                array(
                    'icon' => '🤖',
                    'title' => 'AI & Automation',
                    'desc' => 'Leveraging artificial intelligence to solve complex business challenges'
                ),
                array(
                    'icon' => '📈',
                    'title' => 'Scalability',
                    'desc' => 'Building systems that grow with your business from day one'
                ),
            );

            foreach ($focus_areas as $index => $area) {
                ?>
                <div class="text-center opacity-0" data-scroll-reveal data-delay="<?php echo $index * 0.1; ?>">
                    <div class="text-6xl mb-6 transform hover:scale-110 transition-transform duration-300">
                        <?php echo esc_html($area['icon']); ?>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4 text-primary">
                        <?php echo esc_html($area['title']); ?>
                    </h3>
                    <p class="text-gray-400">
                        <?php echo esc_html($area['desc']); ?>
                    </p>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-20 bg-gray-900/30">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto text-center">
            <?php
            $stats = array(
                array('number' => '100+', 'label' => 'Projects Completed', 'id' => 'stat-projects'),
                array('number' => '50+', 'label' => 'Happy Clients', 'id' => 'stat-clients'),
                array('number' => '5+', 'label' => 'Years Experience', 'id' => 'stat-years'),
            );

            foreach ($stats as $stat) {
                ?>
                <div class="opacity-0" data-scroll-reveal>
                    <div class="bg-gray-900/50 border border-primary/20 rounded-lg p-8 hover:border-primary transition-all duration-300">
                        <div class="text-5xl md:text-6xl font-bold text-primary mb-4" id="<?php echo esc_attr($stat['id']); ?>">
                            0
                        </div>
                        <div class="text-xl text-gray-300">
                            <?php echo esc_html($stat['label']); ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>

<!-- Values -->
<section class="py-20 bg-black">
    <div class="container mx-auto px-4 lg:px-8">
        <h2 class="text-4xl md:text-5xl font-bold text-center mb-16 opacity-0" data-scroll-reveal>
            Our Values
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 max-w-6xl mx-auto">
            <?php
            $values = array(
                array('title' => 'Excellence', 'desc' => 'Delivering the highest quality in everything we do'),
                array('title' => 'Innovation', 'desc' => 'Embracing new technologies and creative solutions'),
                array('title' => 'Integrity', 'desc' => 'Transparent, honest, and ethical in all interactions'),
                array('title' => 'Partnership', 'desc' => 'Building long-term relationships with our clients'),
            );

            foreach ($values as $index => $value) {
                ?>
                <div class="bg-gray-900/50 border border-primary/20 rounded-lg p-6 hover:border-primary transition-all duration-300 opacity-0" 
                     data-scroll-reveal data-delay="<?php echo $index * 0.1; ?>">
                    <h3 class="text-xl font-semibold mb-3 text-primary">
                        <?php echo esc_html($value['title']); ?>
                    </h3>
                    <p class="text-gray-400 text-sm">
                        <?php echo esc_html($value['desc']); ?>
                    </p>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>

<?php
get_footer();


