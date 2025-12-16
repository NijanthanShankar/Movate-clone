<?php
$chat_heading = function_exists('get_sub_field') ? get_sub_field('chat_heading') : '';
$chat_body = function_exists('get_sub_field') ? get_sub_field('chat_body') : '';
$chat_heading = $chat_heading !== '' ? $chat_heading : 'Have tech questions?';
$chat_body = $chat_body !== '' ? $chat_body : 'Our AI answer engine can help. Ask a question or initiate a search and we will route it to Gemini, OpenAI or both.';
$chat_features = array(
    array(
        'label' => 'Channel ready',
        'body' => 'Drop into web, product, mobile or internal tools.',
    ),
    array(
        'label' => 'Safe by design',
        'body' => 'Safety, rate limits and observability from day one.',
    ),
    array(
        'label' => 'Enterprise first',
        'body' => 'SSO, roles, audit logs and regional hosting options.',
    ),
    array(
        'label' => 'Extensible',
        'body' => 'Bring your own models and custom tools over time.',
    ),
);
if (function_exists('get_sub_field')) {
    $feature_rows = get_sub_field('chat_features');
    if (is_array($feature_rows) && count($feature_rows) > 0) {
        $chat_features = array();
        foreach ($feature_rows as $feature_row) {
            $chat_features[] = array(
                'label' => isset($feature_row['label']) && $feature_row['label'] !== '' ? $feature_row['label'] : '',
                'body' => isset($feature_row['body']) && $feature_row['body'] !== '' ? $feature_row['body'] : '',
            );
        }
    }
}
$chat_features = array_slice($chat_features, 0, 3);
?>
<section class="chat-section" data-section="chat">
    <div class="chat-shell">
        <button type="button" class="chat-shell-close" data-chat-close aria-label="<?php echo esc_attr__('Minimize chat', 'clonemovate-ai'); ?>">
            <span>&times;</span>
        </button>
        <div class="chat-shell-meta">
            <h2><?php echo esc_html($chat_heading); ?></h2>
            <p><?php echo esc_html($chat_body); ?></p>
            <form class="chat-launch-form" data-ai-launch-form>
                <div class="chat-launch-input-shell">
                    <div class="chat-launch-avatar">
                        <div class="chat-launch-avatar-inner"></div>
                    </div>
                    <input
                        class="chat-launch-input"
                        data-ai-launch-input
                        type="text"
                        autocomplete="off"
                        placeholder="<?php echo esc_attr__('Please ask a question or initiate a search', 'clonemovate-ai'); ?>"
                    />
                    <button class="chat-launch-submit" type="submit">
                        <span>🔍</span>
                    </button>
                </div>
            </form>
            <?php if (!empty($chat_features)) { ?>
                <div class="chat-launch-suggestions">
                    <div class="chat-launch-suggestions-label">
                        <?php echo esc_html__('Suggestions', 'clonemovate-ai'); ?>
                    </div>
                    <div class="chat-launch-suggestions-grid">
                        <?php foreach ($chat_features as $feature) { ?>
                            <button
                                type="button"
                                class="chat-suggestion-card"
                                data-ai-suggestion="<?php echo esc_attr($feature['label']); ?>"
                            >
                                <span class="chat-suggestion-text"><?php echo esc_html($feature['label']); ?></span>
                                <span class="chat-suggestion-icon">↗</span>
                            </button>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php echo do_shortcode('[ai_engine_chatbot]'); ?>
    </div>
</section>
