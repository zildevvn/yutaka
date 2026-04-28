<?php
$custom_logo_id = get_theme_mod('custom_logo');
$logo_url = wp_get_attachment_url($custom_logo_id);
$socials = get_field('socials', 'option');
$company_name = get_field('company_name_ft', 'option');
$address = get_field('address_ft', 'option');
$phone = get_field('phone_header', 'option');
$cta_header = get_field('cta_header', 'option');
?>

<header id="site-header" class="header-main">
    <div class="container">
        <div class="header-inner d-flex gap-2 justify-content-between align-items-center">
            <div class="header-logo">
                <a href="<?php echo home_url(); ?>" aria-label="<?php echo get_bloginfo('name'); ?>">
                    <img src="<?php echo $logo_url; ?>" alt="<?php echo get_bloginfo('name'); ?>">
                </a>
            </div>

            <div class="header-right d-none d-lg-flex align-items-center justify-content-end">
                <?php if (has_nav_menu('primary-menu')): ?>
                    <div class="header-menu d-none d-lg-block">
                        <?php wp_nav_menu(array('theme_location' => 'primary-menu', 'menu_class' => 'primary-menu')) ?>
                    </div>
                <?php endif; ?>

                <?php if ($phone): ?>
                    <a href="tel:<?php echo $phone; ?>" class="header-phone d-flex align-items-end">
                        <img src="<?= get_template_directory_uri() ?>/assets/images/icon-phone.png" alt="phone">

                        <p class="mb-0 text-center">
                            電話番号
                            <span class="d-flex">
                                <?php echo $phone; ?>
                            </span>
                        </p>

                    </a>
                <?php endif; ?>

                <?php if (!empty($cta_header)): ?>
                    <?php yutaka_get_button($cta_header['title'], $cta_header['url'], '_self', '') ?>
                <?php endif; ?>
            </div>



            <div class="header-humberger d-block d-lg-none ">
                <button class="humberger-btn d-flex align-items-center flex-wrap">
                    <div class="icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <p class="mb-0">Menu</p>
                </button>
            </div>
        </div>
    </div>
</header>

<header id="header-scroll" class="header-main">
    <div class="container">
        <div class="header-inner d-flex gap-2 justify-content-between align-items-center">
            <div class="header-logo">
                <a href="<?php echo home_url(); ?>" aria-label="<?php echo get_bloginfo('name'); ?>">
                    <img src="<?php echo $logo_url; ?>" alt="<?php echo get_bloginfo('name'); ?>">
                </a>
            </div>

            <?php if (has_nav_menu('primary-menu')): ?>
                <div class="header-menu d-none d-lg-block">
                    <?php wp_nav_menu(array('theme_location' => 'primary-menu', 'menu_class' => 'primary-menu')) ?>
                </div>
            <?php endif; ?>

            <div class="header-humberger d-block d-lg-none">
                <button class="humberger-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </div>
</header>

<div class="mobile-menu-overlay d-lg-none">
    <div class="mobile-menu-inner">
        <div class="mobile-menu-header d-flex justify-content-between align-items-center">
            <div class="header-logo">
                <a href="<?php echo home_url(); ?>" aria-label="<?php echo get_bloginfo('name'); ?>">
                    <img src="<?php echo $logo_url; ?>" alt="<?php echo get_bloginfo('name'); ?>">
                </a>
            </div>

            <div class="header-humberger">
                <button id="menu-close-btn" class="humberger-btn d-flex align-items-center flex-wrap"
                    aria-label="Close Menu">
                    <span></span>
                    <span></span>

                </button>
            </div>
        </div>

        <div class="mobile-menu-content">
            <?php if (has_nav_menu('primary-menu')): ?>
                <div class="mobile-nav menu-primary">
                    <?php wp_nav_menu(array('theme_location' => 'primary-menu', 'menu_class' => 'mobile-primary-menu')) ?>
                </div>
            <?php endif; ?>

            <div class="mobile-contact-info mt-auto">

                <?php if (!empty($company_name)): ?>
                    <p class="mobile-company mb-0">
                        <span>会社名</span>
                        <?php echo $company_name; ?>
                    </p>
                <?php endif; ?>

                <?php if (!empty($address)): ?>
                    <p class="mobile-address mb-0">
                        <span>住所</span>
                        <?php echo $address; ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>