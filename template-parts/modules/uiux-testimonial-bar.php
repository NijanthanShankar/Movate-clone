<?php
$quote = function_exists('get_sub_field') ? get_sub_field('uiux_testimonial_quote') : '';
$author = function_exists('get_sub_field') ? get_sub_field('uiux_testimonial_author_name') : '';
$role = function_exists('get_sub_field') ? get_sub_field('uiux_testimonial_author_role') : '';
if ($quote === '' && $author === '') {
    return;
}
?>
<section class="section uiux-testimonial" data-section="testimonial">
    <div class="section-inner uiux-testimonial-inner">
        <blockquote class="uiux-testimonial-quote">
            <span class="uiux-testimonial-marks">“</span>
            <p><?php echo esc_html($quote); ?></p>
            <span class="uiux-testimonial-marks">”</span>
        </blockquote>
        <div class="uiux-testimonial-author">
            <?php if ($author !== '') { ?>
                <span class="uiux-testimonial-name"><?php echo esc_html($author); ?></span>
            <?php } ?>
            <?php if ($role !== '') { ?>
                <span class="uiux-testimonial-role"><?php echo esc_html($role); ?></span>
            <?php } ?>
        </div>
    </div>
</section>