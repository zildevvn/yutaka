<?php

/**
 * Use this file to register any custom post types you wish to create.
 */
if (!function_exists('yutaka_create_custom_post_type')) {
	// Register Custom Post Type
	function yutaka_create_custom_post_type()
	{

		register_post_type('news', array(
			'labels' => array(
				'name' => __('ニュース'),
				'singular_name' => __('ニュース'),
				'add_new' => __('新規追加'),
				'add_new_item' => __('ニュースを追加'),
				'edit_item' => __('ニュースを編集'),
				'new_item' => __('新しいニュース'),
				'view_item' => __('ニュースを表示'),
				'search_items' => __('ニュースを検索'),
				'not_found' => __('ニュースが見つかりません'),
				'not_found_in_trash' => __('ゴミ箱にニュースはありません'),
				'all_items' => __('すべてのニュース'),
				'menu_name' => __('ニュース'),
			),
			'label' => __('ニュース', 'yutaka'),
			'supports' => array('title', 'editor', 'thumbnail', 'revisions', 'page-attributes'),
			'menu_icon' => 'dashicons-admin-generic',
			'hierarchical' => false,
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 5,
			'show_in_admin_bar' => true,
			'show_in_nav_menus' => true,
			'can_export' => true,
			'has_archive' => false,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'show_in_rest' => true,
			'rewrite' => array('slug' => 'news-item'),
		));

		// register_post_type('buyer_listing', array(
		// 	'labels' => array(
		// 		'name' => __('買主向け新着'),
		// 		'singular_name' => __('買主向け新着'),
		// 		'add_new' => __('新規追加'),
		// 		'add_new_item' => __('買主向け新着を追加'),
		// 		'edit_item' => __('買主向け新着を編集'),
		// 		'new_item' => __('新しい買主向け新着'),
		// 		'view_item' => __('買主向け新着を表示'),
		// 		'search_items' => __('買主向け新着を検索'),
		// 		'not_found' => __('買主向け新着が見つかりません'),
		// 		'not_found_in_trash' => __('ゴミ箱に買主向け新着はありません'),
		// 		'all_items' => __('すべての買主向け新着'),
		// 		'menu_name' => __('買主向け新着'),
		// 	),
		// 	'label' => __('買主向け新着', 'yutaka'),
		// 	'supports' => array('title', 'editor', 'thumbnail', 'revisions', 'page-attributes'),
		// 	'menu_icon' => 'dashicons-list-view',
		// 	'hierarchical' => false,
		// 	'public' => true,
		// 	'show_ui' => true,
		// 	'show_in_menu' => true,
		// 	'menu_position' => 5,
		// 	'show_in_admin_bar' => true,
		// 	'show_in_nav_menus' => true,
		// 	'can_export' => true,
		// 	'has_archive' => false,
		// 	'exclude_from_search' => false,
		// 	'publicly_queryable' => true,
		// 	'show_in_rest' => true,
		// ));

		register_post_type('buyer_banner', array(
			'labels' => array(
				'name' => __('買収バナー'),
				'singular_name' => __('買収バナー'),
				'add_new' => __('新規追加'),
				'add_new_item' => __('買収バナーを追加'),
				'edit_item' => __('買収バナーを編集'),
				'new_item' => __('新しい買収バナー'),
				'view_item' => __('買収バナーを表示'),
				'search_items' => __('買収バナーを検索'),
				'not_found' => __('買収バナーが見つかりません'),
				'not_found_in_trash' => __('ゴミ箱に買収バナーはありません'),
				'all_items' => __('すべての買収バナー'),
				'menu_name' => __('買収バナー'),
			),
			'label' => __('買収バナー', 'yutaka'),
			'supports' => array('title', 'editor', 'thumbnail', 'revisions', 'page-attributes'),
			'menu_icon' => 'dashicons-format-image',
			'hierarchical' => false,
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 5,
			'show_in_admin_bar' => true,
			'show_in_nav_menus' => true,
			'can_export' => true,
			'has_archive' => false,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'show_in_rest' => true,
		));



		register_post_type('company', array(
			'labels' => array(
				'name' => __('会社情報'),
				'singular_name' => __('会社情報'),
				'add_new' => __('新規追加'),
				'add_new_item' => __('会社情報を追加'),
				'edit_item' => __('会社情報を編集'),
				'new_item' => __('新しい会社情報'),
				'view_item' => __('会社情報を表示'),
				'search_items' => __('会社情報を検索'),
				'not_found' => __('会社情報が見つかりません'),
				'not_found_in_trash' => __('ゴミ箱に会社情報はありません'),
				'all_items' => __('すべての会社情報'),
				'menu_name' => __('会社情報'),
			),
			'label' => __('会社情報', 'yutaka'),
			'supports' => array('title', 'editor', 'thumbnail', 'revisions', 'page-attributes'),
			'menu_icon' => 'dashicons-admin-generic',
			'hierarchical' => false,
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 5,
			'show_in_admin_bar' => true,
			'show_in_nav_menus' => true,
			'can_export' => true,
			'has_archive' => false,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'show_in_rest' => true,
		));

	}

	add_action('init', 'yutaka_create_custom_post_type', 0);
}

