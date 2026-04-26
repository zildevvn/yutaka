<?php
/**
 * Template Name: Company
 */
get_header();
?>

<main id="primary" class="site-main">
    <?php
    $imageDesktop = get_template_directory_uri() . '/assets/images/company/hero-company-desktop.jpg';
    $imageMobile = get_template_directory_uri() . '/assets/images/company/hero-company-mobile.jpg';
    yutaka_hero_section_shared('会社概要', 'Company', $imageDesktop, $imageMobile);
    ?>

    <section class="yutaka-section company-info">
        <div class="container">
            <dl class="company-info__list">
                <div class="company-info__item">
                    <dt>会社名</dt>
                    <dd>会社売買.biz</dd>
                </div>
                <div class="company-info__item">
                    <dt>会社名英語表記</dt>
                    <dd>〇〇〇〇〇〇</dd>
                </div>
                <div class="company-info__item">
                    <dt>代表取締役</dt>
                    <dd>〇〇〇〇〇〇</dd>
                </div>
                <div class="company-info__item">
                    <dt>資本金</dt>
                    <dd>〇〇〇〇万円</dd>
                </div>
                <div class="company-info__item">
                    <dt>本店</dt>
                    <dd>〇〇〇〇〇〇</dd>
                </div>
                <div class="company-info__item">
                    <dt>従業員数</dt>
                    <dd>〇〇〇〇〇〇</dd>
                </div>
                <div class="company-info__item">
                    <dt>業務内容</dt>
                    <dd>〇〇〇〇〇〇</dd>
                </div>
            </dl>
        </div>
    </section>
</main>
<?php get_footer(); ?>