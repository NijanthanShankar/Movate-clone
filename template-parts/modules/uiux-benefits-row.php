<?php
$heading = function_exists('get_sub_field') ? get_sub_field('uiux_benefits_heading') : '';
$items = function_exists('get_sub_field') ? get_sub_field('uiux_benefits') : array();
?>
<section class="section uiux-benefits" data-section="benefits">
    <div class="section-inner">
        <div class="uiux-benefits-inner">
            <?php if ($heading !== '') { ?>
                <h2 class="section-title"><?php echo esc_html($heading); ?></h2>
            <?php } ?>
            <?php if (!empty($items)) { ?>
                <div class="uiux-benefits-grid">
                    <?php foreach ($items as $item) { ?>
                        <article class="uiux-benefit-card">
                            <?php if (!empty($item['icon']) && isset($item['icon']['url'])) { ?>
                                <div class="uiux-benefit-icon">
                                    <img src="<?php echo esc_url($item['icon']['url']); ?>" alt="<?php echo esc_attr($item['icon']['alt']); ?>">
                                </div>
                            <?php } ?>
                            <?php if (!empty($item['title'])) { ?>
                                <h3><?php echo esc_html($item['title']); ?></h3>
                            <?php } ?>
                            <?php if (!empty($item['subtitle'])) { ?>
                                <p><?php echo esc_html($item['subtitle']); ?></p>
                            <?php } ?>
                        </article>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>