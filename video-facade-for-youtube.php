<?php
/**
 * Plugin Name: Video Facade for YouTube
 * Description: Optimizes YouTube embeds by showing a facade/thumbnail. Loads YouTube embed only on click.
 * Plugin URI:  https://github.com/Rick-Labs/video-facade-for-youtube
 * Version:     0.2.0
 * Author:      Lloyd Rick Guyon
 * Author URI:  https://profiles.wordpress.org/lloydrick/
 * License:     GPL v2 or later
 * Text Domain: video-facade-for-youtube
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function create_block_youtube_video_facade_block_init() {
	if ( function_exists( 'wp_register_block_types_from_metadata_collection' ) ) {
		wp_register_block_types_from_metadata_collection( __DIR__ . '/build', __DIR__ . '/build/blocks-manifest.php' );
		return;
	}

	if ( function_exists( 'wp_register_block_metadata_collection' ) ) {
		wp_register_block_metadata_collection( __DIR__ . '/build', __DIR__ . '/build/blocks-manifest.php' );
	}

	$manifest_data = require __DIR__ . '/build/blocks-manifest.php';
	foreach ( array_keys( $manifest_data ) as $block_type ) {
		register_block_type( __DIR__ . "/build/{$block_type}" );
	}
}
add_action( 'init', 'create_block_youtube_video_facade_block_init' );
