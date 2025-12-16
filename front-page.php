<?php
get_header();
if (function_exists('have_rows') && have_rows('page_modules')) {
    while (have_rows('page_modules')) {
        the_row();
        $layout = get_row_layout();
        if ($layout === 'hero') {
            get_template_part('template-parts/modules/hero');
        } elseif ($layout === 'platform') {
            get_template_part('template-parts/modules/platform');
        } elseif ($layout === 'chat') {
            get_template_part('template-parts/modules/chat');
        } elseif ($layout === 'uiux_hero') {
            get_template_part('template-parts/modules/uiux-hero');
        } elseif ($layout === 'uiux_benefits_row') {
            get_template_part('template-parts/modules/uiux-benefits-row');
        } elseif ($layout === 'uiux_feature_grid') {
            get_template_part('template-parts/modules/uiux-feature-grid');
        } elseif ($layout === 'uiux_highlight_split') {
            get_template_part('template-parts/modules/uiux-highlight-split');
        } elseif ($layout === 'uiux_testimonial_bar') {
            get_template_part('template-parts/modules/uiux-testimonial-bar');
        } elseif ($layout === 'uiux_stats_row') {
            get_template_part('template-parts/modules/uiux-stats-row');
        } elseif ($layout === 'uiux_bottom_cta') {
            get_template_part('template-parts/modules/uiux-bottom-cta');
        }
    }
} else {
    get_template_part('template-parts/modules/hero');
    get_template_part('template-parts/modules/platform');
    get_template_part('template-parts/modules/chat');
}
get_footer();