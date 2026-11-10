<?php
$data = $args['data'];
?>

<?php foreach ($data['worldbox'] as $world) : ?>
    <div class="world">
        <?php foreach ($world['icons'] as $icon) : ?>
            <?php if (!empty($icon['icon']['src'])) : ?>
                <img src="<?= esc_url($icon['icon']['src']) ?>" alt="<?= esc_attr($icon['icon']['alt']) ?>">
            <?php endif; ?>
        <?php endforeach; ?>

        <h3><?= esc_html($world['worldtitle']) ?></h3>
        <p><?= esc_html($world['worldsubtitle']) ?></p>
        <p><?= esc_html($world['worldlead']) ?></p>
        <p><?= esc_html($world['citation']) ?></p>
    </div>
<?php endforeach; ?>
