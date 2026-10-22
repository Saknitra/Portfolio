<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

// -> Inhaltsfeld-Konfiguration der globalen Einstellungen des Themes
Container::make('theme_options', 'Globales')
    ->add_fields([
        // todo: Globale Inhaltsfelder hier ergänzen
        Field::make('image', 'logo', 'Logo'),
        Field::make('complex', 'socials', 'Socials')
            ->add_fields([
                Field::make('text', 'title', 'Titel'),
                Field::make('text', 'link', 'Link'),
                //Falls später ein Icon für Socials dazukommt:
                //Field::make('image', 'icon', 'Icon')
            ])
            ->set_header_template('<% if (title) { %> <%- title %> <% } %>')
            ->set_layout('tabbed-vertical')
    ]);
