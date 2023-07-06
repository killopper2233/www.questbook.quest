<?php
/**
 * Deep Message.
 *
 * Receives messages from Deep API.
 *
 * @package Deep
 */

namespace Deep\Admin;

defined( 'ABSPATH' ) || exit;

/**
 * Class Messages.
 */
class Messages {
	/**
	 * Instance of this class.
	 *
	 * @since   4.5.8
	 * @access  public
	 * @var     Messages
	 */
	public static $instance;

	/**
	 * Content
	 *
	 * @var string
	 */
	private $content;

	/**
	 * Provides access to a single instance of a module using the singleton pattern.
	 *
	 * @since   4.5.8
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
	 * @since 4.5.8
	 * @access private
	 */
	private function __construct() {

		if ( ! is_admin() ) {
			return;
		}

		$this->hooks();
	}

	/**
	 * Hooks.
	 *
	 * @since 4.5.8
	 * @access private
	 */
	private function hooks() {
		add_action( 'deep/dashboard/message', array( $this, 'add_option' ) );
		add_action( 'deep/dashboard/message', array( $this, 'message' ) );
		add_action( 'wp_ajax_deep_close_message', array( $this, 'deep_close_message' ) );
	}

	/**
	 * Sends request to the API.
	 *
	 * @since 4.5.8
	 * @access private
	 */
	private function get_body( string $url ) {
		$args = array(
			'timeout'    => 30,
			'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36',
		);

		$response = wp_remote_get( esc_url_raw( $url ), $args );

		if ( is_array( $response ) && ! is_wp_error( $response ) && isset( $response['body'] ) ) {
			return $response['body'];
		}

		return array();
	}

	/**
	 * Get content of the post.
	 *
	 * @since 4.5.8
	 * @access private
	 */
	private function get_post_content() {
		$url = 'https://webnus.site/api/v2/message/message.json';

		$content = $this->get_body( $url );
		$content = json_decode( $content, true );

		return $content;
	}

	/**
	 * Display the message in admin.
	 *
	 * @since 4.5.8
	 * @access public
	 */
	public function message() {
		$content = $this->get_post_content();

		if ( ! $content || $content['show'] === false ) {
			return;
		}

		$this->update_version( $content['v'] );

		if ( $this->check_close_option() ) {
			?>
				<div class="deep-message">
					<div class="w-box-head"><?php echo esc_html__( 'Announcement', 'deep' ); ?><i class="sl-close"></i></div>
					<div class="deep-message-content">
						<div class="msg-img">
							<img src="<?php echo esc_url( $content['image'] ); ?>">
						</div>
						<div class="msg-content">
							<?php echo wp_kses_post( $content['content'] ); ?>

							<?php if ( ! empty( $content['btn'] ) ): ?>
								<a href="<?php echo esc_url( $content['btn_link'] ); ?>"><?php esc_html_e( $content['btn'] ); ?></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<script>
					jQuery(document).ready(function(){
						jQuery('.deep-message .w-box-head i').on('click', function(e){
							e.preventDefault();
							jQuery.ajax({
								url: ajaxObject.ajaxUrl,
								type: 'POST',
								data: {
									action: 'deep_close_message',
									nonce: ajaxObject.colornonce,
								},
								success: function (response) {
									jQuery(".deep-message").fadeOut(100, function () { jQuery(this).remove(); });
								},
							});
						});
					});
				</script>
			<?php
		}
	}

	/**
	 * Check close button
	 *
	 * @since 4.5.8
	 * @access private
	 */
	private function check_close_option() {
		$close_option = get_option( 'deep_close_message' );

		if ( false === $close_option['show'] ) {
			return false;
		}

		return true;
	}

	/**
	 * Close Message
	 *
	 * @since 5.0.0
	 * @access private
	 */
	public function deep_close_message() {

		if ( ! current_user_can( 'administrator' ) ) {
			return false;
		}

		$close_option = get_option( 'deep_close_message' );

		$close_option['show'] = false;

		update_option( 'deep_close_message', $close_option );

		wp_die();
	}

	/**
	 * Add deep_close_message option
	 *
	 * @since 5.0.0
	 * @access private
	 */
	public function add_option() {
		$close_option = get_option( 'deep_close_message' );

		$option = array(
			'version'	=> '1',
			'show'		=> true
		);

		if ( false === $close_option ) {
			add_option( 'deep_close_message', $option );
		}
	}

	/**
	 * Update deep_close_message version
	 *
	 * @since 5.0.0
	 * @access private
	 */
	private function update_version( $version ) {
		$close_option = get_option( 'deep_close_message' );

		if ( false === $close_option['show'] && $close_option['version'] < $version ) {
			$option = array(
				'version'	=> $version,
				'show'		=> true
			);
			update_option( 'deep_close_message', $option );
		}
	}
}

Messages::get_instance();
