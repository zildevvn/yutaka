<?php
$form = get_field("form_contact");
?>
<?php if (!empty($form)): ?>
    <section class="yutaka-section content-section">
        <div class="container">
            <div class="content-section__form">
                <?= do_shortcode($form) ?>
            </div>
        </div>
    </section>
<?php endif; ?>