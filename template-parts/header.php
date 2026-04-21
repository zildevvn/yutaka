<?php
$custom_logo_id = get_theme_mod('custom_logo');
$logo_url = wp_get_attachment_url($custom_logo_id);
$socials = get_field('socials', 'option');
$company_name = get_field('company_name', 'option');
$address = get_field('address', 'option');
?>

<header id="site-header" class="header-main">
    <div class="container-full">
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

<header id="header-scroll" class="header-main">
    <div class="container-full">
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
            <button class="menu-close-btn" aria-label="Close Menu">
                <span></span>
                <span></span>
            </button>
        </div>

        <div class="mobile-menu-content">
            <?php if (has_nav_menu('primary-menu')): ?>
                <div class="mobile-nav menu-primary">
                    <?php wp_nav_menu(array('theme_location' => 'primary-menu', 'menu_class' => 'mobile-primary-menu')) ?>
                </div>
            <?php endif; ?>

            <div class="mobile-contact-info mt-auto">

                <div class="main-footer-logo">
                    <a href="<?php echo home_url(); ?>" aria-label="<?php echo get_bloginfo('name'); ?>">
                        <img src="<?php echo $logo_url; ?>" alt="<?php echo get_bloginfo('name'); ?>">
                    </a>
                </div>
                <?php if ($company_name): ?>
                    <p class="main-footer__company mb-0"> <span>会社名</span>
                        <?php echo $company_name; ?>
                    </p>
                <?php endif; ?>

                <?php if ($address): ?>
                    <p class="main-footer__address mb-0"> <span>住所</span>
                        <?php echo $address; ?>
                    </p>
                <?php endif; ?>

                <?php if ($socials): ?>
                    <ul class="main-footer__socials sazukaru-socials d-flex align-items-center justify-content-center">
                        <?php foreach ($socials as $social): ?>
                            <li>
                                <a href="<?= $social['link'] ?>" target="_blank">
                                    <?php
                                    $icon_url = $social['icon'];
                                    $icon_ext = pathinfo(parse_url($icon_url, PHP_URL_PATH), PATHINFO_EXTENSION);
                                    if (strtolower($icon_ext) === 'svg') {
                                        $icon_path = str_replace(site_url('/'), ABSPATH, $icon_url);
                                        if (file_exists($icon_path)) {
                                            echo file_get_contents($icon_path);
                                        } else {
                                            echo file_get_contents($icon_url);
                                        }
                                    } else {
                                        ?>
                                        <img src="<?= $icon_url ?>" alt="<?= $social['title'] ?>">
                                    <?php } ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>