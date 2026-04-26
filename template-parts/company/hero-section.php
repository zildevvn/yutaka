<?php
$title = 'COMPANY';
$sub_title = '会社概要';
$image = get_template_directory_uri() . '/assets/images/company/image-company-hero.jpg';
$image_mb = get_template_directory_uri() . '/assets/images/company/image-company-hero-mb.jpg';
?>
<div class="company-hero-section">
    <div class="container">
        <div class="company-hero-section__wrapper d-flex">
            <div class="company-hero-section__left">
                <h1>
                    <?php echo $title ?>
                </h1>
                <p>
                    <?php echo $sub_title ?>
                </p>
            </div>
            <div class="company-hero-section__right">
                <img src="<?php echo $image ?>" alt="<?php echo $title ?>">
            </div>
        </div>
    </div>
</div>