<?php
$cta = get_globals_cta();

if (empty($cta['title'])) {
    return;
}
?>

<section data-layout="cta">
    <?php if (!empty($cta['handwriting'])) : ?>
        <p class="handwriting"><?= esc_html($cta['handwriting']) ?></p>
    <?php endif; ?>

    <h2 class="title"><?= esc_html($cta['title']) ?></h2>

    <?php if (!empty($cta['lead'])) : ?>
        <p class="lead"><?= esc_html($cta['lead']) ?></p>
    <?php endif; ?>

    <?php if (!empty($cta['keywords'])) : ?>
        <ul class="keywords">
            <?php foreach ($cta['keywords'] as $item) : ?>
                <li><?= esc_html($item['keyword']) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?php if (!empty($cta['columns'])) : ?>
        <div class="columns">
            <?php foreach ($cta['columns'] as $column) : ?>
                <div class="column">
                    <p class="label"><?= esc_html($column['label']) ?></p>
                    <p class="text"><?= nl2br(esc_html($column['text'])) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($cta['button_text']) && !empty($cta['button_url'])) : ?>
        <a class="button" href="<?= esc_url($cta['button_url']) ?>">
            <?= esc_html($cta['button_text']) ?>
        </a>
    <?php endif; ?>
</section>