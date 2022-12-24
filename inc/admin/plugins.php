<?php
/**
 * Add required and recommended plugins.
 *
 * @package Justread
 */

add_action( 'tgmpa_register', 'justread_register_required_plugins' );
add_filter( 'justread/register_plugins', 'justread_register_plugins' );

/**
 * Register required plugins
 *
 * @since  1.0
 */
function justread_register_required_plugins() {
	$plugins = justread_required_plugins();

	$config = [
		'id'          => 'justread',
		'has_notices' => true,
	];

	tgmpa( $plugins, $config );
}

/**
 * List of required plugins
 */
function justread_required_plugins() {
	return [
		[
			'name' => esc_html__( 'Jetpack', 'justread' ),
			'slug' => 'jetpack',
		],
		[
			'name' => esc_html__( 'Slim SEO', 'justread' ),
			'slug' => 'slim-seo',
		],
		[
			'name' => esc_html__( 'Falcon', 'justread' ),
			'slug' => 'falcon',
		],
	];
}

/**
 * List of recommended plugins in ocdi plugin
 */
function justread_register_plugins( $plugins ) {
	$theme_plugins = [
		[
			'name' => esc_html__( 'Jetpack', 'justread' ),
			'slug' => 'jetpack',
		],
		[
			'name' => esc_html__( 'Slim SEO', 'justread' ),
			'slug' => 'slim-seo',
		],
		[
			'name' => esc_html__( 'Falcon', 'justread' ),
			'slug' => 'falcon',
		],
	];

	return array_merge( $plugins, $theme_plugins );
}