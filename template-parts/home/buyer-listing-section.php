<?php

$args = [
    'post_type' => 'company',
    'posts_per_page' => 6,
    'post_status' => 'publish',
];

$query = new WP_Query($args);

?>

<section class="yutaka-section buyer-listing-section">
    <div class="container">
        <p class="yutaka-section__label">news</p>
        <h2 class="yutaka-section__title">買いたい方向け新着情報</h2>
        <div class="yutaka-section__line"></div>
        <?php if ($query->have_posts()): ?>
            <div class="buyer-listing-section__carousel-wrapper">
                <div class="buyer-listing-section__carousel swiper">
                    <div class="swiper-wrapper">
                        <?php while ($query->have_posts()):
                            $query->the_post();
                            $is_news = get_field('is_new');
                            $number = get_field('company_number');
                            ?>
                            <div class="buyer-item swiper-slide">
                                <div class="buyer-item__img">
                                    <?php if (has_post_thumbnail()): ?>
                                        <?php the_post_thumbnail('full', array('alt' => get_the_title())); ?>
                                    <?php else: ?>
                                        <img src="https://via.placeholder.com/400x250" alt="placeholder">
                                    <?php endif; ?>

                                    <div class="buyer-item__badges">
                                        <?php if ($is_news): ?>
                                            <div class="buyer-item__badge-new">NEW</div>
                                        <?php endif; ?>

                                        <?php if (!empty($number)): ?>
                                            <div class="buyer-item__badge-id">
                                                No.<?php echo esc_html($number); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="buyer-item__content">
                                    <h3 class="buyer-item__title">
                                        <?php the_title(); ?>
                                    </h3>
                                    <div class="buyer-item__desc">
                                        <?php the_excerpt(); ?>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="buyer-item__more">
                                        <span>もっと見る</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <polyline points="9 18 15 12 9 6"></polyline>
                                        </svg>
                                    </a>
                                </div>

                            </div>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </div>
                </div>
                <div class="buyer-listing-section__controls">
                    <div class="swiper-button-prev">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-prve.png"
                            alt="icon prve" />
                    </div>

                    <div class="swiper-pagination"></div>

                    <div class="swiper-button-next">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-next.png"
                            alt="icon next" />
                    </div>
                </div>
            </div>

            <div class="buyer-listing-section__btn">
                <a href="<?php echo home_url('/about-vendors/') ?>">新着情報一覧</a>
            </div>
        <?php endif; ?>
    </div>
</section>