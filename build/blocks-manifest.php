<?php
// This file is generated. Do not modify it manually.
return array(
	'youtube-video-facade' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'video-facade-for-youtube/video-facade-for-youtube',
		'version' => '0.1.0',
		'title' => 'Video Facade for YouTube',
		'category' => 'widgets',
		'icon' => 'video-alt3',
		'description' => 'Optimizes YouTube embed by showing a facade/thumbnail. Loads YouTube embed only on click.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'textdomain' => 'video-facade-for-youtube',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'script' => 'file:./view.js',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php',
		'attributes' => array(
			'videoUrl' => array(
				'type' => 'string',
				'default' => ''
			),
			'thumbnailUrl' => array(
				'type' => 'string',
				'default' => ''
			)
		)
	)
);
