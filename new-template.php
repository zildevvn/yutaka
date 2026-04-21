<?php
/**
 * Template Name: News
 */
get_header();
?>

<main id="primary" class="site-main">
    <?php get_template_part('template-parts/news/hero-section'); ?>
    <?php get_template_part('template-parts/news/breadcrumbs-section'); ?>
    <?php get_template_part('template-parts/news/content-section'); ?>
    <?php get_template_part('template-parts/shared/contact-section'); ?>
</main>
<?php get_footer(); ?>