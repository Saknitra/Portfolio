<?php
$data = $args['data'];
?>

<header
        data-module="section_header"
        <?php if (!empty($data['anchor'])) : ?>id="<?= esc_attr(sanitize_title($data['anchor'])) ?>"<?php endif; ?>
>
    <?php if (!empty($data['handwriting'])) : ?>
        <p class="handwriting"><?= esc_html($data['handwriting']) ?></p>
    <?php endif; ?>

    <h2 class="title"><?= esc_html($data['title']) ?></h2>

    <?php if (!empty($data['lead'])) : ?>
        <p class="lead"><?= esc_html($data['lead']) ?></p>
    <?php endif; ?>
</header>