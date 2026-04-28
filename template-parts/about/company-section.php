<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$industry_filter = isset($_GET['industry']) ? $_GET['industry'] : '';
$region_filter = isset($_GET['region']) ? $_GET['region'] : '';
?>
<section class="yutaka-section company-section">
    <div class="container">
        <h2 class="company-section__title text-center">各会社情報一覧情報</h2>
        <div class="company-layout">
            <div class="company-main" id="company-main-container">
                <?php
                get_template_part('template-parts/about/company-results', null, array(
                    'paged' => $paged,
                    'industry_filter' => $industry_filter,
                    'region_filter' => $region_filter,
                ));
                ?>
            </div>

            <div class="company-sidebar industry">
                <!-- Industry Filter -->
                <div class="company-filter">
                    <div class="company-filter__header">
                        <img
                            src="<?php echo get_template_directory_uri() . '/assets/images/about/icon-industry.png'; ?>" />
                        <span>業種から探す</span>
                    </div>
                    <div class="company-filter__box">
                        <ul class="company-filter__list">
                            <?php
                            $industries = get_terms(array(
                                'taxonomy' => 'industry',
                                'hide_empty' => false,
                            ));

                            if (empty($industries) || is_wp_error($industries)) {
                                echo '<li><a href="#">IT・WEB・ソフトウェア (164)</a></li>';
                                echo '<li><a href="#">人材派遣・アウトソーシング (109)</a></li>';
                                echo '<li><a href="#">ホテル・旅館 (53)</a></li>';
                                echo '<li><a href="#">不動産・ビルメンテナンス (100)</a></li>';
                                echo '<li><a href="#">電気・ガス・エネルギー (38)</a></li>';
                            } else {
                                foreach ($industries as $industry) {
                                    $active_class = ($industry_filter === $industry->slug) ? 'active' : '';
                                    $url = '?industry=' . $industry->slug;
                                    if (!empty($region_filter))
                                        $url .= '&region=' . $region_filter;
                                    echo '<li><a class="' . $active_class . '" href="' . $url . '">' . esc_html($industry->name) . ' (' . $industry->count . ')</a></li>';
                                }
                            }
                            ?>
                        </ul>
                        <?php
                        $show_all_industries = (empty($industries) || is_wp_error($industries)) ? true : (count($industries) > 3);
                        if ($show_all_industries):
                            ?>
                            <a href="?<?php echo !empty($region_filter) ? 'region=' . $region_filter : ''; ?>"
                                class="company-filter__all">すべて表示</a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Region Filter -->
                <div class="company-filter">
                    <div class="company-filter__header">
                        <img
                            src="<?php echo get_template_directory_uri() . '/assets/images/about/icon-region.png'; ?>" />

                        <span>地域から探す</span>
                    </div>
                    <div class="company-filter__box">
                        <ul class="company-filter__list">
                            <?php
                            $regions = get_terms(array(
                                'taxonomy' => 'region',
                                'hide_empty' => false,
                            ));

                            if (empty($regions) || is_wp_error($regions)) {
                                echo '<li><a href="#">北海道</a></li>';
                                echo '<li><a href="#">東北地方</a></li>';
                                echo '<li><a href="#">関東地方</a></li>';
                                echo '<li><a href="#">甲信越・北陸地方</a></li>';
                                echo '<li><a href="#">東海地方</a></li>';
                            } else {
                                foreach ($regions as $region) {
                                    $active_class = ($region_filter === $region->slug) ? 'active' : '';
                                    $url = '?region=' . $region->slug;
                                    if (!empty($industry_filter))
                                        $url .= '&industry=' . $industry_filter;
                                    // Often regions don't display counts in this design
                                    echo '<li><a class="' . $active_class . '" href="' . $url . '">' . esc_html($region->name) . '</a></li>';
                                }
                            }
                            ?>
                        </ul>
                        <?php
                        $show_all_regions = (empty($regions) || is_wp_error($regions)) ? true : (count($regions) > 3);
                        if ($show_all_regions):
                            ?>
                            <a href="?<?php echo !empty($industry_filter) ? 'industry=' . $industry_filter : ''; ?>"
                                class="company-filter__all">すべて表示</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>