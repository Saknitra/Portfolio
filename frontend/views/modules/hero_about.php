<?php
$data = $args['data'];
?>

<section data-module="hero_about">
    <figure class="portrait">
        <?php if (!empty($data['portrait']['src'])) : ?>
            <img
                    class="portrait__image"
                    src="<?= esc_url($data['portrait']['src']) ?>"
                    alt="<?= esc_attr($data['portrait']['alt']) ?>"
            >
        <?php endif; ?>

        <?php if (!empty($data['portrait_note'])) : ?>
            <figcaption class="portrait__note"><?= esc_html($data['portrait_note']) ?></figcaption>
        <?php endif; ?>
    </figure>

    <div class="content">
        <?php if (!empty($data['handwriting'])) : ?>
            <p class="handwriting"><?= esc_html($data['handwriting']) ?></p>
        <?php endif; ?>

        <h1 class="title"><?= esc_html($data['title']) ?></h1>

        <?php if (!empty($data['text'])) : ?>
            <p class="text"><?= nl2br(esc_html($data['text'])) ?></p>
        <?php endif; ?>

        <?php if (!empty($data['buttons'])) : ?>
            <div class="buttons">
                <?php foreach ($data['buttons'] as $button) : ?>
                    <a class="button" href="<?= esc_url($button['button_url']) ?>">
                        <?= esc_html($button['button_text']) ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>