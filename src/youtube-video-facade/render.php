<?php
/**
 * Render HTML directly for the Video Facade for YouTube block.
 * This version gets the values from block attributes.
 */

// Assuming the attributes are passed as part of the block's metadata. For example, these would be from a post's block attributes.
$video_url = isset($attributes['videoUrl']) ? esc_url($attributes['videoUrl']) : '';
$thumbnail_url = isset($attributes['thumbnailUrl']) ? esc_url($attributes['thumbnailUrl']) : '';

// HTML Output
?>
<div class="video-facade-for-youtube">
    <!-- Check if both video URL and thumbnail URL exist -->
    <?php if ($video_url && $thumbnail_url): ?>
        <div class="youtube-thumbnail-preview" data-video-url="<?php echo esc_url($video_url); ?>">
            <img src="<?php echo esc_url($thumbnail_url); ?>" alt="YouTube Thumbnail" class="youtube-thumbnail" />
            <!-- Play button overlay -->
            <div class="play-button-overlay">
                <svg viewBox="0 0 68 48" width="68" height="48" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M66.52 7.02a8.27 8.27 0 0 0-5.82-5.84C56.3 0 34 0 34 0S11.7 0 7.3 1.18a8.27 8.27 0 0 0-5.82 5.84A85.13 85.13 0 0 0 0 24a85.13 85.13 0 0 0 1.48 16.98 8.27 8.27 0 0 0 5.82 5.84C11.7 48 34 48 34 48s22.3 0 26.7-1.18a8.27 8.27 0 0 0 5.82-5.84A85.13 85.13 0 0 0 68 24a85.13 85.13 0 0 0-1.48-16.98z"
                        fill="#f00" />
                    <path d="M45 24L27 14v20z" fill="#fff" />
                </svg>
            </div> <!-- Close play button overlay -->
        </div> <!-- Close youtube-thumbnail-preview -->
    <?php else: ?>
        <!-- Placeholder if no video or thumbnail -->
        <p>No YouTube video selected</p>
    <?php endif; ?>
</div> <!-- Close video-facade-for-youtube -->