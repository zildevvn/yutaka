<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$industry_filter = isset($_GET['industry']) ? sanitize_text_field($_GET['industry']) : '';
$region_filter   = isset($_GET['region'])   ? sanitize_text_field($_GET['region'])   : '';

/**
 * Count company posts in a given industry, optionally scoped to a region.
 */
function yutaka_count_companies_by_industry(string $industry_slug, string $region_slug = ''): int
{
    $tax_query = array(
        'relation' => 'AND',
        array(
            'taxonomy' => 'industry',
            'field'    => 'slug',
            'terms'    => $industry_slug,
        ),
    );
    if ($region_slug !== '') {
        $tax_query[] = array(
            'taxonomy'         => 'region',
            'field'            => 'slug',
            'terms'            => $region_slug,
            'include_children' => true,
        );
    }
    $q = new WP_Query(array(
        'post_type'      => 'company',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'fields'         => 'ids',
        'tax_query'      => $tax_query,
    ));
    return (int) $q->found_posts;
}
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
                                'taxonomy'   => 'industry',
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
                                    $active_class   = ($industry_filter === $industry->slug) ? 'active' : '';
                                    $url            = '?industry=' . $industry->slug;
                                    if (!empty($region_filter))
                                        $url .= '&region=' . $region_filter;
                                    // Count scoped to active region so numbers update on region change
                                    $scoped_count = yutaka_count_companies_by_industry($industry->slug, $region_filter);
                                    $empty_class  = ($scoped_count === 0) ? ' is-empty' : '';
                                    echo '<li data-industry="' . esc_attr($industry->slug) . '" class="' . trim($empty_class) . '">';
                                    if ($scoped_count === 0) {
                                        // Disabled: no navigation, just styled text
                                        echo '<a class="' . esc_attr(trim($active_class)) . '" href="#" aria-disabled="true" tabindex="-1">';
                                    } else {
                                        echo '<a class="' . esc_attr($active_class) . '" href="' . esc_url($url) . '">';
                                    }
                                    echo esc_html($industry->name) . ' (' . $scoped_count . ')';
                                    echo '</a></li>';
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
                            // Fetch only top-level parent regions
                            $parent_regions = get_terms(array(
                                'taxonomy'   => 'region',
                                'hide_empty' => false,
                                'parent'     => 0,
                            ));

                            if (empty($parent_regions) || is_wp_error($parent_regions)) {
                                echo '<li><a href="#">北海道</a></li>';
                                echo '<li><a href="#">東北地方</a></li>';
                                echo '<li><a href="#">関東地方</a></li>';
                                echo '<li><a href="#">甲信越・北陸地方</a></li>';
                                echo '<li><a href="#">東海地方</a></li>';
                            } else {
                                foreach ($parent_regions as $region) {
                                    $active_class = ($region_filter === $region->slug) ? 'active' : '';
                                    $url = '?region=' . $region->slug;
                                    if (!empty($industry_filter))
                                        $url .= '&industry=' . $industry_filter;

                                    // Fetch child terms for this parent
                                    $child_regions = get_terms(array(
                                        'taxonomy'   => 'region',
                                        'hide_empty' => false,
                                        'parent'     => $region->term_id,
                                    ));

                                    echo '<li>';
                                    echo '<a class="' . esc_attr($active_class) . '" href="' . esc_url($url) . '">' . esc_html($region->name) . '</a>';

                                    if (!empty($child_regions) && !is_wp_error($child_regions)) {
                                        echo '<ul class="company-filter__children">';
                                        foreach ($child_regions as $child) {
                                            $child_active = ($region_filter === $child->slug) ? 'active' : '';
                                            $child_url = '?region=' . $child->slug;
                                            if (!empty($industry_filter))
                                                $child_url .= '&industry=' . $industry_filter;
                                            echo '<li><a class="' . esc_attr($child_active) . '" href="' . esc_url($child_url) . '">' . esc_html($child->name) . '</a></li>';
                                        }
                                        echo '</ul>';
                                    }

                                    echo '</li>';
                                }
                            }
                            ?>
                        </ul>
                        <?php
                        $show_all_regions = (empty($parent_regions) || is_wp_error($parent_regions)) ? true : (count($parent_regions) > 6);
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