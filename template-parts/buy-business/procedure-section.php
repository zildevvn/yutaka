<?php
$procedures = [
    [
        'number' => '01',
        'title' => 'ご希望の案件をお知らせください',
        'content' => 'まずは、購入を検討されている案件をお知らせください。<br>売り会社一覧をご確認のうえ、お電話またはお問い合わせフォームよりご連絡ください。<br>ご連絡後、法人の概要や条件、全体の流れについてご案内いたします。',
    ],
    [
        'number' => '02',
        'title' => '変更登記についてご説明します',
        'content' => '会社を取得いただく際には、変更登記の実施が必要になります。<br>そのため、必要となる手続きや注意点について、事前に分かりやすくご説明いたします。',
    ],
    [
        'number' => '03',
        'title' => 'ご請求書の発行',
        'content' => '購入のご意思が固まりましたら、ご請求書を発行いたします。<br>お代金は前払いとなりますが、<b>お手続き完了まで当社にて保全</b>いたします。<br>なお、売主様側の事情により売買が成立しなかった場合には、<b>全額をご返金</b>いたします。<br>一方で、お振込み後のお客様都合によるキャンセルはご遠慮いただいております。',
    ],
    [
        'number' => '04',
        'title' => 'ご契約書へのご捺印',
        'content' => '契約書を郵送いたしますので、ご確認のうえご捺印をお願いいたします。<br>なお、契約書は売主様に先行してご対応いただくため、その状況によっては多少日数を要する場合があります。',
    ],
    [
        'number' => '05',
        'title' => '変更登記の実施',
        'content' => '必要な変更登記を進めていただきます。<br>一般的には、<b>役員変更や本店所在地変更</b>が必要となります。',
    ],
    [
        'number' => '07',
        'title' => 'お引渡し',
        'content' => '登記完了後、法人に関する書類や印鑑類等をお引渡しいたします。<br>これをもって、会社の引継ぎ完了となります。',
    ],
];
?>

<section class="yutaka-section procedure-section">
    <div class="container">
        <h2 class="text-center mb-0">お手続きの流れ</h2>
        <p class="procedure-section__desc"><b>通常、お手続き完了までは4週間程度を想定しております。</b><br />お急ぎの場合は、事前にご相談ください。</p>

        <div class="procedure-section__list">
            <?php foreach ($procedures as $item): ?>
                <div class="procedure-item">
                    <div class="procedure-item__number">
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/buy-business/icon-timline.png' ?>"
                            alt="icon">
                        <span><?= $item['number'] ?></span>
                    </div>
                    <div class="procedure-item__header">
                        <?= $item['title'] ?>
                    </div>
                    <div class="procedure-item__content">
                        <p class="mb-0"><?= $item['content'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>