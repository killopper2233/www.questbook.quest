<?php
/**
 * Deep Header Builder Compatibility.
 *
 * @package Deep
 */

namespace Deep\Compatibility;

defined( 'ABSPATH' ) || exit;

use Deep\Components\Compatibility;

class HeaderBuilder {

	/**
	 * Header builder content.
	 *
	 * @since 5.1.0
	 *
	 * @access public
	 */
	public static function header_content() {
		?>
		<div id="wrap" class="wn-wrap">
		<?php

		if ( Compatibility::is_header_enable() && class_exists( '\WHB' ) ) {
			echo \WHB_Output::output();
		}
	}

	/**
	 * Footer content.
	 *
	 * @since 5.1.0
	 *
	 * @access public
	 */
	public static function footer_content() {
		?>
		</div>
		<?php
	}
}

add_action( 'wp_body_open', array( 'Deep\Compatibility\HeaderBuilder', 'header_content' ) );
add_action( 'wp_footer', array( 'Deep\Compatibility\HeaderBuilder', 'footer_content' ) );
