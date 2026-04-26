<?php

$sliders = [
    [
        'heading' => '最高の出口を、<br/>最高の入り口へ。',
        'sub_heading' => '解散だけでは終わらせない。<br/>会社の価値を、次の担い手へ。',
        'btnText' => 'お問い合わせ',
        'btnLink' => '#!',
        'bgImage' => '',
        'bgImageMb' => '',
        'image' => 'image-hero-001.png',
    ],
    [
        'heading' => '最高の出口を、<br/>最高の入り口へ。',
        'sub_heading' => '解散だけでは終わらせない。<br/>会社の価値を、次の担い手へ。',
        'btnText' => 'お問い合わせ',
        'btnLink' => '#!',
        'bgImage' => 'bg-hero-001.jpg',
        'bgImageMb' => 'bg-hero-mb-001.png',
        'image' => 'image-hero-002.png',
    ]
];
?>

<section class="yutaka-section hero-section">
    <div class="hero-section__carousel swiper">
        <div class="swiper-wrapper">
            <?php foreach ($sliders as $index => $slide): ?>
                <div class="swiper-slide">
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

                                <?php yutaka_get_button($slide['btnText'], $slide['btnLink']) ?>
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
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev">
            <svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg" color="#000000">
                <path d="M15 6L9 12L15 18" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round"></path>
            </svg>
        </div>
        <div class="swiper-button-next">
            <svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg" color="#000000">
                <path d="M9 6L15 12L9 18" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round"></path>
            </svg>
        </div>
    </div>
</section>