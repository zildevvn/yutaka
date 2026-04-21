<?php
$program_link_1 = home_url('/program-1/');
$program_link_2 = home_url('/program-2/');
$programs = [
    [
        'title' => '代理出産プログラム',
        'desc' => '「厳格な審査をクリアした代理母と、 専門家チームによる確かな支え」',
        'content' => ' 
            <p>代理出産において最も大切なのは、代理母の心身の健康と、法的な安全性が守られていることです。弊社では、出産経験があり、家族の協力が得られている健康な代理母のみを厳選</p>
            <p>。<br/>医師・弁護士と連携した多職種サポート体制で、受精卵の移植から出産まで、すべての工程を慎重に進めていきます。</p>
        ',
        'image' => 'image-program-001.jpg',
        'image_mb' => 'image-program-002.png',
        'link' => $program_link_1,
    ],
    [
        'title' => '卵子ドナー提供プログラム',
        'desc' => '「あなたに最適なドナー選びから、 移植後のサポートまで」',
        'content' => '
            <p>先天的な要因や病気の影響で自力の排卵が難しい方へ。弊社では、日本人ドナーを含む多様なバックグラウンドを持つドナーのご紹介が可能です。</p>
            <p>1回あたりの妊娠率50〜60%という高い実績に加え、余剰胚の凍結保存など、将来を見据えた無理のないプランをご提案します。まずは専門家によるカウンセリングで、詳細を確認してみませんか？</p>
        ',
        'image' => 'image-program-003.png',
        'image_mb' => 'image-program-004.png',
        'link' => $program_link_2,
    ]
]
    ?>
<section class="sazukaru-section program-section">
    <div class="sazukaru-section__bg">
        <img class="d-none d-md-block" src="<?= get_template_directory_uri(); ?>/assets/images/bg-program.png"
            alt="bg-program" />
        <img class="d-md-none" src="<?= get_template_directory_uri(); ?>/assets/images/bg-program-mb.png"
            alt="bg-program-mb" />
    </div>
    <div class="container">
        <div class="program-section__content">
            <img src="<?= get_template_directory_uri(); ?>/assets/images/icon-program.png" alt="icon for program" />
            <h2>PROGRAM</h2>
            <p class="mb-0">プログラム紹介</p>

            <?php if (!empty($programs)): ?>
                <div class="program-section__list d-flex">
                    <?php foreach ($programs as $index => $program): ?>
                        <div class="program-item">
                            <div class="program-item__image">
                                <img class="d-none d-lg-block"
                                    src="<?= get_template_directory_uri(); ?>/assets/images/<?= $program['image']; ?>"
                                    alt="<?= $program['title']; ?>" />
                                <img class="d-lg-none"
                                    src="<?= get_template_directory_uri(); ?>/assets/images/<?= $program['image_mb']; ?>"
                                    alt="<?= $program['title']; ?>" />
                            </div>

                            <div class="program-item__content d-flex flex-wrap">
                                <div class="content-warp w-100">
                                    <h3 class="mb-0 h4">
                                        <?= $program['title']; ?>
                                    </h3>
                                    <p class="mb-0 program-item__content-desc">
                                        <?= $program['desc']; ?>
                                    </p>
                                    <div class="program-item__content-text">
                                        <?= $program['content']; ?>
                                    </div>
                                </div>

                                <?php sazukaru_button('詳しくはこちら', $program['link'], ) ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>