<?php

/**
 * Helpers
 */

function dump($data)
{
	print "<pre style=' background: rgba(0, 0, 0, 0.1); margin-bottom: 1.618em; padding: 1.618em; overflow: auto; max-width: 100%; '>==========================\n";
	if (is_array($data)) {
		print_r($data);
	} elseif (is_object($data)) {
		var_dump($data);
	} else {
		var_dump($data);
	}
	print "===========================</pre>";
}


if (!function_exists('sazukaru_svg_icon')) {

	/**
	 * @param $icon
	 *
	 * @return mixed|string
	 */
	function sazukaru_svg_icon($icon)
	{
		$icons = require(__DIR__ . '/svg.php');
		return isset($icons[$icon]) ? $icons[$icon] : '';
	}
}

if (!function_exists('sazukaru_the_posts_navigation')) {
	function sazukaru_the_posts_navigation($args = array(), $base = false, $query = false)
	{
		$args = wp_parse_args($args, array(
			'prev_text' => __('Older posts'),
			'next_text' => __('Newer posts'),
			'screen_reader_text' => __('Posts navigation'),
			'aria_label' => __('Posts'),
			'class' => 'posts-navigation',
		));

		$wp_query = $query ? $query : $GLOBALS['wp_query'];

		// Don't print empty markup if there's only one page.
		if ($wp_query->max_num_pages < 2) {
			return;
		}
		$paged = get_query_var('paged') ? intval(get_query_var('paged')) : 1;
		$pagenum_link = html_entity_decode(get_pagenum_link());
		if ($base) {
			$orig_req_uri = $_SERVER['REQUEST_URI'];
			$_SERVER['REQUEST_URI'] = $base;
			$pagenum_link = get_pagenum_link($paged - 1);
			$_SERVER['REQUEST_URI'] = $orig_req_uri;
		}

		$query_args = array();
		$url_parts = explode('?', $pagenum_link);
		if (isset($url_parts[1])) {
			wp_parse_str($url_parts[1], $query_args);
		}

		$pagenum_link = remove_query_arg(array_keys($query_args), $pagenum_link);
		$pagenum_link = trailingslashit($pagenum_link) . '%_%';
		$format = $GLOBALS['wp_rewrite']->using_index_permalinks() && !strpos($pagenum_link, 'index.php') ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit('page/%#%', 'paged') : '?paged=%#%';

		// Set up paginated links.
		$links = paginate_links(array(
			'base' => $pagenum_link,
			'format' => $format,
			'total' => $wp_query->max_num_pages,
			'current' => $paged,
			'mid_size' => 1,
			// 'add_args'  => array_map('urlencode', $query_args),
			'prev_text' => $args['prev_text'],
			'next_text' => $args['next_text'],
		));

		if ($links): ?>
			<nav class="navigation paging-navigation">
				<span class="screen-reader-text"><?= $args['screen_reader_text']; ?></span>
				<?php echo '<div class="pagination loop-pagination">' . $links . '</div><!-- .pagination -->' ?>
			</nav><!-- .navigation -->
			<?php
		endif;
	}
}

function sazukaru_get_button($btn_text, $btn_link, $btn_target = '_self', $style = '')
{ ?>
	<a href="<?php echo $btn_link; ?>" target="<?php echo $btn_target; ?>"
		class="sazukaru-button<?php echo !empty($style) ? ' ' . esc_attr($style) : ''; ?>">
		<?php echo $btn_text; ?>
		<svg width="24px" height="24px" viewBox="0 0 24 24" stroke-width="1.5" fill="none"
			xmlns="http://www.w3.org/2000/svg" color="#000000">
			<path fill-rule="evenodd" clip-rule="evenodd"
				d="M8.71299 18.6929C8.43273 18.5768 8.25 18.3033 8.25 18V5.99998C8.25 5.69663 8.43273 5.42315 8.71299 5.30707C8.99324 5.19098 9.31583 5.25515 9.53033 5.46965L15.5303 11.4696C15.8232 11.7625 15.8232 12.2374 15.5303 12.5303L9.53033 18.5303C9.31583 18.7448 8.99324 18.809 8.71299 18.6929Z"
				fill="#000000"></path>
		</svg>
	</a>
<?php }


function sazukaru_get_posts_by_post_type($post_type, $posts_per_page = 4, $title = '', $sub_title = '', $btn_text = '')
{
	if (empty($post_type)) {
		return;
	}

	$args = array(
		'post_type' => $post_type,
		'posts_per_page' => $posts_per_page,
		'post_status' => 'publish',
		'orderby' => 'date',
		'order' => 'DESC',
	);

	$query = new WP_Query($args);
	?>

	<div class="sazukaru-category-posts">
		<h2 class="category-title ncm-heading-highlight m-0" data-aos="fade-up" data-aos-easing="ease-in-out">
			<?php echo $title; ?>
		</h2>

		<div class="category-sub-title d-flex align-items-center" data-aos="fade-up" data-aos-easing="ease-in-out">
			<div class="icon">
				<?php if ($post_type == 'activity'): ?>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-doc.png" alt="">
				<?php else: ?>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-pen.png" alt="">
				<?php endif; ?>
			</div>
			<?php echo esc_html($sub_title); ?>
		</div>

		<div class="category-posts-list">
			<?php $index = 0; ?>
			<?php while ($query->have_posts()):
				$query->the_post(); ?>
				<div class="item-post" data-aos="fade-up" data-aos-easing="ease-in-out"
					data-aos-delay="<?php echo $index * 200; ?>">
					<div class="item-post__thumbnail">
						<?php the_post_thumbnail('full', ['class' => 'img-fluid']); ?>
					</div>

					<div class="item-post__content">
						<p class="item-post__date d-flex align-items-center m-0">
							<svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
								xmlns="http://www.w3.org/2000/svg" color="#000000">
								<path d="M12 6L12 12L18 12" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
									stroke-linejoin="round"></path>
								<path
									d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
									stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
							</svg>
							<?php echo get_the_date('n月j日Y'); ?>
						</p>

						<h3 class="item-post__title mb-0"><?php the_title(); ?></h3>

						<div class="item-post__cate d-flex align-items-center justify-content-center">
							<?php if ($post_type == 'activity'): ?>
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-doc.png" alt="">
							<?php else: ?>
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-pen.png" alt="">
							<?php endif; ?>
							<?php echo esc_html($sub_title); ?>
						</div>
					</div>

					<a href="<?php the_permalink(); ?>"> Read More </a>
				</div>
				<?php $index++; endwhile;
			wp_reset_postdata(); ?>
		</div>

		<div class="category-view-more d-flex justify-content-center">
			<?php $link = $post_type == 'activity' ? '/activity' : '/news'; ?>
			<?php sazukaru_get_button($btn_text, esc_url(home_url($link)), '_self', 'is-style-secondary'); ?>
		</div>
	</div>
<?php }

