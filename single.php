<?php
/**
 * The template for displaying single posts
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package     Yutaka
 */

get_header();
?>
<div class="single-post-page">
    <?php get_template_part('template-parts/blog/breadcrumbs-section'); ?>
    <main id="primary" class="site-main article-main">

        <?php
        while (have_posts()):
            the_post();
            get_template_part('template-parts/content-post');
            get_template_part('template-parts/blog/related-posts');
            get_template_part('template-parts/shared/contact-section');
        endwhile;
        ?>

    </main>
</div>
<?php
get_footer();