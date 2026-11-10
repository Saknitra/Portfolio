<?php

// todo: Hier die Getter für die Globalen Informationen definieren

function get_globals_logo() {
    $logo_id = carbon_get_theme_option('logo');
    $logo = get_media_by_id($logo_id);
    return $logo;
    js_log($logo);
}

function get_globals_socials() {
    $socials = carbon_get_theme_option('socials');
    //Wenn du ein Icon für socials anzeigen möchtest
    //return array_map (function ($item) {
    //    $item['icon'] = get_media_by_id($item['icon']);
    return $socials; //return $item; wenn du ein Icon hast für Socials.
    //js_log($socials);
}

function get_globals_cta (): array {
    return [
        'handwriting' => carbon_get_theme_option('cta_handwriting'),
        'title'       => carbon_get_theme_option('cta_title'),
        'lead'        => carbon_get_theme_option('cta_lead'),
        'keywords'    => carbon_get_theme_option('cta_keywords') ?: [],
        'columns'     => carbon_get_theme_option('cta_columns') ?: [],
        'button_text' => carbon_get_theme_option('cta_button_text'),
        'button_url'  => carbon_get_theme_option('cta_button_url'),
    ];
}