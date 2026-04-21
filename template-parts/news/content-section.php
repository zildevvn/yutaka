<section class="sazukaru-section blog-content-section news-content-section">
    <div class="container">
        <div class="news-list" id="ajax-blog-container">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'news',
                'posts_per_page' => 9,
                'paged' => $paged,
            );
            $query = new WP_Query($args);

            if ($query->have_posts()):
                while ($query->have_posts()):
                    $query->the_post(); ?>
                    <article <?php post_class('news-item'); ?>>
                        <a href="<?php the_permalink(); ?>" class="news-item__wrapper">
                            <div class="news-item__date">
                                <?php echo get_the_date('Y.m.d'); ?>
                            </div>
                            <div class="news-item__content">
                                <h3 class="news-item__title"><?php the_title(); ?></h3>
                            </div>
                        </a>
                    </article>
                <?php endwhile;
                wp_reset_postdata();
            else: ?>
                <p>投稿が見つかりませんでした。</p>
            <?php endif; ?>
        </div>

        <?php if ($query->max_num_pages > 1): ?>
            <div class="blog-pagination d-flex justify-content-center">
                <?php sazukaru_the_posts_navigation(array(
                    'prev_text' => '<svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 11L1 6L7 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                    'next_text' => '<svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1L7 6L1 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                ), false, $query); ?>
            </div>
        <?php endif; ?>
    </div>
</section>