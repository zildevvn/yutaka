<?php

/**
 * Template part for displaying posts
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package sazukaru
 */
?>

<div class="container container-content">

    <article id="post-<?php the_ID(); ?>" <?php post_class('article-post'); ?>>
        <header class="entry-header">
            <div class="entry-meta">
                <span class="posted-on">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                        <circle cx="6" cy="6" r="6" fill="#e9aeb6" />
                    </svg>
                    <?php echo get_the_date('Y.m.d'); ?>
                </span>
                <?php
                $categories = get_the_category();
                if (!empty($categories)):
                    foreach ($categories as $category): ?>
                        <span class="cat-links">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                <circle cx="6" cy="6" r="6" fill="#00c7d0" />
                            </svg>
                            <?php echo esc_html($category->name); ?>
                        </span>
                    <?php endforeach;
                endif;
                ?>
            </div>
            <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
        </header>

        <?php if (has_post_thumbnail()): ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
            </div>
        <?php endif; ?>

        <div class="entry-content">
            <?php
            the_content();
            ?>
        </div>
    </article>
</div>