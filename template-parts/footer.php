<?php
$copyright = get_field('copyright', 'option');
$rights_reserved = get_field('rights_reserved', 'option');
$custom_logo_id = get_theme_mod('custom_logo');
$logo_url = wp_get_attachment_url($custom_logo_id);
$socials = get_field('socials', 'option');
$company_name = get_field('company_name', 'option');
$address = get_field('address', 'option');
?>

<footer class="main-footer">
    <button class="btn-top d-flex align-items-center justify-content-center" type="button"
        aria-label="<?php echo __('Back to top', 'nmc'); ?>">
        <div class="btn-top__icon">
            <svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg" color="#000000">
                <path d="M6 15L12 9L18 15" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round"></path>
            </svg>
        </div>

        PAGETOP
    </button>

    <div class="container">
        <div class="main-footer-inner d-flex justify-content-between flex-wrap flex-lg-nowrap">
            <div class="main-footer-left order-2">
                <div class="main-footer-logo">
                    <a href="<?php echo home_url(); ?>" aria-label="<?php echo get_bloginfo('name'); ?>">
                        <img src="<?php echo $logo_url; ?>" alt="<?php echo get_bloginfo('name'); ?>">
                    </a>
                </div>

                <?php if ($company_name): ?>
                    <p class="main-footer__company mb-0"> <span>会社名</span> <?php echo $company_name; ?></p>
                <?php endif; ?>

                <?php if ($address): ?>
                    <p class="main-footer__address mb-0"> <span>住所</span> <?php echo $address; ?></p>
                <?php endif; ?>
            </div>

            <?php if (has_nav_menu('primary-menu')): ?>
                <div class="main-footer-right order-1 order-md-2">
                    <div class="main-footer-menu menu-primary">
                        <?php wp_nav_menu(array('theme_location' => 'primary-menu', 'menu_class' => 'footer-menu')) ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>

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

        <?php if ($copyright): ?>
            <p class="main-footer__copyright d-flex align-items-center justify-content-center mb-0">
                <?php echo $copyright; ?>
            </p>
        <?php endif; ?>
    </div>
</footer>