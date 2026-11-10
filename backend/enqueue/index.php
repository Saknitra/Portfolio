<?php
/**
 * Hier werden die Scripts (und später die Styles) für das Frontend eingebunden.
 */

add_action('wp_enqueue_scripts', function () {
    // → Allgemeines Script, wird auf jeder Seite geladen
    wp_enqueue_script(
        'main',
        get_theme_file_uri('frontend/scripts/main.js'),
        [],
        filemtime(get_theme_file_path('frontend/scripts/main.js')),
        true
    );

    // → Script nur für das Quiz, wird nur geladen, wenn die Seite das Modul hat
    if (is_page()) {
        $modules = carbon_get_post_meta(get_the_ID(), 'modules');
        $types   = array_column($modules ?: [], '_type');

        if (in_array('vibe_check', $types, true)) {
            wp_enqueue_script(
                'vibe-check',
                get_theme_file_uri('frontend/scripts/vibe_check.js'),
                [],
                filemtime(get_theme_file_path('frontend/scripts/vibe_check.js')),
                true
            );
        }
    }
});