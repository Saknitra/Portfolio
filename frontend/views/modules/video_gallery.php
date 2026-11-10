<?php
$data = $args['data'];

$format = $data['format'] ?: 'landscape';
$items  = $data['items'] ?? [];
?>

<section data-module="video_gallery" class="gallery gallery--<?= esc_attr($format) ?>">
    <?php if (!empty($data['label']) || !empty($data['side_label'])) : ?>
        <div class="bar">
            <?php if (!empty($data['label'])) : ?>
                <span class="label"><?= esc_html($data['label']) ?></span>
            <?php endif; ?>

            <span class="line" aria-hidden="true"></span>

            <?php if (!empty($data['side_label'])) : ?>
                <span class="side_label"><?= esc_html($data['side_label']) ?></span>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($items)) : ?>
        <ul class="items">
            <?php foreach ($items as $item) : ?>
                <?php
                $tag   = !empty($item['video_url']) ? 'a' : 'div';
                $href  = !empty($item['video_url']) ? ' href="' . esc_url($item['video_url']) . '"' : '';
                $world = $item['world'] ?? '';
                ?>
                <li class="item">
                <<?= $tag ?> class="card"<?= $href ?>>
                <?php if (!empty($item['thumbnail']['src'])) : ?>
                    <div class="thumbnail">
                        <img
                                src="<?= esc_url($item['thumbnail']['src']) ?>"
                                alt="<?= esc_attr($item['thumbnail']['alt']) ?>"
                                loading="lazy"
                        >
                        <?php if (!empty($world)) : ?>
                            <span class="world world--<?= esc_attr($world) ?>">
                                        <?= esc_html(ucfirst($world)) ?>
                                    </span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <h3 class="title"><?= esc_html($item['title']) ?></h3>

                <?php if (!empty($item['description'])) : ?>
                    <p class="description"><?= nl2br(esc_html($item['description'])) ?></p>
                <?php endif; ?>
                </<?= $tag ?>>
                </li>
            <?php endforeach; ?>
        </ul>
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
</section>