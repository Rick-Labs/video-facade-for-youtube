<?php
/**
 * Plugin Name: YouTube Video Facade
 * Description: Show a facade/thumbnail for a YouTube Video and load YouTube video only on click.
 * Plugin URI:  https://github.com/Rick-Labs/youtube-video-facade-shortcode
 * Version:     0.1.0
 * Author:      Lloyd Rick Guyon
 * Author URI:  https://profiles.wordpress.org/lloydrick/
 * License:     GPL v2 or later
 * Text Domain: yvf
 */

// Register the shortcode
function yvf_shortcode($atts) {
    $atts = shortcode_atts(
        array(
            'id' => '',
            'thumbnail' => '',
            'alt' => 'Video Thumbnail',
        ),
        $atts,
        'yvf'
    );

    ob_start();
    ?>
    <div class="youtube-video-facade" data-id="<?php echo esc_attr($atts['id']); ?>">
        <img class="youtube-video-thumbnail" src="<?php echo esc_url($atts['thumbnail']); ?>" alt="<?php echo esc_attr($atts['alt']); ?>" />
        <div class="play-button">
            <svg viewBox="0 0 68 48" width="68" height="48" xmlns="http://www.w3.org/2000/svg">
                <path d="M66.52 7.02a8.27 8.27 0 00-5.82-5.84C56.3 0 34 0 34 0S11.7 0 7.3 1.18a8.27 8.27 0 00-5.82 5.84A85.13 85.13 0 000 24a85.13 85.13 0 001.48 16.98 8.27 8.27 0 005.82 5.84C11.7 48 34 48 34 48s22.3 0 26.7-1.18a8.27 8.27 0 005.82-5.84A85.13 85.13 0 0068 24a85.13 85.13 0 00-1.48-16.98z" fill="#f00"/>
                <path d="M45 24L27 14v20z" fill="#fff"/>
            </svg>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('yvf', 'yvf_shortcode');

// Enqueue CSS and JS
function enqueue_yvf_assets_for_specific_pages() {
    $target_page_ids = array(21); // Add your target page IDs here

    if (is_page($target_page_ids)) {
        // Inline CSS
        $css = '
        .youtube-video-facade {
            position: relative;
            width: 100%;
            aspect-ratio: 16 / 9;
            cursor: pointer;
            overflow: hidden;
        }

        .youtube-video-thumbnail {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            top: 0;
            left: 0;
        }

        .play-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            pointer-events: none;
        }

        .play-button svg {
            display: block;
        }';

        wp_register_style('youtube-video-facade-style', false);
        wp_enqueue_style('youtube-video-facade-style');
        wp_add_inline_style('youtube-video-facade-style', $css);

        // Inline JS
        $js = '
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".youtube-video-facade").forEach(el => {
                el.addEventListener("click", function () {
                    const videoId = el.dataset.id;
                    const iframe = document.createElement("iframe");
                    iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0`;
                    iframe.setAttribute("frameborder", "0");
                    iframe.setAttribute("allow", "accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture");
                    iframe.allowFullscreen = true;
                    iframe.style.width = "100%";
                    iframe.style.height = "100%";
                    el.innerHTML = "";
                    el.appendChild(iframe);
                });
            });
        });';

        wp_register_script('youtube-video-facade', false, [], false, true);
        wp_enqueue_script('youtube-video-facade');
        wp_add_inline_script('youtube-video-facade', $js);
    }
}
add_action('wp_enqueue_scripts', 'enqueue_yvf_assets_for_specific_pages');