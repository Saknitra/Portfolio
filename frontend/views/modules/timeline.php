<?php
$data  = $args['data'];
$items = $data['items'] ?? [];
?>

<section data-module="timeline">
    <?php if (!empty($items)) : ?>
        <ol class="items">
            <?php foreach ($items as $i => $item) : ?>
                <?php
                $accent  = $item['accent'] ?: 'neutral';
                $side    = ($i % 2 === 0) ? 'left' : 'right';
                $current = !empty($item['current']);
                ?>
                <li class="item item--<?= esc_attr($accent) ?> item--<?= $side ?> <?= $current ? 'item--current' : '' ?>">
                    <span class="dot" aria-hidden="true"></span>

                    <div class="item__content">
                        <p class="period"><?= esc_html($item['period']) ?></p>

                        <h3 class="title"><?= esc_html($item['title']) ?></h3>

                        <?php if (!empty($item['text'])) : ?>
                            <p class="text"><?= nl2br(esc_html($item['text'])) ?></p>
                        <?php endif; ?>

                        <?php if (!empty($item['tags'])) : ?>
                            <ul class="tags">
                                <?php foreach ($item['tags'] as $tag) : ?>
                                    <li><?= esc_html($tag['tag']) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <?php if (!empty($item['note'])) : ?>
                            <p class="note"><?= esc_html($item['note']) ?></p>
                        <?php endif; ?>
                    </div>
                </li>
            <?php endforeach; ?>
        </ol>
    <?php endif; ?>
</section>