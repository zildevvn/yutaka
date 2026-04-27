<?php
$paged = isset($args['paged']) ? $args['paged'] : 1;
$industry_filter = isset($args['industry_filter']) ? $args['industry_filter'] : '';
$region_filter = isset($args['region_filter']) ? $args['region_filter'] : '';

$query_args = array(
    'post_type' => 'company',
    'posts_per_page' => 1,
    'paged' => $paged,
    'tax_query' => array(
        'relation' => 'AND',
    )
);

if (!empty($industry_filter)) {
    $query_args['tax_query'][] = array(
        'taxonomy' => 'industry',
        'field' => 'slug',
        'terms' => $industry_filter,
    );
}

if (!empty($region_filter)) {
    $query_args['tax_query'][] = array(
        'taxonomy' => 'region',
        'field' => 'slug',
        'terms' => $region_filter,
    );
}

$company_query = new WP_Query($query_args);
?>
<div class="company-pagination-info">
    <?php
    if ($company_query->have_posts()) {
        $total_posts = $company_query->found_posts;
        $start_post = ($paged - 1) * 10 + 1;
        $end_post = min($paged * 10, $total_posts);
        $total_pages = $company_query->max_num_pages;

        echo '<p class="mb-0">' . $total_posts . '件中' . $start_post . '〜' . $end_post . '件目を表示 （' . $total_pages . 'ページ中' . $paged . 'ページ目）</p>';
    } else {
        echo '<p class="mb-0">0件中0〜0件目を表示 （0ページ中0ページ目）</p>';
    }
    ?>
</div>

<div class="company-list">
    <?php if ($company_query->have_posts()): ?>
        <?php while ($company_query->have_posts()):
            $company_query->the_post(); ?>
            <?php
            $summary = get_field('summary');
            $revenue = get_field('revenue');
            $revenueprice = get_field('price');
            $reason_for_sale = get_field('reason_for_sale');

            // Get Industry terms
            $industry_terms = get_the_terms(get_the_ID(), 'industry');
            $main_industry = '';
            if ($industry_terms && !is_wp_error($industry_terms)) {
                $main_industry = join(', ', wp_list_pluck($industry_terms, 'name'));
            }

            // Get Region terms
            $region_terms = get_the_terms(get_the_ID(), 'region');
            $region = '';
            if ($region_terms && !is_wp_error($region_terms)) {
                $region = join(', ', wp_list_pluck($region_terms, 'name'));
            }

            $desired_price = $revenueprice;
            $reason_for_transfer = $reason_for_sale;
            $sales = $revenue;
            $description = $summary;

            // Fallbacks for empty data
            if (!$main_industry)
                $main_industry = 'テキストテキスト';
            if (!$desired_price)
                $desired_price = 'テキストテキスト';
            if (!$region)
                $region = 'テキストテキスト';
            if (!$reason_for_transfer)
                $reason_for_transfer = 'テキストテキスト';
            if (!$sales)
                $sales = 'テキストテキストテキストテキストテキストテキストテキストテキストテキスト';
            if (!$description)
                $description = 'テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト';

            $thumbnail = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/assets/images/about/bg-hero-ab-desktop.jpg';
            ?>
            <div class="company-item">
                <h3 class="company-item__title"><?php the_title(); ?></h3>
                <div class="company-item__body">
                    <div class="company-item__image">
                        <div class="company-item__badges">
                            <span class="badge-new">NEW</span>
                            <span class="badge-no">No.<?php echo str_pad(get_the_ID(), 4, '0', STR_PAD_LEFT); ?></span>
                        </div>
                        <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
                    </div>
                    <div class="company-item__info">
                        <table class="company-item__table">
                            <tr>
                                <th>主な業種</th>
                                <td><?php echo esc_html($main_industry); ?></td>
                                <th>希望金額</th>
                                <td><?php echo esc_html($desired_price); ?></td>
                            </tr>
                            <tr>
                                <th>地域</th>
                                <td><?php echo esc_html($region); ?></td>
                                <th>譲渡理由</th>
                                <td><?php echo esc_html($reason_for_transfer); ?></td>
                            </tr>
                            <tr>
                                <th>売上高</th>
                                <td colspan="3"><?php echo esc_html($sales); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <?php if (!empty($summary)): ?>
                    <div class="company-item__summary">
                        <?php echo esc_html($summary); ?>
                    </div>
                <?php endif; ?>

                <div class="company-item__button-wrapper">
                    <a href="<?php the_permalink(); ?>" class="company-item__button">詳細を見る <svg width="7" height="11"
                            viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L5.5 5.5L1 10" stroke="white" stroke-width="1.5" stroke-linecap="round" />
                        </svg></a>
                </div>
            </div>
        <?php endwhile; ?>

        <div class="company-pagination">
            <?php
            $pagination_args = array();
            if (!empty($industry_filter))
                $pagination_args['industry'] = $industry_filter;
            if (!empty($region_filter))
                $pagination_args['region'] = $region_filter;

            echo paginate_links(array(
                'total' => $company_query->max_num_pages,
                'current' => $paged,
                'prev_text' => '前の10件',
                'next_text' => '次の10件',
                'add_args' => $pagination_args,
            ));
            ?>
        </div>
    <?php else: ?>
        <!-- Fallback fake items if no posts match so the design is visible -->
        <?php for ($i = 1; $i <= 2; $i++): ?>
            <div class="company-item">
                <h3 class="company-item__title">テキスト</h3>
                <div class="company-item__body">
                    <div class="company-item__image">
                        <div class="company-item__badges">
                            <span class="badge-new">NEW</span>
                            <span class="badge-no">No.0000</span>
                        </div>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about/bg-hero-ab-desktop.jpg"
                            alt="Company Image" />
                    </div>
                    <div class="company-item__info">
                        <table class="company-item__table">
                            <tr>
                                <th>主な業種</th>
                                <td>テキストテキスト</td>
                                <th>希望金額</th>
                                <td>テキストテキスト</td>
                            </tr>
                            <tr>
                                <th>地域</th>
                                <td>テキストテキスト</td>
                                <th>譲渡理由</th>
                                <td>テキストテキスト</td>
                            </tr>
                            <tr>
                                <th>売上高</th>
                                <td colspan="3">テキストテキストテキストテキストテキストテキストテキストテキストテキスト</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="company-item__summary">
                    テキストテキストテキストテキストテキストテキストテキストテキストテキスト<br>テキストテキストテキストテキストテキストテキストテキスト
                </div>
                <div class="company-item__button-wrapper">
                    <a href="#" class="company-item__button">詳細を見る <svg width="7" height="11" viewBox="0 0 7 11" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L5.5 5.5L1 10" stroke="white" stroke-width="1.5" stroke-linecap="round" />
                        </svg></a>
                </div>
            </div>
        <?php endfor; ?>
    <?php endif;
    wp_reset_postdata(); ?>
</div>