<?php
/**
 * The template for displaying single company posts
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    $title = get_the_title();
    $imageDesktop = get_template_directory_uri() . '/assets/images/about/bg-hero-ab-desktop.jpg';
    $imageMobile = get_template_directory_uri() . '/assets/images/about/bg-hero-about-mobile.jpg';
    yutaka_hero_section_shared($title, 'Company Details', $imageDesktop, $imageMobile);
    ?>

    <div class="company-single-page">
        <div class="container">
            <?php
            while (have_posts()):
                the_post();

                $post_id = get_the_ID();
                $thumbnail = get_the_post_thumbnail_url($post_id, 'full');
                $title = get_the_title();

                // ACF Fields
                $summary = get_field('summary');
                $price = get_field('price');
                $reason_for_sale = get_field('reason_for_sale');
                $operating_profit = get_field('operating_profit');
                $net_assets = get_field('net_assets');
                $succession_conditions = get_field('succession_conditions');
                $revenue = get_field('revenue');
                $summary = get_field('summary');
                $is_new = get_field('is_new');
                $company_number = get_field('company_number');

                // 案件概要
                $major_customers = get_field('major_customers');
                $major_suppliers = get_field('major_suppliers');
                $qualified_personnel = get_field('qualified_personnel');
                $major_licenses_permits = get_field('major_licenses_permits');
                $number_of_fulltime_contract_employees = get_field('number_of_full-time__contract_employees');
                $number_of_parttime_temporary_staff = get_field('number_of_part-time__temporary_staff');


                // Taxonomies
                $industries = get_the_terms($post_id, 'industry');
                $regions = get_the_terms($post_id, 'region');

                $industry_names = $industries && !is_wp_error($industries) ? wp_list_pluck($industries, 'name') : [];
                $region_names = $regions && !is_wp_error($regions) ? wp_list_pluck($regions, 'name') : [];
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('company-single'); ?>>
                    <div class="company-single__header">
                        <div class="company-single__header-inner">
                            <div class="company-single__thumbnail">
                                <?php if ($thumbnail): ?>
                                    <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr($title); ?>">
                                <?php else: ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about/bg-hero-ab-desktop.jpg"
                                        alt="Default Image">
                                <?php endif; ?>
                            </div>
                            <div class="company-single__header-info">
                                <div class="company-single__meta">
                                    <span class="company-single__type">M&A案件情報</span>
                                    <div class="company-single__badges">
                                        <?php if ($is_new): ?>
                                            <span class="badge-new">NEW</span>
                                        <?php endif; ?>
                                        <span
                                            class="badge-no">No.<?php echo esc_html($company_number ?: str_pad($post_id, 5, '0', STR_PAD_LEFT)); ?></span>
                                    </div>
                                </div>
                                <h1 class="company-single__title"><?php echo esc_html($title); ?></h1>
                            </div>
                        </div>
                    </div>

                    <div class="company-single__sections">
                        <!-- Section: 事業概況 -->
                        <section class="company-single__section">
                            <h2 class="company-single__section-title">事業概況</h2>
                            <table class="company-single__table">
                                <tr>
                                    <th>特徴と強み</th>
                                    <td class="text-red">
                                        <?php echo nl2br(esc_html($summary ?: 'テキストテキストテキストテキストテキストテキストテキストテキスト')); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>業種</th>
                                    <td><?php echo esc_html(implode('・', $industry_names) ?: 'テキストテキストテキスト'); ?></td>
                                </tr>
                                <tr>
                                    <th>地域</th>
                                    <td><?php echo esc_html(implode('・', $region_names) ?: 'テキストテキストテキスト'); ?></td>
                                </tr>
                            </table>
                        </section>

                        <!-- Section: 財務情報 -->
                        <section class="company-single__section">
                            <h2 class="company-single__section-title">財務情報</h2>
                            <table class="company-single__table">
                                <tr>
                                    <th>売上高</th>
                                    <td><?php echo esc_html($revenue ?: 'テキストテキストテキスト'); ?></td>
                                </tr>
                                <tr>
                                    <th>実態営業利益 <i class="icon-help">?</i></th>
                                    <td><?php echo esc_html($operating_profit ?: 'テキストテキストテキスト'); ?></td>
                                </tr>
                                <tr>
                                    <th>時価純資産 <i class="icon-help">?</i></th>
                                    <td><?php echo esc_html($net_assets ?: 'テキストテキストテキスト'); ?></td>
                                </tr>
                            </table>
                        </section>

                        <!-- Section: 譲渡条件 -->
                        <section class="company-single__section">
                            <h2 class="company-single__section-title">譲渡条件</h2>
                            <table class="company-single__table">
                                <tr>
                                    <th>希望金額 <i class="icon-help">?</i></th>
                                    <td><?php echo esc_html($price ?: 'テキストテキストテキスト'); ?></td>
                                </tr>
                                <tr>
                                    <th>引継ぎ条件</th>
                                    <td><?php echo nl2br(esc_html($succession_conditions ?: 'テキストテキストテキスト')); ?></td>
                                </tr>
                                <tr>
                                    <th>譲渡理由</th>
                                    <td><?php echo esc_html($reason_for_sale ?: 'テキストテキストテキスト'); ?></td>
                                </tr>
                            </table>
                        </section>

                        <!-- Section: 案件概要 -->
                        <section class="company-single__section">
                            <h2 class="company-single__section-title">案件概要</h2>
                            <table class="company-single__table">
                                <tr>
                                    <th>主要顧客</th>
                                    <td>
                                        <?php echo nl2br(esc_html($major_customers ?: 'テキストテキストテキスト')); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>仕入先・外注先</th>
                                    <td>
                                        <?php echo nl2br(esc_html($major_suppliers ?: 'テキストテキストテキスト')); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>資格・専門職</th>
                                    <td>
                                        <?php echo nl2br(esc_html($qualified_personnel ?: 'テキストテキストテキスト')); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>主要免許・許可</th>
                                    <td>
                                        <?php echo nl2br(esc_html($major_licenses_permits ?: 'テキストテキストテキスト')); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>正社員・契約社員数</th>
                                    <td>
                                        <?php echo esc_html($number_of_fulltime_contract_employees ?: 'テキストテキストテキスト'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>パート・アルバイト・派遣社員数</th>
                                    <td>
                                        <?php echo esc_html($number_of_parttime_temporary_staff ?: 'テキストテキストテキスト'); ?>
                                    </td>
                                </tr>
                            </table>
                        </section>

                    </div>
                </article>
            <?php endwhile; ?>
        </div>
    </div>
</main>

<?php
get_footer();
