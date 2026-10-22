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
