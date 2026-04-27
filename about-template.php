<?php
/**
 * Template Name: About
 */
get_header();
?>

<main id="primary" class="site-main">
    <?php
    $imageDesktop = get_template_directory_uri() . '/assets/images/about/bg-hero-ab-desktop.jpg';
    $imageMobile = get_template_directory_uri() . '/assets/images/about/bg-hero-about-mobile.jpg';
    yutaka_hero_section_shared('売り会社一覧', 'Selling company', $imageDesktop, $imageMobile);
    ?>
    <?php get_template_part('template-parts/about/content-section'); ?>
    <?php get_template_part('template-parts/about/company-section'); ?>
</main>
<?php get_footer(); ?>