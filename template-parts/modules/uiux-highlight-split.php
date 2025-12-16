<?php
$items = function_exists('get_sub_field') ? get_sub_field('uiux_highlight_items') : array();
if (!is_array($items) || count($items) === 0) {
    return;
}
?>
<section class="section uiux-highlight-split" data-section="highlights">
    <div class="section-inner uiux-highlight-inner">
        <?php foreach ($items as $item) { ?>
            <article class="uiux-highlight-card">
                <?php if (!empty($item['badge'])) { ?>
                    <div class="uiux-highlight-badge">
                        <?php echo esc_html($item['badge']); ?>
                    </div>
                <?php } ?>
                <?php if (!empty($item['image']) && isset($item['image']['url'])) { ?>
                    <div class="uiux-highlight-media">
                        <img src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_attr($item['image']['alt']); ?>">
                    </div>
                <?php } ?>
                <div class="uiux-highlight-copy">
                    <?php if (!empty($item['title'])) { ?>
                        <h3><?php echo esc_html($item['title']); ?></h3>
                    <?php } ?>
                    <?php if (!empty($item['body'])) { ?>
                        <p><?php echo esc_html($item['body']); ?></p>
                    <?php } ?>
                </div>
            </article>
        <?php } ?>
    </div>
</section>