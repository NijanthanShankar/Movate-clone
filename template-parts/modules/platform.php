<?php
$platform_kicker = function_exists('get_sub_field') ? get_sub_field('platform_kicker') : '';
$platform_heading = function_exists('get_sub_field') ? get_sub_field('platform_heading') : '';
$platform_body = function_exists('get_sub_field') ? get_sub_field('platform_body') : '';
$platform_kicker = $platform_kicker !== '' ? $platform_kicker : 'Platform';
$platform_heading = $platform_heading !== '' ? $platform_heading : 'A single structured engine for every AI touchpoint.';
$platform_body = $platform_body !== '' ? $platform_body : 'Power chat, onboarding, support and internal copilots with one orchestration layer. Our engine understands intent, picks the optimal model, and streams answers back to every surface.';
$pill_labels = array(
    'Chatbots and copilots',
    'Model routing',
    'Enterprise analytics',
    'Human override',
);
if (function_exists('get_sub_field')) {
    $pill_rows = get_sub_field('platform_pills');
    if (is_array($pill_rows) && count($pill_rows) > 0) {
        $pill_labels = array();
        foreach ($pill_rows as $pill_row) {
            if (isset($pill_row['label']) && $pill_row['label'] !== '') {
                $pill_labels[] = $pill_row['label'];
            }
        }
        if (count($pill_labels) === 0) {
            $pill_labels = array(
                'Chatbots and copilots',
                'Model routing',
                'Enterprise analytics',
                'Human override',
            );
        }
    }
}
$cards = array(
    array(
        'title' => 'Precision routing',
        'copy' => 'Route each query to Gemini or OpenAI based on intent, sensitivity, latency and cost. Keep a full trace of every decision in your analytics layer.',
        'tag' => 'Routing',
    ),
    array(
        'title' => 'Brand-safe responses',
        'copy' => 'Ground generations in your knowledge base, style guide and compliance rules so every answer feels on brand.',
        'tag' => 'Grounding',
    ),
    array(
        'title' => 'Memory and context',
        'copy' => 'Persist the right level of context across sessions, channels and teams with configurable policies.',
        'tag' => 'Memory',
    ),
    array(
        'title' => 'Observability built in',
        'copy' => 'Inspect every turn, model and latency metric in real time so you can fine tune experience and spend.',
        'tag' => 'Analytics',
    ),
);
if (function_exists('get_sub_field')) {
    $card_rows = get_sub_field('platform_cards');
    if (is_array($card_rows) && count($card_rows) > 0) {
        $cards = array();
        foreach ($card_rows as $card_row) {
            $cards[] = array(
                'title' => isset($card_row['title']) && $card_row['title'] !== '' ? $card_row['title'] : '',
                'copy' => isset($card_row['copy']) && $card_row['copy'] !== '' ? $card_row['copy'] : '',
                'tag' => isset($card_row['tag']) && $card_row['tag'] !== '' ? $card_row['tag'] : '',
            );
        }
    }
}
?>
<section class="section" data-section="platform">
    <div class="section-inner">
        <div data-section-copy>
            <div class="section-kicker"><?php echo esc_html($platform_kicker); ?></div>
            <h2 class="section-title">
                <?php echo esc_html($platform_heading); ?>
            </h2>
            <p class="section-copy">
                <?php echo esc_html($platform_body); ?>
            </p>
            <div class="pill-row">
                <?php foreach ($pill_labels as $pill_label) { ?>
                    <div class="pill"><?php echo esc_html($pill_label); ?></div>
                <?php } ?>
            </div>
        </div>
        <div class="grid-cards" data-section-grid>
            <?php foreach ($cards as $card) { ?>
                <article class="grid-card">
                    <div class="grid-card-title"><?php echo esc_html($card['title']); ?></div>
                    <div class="grid-card-copy">
                        <?php echo esc_html($card['copy']); ?>
                    </div>
                    <div class="grid-card-tag"><?php echo esc_html($card['tag']); ?></div>
                </article>
            <?php } ?>
        </div>
    </div>
</section>

