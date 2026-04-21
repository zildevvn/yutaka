<?php
/**
 * Template Name: Homepage
 * Front Page Template
 */

get_header();
?>
<main id="primary" class="site-main template-home">
    <?php get_template_part('template-parts/home/hero-section'); ?>
    <?php get_template_part('template-parts/home/news-section'); ?>
    <?php get_template_part('template-parts/home/about-section'); ?>
    <?php get_template_part('template-parts/home/reason-section'); ?>
    <?php get_template_part('template-parts/home/program-section'); ?>
    <?php get_template_part('template-parts/home/staff-section'); ?>
    <?php get_template_part('template-parts/home/record-section'); ?>
    <?php get_template_part('template-parts/home/partner-section'); ?>
    <?php get_template_part('template-parts/shared/contact-section'); ?>
    </main>
<?php
get_footer();