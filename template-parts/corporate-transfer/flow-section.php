<?php
$steps = [
    [
        'title' => 'お申込み・初回ヒアリング',
        'image' => 'img-flow-001.png',
        'content' => 'まずは、事業内容や法人の現況、ご希望条件についてお伺いします。あわせて、案件化に必要となる資料をご提出いただきます。'
    ],
    [
        'title' => '案件化・買主様の募集',
        'image' => 'img-flow-002.png',
        'content' => 'ご提供いただいた情報を整理し、買主様の募集を開始します。この段階では、<b>会社が特定されないよう配慮した形</b>で情報を取り扱います。'
    ],
    [
        'title' => 'デューデリジェンス・条件交渉',
        'image' => 'img-flow-003.png',
        'content' => '購入意向のある相手が現れた後、まずは秘密保持契約を締結し、そのうえで法人や事業に関する詳細情報を開示していきます。<br><br>その後、買主様側によるデューデリジェンスを経て、譲渡条件や引継ぎ内容の確認・交渉を行い、基本合意へ進みます。'
    ],
    [
        'title' => '最終契約',
        'image' => 'img-flow-004.png',
        'content' => '諸条件が整い次第、最終契約を締結します。契約書の内容や手続きの進行についても、丁寧にサポートいたします。'
    ],
    [
        'title' => '譲渡・引継ぎ',
        'image' => 'img-flow-005.png',
        'content' => '契約内容に基づき、譲渡手続きを実行します。案件によっては、引継ぎや移行のために3か月〜半年程度の移行期間を設ける場合もあります。'
    ],
];
?>

<section class="yutaka-section flow-section">
    <div class="container">
        <p class="yutaka-section__label">Flow</p>
        <h2 class="yutaka-section__title mb-0">お手続きの流れ</h2>
        <div class="yutaka-section__line"> </div>


        <div class="flow-section__list">
            <?php foreach ($steps as $index => $step): ?>
                <div class="flow-item">
                    <div class="flow-item__number"><?= $index + 1 ?></div>
                    <div class="flow-item__image">
                        <img src="<?= get_template_directory_uri() ?>/assets/images/corporate-transfer/<?= $step['image'] ?>"
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