<?php
/**
 * Add required and recommended plugins.
 */

add_action( 'tgmpa_register', 'justread_register_required_plugins' );
add_filter( 'ocdi/register_plugins', 'justread_register_ocdi_plugins' );

function justread_register_required_plugins() {
	tgmpa( justread_required_plugins(), [
		'id'          => 'justread',
		'has_notices' => true,
	] );
}

function justread_register_ocdi_plugins( $plugins ) {
	return array_merge( $plugins, justread_required_plugins() );
}

function justread_required_plugins() {
	return [
		[
			'name' => 'Jetpack',
			'slug' => 'jetpack',
		],
		[
			'name' => 'Slim SEO',
			'slug' => 'slim-seo',
		],
		[
			'name' => 'Falcon',
			'slug' => 'falcon',
		],
	];
}
