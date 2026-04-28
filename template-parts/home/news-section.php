<section class="yutaka-section news-section">
    <div class="container">
        <p class="yutaka-section__label">news</p>
        <h2 class="yutaka-section__title">新着情報</h2>
        <div class="yutaka-section__line"></div>

        <?php
        $news_query = new WP_Query(array(
            'post_type' => 'news',
            'posts_per_page' => 4,
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

            <div class="news-section__btn d-flex justify-content-center">
                <a href="<?php echo home_url('/news'); ?>">新着情報一覧</a>
            </div>
        <?php endif; ?>
    </div>
</section>