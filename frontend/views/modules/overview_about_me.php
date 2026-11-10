<?php
$data = $args['data'];
?>

<section data-module="overview_about_me">
    <figure class="portrait">
        <?php if (!empty($data['introductionfoto']['src'])) : ?>
            <img
                    class="portrait__image"
                    src="<?= esc_url($data['introductionfoto']['src']) ?>"
                    alt="<?= esc_attr($data['introductionfoto']['alt']) ?>"
            >
        <?php endif; ?>

        <?php if (!empty($data['highlighttext'])) : ?>
            <figcaption class="highlighttext"><?= esc_html($data['highlighttext']) ?></figcaption>
        <?php endif; ?>
    </figure>

    <div class="content">
        <?php if (!empty($data['handwriting'])) : ?>
            <p class="handwriting"><?= esc_html($data['handwriting']) ?></p>
        <?php endif; ?>

        <h2 class="title"><?= esc_html($data['title']) ?></h2>

        <?php if (!empty($data['lead'])) : ?>
            <p class="lead"><?= nl2br(esc_html($data['lead'])) ?></p>
        <?php endif; ?>

        <?php if (!empty($data['highlighticons'])) : ?>
            <ul class="highlights">
                <?php foreach ($data['highlighticons'] as $item) : ?>
                    <li><?= esc_html($item['highlighticon']) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <?php if (!empty($data['link_text']) && !empty($data['link_url'])) : ?>
            <a class="button" href="<?= esc_url($data['link_url']) ?>">
                <?= esc_html($data['link_text']) ?>
            </a>
        <?php endif; ?>
    </div>
</section>