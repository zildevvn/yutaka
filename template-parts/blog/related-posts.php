<?php
/**
 * Template part for displaying related posts
 */

$post_id = get_the_ID();
$categories = wp_get_post_categories($post_id);

if ($categories):
    $args = array(
        'category__in' => $categories,
        'post__not_in' => array($post_id),
        'posts_per_page' => 3,
        'ignore_sticky_posts' => 1,
    );
    $related_query = new WP_Query($args);

    if ($related_query->have_posts()): ?>
        <section class="related-posts-section mb-0">
            <div class="container container-related">
                <div class="related-posts-section__header">
                    <h2 class="section-title">関連記事</h2>
                </div>
                <div class="blog-list">
                    <?php while ($related_query->have_posts()):
                        $related_query->the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('blog-card h-100'); ?>>
                            <div class="blog-card__thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail()): ?>
                                        <?php the_post_thumbnail('medium_large', ['class' => 'img-fluid w-100']); ?>
                                    <?php else: ?>
                                        <img src="<?= get_template_directory_uri() ?>/assets/images/placeholder.jpg" alt="placeholder"
                                            class="img-fluid w-100">
                                    <?php endif; ?>
                                </a>
                            </div>

                            <div class="blog-card__content">
                                <div class="blog-card__date">
                                    <?= get_the_date('Y.m.d') ?>
                                </div>
                                <h3 class="blog-card__title mb-0">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <div class="blog-card__tags">
                                    <?php
                                    $tags = get_the_tags();
                                    $categories = get_the_category();
                                    if ($categories) {
                                        foreach ($categories as $category) {
                                            echo '<span class="tag-item">' . esc_html($category->name) . '</span>';
                                        }
                                    }
                                    if ($tags) {
                                        foreach ($tags as $tag) {
                                            echo '<span class="tag-item">' . esc_html($tag->name) . '</span>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
        <?php
        wp_reset_postdata();
    endif;
endif;