if (!function_exists('yutaka_create_custom_taxonomy')) {
	function yutaka_create_custom_taxonomy()
	{
		register_taxonomy('category-news', array('news'), array(
			'labels' => array(
				'name' => 'Categories',
				'singular_name' => 'Category',
				'search_items' => 'Search Category',
				'all_items' => 'All Category',
				'edit_item' => 'Edit Category',
				'update_item' => 'Update Category',
				'add_new_item' => 'Add New Category',
				'new_item_name' => 'New Category Name',
				'menu_name' => 'Categories',
			),
			'rewrite' => false,
			'hierarchical' => true,
			'public' => false,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud' => true,
			'show_in_rest' => true,
		));


		register_taxonomy('industry', array('company'), array(
			'labels' => array(
				'name' => 'Industry',
				'singular_name' => 'Industry',
				'search_items' => 'Search Industry',
				'all_items' => 'All Industry',
				'edit_item' => 'Edit Industry',
				'update_item' => 'Update Industry',
				'add_new_item' => 'Add New Industry',
				'new_item_name' => 'New Industry Name',
				'menu_name' => 'Industry',
			),
			'rewrite' => false,
			'hierarchical' => true,
			'public' => false,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud' => true,
			'show_in_rest' => true,
		));


		register_taxonomy('region', array('company'), array(
			'labels' => array(
				'name' => 'Region',
				'singular_name' => 'Region',
				'search_items' => 'Search Region',
				'all_items' => 'All Region',
				'edit_item' => 'Edit Region',
				'update_item' => 'Update Region',
				'add_new_item' => 'Add New Region',
				'new_item_name' => 'New Region Name',
				'menu_name' => 'Region',
			),
			'rewrite' => false,
			'hierarchical' => true,
			'public' => false,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud' => true,
			'show_in_rest' => true,
		));
	}
	add_action('init', 'yutaka_create_custom_taxonomy', 0);
}

// Add filter dropdown for categories and types on admin post list
add_action('restrict_manage_posts', function () {
	global $typenow;

	// Only add filters for 'wine' post type
	if ($typenow == 'wine') {
		// Get selected values
		$selected_category = isset($_GET['category-wine']) ? $_GET['category-wine'] : '';
		$selected_type = isset($_GET['type-wine']) ? $_GET['type-wine'] : '';

		// Filter by Category - custom dropdown with slugs
		$categories = get_terms(array(
			'taxonomy' => 'category-wine',
			'hide_empty' => false,
		));

		if (!is_wp_error($categories) && !empty($categories)) {
			echo '<select name="category-wine" id="category-wine" class="postform">';
			echo '<option value="">All Categories</option>';
			foreach ($categories as $category) {
				$selected = ($selected_category == $category->slug) ? ' selected="selected"' : '';
				echo '<option value="' . esc_attr($category->slug) . '"' . $selected . '>' . esc_html($category->name) . '</option>';
			}
			echo '</select>';
		}

		// Filter by Type - custom dropdown with slugs
		$types = get_terms(array(
			'taxonomy' => 'type-wine',
			'hide_empty' => false,
		));

		if (!is_wp_error($types) && !empty($types)) {
			echo '<select name="type-wine" id="type-wine" class="postform">';
			echo '<option value="">All Types</option>';
			foreach ($types as $type) {
				$selected = ($selected_type == $type->slug) ? ' selected="selected"' : '';
				echo '<option value="' . esc_attr($type->slug) . '"' . $selected . '>' . esc_html($type->name) . '</option>';
			}
			echo '</select>';
		}
	}
});

// Apply filter query
add_action('pre_get_posts', function ($query) {
	global $pagenow;

	// Only run on admin post list page for wine post type
	if (!is_admin() || $pagenow != 'edit.php' || !isset($_GET['post_type']) || $_GET['post_type'] != 'wine') {
		return;
	}

	// Get filter values - support both ID and slug
	$category_filter = isset($_GET['category-wine']) ? $_GET['category-wine'] : '';
	$type_filter = isset($_GET['type-wine']) ? $_GET['type-wine'] : '';

	// Build tax_query
	$tax_query = array();

	if (!empty($category_filter)) {
		// Check if it's a number (ID) or slug
		if (is_numeric($category_filter) && $category_filter > 0) {
			$tax_query[] = array(
				'taxonomy' => 'category-wine',
				'field' => 'term_id',
				'terms' => absint($category_filter),
			);
		} else {
			// It's a slug
			$tax_query[] = array(
				'taxonomy' => 'category-wine',
				'field' => 'slug',
				'terms' => $category_filter,
			);
		}
	}

	if (!empty($type_filter)) {
		// Check if it's a number (ID) or slug
		if (is_numeric($type_filter) && $type_filter > 0) {
			$tax_query[] = array(
				'taxonomy' => 'type-wine',
				'field' => 'term_id',
				'terms' => absint($type_filter),
			);
		} else {
			// It's a slug
			$tax_query[] = array(
				'taxonomy' => 'type-wine',
				'field' => 'slug',
				'terms' => $type_filter,
			);
		}
	}

	// Apply tax_query if we have filters
	if (!empty($tax_query)) {
		if (count($tax_query) > 1) {
			$tax_query['relation'] = 'AND';
		}
		$query->set('tax_query', $tax_query);
	}

	// Add menu_order support for drag-drop sorting (only when no custom order is set)
	if (!$query->get('orderby')) {
		$query->set('orderby', 'menu_order');
		$query->set('order', 'ASC');
	}
});

// Enable simple page ordering for wine posts
add_filter('simple_page_ordering_is_sortable', function ($sortable, $post) {
	if ($post->post_type === 'wine') {
		return true;
	}
	return $sortable;
}, 10, 2);
