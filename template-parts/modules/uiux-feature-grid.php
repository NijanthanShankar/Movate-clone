<?php
$heading = function_exists('get_sub_field') ? get_sub_field('uiux_feature_grid_heading') : '';
$cards = function_exists('get_sub_field') ? get_sub_field('uiux_feature_cards') : array();
?>
<section class="section uiux-feature-grid" data-section="features">
    <div class="section-inner">
        <div class="uiux-feature-grid-head">
            <?php if ($heading !== '') { ?>
                <h2 class="section-title"><?php echo esc_html($heading); ?></h2>
            <?php } ?>
        </div>
        <?php if (!empty($cards)) { ?>
            <div class="uiux-feature-cards">
                <?php foreach ($cards as $card) { ?>
                    <article class="uiux-feature-card">
                        <?php if (!empty($card['title'])) { ?>
                            <h3><?php echo esc_html($card['title']); ?></h3>
                        <?php } ?>
                        <?php if (!empty($card['body'])) { ?>
                            <p><?php echo esc_html($card['body']); ?></p>
                        <?php } ?>
                        <?php if (!empty($card['cta_label'])) { ?>
                            <a class="uiux-feature-card-cta" href="<?php echo !empty($card['cta_link']) ? esc_url($card['cta_link']) : '#'; ?>">
                                <?php echo esc_html($card['cta_label']); ?>
                            </a>
                        <?php } ?>
                    </article>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</section>