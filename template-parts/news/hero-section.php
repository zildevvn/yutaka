<?php
$title = 'NEWS';
$sub_title = 'お知らせ';
$image = get_template_directory_uri() . '/assets/images/blog/img-hero-blog.jpg';
$image_mb = get_template_directory_uri() . '/assets/images/blog/img-blog-hero-mb.png';
?>
<section class="yutaka-section blog-hero-section">
    <div class="container">
        <div class="blog-hero-inner">
            <div class="blog-hero-content">
                <div class="blog-hero-content__label">News</div>
                <h1 class="blog-hero-content__title">
                    <?php echo $title; ?>
                </h1>
            </div>
            <div class="blog-hero-image">
                <img src="<?php echo $image; ?>" alt="<?php echo $sub_title; ?>">
            </div>
        </div>
    </div>
    <div class="blog-hero-shape">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog/img-shape-blog.png" alt="blog-shape">
    </div>
</section>