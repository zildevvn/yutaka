<?php
/**
 * Template Name: About
 */
get_header();
?>

<main id="primary" class="site-main">
    <?php get_template_part('template-parts/about/hero-section'); ?>
    <?php get_template_part('template-parts/about/breadcrumbs-section'); ?>
    <?php get_template_part('template-parts/about/content-section'); ?>
    <?php get_template_part('template-parts/shared/contact-section'); ?>
</main>
<?php get_footer(); ?>