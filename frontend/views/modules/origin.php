<?php
$data = $args['data'];

// → Im Titel sind nur Hervorhebungen erlaubt, keine Absätze
$title = wp_kses($data['title'], [
        'strong' => [],
        'b'      => [],
        'em'     => [],
        'i'      => [],
        'br'     => [],
]);
?>

<section data-module="origin">
    <div class="layout">
        <div class="heading">
            <?php if (!empty($data['handwriting'])) : ?>
                <p class="handwriting"><?= esc_html($data['handwriting']) ?></p>
            <?php endif; ?>

            <h2 class="title"><?= $title ?></h2>

            <?php if (!empty($data['icon']['src'])) : ?>
                <img
                        class="icon"
                        src="<?= esc_url($data['icon']['src']) ?>"
                        alt="<?= esc_attr($data['icon']['alt']) ?>"
                >
            <?php endif; ?>
        </div>

        <div class="body">
            <?php if (!empty($data['text'])) : ?>
                <div class="text">
                    <?= wpautop(wp_kses_post($data['text'])) ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($data['statement'])) : ?>
                <div class="statement">
                    <?= wpautop(wp_kses_post($data['statement'])) ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>