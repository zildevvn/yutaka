<?php
/**
 * Template Name: Contact
 */
get_header();
?>

<main id="primary" class="site-main">
    <?php
    $imageDesktop = get_template_directory_uri() . '/assets/images/contact/bg-contact-desktop.jpg';
    $imageMobile = get_template_directory_uri() . '/assets/images/contact/bg-contact-mobile.jpg';
    yutaka_hero_section_shared('お問い合わせ', 'Contact', $imageDesktop, $imageMobile);
    ?>
    <?php get_template_part('template-parts/contact/content-section'); ?>

</main>
<?php get_footer(); ?>