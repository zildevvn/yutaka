<?php
$partners = [
    [
        'image' => 'image-partner-001.png',
        'heading' => 'JORDANIA CLINIC',
    ],
    [
        'image' => 'image-partner-002.png',
        'heading' => 'INOVA CLINIC',
    ],
    [
        'image' => 'image-partner-003.png',
        'heading' => 'IN-VITRO CLINIC',
    ],
    [
        'image' => 'image-partner-004.png',
        'heading' => 'CHACHAVA CLINIC',
    ],
    [
        'image' => 'image-partner-005.png',
        'heading' => 'K.MARDALEISHVILI CLINIC',
    ],
    [
        'image' => 'image-partner-006.png',
        'heading' => 'KARAPS MEDLINE CLINIC',
    ],
    [
        'image' => 'image-partner-007.png',
        'heading' => 'Z. SABAKHTARASHVILI CLINIC',
    ],
    [
        'image' => 'image-partner-008.png',
        'heading' => 'SMART ULTRASOUND',
    ],
    [
        'image' => 'image-partner-009.png',
        'heading' => 'GAGUA CLINIC',
    ],
    [
        'image' => 'image-partner-010.png',
        'heading' => 'HERA 2011',
    ],
    [
        'image' => '',
        'heading' => 'UNIVERSY CLINIC',
    ],
    [
        'image' => '',
        'heading' => 'FERTIMEDI CLINIC',
    ],
    [
        'image' => '',
        'heading' => 'REPRO ART CLINIC',
    ],
]
    ?>
<section class="sazukaru-section partner-section">
    <div class="container">
        <div class="partner-section__content">
            <img src="<?= get_template_directory_uri(); ?>/assets/images/icon-partner.png" alt="icon for partner" />
            <h2>PARTNER</h2>
            <p class="mb-0">連携クリニック</p>
        </div>

        <?php if (!empty($partners)): ?>
            <div class="partner-section__list">
                <?php foreach ($partners as $partner): ?>
                    <div class="partner-item">
                        <h3>
                            <?= $partner['heading']; ?>
                        </h3>

                        <?php if ($partner['image']): ?>
                            <img src="<?= get_template_directory_uri(); ?>/assets/images/<?= $partner['image']; ?>"
                                alt="<?= $partner['heading']; ?>" />
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>