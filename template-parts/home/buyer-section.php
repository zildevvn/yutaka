<section class="yutaka-section buyer-section">
    <div class="container">
        <p class="yutaka-section__label">news</p>
        <h2 class="yutaka-section__title">買いたい方向け新着情報</h2>
        <div class="yutaka-section__line"></div>

        <div class="buyer-section__content">
            <?php
            $buyer_banner_query = new WP_Query(array(
                'post_type' => 'buyer_banner',
                'posts_per_page' => 1,
                'post_status' => 'publish',
            ));

            if ($buyer_banner_query->have_posts()):
                while ($buyer_banner_query->have_posts()):
                    $buyer_banner_query->the_post(); ?>
                    <div class="buyer-section__banner text-center">
                        <?php if (has_post_thumbnail()): ?>
                            <?php the_post_thumbnail('full', array('class' => 'buyer-section__banner-img', 'alt' => get_the_title())); ?>
                        <?php endif; ?>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>
    </div>
</section>