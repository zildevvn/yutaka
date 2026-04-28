<?php
/**
 * The template for displaying single posts
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package     Yutaka
 */

get_header();
?>
<div class="single-post-page">
    <main id="primary" class="site-main article-main">
        <?php
        $title = get_the_title();
        $imageDesktop = get_template_directory_uri() . '/assets/images/about/bg-hero-ab-desktop.jpg';
        $imageMobile = get_template_directory_uri() . '/assets/images/about/bg-hero-about-mobile.jpg';
        yutaka_hero_section_shared($title, '', $imageDesktop, $imageMobile);
        ?>
        <?php
        while (have_posts()):
            the_post();
            get_template_part('template-parts/content-post');
        endwhile;
        ?>

    </main>
</div>
<?php
get_footer();