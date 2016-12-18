<?php
/**
 * Tip: Save your modified version of bundle.js in a child theme and use 
 * this code in functions.php to load your custom bundle.js
 * This way you do not need to touch the Divi theme, which makes updates
 * a LOT more easy!
 *
 * Credits go to Rob Laughter from GetChurchly.com for this code! :)
 */

function custom_bundle_js() {
	// This code assumes you save the file bundle.js in the child-theme root
  // e.g. /themes/custom-divi/bundle.js
	$app = trailingslashit( get_stylesheet_directory_uri() );
	$ver = ET_BUILDER_VERSION;

	/**
	 * This code is directly copied from the original Divi theme.
	 * You can find it in Divi/includes/builder/frontend-builder/assets.php
	 * somewhere around line 107
	 */

	$fb_bundle_dependencies = apply_filters(
		'et_fb_bundle_dependencies',
		array(
			'jquery',
			'jquery-ui-core',
			'jquery-ui-draggable',
			'jquery-ui-resizable',
			'underscore',
			// 'minicolors',
			'jquery-ui-sortable',
			'jquery-effects-core',
			'iris',
			'wp-color-picker',
			'wp-color-picker-alpha',
			'react-tiny-mce',
			'easypiechart',
			'et_pb_admin_date_addon_js',
			'salvattore',
			'hashchange',
			'wp-shortcode',
		)
	);

	// Dequeue official bundle.js
	wp_dequeue_script( 'et-frontend-builder' );

	// Enqueue modified bundle.js
	wp_enqueue_script(
		'et-frontend-builder',
		"{$app}/bundle.js",
		$fb_bundle_dependencies,
		$ver,
		true
	);
}

add_action( 'wp_enqueue_scripts', 'custom_bundle_js', 99 );
