<?php
$copyright = get_field('copyright_ft', 'option');
$custom_logo_id = get_theme_mod('custom_logo');
$logo_url = wp_get_attachment_url($custom_logo_id);
$company_name = get_field('company_name_ft', 'option');
$address = get_field('address_ft', 'option');
?>

<?php get_template_part('template-parts/shared/contact-section'); ?>

<footer class="main-footer">
    <div class="main-footer-top">
        <div class="container">
            <div class="main-footer-top-warp">
                <div class="main-footer-top__left">
                    <div class="main-footer__logo">
                        <a href="<?php echo home_url(); ?>" aria-label="<?php echo get_bloginfo('name'); ?>">
                            <img src="<?php echo $logo_url; ?>" alt="<?php echo get_bloginfo('name'); ?>">
                        </a>
                    </div>

                    <?php if (!empty($company_name)): ?>
                        <p class="main-footer__company mb-0">
                            <span>会社名</span>
                            <?php echo $company_name; ?>
                        </p>
                    <?php endif; ?>

                    <?php if (!empty($address)): ?>
                        <p class="main-footer__address mb-0">
                            <span>住所</span>
                            <?php echo $address; ?>
                        </p>
                    <?php endif; ?>
                </div>

                <?php if (has_nav_menu('footer-menu')): ?>
                    <div class="main-footer-top__right">
                        <?php wp_nav_menu(array('theme_location' => 'footer-menu', 'menu_class' => 'footer-menu')) ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="main-footer-bottom">
        <div class="container">
            <?php if (!empty($copyright)): ?>
                <p class="main-footer__copyright mb-0">
                    <?php echo $copyright; ?>
                </p>
            <?php endif; ?>
        </div>
    </div>
</footer>