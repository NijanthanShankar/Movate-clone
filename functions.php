<?php

add_action(
    'after_setup_theme',
    function () {
        add_theme_support('title-tag');
        register_nav_menus(
            array(
                'primary' => 'Primary Navigation',
            )
        );
    }
);

add_action(
    'wp_enqueue_scripts',
    function () {
        $theme_version = wp_get_theme()->get('Version');
        wp_enqueue_style(
            'movate-ai-style',
            get_stylesheet_uri(),
            array(),
            $theme_version
        );
        wp_enqueue_style(
            'movate-ai-fonts',
            'https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap',
            array(),
            null
        );
        wp_enqueue_script(
            'gsap-core',
            'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js',
            array(),
            '3.12.5',
            true
        );
        wp_enqueue_script(
            'gsap-scrolltrigger',
            'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js',
            array('gsap-core'),
            '3.12.5',
            true
        );
        wp_enqueue_script(
            'movate-ai-main',
            get_theme_file_uri('assets/js/main.js'),
            array('gsap-core', 'gsap-scrolltrigger'),
            $theme_version,
            true
        );
        wp_localize_script(
            'movate-ai-main',
            'MovateAI',
            array(
                'restUrl' => esc_url_raw(get_rest_url(null, '/ai-engine/v1/chat')),
                'nonce'   => wp_create_nonce('wp_rest'),
            )
        );
    }
);

