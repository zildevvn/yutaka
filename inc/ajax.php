<?php

// AJAX Category Filter
add_action('wp_ajax_filter_blog_by_category', 'filter_blog_by_category_handler');
add_action('wp_ajax_nopriv_filter_blog_by_category', 'filter_blog_by_category_handler');

function filter_blog_by_category_handler()
{
    $category_id = isset($_POST['category_id']) ? sanitize_text_field($_POST['category_id']) : 'all';

    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 9,
    );

    if ($category_id !== 'all') {
        $args['cat'] = $category_id;
    }

    ob_start();
    get_template_part('template-parts/blog/list-posts', null, $args);
    $response = ob_get_clean();

    wp_send_json_success($response);
}

// AJAX Company Filter
add_action('wp_ajax_filter_company', 'filter_company_handler');
add_action('wp_ajax_nopriv_filter_company', 'filter_company_handler');

function filter_company_handler()
{
    $industry = isset($_POST['industry']) ? sanitize_text_field($_POST['industry']) : '';
    $region   = isset($_POST['region'])   ? sanitize_text_field($_POST['region'])   : '';
    $paged    = isset($_POST['paged'])    ? intval($_POST['paged'])                 : 1;

    $args = array(
        'industry_filter' => $industry,
        'region_filter'   => $region,
        'paged'           => $paged,
    );

    // Results HTML
    ob_start();
    get_template_part('template-parts/about/company-results', null, $args);
    $results_html = ob_get_clean();

    // Recalculate per-industry counts scoped to the selected region
    $industries = get_terms(array(
        'taxonomy'   => 'industry',
        'hide_empty' => false,
    ));

    $industry_counts = array();
    if (!empty($industries) && !is_wp_error($industries)) {
        foreach ($industries as $term) {
            $tax_query = array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'industry',
                    'field'    => 'slug',
                    'terms'    => $term->slug,
                ),
            );
            if ($region !== '') {
                $tax_query[] = array(
                    'taxonomy'         => 'region',
                    'field'            => 'slug',
                    'terms'            => $region,
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
            $industry_counts[$term->slug] = array(
                'name'  => $term->name,
                'count' => (int) $q->found_posts,
            );
        }
    }

    wp_send_json_success(array(
        'html'            => $results_html,
        'industry_counts' => $industry_counts,
    ));
}
