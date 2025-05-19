<?php
/**
 * Plugin Name: Video Facade for YouTube
 * Description: Optimizes YouTube embeds by showing a facade/thumbnail. Loads YouTube embed only on click.
 * Plugin URI:  https://github.com/Rick-Labs/video-facade-for-youtube
 * Version:     0.2.1
 * Author:      Lloyd Rick Guyon
 * Author URI:  https://profiles.wordpress.org/lloydrick/
 * License:     GPL v2 or later
 * Text Domain: video-facade-for-youtube
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function create_block_youtube_video_facade_block_init() {
	register_block_type( __DIR__ . '/build/youtube-video-facade' );
}
add_action( 'init', 'create_block_youtube_video_facade_block_init' );