/**
 * Get posts by category slug and display in a grid
 *
 * @param string $category_slug Category slug.
 * @param int    $posts_per_page Number of posts to retrieve. Default 4.
 * @return void
 */
function sazukaru_get_posts_by_category($category_slug, $posts_per_page = 4, $title = '')
{
	if (empty($category_slug)) {
		return;
	}

	$category = get_category_by_slug($category_slug);
	if (!$category) {
		return;
	}

	$args = array(
		'post_type' => 'post',
		'posts_per_page' => $posts_per_page,
		'category_name' => $category_slug,
		'post_status' => 'publish',
		'orderby' => 'date',
		'order' => 'DESC',
	);

	$query = new WP_Query($args);

	if ($query->have_posts()): ?>
		<?php
		switch ($category_slug) {
			case 'record':
				$cate_name_jp = '活動記録';
				$view_more_text = 'その他の活動記録はこちら';
				break;
			case 'news':
				$cate_name_jp = 'ニュース';
				$view_more_text = 'ニュース一覧';
				break;
			default:
				$cate_name_jp = '';
				$view_more_text = 'MORE';
		}

		$sub_title = $cate_name_jp ?: $category->name;
		?>

		<div class="sazukaru-category-posts">
			<h2 class="category-title ncm-heading-highlight m-0" data-aos="fade-up" data-aos-easing="ease-in-out">
				<?php echo esc_html(!empty($title) ? $title : $category->name); ?>
			</h2>

			<div class="category-sub-title d-flex align-items-center" data-aos="fade-up" data-aos-easing="ease-in-out">
				<div class="icon">
					<?php if ($category_slug == 'news'): ?>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-pen.png" alt="">
					<?php else: ?>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-doc.png" alt="">
					<?php endif; ?>
				</div>
				<?php echo esc_html($sub_title); ?>
			</div>

			<div class="category-posts-list">
				<?php $index = 0; ?>
				<?php while ($query->have_posts()):
					$query->the_post(); ?>
					<div class="item-post" data-aos="fade-up" data-aos-easing="ease-in-out"
						data-aos-delay="<?php echo $index * 200; ?>">
						<div class="item-post__thumbnail">
							<?php the_post_thumbnail('full', ['class' => 'img-fluid']); ?>
						</div>

						<div class="item-post__content">
							<p class="item-post__date d-flex align-items-center m-0">
								<svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
									xmlns="http://www.w3.org/2000/svg" color="#000000">
									<path d="M12 6L12 12L18 12" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
										stroke-linejoin="round"></path>
									<path
										d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
										stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
								</svg>
								<?php echo get_the_date('n月j日Y'); ?>
							</p>

							<h3 class="item-post__title mb-0"><?php the_title(); ?></h3>

							<div class="item-post__cate d-flex align-items-center justify-content-center">
								<?php if ($category_slug == 'news'): ?>
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-pen.png" alt="">
								<?php else: ?>
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-doc.png" alt="">
								<?php endif; ?>

								<?php echo esc_html($sub_title); ?>
							</div>
						</div>

						<a href="<?php the_permalink(); ?>"> Read More </a>
					</div>
					<?php $index++; endwhile;
				wp_reset_postdata(); ?>
			</div>

			<div class="category-view-more d-flex justify-content-center">
				<?php $link = $category_slug == 'record' ? '/activity' : '/news'; ?>
				<?php sazukaru_get_button($view_more_text, esc_url(home_url($link)), '_self', 'is-style-secondary'); ?>
			</div>
		</div>
	<?php endif;
}


function sazukaru_button($btn_text = '', $btn_link, $btn_target = '_self', $btn_class = '', $style = '')
{
	$classed = $style == 'secondary' ? 'is-style-secondary' : '';
	?>
	<a class="sazukaru-btn d-flex align-items-center gap-4 <?php echo $btn_class; ?> <?php echo $classed; ?>"
		href="<?php echo $btn_link; ?>" target="<?php echo $btn_target; ?>">
		<?php echo $btn_text; ?>

		<?php if ($style == 'secondary'): ?>
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/btn-arrow-pink.png" alt="icon-arrow-right " />
		<?php else: ?>
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-btn.png" alt="icon-arrow-right " />
		<?php endif; ?>
	</a>
<?php }
