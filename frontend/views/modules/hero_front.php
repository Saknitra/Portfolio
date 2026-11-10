<?php
$data = $args['data'];
js_log($data);
?>

<section data-module="hero_front">
    <?php if (!empty($data['video']['src'])) : ?>
        <video class="hero_video" autoplay muted loop playsinline>
            <source src="<?= esc_url($data['video']['src']) ?>" type="<?= esc_attr($data['video']['type']) ?>">
        </video>
    <?php endif; ?>

    <p class="surtitle"><?= esc_html($data['surtitle']) ?></p>
    <h1 class="title"><?= esc_html($data['title']) ?></h1>
    <div class="worlds">
        <?php foreach ($data['worlds'] as $item) : ?>
            <span><?= esc_html($item['world']) ?></span>
        <?php endforeach; ?>
    </div>
    <p class="handwriting"><?= esc_html($data['handwriting']) ?></p>
</section>