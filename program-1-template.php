<?php
/**
 * Template Name: Program 1
 */
get_header();
?>

<main id="primary" class="site-main">
    <?php get_template_part('template-parts/program-1/hero-section'); ?>
    <?php get_template_part('template-parts/program-1/breadcrumbs-section'); ?>
    <?php get_template_part('template-parts/program-1/program-list'); ?>
    <?php get_template_part('template-parts/program-1/content-section'); ?>
    <?php get_template_part('template-parts/shared/contact-section'); ?>
</main>
<?php get_footer(); ?>