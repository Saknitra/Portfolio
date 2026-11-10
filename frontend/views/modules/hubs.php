<?php
$data = $args['data'];
?>

<section data-module="hubs">
    <?php if (!empty($data['cards'])) : ?>
        <div class="cards">
            <?php foreach ($data['cards'] as $card) : ?>
                <article class="card card--<?= esc_attr($card['variant'] ?: 'dark') ?>">
                    <div class="card__top">
                        <?php if (!empty($card['platform'])) : ?>
                            <span class="platform"><?= esc_html($card['platform']) ?></span>
                        <?php endif; ?>

                        <?php if (!empty($card['icon']['src'])) : ?>
                            <img
                                    class="icon"
                                    src="<?= esc_url($card['icon']['src']) ?>"
                                    alt="<?= esc_attr($card['icon']['alt']) ?>"
                            >
                        <?php endif; ?>
                    </div>

                    <h3 class="title"><?= esc_html($card['title']) ?></h3>

                    <?php if (!empty($card['description'])) : ?>
                        <p class="description"><?= nl2br(esc_html($card['description'])) ?></p>
                    <?php endif; ?>

                    <div class="card__bottom">
                        <?php if (!empty($card['handwriting'])) : ?>
                            <p class="handwriting"><?= esc_html($card['handwriting']) ?></p>
                        <?php endif; ?>

                        <?php if (!empty($card['button_text']) && !empty($card['button_url'])) : ?>
                            <a class="button" href="<?= esc_url($card['button_url']) ?>">
                                <?= esc_html($card['button_text']) ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>