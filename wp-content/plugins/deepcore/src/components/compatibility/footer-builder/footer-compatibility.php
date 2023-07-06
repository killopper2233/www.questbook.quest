<?php
/**
 * Deep Footer Builder Compatibility.
 *
 * @package Deep
 */

namespace Deep\Compatibility;

defined( 'ABSPATH' ) || exit;

use Deep\Components\Compatibility;
use Elementor\Plugin;

class FooterBuilder {

	/**
	 * Footer builder content.
	 *
	 * @since 5.2.0
	 *
	 * @access public
	 */
	public static function footer_content() {
        if ( ! Compatibility::is_footer_enable() ) {
            return;
		}

        $footer_id = Compatibility::$options['deep_footer_builder_select'];

        if ( did_action( 'elementor/loaded' ) ) {
            echo Plugin::instance()->frontend->get_builder_content_for_display( $footer_id );
        } else {
            $footer = get_post( $footer_id );
            echo do_shortcode( $footer->post_content );
        }
	}
}

add_action( 'wp_footer', array( 'Deep\Compatibility\FooterBuilder', 'footer_content' ) );
