<?php
$data = $args['data'];
?>

<section data-module="hero_subpage">
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

        <?php if (!empty($data['icon']['src'])) : ?>
            <img
                    class="icon"
                    src="<?= esc_url($data['icon']['src']) ?>"
                    alt="<?= esc_attr($data['icon']['alt']) ?>"
            >
        <?php endif; ?>

        <?php if (!empty($data['handwriting'])) : ?>
            <p class="handwriting"><?= esc_html($data['handwriting']) ?></p>
        <?php endif; ?>

        <?php if (!empty($data['vision'])) : ?>
            <p class="vision"><?= nl2br(esc_html($data['vision'])) ?></p>
        <?php endif; ?>
    </div>
</section>