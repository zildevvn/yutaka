<section class="sazukaru-section about-section">
    <div class="container">
        <div class="about-section-content d-flex align-items-center flex-wrap flex-lg-nowrap">
            <div class="about-section-content__left">
                <div class="about-section-content__heading d-flex align-items-center">
                    <img src="<?= get_template_directory_uri(); ?>/assets/images/icon-ab-home.png" alt="icon-ab-home" />
                    <div class="wrap-title">
                        <h2> ABOUT US</h2>
                        <p>私たちについて</p>
                    </div>
                </div>

                <p>
                    なぜ、世界中のカップルがジョージアを選ぶのか？<br />
                    1997年以来、国家の法律によって守られた安全な代理出産プログラム。ジョージアは今、世界で最も信頼される生殖医療の拠点の一つです。
                    豊富な実績を持つJuno Surrogacyが、最新の医療技術と法的なバックアップで、あなたの不安を安心に変えます。
                </p>

                <?php $link = home_url('/about/') ?>

                <?php sazukaru_button('詳細はこちら', $link, '_self', ''); ?>
            </div>
            <div class="about-section-content__image">
                <img class="d-none d-md-block" src="<?= get_template_directory_uri(); ?>/assets/images/image-about.png"
                    alt="image for about section" />

                <img class="d-md-none" src="<?= get_template_directory_uri(); ?>/assets/images/image-about-mb.png"
                    alt="image for about section mobile" />
            </div>
        </div>
    </div>
</section>