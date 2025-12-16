<?php
$kicker = function_exists('get_sub_field') ? get_sub_field('uiux_hero_kicker') : '';
$title1 = function_exists('get_sub_field') ? get_sub_field('uiux_hero_title_line_1') : '';
$title2 = function_exists('get_sub_field') ? get_sub_field('uiux_hero_title_line_2') : '';
$primary_label = function_exists('get_sub_field') ? get_sub_field('uiux_hero_primary_label') : '';
$primary_link = function_exists('get_sub_field') ? get_sub_field('uiux_hero_primary_link') : '';
$secondary_label = function_exists('get_sub_field') ? get_sub_field('uiux_hero_secondary_label') : '';
$secondary_link = function_exists('get_sub_field') ? get_sub_field('uiux_hero_secondary_link') : '';
$media = function_exists('get_sub_field') ? get_sub_field('uiux_hero_media') : null;
$scroll_label = function_exists('get_sub_field') ? get_sub_field('uiux_hero_scroll_label') : '';
?>
<section class="hero uiux-hero" data-hero>
    <div data-hero-copy>
        <?php if ($kicker !== '') { ?>
            <div class="hero-meta"><?php echo esc_html($kicker); ?></div>
        <?php } ?>
        <h1 class="hero-heading">
            <?php echo esc_html($title1); ?>
            <br>
            <?php echo esc_html($title2); ?>
        </h1>
        <div class="hero-cta">
            <?php if ($primary_label !== '') { ?>
                <a class="btn-primary" href="<?php echo $primary_link ? esc_url($primary_link) : '#'; ?>">
                    <span class="btn-dot"></span>
                    <span><?php echo esc_html($primary_label); ?></span>
                </a>
            <?php } ?>
            <?php if ($secondary_label !== '') { ?>
                <a class="btn-ghost" href="<?php echo $secondary_link ? esc_url($secondary_link) : '#'; ?>">
                    <span><?php echo esc_html($secondary_label); ?></span>
                </a>
            <?php } ?>
        </div>
        <?php if ($scroll_label !== '') { ?>
            <div class="uiux-hero-scroll">
                <span><?php echo esc_html($scroll_label); ?></span>
            </div>
        <?php } ?>
    </div>
    <div class="hero-orbit uiux-hero-media">
        <?php if ($media && isset($media['url'])) { ?>
            <img src="<?php echo esc_url($media['url']); ?>" alt="<?php echo esc_attr($media['alt']); ?>">
        <?php } ?>
    </div>
</section>