<?php
$data = $args['data'];

$sections    = $data['sections'] ?? [];
$sidebar     = $data['sidebar_boxes'] ?? [];
$show_toc    = !empty($data['show_toc']);
$has_sidebar = !empty($sidebar) || ($show_toc && !empty($sections));
?>

<section data-module="legal_text">
    <div class="layout <?= $has_sidebar ? 'layout--sidebar' : '' ?>">

        <?php if ($has_sidebar) : ?>
            <aside class="aside">
                <?php foreach ($sidebar as $box) : ?>
                    <div class="box">
                        <p class="handwriting"><?= esc_html($box['handwriting']) ?></p>
                        <?php if (!empty($box['text'])) : ?>
                            <p class="text"><?= nl2br(esc_html($box['text'])) ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>

                <?php if ($show_toc && !empty($sections)) : ?>
                    <nav class="box toc" aria-label="Inhalt">
                        <p class="handwriting">~ Inhalt</p>
                        <ol class="toc__list">
                            <?php foreach ($sections as $i => $section) : ?>
                                <li>
                                    <a href="#<?= esc_attr(sanitize_title($section['heading'])) ?>">
                                        <span class="toc__number"><?= sprintf('%02d', $i + 1) ?></span>
                                        <?= esc_html($section['heading']) ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ol>
                    </nav>
                <?php endif; ?>
            </aside>
        <?php endif; ?>

        <div class="sections">
            <?php foreach ($sections as $i => $section) : ?>
                <div class="section" id="<?= esc_attr(sanitize_title($section['heading'])) ?>">
                    <span class="section__number"><?= sprintf('%02d', $i + 1) ?></span>
                    <h2 class="title"><?= esc_html($section['heading']) ?></h2>

                    <?php if (!empty($section['text'])) : ?>
                        <div class="text">
                            <?= wpautop(wp_kses_post($section['text'])) ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($section['box'])) : ?>
                        <div class="highlightbox">
                            <?= wpautop(wp_kses_post($section['box'])) ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>