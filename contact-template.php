<?php
/**
 * Template Name: Contact
 */
get_header();
?>

<main id="primary" class="site-main">
    <?php get_template_part('template-parts/contact/hero-section'); ?>
    <?php get_template_part('template-parts/contact/breadcrumbs-section'); ?>
    <?php get_template_part('template-parts/contact/content-section'); ?>
    <?php get_template_part('template-parts/shared/contact-section'); ?>
</main>
<?php get_footer(); ?>