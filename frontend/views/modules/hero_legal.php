<?php
$data = $args['data'];
?>

<section data-module="hero_legal">
    <div class="content">
        <?php if (!empty($data['handwriting'])) : ?>
            <p class="handwriting"><?= esc_html($data['handwriting']) ?></p>
        <?php endif; ?>

        <h1 class="title"><?= esc_html($data['title']) ?></h1>

        <div class="colorbar" aria-hidden="true">
            <span class="colorbar__move"></span>
            <span class="colorbar__make"></span>
            <span class="colorbar__together"></span>
        </div>

        <?php if (!empty($data['intro'])) : ?>
            <p class="intro"><?= nl2br(esc_html($data['intro'])) ?></p>
        <?php endif; ?>
    </div>
</section>