<?php
$recommends = [
    '事業をやめようと考えているが、<span>解散以外の方法も知りたい</span>方',
    '休眠会社を保有しており、<span>今後活用する予定がない</span>方',
    '赤字や売上減少により、<span>会社を手放すことを検討している</span>方',
    '法人格、社歴、許認可などを活かした<span>譲渡の可能性を知りたい</span>方',
    '<span>後継者不在</span>のため、<span>会社の承継方法を探している</span>方',
    'まずは売却できる会社かどうかだけでも<span>相談したい</span>方',
]
    ?>
<section class="yutaka-section yutaka-recommend-section">
    <div class="container">
        <p class="yutaka-section__label">recommend</p>
        <h2 class="yutaka-section__title">このような方におすすめです。</h2>
        <div class="yutaka-section__line"></div>

        <?php if (!empty($recommends)): ?>
            <div class="yutaka-recommend-section__list">
                <?php foreach ($recommends as $recommend): ?>
                    <div class="recommend-item d-flex ">
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/icon-check.png' ?>" alt="">
                        <p class="mb-0">
                            <?php echo $recommend; ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>