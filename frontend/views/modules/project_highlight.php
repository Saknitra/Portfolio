<?php
$data = $args['data'];

$position  = $data['thumbnail_position'] ?: 'right';
$thumbnail = $data['thumbnail'] ?? null;
$link      = $data['thumbnail_url'] ?? '';
?>

<section data-module="project_highlight">
    <div class="layout layout--thumbnail-<?= esc_attr($position) ?>">

        <?php if (!empty($thumbnail['src'])) : ?>
            <?php
            $image = '<img class="thumbnail__image" src="' . esc_url($thumbnail['src']) . '" alt="' . esc_attr($thumbnail['alt']) . '">';
            ?>

            <div class="thumbnail">
                <?php if (!empty($data['badge'])) : ?>
                    <span class="badge"><?= esc_html($data['badge']) ?></span>
                <?php endif; ?>

                <?php if (!empty($link)) : ?>
                    <a class="thumbnail__link" href="<?= esc_url($link) ?>">
                        <?= $image ?>
                    </a>
                <?php else : ?>
                    <?= $image ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="content">
            <?php if (!empty($data['tag'])) : ?>
                <span class="tag"><?= esc_html($data['tag']) ?></span>
            <?php endif; ?>

            <h3 class="title"><?= esc_html($data['title']) ?></h3>

            <?php if (!empty($data['text'])) : ?>
                <p class="text"><?= nl2br(esc_html($data['text'])) ?></p>
            <?php endif; ?>

            <?php if (!empty($data['logline'])) : ?>
                <div class="logline">
                    <span class="logline__label">Logline</span>
                    <p><?= nl2br(esc_html($data['logline'])) ?></p>
                </div>
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

    </div>
</section>