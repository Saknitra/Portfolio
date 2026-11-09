<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

// → Konfiguration der verschiedenen Module
Container::make('post_meta', 'Module')
    ->where('post_type', '=', 'page')
    ->add_fields([
        Field::make('complex', 'modules', 'Module')
            // -> example
            ->add_fields('example', 'Beispiel', [
                Field::make('text', 'title', 'Titel')->set_required(),
                Field::make('image', 'image', 'Bild')->set_required(),
            ])
            // -> hero_front
            ->add_fields('hero_front', 'Hero Startseite', [
                Field::make('file', 'video', 'Teaservideo')
                    ->set_type(['video'])
                    ->set_value_type('id')
                    ->set_help_text('Kurzer Loop im Hintergrund (mp4 oder webm).'),
                Field::make('text', 'surtitle', 'Übertitel')->set_required(),
                Field::make('text', 'title', 'Titel')->set_required(),
                Field::make('complex', 'worlds', 'Welten')
                    ->set_layout('tabbed-horizontal')
                    ->add_fields([
                        Field::make('text', 'world', 'Welt')->set_required(),
                    ]),
                Field::make('text', 'handwriting', 'Handschrift')->set_required(),
            ])
            // todo: add new modules here
            // -> SETTINGS
            ->set_layout('tabbed-vertical')
    ]);

// → Funktion, um die Module und die entsprechenden Templates auf der Seite zu laden
function render_modules (): void {
    $modules = carbon_get_the_post_meta('modules');
    if (empty($modules)) {
        return;
    }
    foreach ($modules as $module) {
        // → Modifiziere die Daten des Moduls, falls nötig, basierend auf dem Modultyp
        switch ($module['_type']) {
            case 'example':
                $module['image'] = get_media_by_id($module['image'], 'full');
                break;
            case 'hero_front':
                $module['video'] = get_media_by_id($module['video'], 'full');
                break;
                // todo: add data modifications for modules here as a new case
        }
        // → Laden des Templates basierend auf dem Modultyp und weitergeben der Daten
        get_template_part(
            'frontend/views/modules/' . $module['_type'],
            null,
            [
                'data' => $module
            ]
        );
    }
}
