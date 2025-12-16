<?php
$stats = function_exists('get_sub_field') ? get_sub_field('uiux_stats_items') : array();
if (empty($stats)) {
    return;
}
?>
<section class="section uiux-stats" data-section="stats">
    <div class="section-inner uiux-stats-inner">
        <div class="uiux-stats-grid">
            <?php foreach ($stats as $stat) { ?>
                <div class="uiux-stat">
                    <?php if (!empty($stat['value'])) { ?>
                        <div class="uiux-stat-value"><?php echo esc_html($stat['value']); ?></div>
                    <?php } ?>
                    <?php if (!empty($stat['label'])) { ?>
                        <div class="uiux-stat-label"><?php echo esc_html($stat['label']); ?></div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>