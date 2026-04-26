<?php
/**
 * Template Name: Corporate Transfer
 */
get_header();
?>

<main id="primary" class="site-main">
    <?php
    $imageDesktop = get_template_directory_uri() . '/assets/images/corporate-transfer/bg-corporate-transfer-desktop.jpg';
    $imageMobile = get_template_directory_uri() . '/assets/images/corporate-transfer/bg-corporate-transfer-mb.jpg';
    yutaka_hero_section_shared('稼働法人の譲渡', 'Operating company transfer', $imageDesktop, $imageMobile);
    ?>
    <?php get_template_part('template-parts/corporate-transfer/about-section'); ?>
    <?php get_template_part('template-parts/corporate-transfer/business-section'); ?>
    <?php get_template_part('template-parts/corporate-transfer/consultation-section'); ?>
    <?php get_template_part('template-parts/corporate-transfer/popular-section'); ?>
    <?php get_template_part('template-parts/corporate-transfer/flow-section'); ?>
    <?php get_template_part('template-parts/corporate-transfer/transfer-section'); ?>
    <?php get_template_part('template-parts/corporate-transfer/valuation-section'); ?>
    <?php get_template_part('template-parts/corporate-transfer/support-section'); ?>
</main>
<?php get_footer(); ?>