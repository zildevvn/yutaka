<?php

$sliders = [
    [
        'heading' => '最高の出口を、<br/>最高の入り口へ。',
        'sub_heading' => '解散だけでは終わらせない。<br/>会社の価値を、次の担い手へ。',
        'btnText' => 'お問い合わせ',
        'btnLink' => '/contact/',
        'bgImage' => '',
        'bgImageMb' => '',
        'image' => 'image-hero-001.png',
        'class' => 'first-item'
    ],
    [
        'heading' => '最高の出口を、<br/>最高の入り口へ。',
        'sub_heading' => '解散だけでは終わらせない。<br/>会社の価値を、次の担い手へ。',
        'btnText' => 'お問い合わせ',
        'btnLink' => '/contact/',
        'bgImage' => 'bg-hero-001.jpg',
        'bgImageMb' => 'bg-hero-mb-001.png',
        'image' => 'image-hero-002.png',
        'class' => ''
    ]
];
?>

<section class="yutaka-section hero-section">
    <div class="hero-section__carousel swiper">
        <div class="swiper-wrapper">
            <?php foreach ($sliders as $index => $slide): ?>
                <div class="swiper-slide <?= $slide['class'] ?>">
                    <div class="swiper-slide__bg">
                        <?php if (!empty($slide['bgImage'])): ?>
                            <img class="d-md-none"
                                src="<?php echo get_template_directory_uri() . '/assets/images/home/' . $slide['bgImageMb'] ?>"
                                alt="<?php echo $slide['heading'] ?>">

                            <img class="d-none d-md-block"
                                src="<?php echo get_template_directory_uri() . '/assets/images/home/' . $slide['bgImage'] ?>"
                                alt="<?php echo $slide['heading'] ?>">
                        <?php endif; ?>
                    </div>
                    <div class="container">
                        <div class="swiper-slide-inner d-flex">
                            <div class="swiper-slide__left">
                                <h1>
                                    <?php echo $slide['heading'] ?>
                                </h1>
                                <p>
                                    <?php echo $slide['sub_heading'] ?>
                                </p>

                                <?php
                                $link = home_url($slide['btnLink']);
                                yutaka_get_button($slide['btnText'], $link);
                                ?>
                            </div>
                            <div class="swiper-slide__image">
                                <img src="<?php echo get_template_directory_uri() . '/assets/images/home/' . $slide['image'] ?>"
                                    alt="<?php echo $slide['heading'] ?>">
                                <?php yutaka_get_button($slide['btnText'], $slide['btnLink']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>