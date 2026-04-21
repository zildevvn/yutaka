<?php
get_header();
?>
<main id="primary" class="site-main">
    <?php get_template_part('template-parts/blog/hero-section'); ?>
    <?php get_template_part('template-parts/blog/breadcrumbs-section'); ?>
    <?php get_template_part('template-parts/blog/content-section'); ?>
    <?php get_template_part('template-parts/shared/contact-section'); ?>
</main>
<?php get_footer(); ?>