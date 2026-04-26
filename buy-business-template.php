<?php
/**
 * Template Name: Buy Business
 */
get_header();
?>

<main id="primary" class="site-main">
    <?php
    $imageDesktop = get_template_directory_uri() . '/assets/images/buy-business/bg-hero-buy-business.png';
    $imageMobile = get_template_directory_uri() . '/assets/images/buy-business/bg-hero-buy-business-mobile.jpg';
    yutaka_hero_section_shared('会社を買う', 'Buying company', $imageDesktop, $imageMobile);
    ?>
    <?php get_template_part('template-parts/buy-business/company-acquisition'); ?>
    <?php get_template_part('template-parts/buy-business/procedure-section'); ?>
    <?php get_template_part('template-parts/buy-business/trust-section'); ?>
    <?php get_template_part('template-parts/buy-business/required-section'); ?>
    <?php get_template_part('template-parts/buy-business/pricing-section'); ?>
    <?php get_template_part('template-parts/buy-business/registration-section'); ?>
    <?php get_template_part('template-parts/buy-business/debt-info'); ?>
    <?php get_template_part('template-parts/buy-business/recommend-section'); ?>
</main>
<?php get_footer(); ?>