<?php
/**
 * Template Name: Sell A Business
 */
get_header();
?>

<main id="primary" class="site-main">
    <?php
    $imageDesktop = get_template_directory_uri() . '/assets/images/sell-business/bg-hero-desktop.jpg';
    $imageMobile = get_template_directory_uri() . '/assets/images/sell-business/bg-hero-mobile.jpg';
    yutaka_hero_section_shared('会社を売る', 'Selling company', $imageDesktop, $imageMobile);
    ?>
    <?php get_template_part('template-parts/sell-business/about-section'); ?>
    <?php get_template_part('template-parts/sell-business/flow-section'); ?>
    <?php get_template_part('template-parts/sell-business/selling-section'); ?>
    <?php get_template_part('template-parts/sell-business/preparation-section'); ?>
    <?php get_template_part('template-parts/sell-business/transaction-section'); ?>
    <?php get_template_part('template-parts/home/recommend-section'); ?>
</main>
<?php get_footer(); ?>