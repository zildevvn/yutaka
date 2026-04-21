<?php
/**
 * Template Name: Partners
 */
get_header();
?>

    <main id="primary" class="site-main">
        <?php get_template_part('template-parts/partners/hero-section'); ?>
        <?php get_template_part('template-parts/partners/poker-section'); ?>
        <?php get_template_part('template-parts/partners/queens-nine'); ?>
        <?php get_template_part('template-parts/shared/partner-section'); ?>
        <?php get_template_part('template-parts/partners/vertex-section'); ?>
    </main>
<?php get_footer(); ?>