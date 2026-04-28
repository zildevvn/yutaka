<?php
$steps = [
    [
        'title' => 'まずはお問い合わせください',
        'image' => 'img-flow-sell-001.jpg',
        'imageMb' => 'img-flow-sell-mb-001.jpg',
        'content' => 'お電話・メール・お問い合わせフォームよりご連絡ください。<br>会社売買や法人の承継に関するご相談は無料で承っております。'
    ],
    [
        'title' => '法人の状況をお伺いします',
        'image' => 'img-flow-sell-002.jpg',
        'imageMb' => 'img-flow-sell-mb-002.jpg',
        'content' => 'お電話またはメールにて、会社の現状やご希望条件をお伺いします。<br>事前に法人に関する資料をご準備いただけますと、よりスムーズにご案内できます。<br>あわせて、お手続き全体の流れについてもご説明いたします。'
    ],
    [
        'title' => 'ご売却方法・条件の整理',
        'image' => 'img-flow-sell-003.jpg',
        'imageMb' => 'img-flow-sell-mb-003.jpg',
        'content' => '法人の状況やご希望を踏まえ、売却の進め方や条件を整理していきます。<br/> <br/>ご希望金額や譲渡条件についても、相場感を踏まえてご相談いただけます。'
    ],
    [
        'title' => 'ご案内開始',
        'image' => 'img-flow-sell-004.jpg',
        'imageMb' => 'img-flow-sell-mb-004.jpg',
        'content' => '内容を整えたうえで、買主様へのご案内を開始します。<br/>案件に応じて、WEB掲載等を通じて購入希望者とのマッチングを進めてまいります。'
    ],
    [
        'title' => '購入希望者が現れた際のご連絡',
        'image' => 'img-flow-sell-005.jpg',
        'imageMb' => 'img-flow-sell-mb-005.jpg',
        'content' => '購入希望者からお申込みが入りましたら、内容確認のご連絡を差し上げます。<br/>条件やご意向を確認しながら、譲渡可否を慎重に進めます。'
    ],
    [
        'title' => '契約締結・譲渡準備',
        'image' => 'img-flow-sell-006.jpg',
        'imageMb' => 'img-flow-sell-mb-006.jpg',
        'content' => '条件がまとまり次第、契約書を作成し、正式なお手続きへ進みます。<br/>必要書類のご案内や進行管理についても、丁寧にサポートいたします。'
    ],
    [
        'title' => '決済・お引渡し',
        'image' => 'img-flow-sell-007.jpg',
        'imageMb' => 'img-flow-sell-mb-007.jpg',
        'content' => '代表者変更等の必要な手続きが完了した後、売買代金の決済を行い、法人に関する物品や書類のお引渡しとなります。'
    ],
];
?>

<section class="yutaka-section flow-section">
    <div class="container">
        <h2 class="yutaka-section__title mb-0">ご売却の流れ</h2>

        <div class="flow-section__list">
            <?php foreach ($steps as $index => $step): ?>
                <div class="flow-item">
                    <div class="flow-item__number"><?= $index + 1 ?></div>
                    <div class="flow-item__image">
                        <img class="d-none d-md-block"
                            src="<?= get_template_directory_uri() ?>/assets/images/sell-business/<?= $step['image'] ?>"
                            alt="<?= $step['title'] ?>">

                        <img class="d-md-none"
                            src="<?= get_template_directory_uri() ?>/assets/images/sell-business/<?= $step['imageMb'] ?>"
                            alt="<?= $step['title'] ?>">
                        <div class="flow-item__overlay">
                            <h3 class="flow-item__title"><?= $step['title'] ?></h3>
                        </div>
                    </div>
                    <div class="flow-item__content">
                        <p><?= $step['content'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>