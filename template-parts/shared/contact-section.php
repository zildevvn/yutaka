<section class="sazukaru-section contact-section">
    <div class="container-full">
        <div class="contact-section-inner d-flex">
            <div class="contact-section__left d-flex align-items-center justify-content-center justify-content-lg-end">
                <div class="warp-content w-100">
                    <div class="contact-section__image d-lg-none">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image-contact-mb.jpg"
                            alt="image-contact" />
                    </div>

                    <div class="contact-section__icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-email.png"
                            alt="icon-email" />
                    </div>

                    <h2> Contact </h2>
                    <p class="mb-0">コンタクト</p>
                    <?php
                    $btn_link = home_url('/contact/');
                    $btn_text = 'お問い合わせはこちら';
                    sazukaru_button($btn_text, $btn_link, '_self', '', 'secondary');
                    ?>
                </div>
            </div>

            <div class="contact-section__right d-none d-lg-block">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img-contact.jpg"
                    alt="image-contact" />
            </div>
        </div>
    </div>
</section>