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

            //  -> Weltenauswahl
            ->add_fields('worldchoice', 'Weltenauswahl', [
                Field::make('complex', 'worldbox', 'Weltenbox')
                    ->set_layout('tabbed-horizontal')
                    ->add_fields([
                        Field::make('complex', 'icons', 'Icons')
                            ->set_layout('tabbed-horizontal')
                            ->add_fields([
                                Field::make('image', 'icon', 'Icon')
                            ]),
                        Field::make('text', 'worldtitle', 'Weltentitel')->set_required(),
                        Field::make('text', 'worldsubtitle', 'Weltenuntertitel')->set_required(),
                        Field::make('text', 'worldlead', 'Weltenlead')->set_required(),
                        Field::make('text', 'citation', 'Zitat')->set_required(),
                    ])
            ])

            // -> Uebersicht_ueber_mich
            ->add_fields('overview_about_me', 'Uebersicht_ueber_mich', [
                Field::make('image', 'introductionfoto', 'Vorstellungsfoto')
                    ->set_value_type('id'),
                Field::make('text', 'highlighttext', 'Highlighttext'),
                Field::make('text', 'handwriting', 'Handwriting'),
                Field::make('text', 'title', 'Titel')->set_required(),
                Field::make('textarea', 'lead', 'Lead')->set_rows(4),
                Field::make('complex', 'highlighticons', 'Highlighticons')
                    ->set_layout('tabbed-horizontal')
                    ->add_fields([
                        Field::make('text', 'highlighticon', 'Highlighticon')->set_required(),
                    ]),
                Field::make('text', 'link_text', 'Link-Text'),
                Field::make('text', 'link_url', 'Link-URL')
                    ->set_attribute('type', 'url'),
            ])

            // -> teaser_together
            ->add_fields('teaser_together', 'Teaser Together', [
                Field::make('image', 'icon', 'Icon')
                    ->set_value_type('id'),
                Field::make('text', 'surtitle', 'Übertitel'),
                Field::make('text', 'title', 'Titel')->set_required(),
                Field::make('textarea', 'text', 'Text'),
                Field::make('text', 'handwriting', 'Handschrift'),
                Field::make('text', 'button_primary_text', 'Button primär: Text'),
                Field::make('text', 'button_primary_url', 'Button primär: URL')
                    ->set_attribute('type', 'url'),
                Field::make('text', 'button_secondary_text', 'Button sekundär: Text'),
                Field::make('text', 'button_secondary_url', 'Button sekundär: URL')
                    ->set_attribute('type', 'url'),
                Field::make('complex', 'points', 'Punkte')
                    ->set_layout('tabbed-horizontal')
                    ->add_fields([
                        Field::make('text', 'point_title', 'Titel')->set_required(),
                        Field::make('textarea', 'point_text', 'Text')->set_rows(3),
                    ]),
            ])

            // -> Hero Unterseite
            ->add_fields('hero_subpage', 'Hero Unterseite', [
                Field::make('file', 'video', 'Videoloop')
                    ->set_type(['video'])
                    ->set_value_type('id')
                    ->set_help_text('Kurzer Loop im Hintergrund (mp4 oder webm).'),
                Field::make('text', 'surtitle', 'Übertitel'),
                Field::make('text', 'title', 'Titel')->set_required(),
                Field::make('image', 'icon', 'Icon (Schwung, Waveform, Personen)')
                    ->set_value_type('id'),
                Field::make('text', 'handwriting', 'Handschrift'),
                Field::make('textarea', 'vision', 'Vision')->set_rows(3),
            ])

            // -> Sektionskopf
            ->add_fields('section_header', 'Sektionskopf', [
                Field::make('text', 'handwriting', 'Handschrift')->set_required(),
                Field::make('text', 'title', 'Titel')->set_required(),
                Field::make('textarea', 'lead', 'Lead'),
            ])

            //-> Videogalerie
            ->add_fields('video_gallery', 'Videogalerie', [
                Field::make('text', 'label', 'Label (z. B. Long-form)'),
                Field::make('text', 'side_label', 'Zusatzlabel (z. B. Auf YouTube)'),
                Field::make('select', 'format', 'Format')
                    ->add_options([
                        'landscape' => 'Querformat',
                        'portrait'  => 'Hochformat',
                    ])
                    ->set_default_value('landscape'),
                Field::make('complex', 'items', 'Einträge')
                    ->set_layout('tabbed-vertical')
                    ->add_fields([
                        Field::make('image', 'thumbnail', 'Thumbnail')
                            ->set_value_type('id')
                            ->set_required(),
                        Field::make('select', 'world', 'Welt (optional)')
                            ->add_options([
                                ''         => 'Keine',
                                'move'     => 'Move',
                                'make'     => 'Make',
                                'together' => 'Together',
                            ]),
                        Field::make('text', 'title', 'Titel')->set_required(),
                        Field::make('textarea', 'description', 'Beschreibung')->set_rows(3),
                        Field::make('text', 'video_url', 'Video-URL')
                            ->set_attribute('type', 'url'),
                    ]),
                Field::make('complex', 'buttons', 'Buttons')
                    ->set_layout('tabbed-horizontal')
                    ->add_fields([
                        Field::make('text', 'button_text', 'Button-Text')->set_required(),
                        Field::make('text', 'button_url', 'Button-URL')
                            ->set_attribute('type', 'url')
                            ->set_required(),
                    ]),
            ])

            // -> Ursprung
            ->add_fields('origin', 'Ursprung', [
                Field::make('text', 'handwriting', 'Handschrift'),
                Field::make('rich_text', 'title', 'Titel'),
                Field::make('image', 'image', 'Bild')
                    ->set_value_type('id'),
                Field::make('rich_text', 'text', 'Text'),
                Field::make('rich_text', 'statement', 'Statement'),
            ])

            // -> Story-Stationen
            ->add_fields('story_steps', 'Story-Stationen', [
                Field::make('text', 'citation', 'Zitat (optional)'),
                Field::make('select', 'layout', 'Layout')
                    ->add_options([
                        'horizontal' => 'Horizontal (Stationen nebeneinander)',
                        'vertical'   => 'Vertikal (Stationen untereinander)',
                    ])
                    ->set_default_value('horizontal'),
                Field::make('complex', 'stations', 'Stationen')
                    ->set_layout('tabbed-vertical')
                    ->add_fields([
                        Field::make('image', 'icon', 'Icon')
                            ->set_value_type('id'),
                        Field::make('text', 'label', 'Label (z. B. Anfang)'),
                        Field::make('text', 'title', 'Titel')->set_required(),
                        Field::make('rich_text', 'text', 'Text'),
                        Field::make('text', 'note', 'Notiz (optional)'),
                        Field::make('text', 'strike_text', 'Durchgestrichener Satz (optional)'),
                        Field::make('complex', 'chips', 'Chips (optional)')
                            ->set_layout('tabbed-horizontal')
                            ->add_fields([
                                Field::make('text', 'chip', 'Chip')->set_required(),
                            ]),
                        Field::make('checkbox', 'highlighted', 'Hervorgehoben')
                            ->set_option_value('yes'),
                    ]),
            ])

            // -> Projekt Highlight
            ->add_fields('project_highlight', 'Projekt-Highlight', [
                Field::make('image', 'thumbnail', 'Thumbnail')
                    ->set_value_type('id')
                    ->set_required(),
                Field::make('text', 'thumbnail_url', 'Thumbnail-Link (optional)')
                    ->set_attribute('type', 'url')
                    ->set_help_text('Wenn ausgefüllt, ist das Vorschaubild anklickbar. Sonst bleibt es ein normales Bild.'),
                Field::make('select', 'thumbnail_position', 'Thumbnail-Position')
                    ->add_options([
                        'left'  => 'Links',
                        'right' => 'Rechts',
                    ])
                    ->set_default_value('right'),
                Field::make('text', 'badge', 'Badge (optional)'),
                Field::make('text', 'tag', 'Tag'),
                Field::make('text', 'title', 'Titel')->set_required(),
                Field::make('textarea', 'text', 'Text')->set_rows(4),
                Field::make('textarea', 'logline', 'Logline (optional)')->set_rows(4),
                Field::make('complex', 'buttons', 'Buttons')
                    ->set_layout('tabbed-horizontal')
                    ->add_fields([
                        Field::make('text', 'button_text', 'Button-Text')->set_required(),
                        Field::make('text', 'button_url', 'Button-URL')
                            ->set_attribute('type', 'url')
                            ->set_required(),
                    ]),
            ])

            // -> Hero Über mich
            ->add_fields('hero_about', 'Hero Über mich', [
                Field::make('image', 'portrait', 'Porträt')
                    ->set_value_type('id'),
                Field::make('text', 'portrait_note', 'Porträt-Notiz'),
                Field::make('text', 'handwriting', 'Handschrift'),
                Field::make('text', 'title', 'Titel')->set_required(),
                Field::make('textarea', 'text', 'Text')->set_rows(4),
                Field::make('complex', 'buttons', 'Buttons')
                    ->set_layout('tabbed-horizontal')
                    ->add_fields([
                        Field::make('text', 'button_text', 'Button-Text')->set_required(),
                        Field::make('text', 'button_url', 'Button-URL')
                            ->set_attribute('type', 'url')
                            ->set_required(),
                    ]),
            ])

            // -> Zeitstrahl
            ->add_fields('timeline', 'Zeitstrahl', [
                Field::make('complex', 'items', 'Einträge')
                    ->set_layout('tabbed-vertical')
                    ->add_fields([
                        Field::make('text', 'period', 'Zeitraum (z. B. Sommer 2021)')->set_required(),
                        Field::make('text', 'title', 'Titel')->set_required(),
                        Field::make('textarea', 'text', 'Text')->set_rows(4),
                        Field::make('complex', 'tags', 'Tags (optional)')
                            ->set_layout('tabbed-horizontal')
                            ->add_fields([
                                Field::make('text', 'tag', 'Tag')->set_required(),
                            ]),
                        Field::make('text', 'note', 'Notiz (optional)'),
                        Field::make('select', 'accent', 'Akzentfarbe')
                            ->add_options([
                                'neutral'  => 'Neutral (weiss)',
                                'move'     => 'Move (Rosé)',
                                'make'     => 'Make (Grün)',
                                'together' => 'Together (Honig)',
                            ])
                            ->set_default_value('neutral'),
                        Field::make('checkbox', 'current', 'Aktuell (hohler Punkt)')
                            ->set_option_value('yes'),
                    ]),
            ])

            // -> Treffpunkte
            ->add_fields('hubs', 'Treffpunkte', [
                Field::make('complex', 'cards', 'Karten')
                    ->set_layout('tabbed-vertical')
                    ->add_fields([
                        Field::make('text', 'platform', 'Plattform (z. B. 01 · Twitch)'),
                        Field::make('image', 'icon', 'Icon')
                            ->set_value_type('id'),
                        Field::make('text', 'title', 'Titel')->set_required(),
                        Field::make('textarea', 'description', 'Beschreibung')->set_rows(4),
                        Field::make('text', 'handwriting', 'Handschrift'),
                        Field::make('text', 'button_text', 'Button-Text'),
                        Field::make('text', 'button_url', 'Button-URL')
                            ->set_attribute('type', 'url'),
                        Field::make('select', 'variant', 'Farbvariante')
                            ->add_options([
                                'dark'  => 'Dunkel',
                                'light' => 'Hell',
                            ])
                            ->set_default_value('dark'),
                    ]),
            ])

            // -> Meetup Rückblick
            ->add_fields('recap_meetup', 'Meetup-Rückblick', [
                Field::make('text', 'tag', 'Tag (z. B. Rückblick · Meetup)'),
                Field::make('text', 'subtitle', 'Untertitel')->set_required(),
                Field::make('textarea', 'text', 'Text')->set_rows(4),
                Field::make('text', 'note', 'Handschrift Notiz'),
                Field::make('media_gallery', 'photos', 'Fotos')
                    ->set_type(['image']),
            ])

            // -> Vibe Check
            ->add_fields('vibe_check', 'Vibe-Check', [
                Field::make('text', 'quiz_tag', 'Quiz-Tag (z. B. Community-Quiz)'),
                Field::make('text', 'insider_label', 'Insider-Label (z. B. Aus dem Stream)'),
                Field::make('complex', 'questions', 'Fragen')
                    ->set_layout('tabbed-vertical')
                    ->add_fields([
                        Field::make('text', 'quote', 'Zitat')->set_required(),
                        Field::make('text', 'question', 'Frage')->set_required(),
                        Field::make('complex', 'answers', 'Antworten')
                            ->set_layout('tabbed-horizontal')
                            ->add_fields([
                                Field::make('text', 'answer', 'Antwort')->set_required(),
                                Field::make('checkbox', 'correct', 'Richtig')
                                    ->set_option_value('yes'),
                                Field::make('text', 'feedback', 'Rückmeldung'),
                            ]),
                    ]),
                Field::make('text', 'start_label', 'Button-Text Start (z. B. Quiz starten)'),
                Field::make('text', 'next_label', 'Button-Text Weiter (z. B. Nächste Frage)'),
                Field::make('textarea', 'end_text', 'Abschlusstext'),
            ])

            // -> Hero Rechtliches
            ->add_fields('hero_legal', 'Hero Rechtliches', [
                Field::make('text', 'handwriting', 'Handschrift'),
                Field::make('text', 'title', 'Titel')->set_required(),
                Field::make('textarea', 'intro', 'Einleitung')->set_rows(3),
            ])

            // -> Rechtstexte
            ->add_fields('legal_text', 'Rechtstext', [
                Field::make('complex', 'sidebar_boxes', 'Seitenleiste (optional)')
                    ->set_layout('tabbed-horizontal')
                    ->add_fields([
                        Field::make('text', 'handwriting', 'Handschrift (z. B. Kurz gesagt)')->set_required(),
                        Field::make('textarea', 'text', 'Text')->set_rows(4),
                    ]),
                Field::make('checkbox', 'show_toc', 'Inhaltsverzeichnis anzeigen')
                    ->set_option_value('yes'),
                Field::make('complex', 'sections', 'Abschnitte')
                    ->set_layout('tabbed-vertical')
                    ->add_fields([
                        Field::make('text', 'heading', 'Überschrift')->set_required(),
                        Field::make('rich_text', 'text', 'Text'),
                        Field::make('rich_text', 'box', 'Hervorgehobene Box (optional)'),
                    ]),
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
                $module['image'] = $media($module['image']);
                break;

            case 'hero_front':
                $module['video'] = $media($module['video']);
                break;

            case 'hero_subpage':
                $module['video'] = $media($module['video']);
                $module['icon']  = $media($module['icon']);
                break;

            case 'hero_about':
                $module['portrait'] = $media($module['portrait']);
                break;

            case 'overview_about_me':
                $module['introductionfoto'] = $media($module['introductionfoto']);
                break;

            case 'teaser_together':
                $module['icon'] = $media($module['icon']);
                break;

            case 'origin':
                $module['icon'] = $media($module['icon']);
                break;

            case 'project_highlight':
                $module['thumbnail'] = $media($module['thumbnail']);
                break;

            case 'video_gallery':
                $module['items'] = array_map(function ($item) use ($media) {
                    $item['thumbnail'] = $media($item['thumbnail']);
                    return $item;
                }, $module['items'] ?? []);
                break;

            case 'story_steps':
                $module['stations'] = array_map(function ($station) use ($media) {
                    $station['icon'] = $media($station['icon']);
                    return $station;
                }, $module['stations'] ?? []);
                break;

            case 'hubs':
                $module['cards'] = array_map(function ($card) use ($media) {
                    $card['icon'] = $media($card['icon']);
                    return $card;
                }, $module['cards'] ?? []);
                break;

            case 'recap_meetup':
                $module['photos'] = array_values(array_filter(
                    array_map($media, $module['photos'] ?? [])
                ));
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
