<section class="sazukaru-section blog-content-section">
    <div class="container">
        <div class="blog-content-section-grid">
            <div class="blog-content-section-grid__left">
                <div class="blog-content-section__header">
                    <h2 class="h4 category-name">記事一覧</h2>
                </div>
                <div class="blog-content-section__list" id="ajax-blog-container">
                    <?php get_template_part('template-parts/blog/list-posts'); ?>
                </div>
            </div>

            <aside class="blog-sidebar">
                <div class="blog-sidebar__header">
                    <h3 class="h5">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z"
                                stroke="#E2B4BD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M21 21L16.65 16.65" stroke="#E2B4BD" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        CATEGORY <span>カテゴリー</span>
                    </h3>
                </div>

                <ul class="blog-sidebar__category-list">
                    <li class="active" data-category-id="all">
                        <a href="javascript:void(0)">
                            すべて
                            <svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" color="#000000">
                                <path d="M9 6L15 12L9 18" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </a>
                    </li>
                    <?php
                    $categories = get_categories(array(
                        'orderby' => 'name',
                        'order' => 'ASC',
                        'hide_empty' => true
                    ));
                    if ($categories):
                        foreach ($categories as $category): ?>
                            <li data-category-id="<?= $category->term_id ?>">
                                <a href="javascript:void(0)">
                                    <?= esc_html($category->name) ?>

                                    <svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" color="#000000">
                                        <path d="M9 6L15 12L9 18" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </svg>
                                </a>
                            </li>
                        <?php endforeach;
                    endif;
                    ?>
                </ul>
            </aside>

        </div>
    </div>
</section>