<?php
$form = get_field("form_contact");
?>
<?php if (!empty($form)): ?>
    <section class="sazukaru-section content-section">
        <div class="container">
            <h2 class="h4">お問い合わせ</h2>
            <span class="icon"></span>
            <div class="content-section__form">
                <?= do_shortcode($form) ?>
            </div>
        </div>
    </section>
<?php endif; ?>