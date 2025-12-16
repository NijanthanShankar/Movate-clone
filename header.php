<?php
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="site" data-page-root>
    <header class="site-header">
        <div class="site-header-inner" data-nav>
            <div class="site-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">Movate AI Engine</a>
            </div>
            <nav class="site-nav">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'fallback_cb'    => false,
                    )
                );
                ?>
            </nav>
        </div>
    </header>
    <main class="site-main">

