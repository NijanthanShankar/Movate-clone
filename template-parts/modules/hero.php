<?php
// --- 1. Existing Hero Text Fields ---
$hero_meta = function_exists('get_sub_field') ? get_sub_field('hero_meta') : '';
$hero_heading_primary = function_exists('get_sub_field') ? get_sub_field('hero_heading_primary') : '';
$hero_highlight_one = function_exists('get_sub_field') ? get_sub_field('hero_highlight_one') : '';
$hero_highlight_two = function_exists('get_sub_field') ? get_sub_field('hero_highlight_two') : '';
$hero_body = function_exists('get_sub_field') ? get_sub_field('hero_body') : '';
$hero_primary_label = function_exists('get_sub_field') ? get_sub_field('hero_primary_label') : '';
$hero_secondary_label = function_exists('get_sub_field') ? get_sub_field('hero_secondary_label') : '';

// Defaults
$hero_meta = $hero_meta !== '' ? $hero_meta : 'AI orchestration for ambitious teams';
$hero_heading_primary = $hero_heading_primary !== '' ? $hero_heading_primary : 'One engine for';
$hero_highlight_one = $hero_highlight_one !== '' ? $hero_highlight_one : 'Gemini';
$hero_highlight_two = $hero_highlight_two !== '' ? $hero_highlight_two : 'OpenAI';
$hero_body = $hero_body !== '' ? $hero_body : 'Launch a production-ready AI assistant that routes every question to the right model, captures insight from every interaction, and stays fully on brand.';
$hero_primary_label = $hero_primary_label !== '' ? $hero_primary_label : 'Talk to the AI engine';
$hero_secondary_label = $hero_secondary_label !== '' ? $hero_secondary_label : 'Book a workflow demo';

// --- 2. New Radar Data Handling ---
// We attempt to get ACF fields. If they don't exist, we use the specific AI Routing context for the fallback.
$radar_center = function_exists('get_sub_field') ? get_sub_field('center_label') : '';
$radar_center = $radar_center ?: 'Movate Core';

$segments = function_exists('get_sub_field') ? get_sub_field('radar_segments') : false;

// Fallback Data if ACF is empty (Matches your hero context)
if (!$segments) {
    $segments = [
        [
            'title' => 'OpenAI',
            'description' => 'Reasoning & Logic Models',
            'link' => '#'
        ],
        [
            'title' => 'Gemini',
            'description' => 'Multimodal Capabilities',
            'link' => '#'
        ],
        [
            'title' => 'Router',
            'description' => 'Latency-aware Switching',
            'link' => '#'
        ],
        [
            'title' => 'Analytics',
            'description' => 'Insight Capture',
            'link' => '#'
        ]
    ];
}

// Calculate Geometry
$count = count($segments);
$rotation_step = $count > 0 ? 360 / $count : 0;
?>

<section class="hero" data-hero>
    
    <div data-hero-copy>
        <div class="hero-meta">
            <?php echo esc_html($hero_meta); ?>
        </div>
        <h1 class="hero-heading">
            <?php echo esc_html($hero_heading_primary); ?>
            <span class="accent"><?php echo esc_html($hero_highlight_one); ?></span>
            and
            <span class="accent"><?php echo esc_html($hero_highlight_two); ?></span>
            in your business.
        </h1>
        <p class="hero-body">
            <?php echo esc_html($hero_body); ?>
        </p>
        <div class="hero-cta">
            <button class="btn-primary" data-hero-cta-primary>
                <span class="btn-dot"></span>
                <span><?php echo esc_html($hero_primary_label); ?></span>
            </button>
            <button class="btn-ghost" data-hero-cta-secondary>
                <span><?php echo esc_html($hero_secondary_label); ?></span>
            </button>
        </div>
    </div>

    <div class="hero-orbit" data-hero-orbit>
        <div class="waive-radar-container">
            <div class="radar-wrapper">
                
                <div class="radar-grid">
                    <div class="ripple r-1"></div>
                    <div class="ripple r-2"></div>
                    <div class="ripple r-3"></div>
                </div>

                <div class="radar-segments">
                    <?php foreach( $segments as $index => $item ): 
                        $rotation = $index * $rotation_step;
                    ?>
                        <div class="radar-wedge" 
                             style="--rotate: <?php echo $rotation; ?>deg;"
                             data-title="<?php echo esc_attr($item['title']); ?>"
                             data-desc="<?php echo esc_attr($item['description']); ?>">
                            
                            <a href="<?php echo esc_url($item['link']); ?>" class="wedge-inner">
                                <span class="wedge-label" style="--counter-rotate: -<?php echo $rotation; ?>deg;">
                                    <?php echo esc_html($item['title']); ?>
                                </span>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="radar-core">
                    <div class="core-glow"></div>
                    <div class="core-content">
                        <span class="core-text"><?php echo esc_html($radar_center); ?></span>
                    </div>
                </div>

                <div id="waive-tooltip" class="radar-tooltip">
                    <h4 id="tooltip-title"></h4>
                    <p id="tooltip-desc"></p>
                </div>

            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const wedges = document.querySelectorAll('.radar-wedge');
    const tooltip = document.getElementById('waive-tooltip');
    const tTitle = document.getElementById('tooltip-title');
    const tDesc = document.getElementById('tooltip-desc');

    if(wedges.length > 0) {
        wedges.forEach(wedge => {
            const trigger = wedge.querySelector('.wedge-inner'); 
            trigger.addEventListener('mouseenter', () => {
                tTitle.textContent = wedge.getAttribute('data-title');
                tDesc.textContent = wedge.getAttribute('data-desc');
                tooltip.classList.add('active');
            });
            trigger.addEventListener('mouseleave', () => {
                tooltip.classList.remove('active');
            });
        });
    }
});
</script>