<?php

use \Elementor\Core\Documents_Manager;
use \ElementorPro\Modules\ThemeBuilder\Classes\Locations_Manager;

include AC_ROOT_DIR . 'include/elementor/documents/hero.php';

/**
 * Register custom document types
 */
function ac_register_theme_builder_document_types( Documents_Manager $documents_manager ) {
	$documents_manager->register_document_type( 'hero', ACHero::get_class_full_name() );
}
add_action( 'elementor/documents/register', 'ac_register_theme_builder_document_types' );
/**
 * Register custom theme builder locations
 */
function ac_register_theme_builder_locations( Locations_Manager $location_manager ) {
	$location_manager->register_location(
		'hero',
		[
			'label' => __( 'Hero', 'plugin_scaffolding' ),
			'multiple' => false,
			'edit_in_content' => false,
			'hook' => 'astra_hero',
		]
	);
}
add_action( 'elementor/theme/register_locations', 'ac_register_theme_builder_locations' );
/**
 * Do hero section
 */
function _ac_hero_area() {
	do_action( 'astra_hero' );
}
add_action( 'astra_header_after', '_ac_hero_area', 8 );

function _ac_maybe_disable_hero() {
	if ( is_singular() && get_post_meta( get_the_id(), '_ac_hero', true ) === '0' ) {
		remove_all_actions( 'astra_hero' );
	}
}
add_action( 'wp', '_ac_maybe_disable_hero' );