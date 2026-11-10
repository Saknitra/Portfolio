<?php
$data = $args['data'];

$has_primary   = !empty($data['button_primary_text']) && !empty($data['button_primary_url']);
$has_secondary = !empty($data['button_secondary_text']) && !empty($data['button_secondary_url']);
?>

<section data-module="teaser_together">
    <div class="layout">
        <div class="content">
            <?php if (!empty($data['icon']['src'])) : ?>
                <img
                        class="icon"
                        src="<?= esc_url($data['icon']['src']) ?>"
                        alt="<?= esc_attr($data['icon']['alt']) ?>"
                >
            <?php endif; ?>

            <?php if (!empty($data['surtitle'])) : ?>
                <p class="surtitle"><?= esc_html($data['surtitle']) ?></p>
            <?php endif; ?>

            <h2 class="title"><?= esc_html($data['title']) ?></h2>

            <?php if (!empty($data['text'])) : ?>
                <p class="text"><?= nl2br(esc_html($data['text'])) ?></p>
            <?php endif; ?>

            <?php if (!empty($data['handwriting'])) : ?>
                <p class="handwriting"><?= esc_html($data['handwriting']) ?></p>
            <?php endif; ?>

            <?php if ($has_primary || $has_secondary) : ?>
                <div class="buttons">
                    <?php if ($has_primary) : ?>
                        <a class="button button--primary" href="<?= esc_url($data['button_primary_url']) ?>">
                            <?= esc_html($data['button_primary_text']) ?>
                        </a>
                    <?php endif; ?>

                    <?php if ($has_secondary) : ?>
                        <a class="button button--secondary" href="<?= esc_url($data['button_secondary_url']) ?>">
                            <?= esc_html($data['button_secondary_text']) ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>

        <?php if (!empty($data['points'])) : ?>
            <ul class="points">
                <?php foreach ($data['points'] as $point) : ?>
                    <li class="point">
                        <h3 class="point__title"><?= esc_html($point['point_title']) ?></h3>
                        <?php if (!empty($point['point_text'])) : ?>
                            <p class="point__text"><?= esc_html($point['point_text']) ?></p>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <span class="dots" aria-hidden="true"></span>
    </div>
</section>