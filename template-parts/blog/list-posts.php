<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$default_args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'paged' => $paged,
    'posts_per_page' => 9,
);

$query_args = !empty($args) ? wp_parse_args($args, $default_args) : $default_args;

$query = new WP_Query($query_args);

if ($query->have_posts()): ?>
    <div class="blog-list">
        <?php while ($query->have_posts()):
            $query->the_post(); ?>
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
                    <h3 class="blog-card__title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    <div class="blog-card__excerpt">
                        <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                    </div>
                    <div class="blog-card__tags">
                        <?php
                        $tags = get_the_tags();
                        $categories = get_the_category();

                        // Image shows categories and tags being used similarly
                        if ($categories) {
                            foreach ($categories as $category) {
                                echo '<span class="tag-item">BFY</span>'; // Example of how BFY might appearing in the design
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
    <div class="blog-pagination d-flex justify-content-center">
        <?php sazukaru_the_posts_navigation(array(
            'prev_text' => '<svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 11L1 6L7 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',
            'next_text' => '<svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1L7 6L1 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        ), false, $query); ?>
    </div>

    <?php wp_reset_postdata();
else: ?>
    <p>投稿が見つかりませんでした。</p>
<?php endif; ?>