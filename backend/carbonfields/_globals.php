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
            ->set_layout('tabbed-vertical'),

        // -> Zusammenarbeit CTA
        Field::make('separator', 'cta_separator', 'Zusammenarbeit CTA'),
        Field::make('text', 'cta_handwriting', 'Handschrift'),
        Field::make('text', 'cta_title', 'Titel')->set_required(),
        Field::make('text', 'cta_lead', 'Lead'),
        Field::make('complex', 'cta_keywords', 'Stichwörter')
            ->set_layout('tabbed-horizontal')
            ->add_fields([
                Field::make('text', 'keyword', 'Stichwort')->set_required(),
            ]),
        Field::make('complex', 'cta_columns', 'Spalten')
            ->set_layout('tabbed-vertical')
            ->add_fields([
                Field::make('text', 'label', 'Label')->set_required(),
                Field::make('textarea', 'text', 'Text')->set_rows(3),
            ])
            ->set_header_template('<% if (label) { %> <%- label %> <% } %>'),
        Field::make('text', 'cta_button_text', 'Button-Text'),
        Field::make('text', 'cta_button_url', 'Button-URL')
            ->set_attribute('type', 'url'),
    ]);