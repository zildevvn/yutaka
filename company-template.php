<?php
/**
 * Template Name: Company
 */
get_header();
?>

<main id="primary" class="site-main">
    <?php get_template_part('template-parts/company/hero-section'); ?>
    <?php get_template_part('template-parts/company/breadcrumbs-section'); ?>
    <?php get_template_part('template-parts/company/content-section'); ?>
    <?php get_template_part('template-parts/shared/contact-section'); ?>
</main>
<?php get_footer(); ?>