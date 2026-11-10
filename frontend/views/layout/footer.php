<?php
$menu    = get_menu_by_slug('legals');
$socials = get_globals_socials();
?>

<?php if (!is_page(['impressum', 'datenschutz'])) : ?>
    <?php get_template_part('frontend/views/layout/cta'); ?>
<?php endif; ?>

<footer data-layout="footer">
    <div class="socials">
        <?php foreach ($socials as $item) : ?>
            <a target="_blank" href="<?= esc_url($item['link']) ?>" aria-label="Link zu <?= esc_attr($item['title']) ?>">
                <?= esc_html($item['title']) ?>
            </a>
        <?php endforeach; ?>
    </div>

    <nav class="nav-container">
        <ul class="nav">
            <?php foreach ($menu as $item) : ?>
                <li class="nav-item">
                    <a target="<?= esc_attr($item['target']) ?>" href="<?= esc_url($item['url']) ?>">
                        <?= esc_html($item['title']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>

    <p class="copyright">© <?= date('Y') ?> Saknitra</p>
</footer>