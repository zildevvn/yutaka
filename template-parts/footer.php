<?php
$copyright = get_field('copyright_ft', 'option');
$custom_logo_id = get_theme_mod('custom_logo');
$logo_url = wp_get_attachment_url($custom_logo_id);
$company_name = get_field('company_name_ft', 'option');
$address = get_field('address_ft', 'option');
?>

<?php get_template_part('template-parts/shared/contact-section'); ?>

<footer class="main-footer">

    <button class="btn-top d-flex align-items-center justify-content-center" type="button"
        aria-label="<?php echo __('Back to top', 'nmc'); ?>">
        <svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
            xmlns="http://www.w3.org/2000/svg" color="#000000">
            <path d="M6 15L12 9L18 15" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round"></path>
        </svg>
    </button>


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