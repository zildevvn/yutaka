<?php
/**
 * Template Name: Homepage
 * Front Page Template
 */

get_header();
?>
<main id="primary" class="site-main template-home">
    <?php get_template_part('template-parts/home/news-section'); ?>
    <?php get_template_part('template-parts/home/buyer-listing-section'); ?>
    <?php get_template_part('template-parts/home/buyer-section'); ?>
    <?php get_template_part('template-parts/home/about-section'); ?>
    <?php get_template_part('template-parts/home/recommend-section'); ?>
</main>
<?php
get_footer();