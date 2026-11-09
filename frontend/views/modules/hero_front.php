<?php
$data = $args['data'];
js_log($data);
?>

<section data-module="hero_front">
    <p class="surtitle"><?= $data['surtitle'] ?></p>
    <h1 class="title"><?= $data['title'] ?></h1>
    <div class="worlds">
        <?php foreach ($data['worlds'] as $item) : ?>
            <span><?= $item['world'] ?></span>
        <?php endforeach; ?></div>
    <p class="handwriting"><?= $data['handwriting'] ?></p>
    <?php $video_id = $data['video'] ?? null;
        if (!empty($video_id)) :
            $video_src  = wp_get_attachment_url($video_id);
            $video_mime = get_post_mime_type($video_id);
            ?>
            <?php if ($video_src) : ?>
                <video class="hero_video" autoplay muted loop playsinline>
                    <source src="<?= esc_url($video_src) ?>" type="<?= esc_attr($video_mime) ?>">
                </video>
            <?php endif; ?>
    <?php endif; ?>
</section>