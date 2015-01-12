<?php
/**
 * @package     CustomLogin
 * @subpackage  Classes/CL_Common
 * @author      Austin Passy <http://austin.passy.co>
 * @copyright   Copyright (c) 2014, Austin Passy
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;


/**
 * Usage tracking
 *
 * @access public
 * @since  1.8.2
 * @return void
 */
class CL_Tracking {

	/**
	 * The data to send to the FM site
	 *
	 * @access private
	 */
	private $data;
	private $option;
	private $api;

	/**
	 * Get things going
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		$this->option	= CUSTOM_LOGIN_OPTION . '_general';
		$this->api 	= defined( 'WP_LOCAL_DEV' ) ? 'http://frosty.media.dev/cl-checkin-api/?edd_action=cl_checkin' : CUSTOM_LOGIN_API_URL . 'cl-checkin-api/?edd_action=cl_checkin';
		$this->schedule_send();
		
		add_action( CUSTOM_LOGIN_OPTION . '_after_sanatize_options',	array( $this, 'check_for_settings_optin' ) );
		add_action( 'admin_action_cl_opt_into_tracking',				array( $this, 'check_for_optin' ) );
		add_action( 'admin_action_cl_opt_out_of_tracking',				array( $this, 'check_for_optout' ) );
		add_action( 'admin_notices',										array( $this, 'admin_notice' ) );
		
		register_activation_hook( CUSTOM_LOGIN_FILE,					array( $this, 'activate' ) );
	}
	
	/**
	 * Runs on plugin install.
	 *
	 * @since		3.0.0
	 * @return		void
	 */
	function activate() {		
		$this->send_checkin( true, $on_activation_hook = 'yes' );
	}

	/**
	 * Check if the user has opted into tracking
	 *
	 * @access private
	 * @return bool
	 */
	private function tracking_allowed() {
		$tracking = CL_Common::get_option( 'tracking', 'general', false );
		
		if ( 'on' === $tracking )
			return true;
		
		return false;
	}

	/**
	 * Setup the data that is going to be tracked
	 *
	 * @access private
	 * @return void
	 */
	private function setup_data( $on_activation_hook = 'no' ) {

		$data = array();

		$theme_data		= wp_get_theme();
		$theme				= $theme_data->Name . ' ' . $theme_data->Version;

		$data['url']		= home_url();
		$data['version']	= get_bloginfo( 'version' );
		$data['theme']		= $theme;
		$data['email']		= get_bloginfo( 'admin_email' );

		// Retrieve current plugin information
		if ( ! function_exists( 'get_plugins' ) ) {
			include ABSPATH . '/wp-admin/includes/plugin.php';
		}

		$plugins			= array_keys( get_plugins() );
		$active_plugins	= get_option( 'active_plugins', array() );

		foreach ( $plugins as $key => $plugin ) {
			if ( in_array( $plugin, $active_plugins ) ) {
				// Remove active plugins from list so we can show active and inactive separately
				unset( $plugins[ $key ] );
			}
		}

		$data['active_plugins']	= $active_plugins;
		$data['inactive_plugins']	= $plugins;
		$data['post_count']		= wp_count_posts( 'post' )->publish;
		$data['on_activation']	= $on_activation_hook;

		$this->data = $data;
	}

	/**
	 * Send the data to the FM server
	 *
	 * @access private
	 * @return void
	 */
	public function send_checkin( $override = false, $on_activation = 'no' ) {
		
		if ( ! $this->tracking_allowed() && ! $override )
			return;

		// Send a maximum of once per week
		$last_send = $this->get_last_send();
		if ( $last_send && $last_send > strtotime( '-1 week' ) )
			return;

		$this->setup_data();

		$response = wp_remote_post( $this->api, array(
			'method'      => 'POST',
			'timeout'     => 20,
			'redirection' => 5,
			'body'        => $this->data,
			'user-agent'  => 'CustomLogin/' . CUSTOM_LOGIN_VERSION . '; ' . get_bloginfo( 'url' )
		) );
		
		if ( !is_wp_error( $response ) ) {
			update_option( 'cl_tracking_last_send', time() );
		}

	}

	/**
	 * Check for a new opt-in on settings save
	 *
	 * This runs during the sanitation of General settings, thus the return
	 *
	 * @access public
	 * @return array
	 */
	public function check_for_settings_optin( $input ) {
		
		// Send an intial check in on settings save
		if ( isset( $input['tracking'] ) ) {
			$this->send_checkin( true );
		}

		return $input;

	}

	/**
	 * Check for a new opt-in via the admin notice
	 *
	 * @access public
	 * @return void
	 */
	public function check_for_optin( $data ) {
		
		$options = get_option( $this->option, array() );
		$options['tracking'] = 'on';

		update_option( $this->option, $options );

		$this->send_checkin( true );

		update_option( 'cl_tracking_notice', '1' );

	}

	/**
	 * Check for a new opt-in via the admin notice
	 *
	 * @access public
	 * @return void
	 */
	public function check_for_optout( $data ) {
		
		$options = get_option( $this->option, array() );
		
		if ( isset( $options['tracking'] ) ) {
			$options['tracking'] = 'off';
			update_option( $this->option, $options );
		}

		update_option( 'cl_tracking_notice', '1' );

		wp_redirect( remove_query_arg( 'action' ) );
		exit;
	}

	/**
	 * Get the last time a checkin was sent
	 *
	 * @access private
	 * @return false/string
	 */
	private function get_last_send() {
		return get_option( 'cl_tracking_last_send' );
	}

	/**
	 * Schedule a weekly checkin
	 *
	 * @access private
	 * @return void
	 */
	private function schedule_send() {
		// We send once a week (while tracking is allowed) to check in, which can be used to determine active sites
		add_action( 'cl_weekly_scheduled_events', array( $this, 'send_checkin' ) );
	}

	/**
	 * Display the admin notice to users that have not opted-in or out
	 *
	 * @access public
	 * @return void
	 */
	public function admin_notice() {

		$options = get_option( $this->option, array() );
		$hide_notice = get_option( 'cl_tracking_notice' );

		if ( $hide_notice )
			return;

		if ( isset( $options['tracking'] ) )
			return;

		if ( ! current_user_can( 'manage_options' ) )
			return;

		if ( 
			stristr( network_site_url( '/' ), 'dev'       ) !== false ||
			stristr( network_site_url( '/' ), 'localhost' ) !== false ||
			stristr( network_site_url( '/' ), ':8888'     ) !== false // This is common with MAMP on OS X
		) {
			update_option( 'cl_tracking_notice', '1' );
		} else {
			$admin_url  = admin_url( 'admin.php' );
			$optin_url  = add_query_arg( 'action', 'cl_opt_into_tracking' );
			$optout_url = add_query_arg( 'action', 'cl_opt_out_of_tracking' );

			echo '<div class="updated"><p>';
				echo __( 'Allow Custom Login to anonymously track how this plugin is used and help us make the plugin better? Opt-in and receive a 20% discount code for any plugin on our <a href="https://frosty.media/plugins" target="_blank">site</a>. No sensitive data is tracked.', CUSTOM_LOGIN_DIRNAME );
				echo '&nbsp;<a href="' . esc_url( $optin_url ) . '" class="button-secondary">' . __( 'Allow', CUSTOM_LOGIN_DIRNAME ) . '</a>';
				echo '&nbsp;<a href="' . esc_url( $optout_url ) . '" class="button-secondary">' . __( 'Do not allow', CUSTOM_LOGIN_DIRNAME ) . '</a>';
			echo '</p></div>';
		}
	}

}
$GLOBALS['cl_tracking'] = new CL_Tracking;