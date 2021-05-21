<?php

use \ElementorPro\Modules\ThemeBuilder\Documents\Theme_Section_Document;
use \ElementorPro\Modules\ThemeBuilder\Module;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class ACHero extends Theme_Section_Document {

	public function get_name() {
		return 'hero';
	}

	public static function get_title() {
		return __( 'Hero', 'elementor-pro' );
	}

	public static function get_properties() {

		$properties = wp_parse_args( [
			'condition_type' => 'general',
			'location' => 'hero',
			'support_kit' => true,
			'support_site_editor' => true,
		], parent::get_properties() );

		return $properties;

	}

	protected static function get_site_editor_type() {
		return 'hero';
	}
}
