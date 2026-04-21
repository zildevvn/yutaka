<section class="sazukaru-section new-section">
    <div class="container">
        <div class="new-section-content d-flex align-items-center">
            <?php $link = home_url('/news/') ?>
            <a href="<?= $link ?>">
                <img class="d-none d-md-block"
                    src="<?= get_template_directory_uri(); ?>/assets/images/image-new-home.png" alt="bg-hero" />
                <img class="d-md-none" src="<?= get_template_directory_uri(); ?>/assets/images/image-new-home-mb.png"
                    alt="bg-hero-mb" />
            </a>

            <?php
            $latest_posts = get_posts(array(
                'posts_per_page' => 1,
                'post_status' => 'publish',
                'post_type' => 'news',
            ));

            if ($latest_posts):
                global $post;
                foreach ($latest_posts as $post):
                    setup_postdata($post);
                    ?>
                    <p class="mb-0">
                        <a href="<?php the_permalink(); ?>" class="text-white text-decoration-none">
                            <span><?php echo get_the_date('Y-m-d'); ?></span> <?php the_title(); ?>
                        </a>
                    </p>
                    <?php
                endforeach;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>