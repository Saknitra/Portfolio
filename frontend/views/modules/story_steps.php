<?php
$data = $args['data'];

$layout   = $data['layout'] ?: 'horizontal';
$stations = $data['stations'] ?? [];
?>

<section data-module="story_steps" class="story story--<?= esc_attr($layout) ?>">
    <?php if (!empty($data['citation'])) : ?>
        <p class="citation"><?= esc_html($data['citation']) ?></p>
    <?php endif; ?>

    <?php if (!empty($stations)) : ?>
        <ol class="stations">
            <?php foreach ($stations as $i => $station) : ?>
                <li class="station <?= !empty($station['highlighted']) ? 'station--highlighted' : '' ?>">
                    <?php if (!empty($station['icon']['src'])) : ?>
                        <img
                                class="icon"
                                src="<?= esc_url($station['icon']['src']) ?>"
                                alt="<?= esc_attr($station['icon']['alt']) ?>"
                        >
                    <?php endif; ?>

                    <p class="label">
                        <span class="label__number"><?= sprintf('%02d', $i + 1) ?></span>
                        <?php if (!empty($station['label'])) : ?>
                            · <?= esc_html($station['label']) ?>
                        <?php endif; ?>
                    </p>

                    <?php if (!empty($station['strike_text'])) : ?>
                        <p class="strike"><s><?= esc_html($station['strike_text']) ?></s></p>
                    <?php endif; ?>

                    <h3 class="title"><?= esc_html($station['title']) ?></h3>

                    <?php if (!empty($station['text'])) : ?>
                        <div class="text">
                            <?= wpautop(wp_kses_post($station['text'])) ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($station['chips'])) : ?>
                        <ul class="chips">
                            <?php foreach ($station['chips'] as $chip) : ?>
                                <li><?= esc_html($chip['chip']) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <?php if (!empty($station['note'])) : ?>
                        <p class="note"><?= esc_html($station['note']) ?></p>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ol>
    <?php endif; ?>
</section>