<section class="yutaka-section news-section">
    <div class="container">
        <p class="yutaka-section__label">news</p>
        <h2 class="yutaka-section__title">ニュース</h2>
        <div class="yutaka-section__line"></div>

        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1);
        $news_query = new WP_Query(array(
            'post_type' => 'news',
            'posts_per_page' => 10,
            'paged' => $paged,
            'post_status' => 'publish',
        ));
        ?>

        <?php if ($news_query->have_posts()): ?>
            <div class="news-section__list">
                <?php
                while ($news_query->have_posts()):
                    $news_query->the_post();
                    $post_date = get_the_date('Y/m/d');
                    $is_new = get_field('is_new');
                    $categories = get_the_terms(get_the_ID(), 'category-news');
                    $category_name = (!is_wp_error($categories) && !empty($categories)) ? esc_html($categories[0]->name) : 'お知らせ';
                    ?>
                    <article class="news-item">
                        <a href="<?php the_permalink(); ?>" class="news-item__link">
                            <span class="news-item__date"><?php echo esc_html($post_date); ?></span>
                            <span class="news-item__cat"><?php echo $category_name; ?></span>
                            <?php if ($is_new): ?>
                                <span class="news-item__new">NEW</span>
                            <?php endif; ?>
                            <span class="news-item__title"><?php the_title(); ?></span>
                            <span class="news-item__arrow">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-arrow.png"
                                    alt="icon" />
                            </span>
                        </a>
                    </article>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>

            <?php if ($news_query->max_num_pages > 1): ?>
                <div class="news-pagination">
                    <?php
                    echo paginate_links(array(
                        'base' => add_query_arg('paged', '%#%'),
                        'format' => '?paged=%#%',
                        'total' => $news_query->max_num_pages,
                        'current' => $paged,
                        'prev_text' => '前のページ',
                        'next_text' => '次のページ',
                    ));
                    ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</section>