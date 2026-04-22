<?php
$phone = get_field('phone_header', 'option');
?>
<section class="yutaka-section contact-section">
    <div class="yutaka-section__bg">
        <img class="d-none d-lg-block"
            src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-ss-contact-desktop.jpg"
            alt="bg-ss-contact-desktop" />
        <img class="d-lg-none" src="<?php echo get_template_directory_uri(); ?>/assets/images/bg-ss-contact-mobile.jpg"
            alt="bg-ss-contact-mobile" />
    </div>
    <div class="container text-center">
        <p class="yutaka-section__sub-heading">contact</p>
        <h2 class="yutaka-section__heading mb-0">お問い合わせ</h2>
        <div class="contact-section__line"> </div>
        <div class="contact-section__description">
            <p class="mb-0">会社売却・会社売買に関するご相談は無料です。</p>
            <p class="mb-0">売却できるかどうか分からない段階でも、<br class="d-flex d-md-none" /> どうぞお気軽にお問い合わせください。</p>
        </div>

        <div class="contact-section__actions d-flex align-items-center justify-content-center flex-wrap flex-md-nowrap">
            <a href="<?php echo home_url('/contact') ?>"
                class="btn-contact d-flex align-items-center justify-content-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-btn-contact.png"
                    alt="image contact" />
                お問い合わせはこちら
            </a>

            <?php if (!empty($phone)): ?>
                <a href="tel:<?php echo $phone; ?>" class="btn-phone d-flex align-items-center justify-content-center">
                    <img src=" <?php echo get_template_directory_uri(); ?>/assets/images/icon-phone-dark.png"
                        alt="image phone" />

                    <p class="mb-0">
                        <span>電話にてご相談</span>
                        <?php echo $phone; ?>
                    </p>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>