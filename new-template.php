<?php
/**
 * Template Name: News
 */
get_header();
?>

<main id="primary" class="site-main">
    <?php
    $imageDesktop = get_template_directory_uri() . '/assets/images/company/hero-company-desktop.jpg';
    $imageMobile = get_template_directory_uri() . '/assets/images/company/hero-company-mobile.jpg';
    yutaka_hero_section_shared('ニュース', 'News', $imageDesktop, $imageMobile);
    ?>
    <?php get_template_part('template-parts/news/content-section'); ?>
</main>
<?php get_footer(); ?>