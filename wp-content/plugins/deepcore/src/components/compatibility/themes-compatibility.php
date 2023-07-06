<?php
/**
 * Deep Compatibility.
 *
 * @package Deep
 */

namespace Deep\Components;

defined( 'ABSPATH' ) || exit;

use Deep\Deep_Core;

/**
 * Class Compatibility.
 */
class Compatibility {
	/**
	 * Instance of this class.
	 *
	 * @since   2.1.0
	 *
	 * @access  public
	 *
	 * @var     Compatibility
	 */
	public static $instance;

	/**
	 * Deep Options.
	 *
	 * @since   2.1.0
	 *
	 * @access  public
	 */
	public static $options;

	/**
	 * Provides access to a single instance of a module using the singleton pattern.
	 *
	 * @since   2.1.0
	 *
	 * @return  object
	 */
	public static function get_instance() {
		if ( self::$instance === null ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Constructor.
	 *
	 * @since 2.1.0
	 *
	 * @access private
	 */
	private function __construct() {
		if ( Deep_Core::is_deep_theme() ) {
			return;
		}
		$this->definition();
		$this->load_dependencies();
	}

	/**
	 * Definition.
	 *
	 * @since 2.1.0
	 *
	 * @access private
	 */
	private function definition() {
		self::$options = get_option( 'deep_options' );
	}

	/**
	 * Check if header builder is enabled.
	 *
	 * @since 5.2.0
	 *
	 * @access public
	 */
	public static function is_header_enable() {
		if ( isset( self::$options['deep_header_builder'] ) && self::$options['deep_header_builder'] ) {
			return true;
		}
		return false;
	}

	/**
	 * Check if footer builder is enabled.
	 *
	 * @since 5.2.0
	 *
	 * @access public
	 */
	public static function is_footer_enable() {
		if ( isset( self::$options['deep_footer_builder'] ) && self::$options['deep_footer_builder'] ) {
			return true;
		}
		return false;
	}

	 /**
	  * Load the dependencies.
	  *
	  * @since 2.1.0
	  *
	  * @access private
	  */
	private function load_dependencies() {

		require_once DEEP_COMPONENTS_DIR . 'compatibility/header-builder/header-compatibility.php';
		require_once DEEP_COMPONENTS_DIR . 'compatibility/footer-builder/footer-compatibility.php';
		require_once DEEP_COMPONENTS_DIR . 'compatibility/page-template/page-template.php';
		require_once DEEP_COMPONENTS_DIR . 'compatibility/importer/importer.php';
	}
}

Compatibility::get_instance();
