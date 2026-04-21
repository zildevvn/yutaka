<?php
$list_reasons = [
    [
        'title' => '正式提携クリニックによる「安心できる医療品質」',
        'description' => 'dairiboやmedi-bridgesは複数クリニックのネットワーク提供であるのに対し、御社はJuno Surrogacyと',
        'image' => 'image-resoon-001.jpg',
        'image_mb' => 'image-resoon-003.png',
        'content' => '
            これにより：
            <ul>
                <li>医療プロセス・検査・妊娠管理手順の透明性</li>
                <li>提携双方で合意した安全基準と品質保証</li>
                <li>必要時のクリニカルレビュー対応</li>
            </ul>
            が担保されます。<br/>
            品質の一貫性という点では、<br/>
            “複数施設を横断的に扱うエージェント”よりも信頼性で優位です。
        '
    ],
    [
        'title' => '国籍別法務・リスク評価を“事前に可視化”',
        'description' => '代理出産は国籍・法制度により手続・帰国の難易度が大きく異なります。 御社は、',
        'image' => 'image-resoon-002.jpg',
        'image_mb' => 'image-resoon-004.png',
        'content' => '
            <ul> 
                <li>日本・韓国・中国・欧州主要国ごとの法務フロー</li>
                <li>出生証明→帰国→パスポート → 親子関係の確立</li>
                <li>予期せぬトラブル時の“代替プラン”</li>
            </ul>
            <br/>
            を事前評価し、書面化して提示する仕組みを整えます。<br/>
            競合ではここまで明確に“可否・プロセス・リスク・期間・費用”を整理して提示している例は少なく、透明性・安心感という点で大きな差別点になります。
        '
    ]
]
    ?>
<section class="sazukaru-section reason-section">
    <div class="sazukaru-section__bg">
        <img class="d-none d-md-block" src="<?= get_template_directory_uri(); ?>/assets/images/bg_reason-desktop.png"
            alt="bg-reason" />
        <img class="d-md-none" src="<?= get_template_directory_uri(); ?>/assets/images/bg_reason-mb.png"
            alt="bg-reason-mb" />
    </div>
    <div class="container">
        <div class="reason-section__content">
            <img src="<?= get_template_directory_uri(); ?>/assets/images/icon-reason.png" alt="icon-reason" />
            <h2>REASON</h2>
            <p class="mb-0">選ばれる理由 </p>
        </div>

        <?php if (!empty($list_reasons)): ?>
            <div class="reason-section__list">
                <?php foreach ($list_reasons as $index => $reason): ?>
                    <div class="reason-item d-flex flex-wrap flex-lg-nowrap">
                        <div class="reason-item__image d-none d-lg-block">
                            <img src="<?= get_template_directory_uri(); ?>/assets/images/<?= $reason['image']; ?>"
                                alt="<?= $reason['title']; ?>" />
                        </div>

                        <div class="reason-item__content d-flex align-items-center">
                            <div class="content-warp">
                                <p class="reason-number mb-0 d-flex align-items-center justify-content-center">REASON
                                    <?= $index + 1 ?>
                                </p>
                                <h3 class="mb-0">
                                    <?= $reason['title']; ?>
                                </h3>

                                <div class="d-lg-none reason-item__image-mb">
                                    <img src="<?= get_template_directory_uri(); ?>/assets/images/<?= $reason['image_mb']; ?>"
                                        alt="<?= $reason['title']; ?>" />
                                </div>

                                <p class="reason-description">
                                    <?= $reason['description']; ?>
                                </p>

                                <div class="reason-content">
                                    <?= $reason['content']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>