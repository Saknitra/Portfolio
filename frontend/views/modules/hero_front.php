<?php
$data = $args['data'];
?>

<section data-module="hero_front">
    <?php if (!empty($data['video']['src'])) : ?>
        <video class="hero_video" autoplay muted loop playsinline>
            <source src="<?= esc_url($data['video']['src']) ?>" type="<?= esc_attr($data['video']['type']) ?>">
        </video>
    <?php endif; ?>

    <div class="content">
        <?php if (!empty($data['surtitle'])) : ?>
            <p class="surtitle"><?= esc_html($data['surtitle']) ?></p>
        <?php endif; ?>

        <h1 class="title"><?= esc_html($data['title']) ?></h1>

        <?php if (!empty($data['worlds'])) : ?>
            <ul class="worlds">
                <?php foreach ($data['worlds'] as $item) : ?>
                    <li><?= esc_html($item['world']) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <?php if (!empty($data['handwriting'])) : ?>
            <p class="handwriting"><?= esc_html($data['handwriting']) ?></p>
        <?php endif; ?>
    </div>
</section>