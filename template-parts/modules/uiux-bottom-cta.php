<?php
$heading = function_exists('get_sub_field') ? get_sub_field('uiux_bottom_cta_heading') : '';
$body = function_exists('get_sub_field') ? get_sub_field('uiux_bottom_cta_body') : '';
$name_placeholder = function_exists('get_sub_field') ? get_sub_field('uiux_bottom_cta_name_placeholder') : '';
$email_placeholder = function_exists('get_sub_field') ? get_sub_field('uiux_bottom_cta_email_placeholder') : '';
$button_label = function_exists('get_sub_field') ? get_sub_field('uiux_bottom_cta_button_label') : '';
?>
<section class="section uiux-bottom-cta" data-section="cta">
    <div class="section-inner uiux-bottom-cta-inner">
        <div class="uiux-bottom-cta-copy">
            <?php if ($heading !== '') { ?>
                <h2 class="section-title"><?php echo esc_html($heading); ?></h2>
            <?php } ?>
            <?php if ($body !== '') { ?>
                <p class="section-copy"><?php echo esc_html($body); ?></p>
            <?php } ?>
        </div>
        <form class="uiux-bottom-cta-form" action="#" method="post">
            <input type="text" name="uiux_name" placeholder="<?php echo esc_attr($name_placeholder); ?>">
            <input type="email" name="uiux_email" placeholder="<?php echo esc_attr($email_placeholder); ?>">
            <button type="submit">
                <?php echo esc_html($button_label); ?>
            </button>
        </form>
    </div>
</section>