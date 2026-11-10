<?php
$data = $args['data'];
?>

<section data-module="recap_meetup">
    <div class="layout">
        <div class="content">
            <?php if (!empty($data['tag'])) : ?>
                <span class="tag"><?= esc_html($data['tag']) ?></span>
            <?php endif; ?>

            <h3 class="title"><?= esc_html($data['subtitle']) ?></h3>

            <?php if (!empty($data['text'])) : ?>
                <p class="text"><?= nl2br(esc_html($data['text'])) ?></p>
            <?php endif; ?>

            <?php if (!empty($data['note'])) : ?>
                <p class="handwriting"><?= esc_html($data['note']) ?></p>
            <?php endif; ?>
        </div>

        <?php if (!empty($data['photos'])) : ?>
            <div class="photos">
                <?php foreach ($data['photos'] as $photo) : ?>
                    <figure class="photo">
                        <img
                                src="<?= esc_url($photo['src']) ?>"
                                alt="<?= esc_attr($photo['alt']) ?>"
                                loading="lazy"
                        >
                    </figure>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>