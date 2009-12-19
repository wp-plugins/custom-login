<?php
/*
 * Plugin Name: Custom Login
 * Plugin URI: http://wpcult.com/custom-login-plugin
 * Description: Display custom login screen at the '/wp-login.php?action=login' screen. Sweet!
 * Version: 0.4.2
 * Author: Austin Passy
 * Author URI: http://austinpassy.com
 *
 * @copyright 2009
 * @author Austin Passy
 * @link http://frostywebdesigns.com/
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @package CustomLogin
 */

/**
 * Make sure we get the correct directory.
 * @since 0.3
 */
	if ( !defined( 'WP_CONTENT_URL' ) )
		define( 'WP_CONTENT_URL', get_option( 'siteurl' ) . '/wp-content' );
	if ( !defined( 'WP_CONTENT_DIR' ) )
		define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
	if ( !defined( 'WP_PLUGIN_URL' ) )
		define('WP_PLUGIN_URL', WP_CONTENT_URL. '/plugins' );
	if ( !defined( 'WP_PLUGIN_DIR' ) )
		define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );

/**
 * Define constant paths to the plugin folder.
 * @since 0.3
 */
	define( CUSTOM_LOGIN, WP_PLUGIN_DIR . '/custom-login' );
	define( CUSTOM_LOGIN_URL, WP_PLUGIN_URL . '/custom-login' );
	
	define( CUSTOM_LOGIN_ADMIN, WP_PLUGIN_DIR . '/custom-login/library/admin' );
	define( CUSTOM_LOGIN_CSS, WP_PLUGIN_URL . '/custom-login/library/css' );
	define( CUSTOM_LOGIN_JS, WP_PLUGIN_URL . '/custom-login/library/js' );

/**
 * Add the settings page to the admin menu.
 * @since 0.3
 */
	add_action( 'admin_init', 'custom_login_admin_init' );
	add_action( 'admin_menu', 'custom_login_add_pages' );
	add_action( 'login_head', 'custom_login' );

/**
 * Filters.
 * @since 0.3.3
 */	
	add_filter( 'plugin_action_links', 'custom_login_plugin_actions', 10, 2 ); //Add a settings page to the plugin menu

/**
 * Load the RSS Shortcode settings if in the WP admin.
 * @since 0.1
 */
	if ( is_admin() )
		require_once( CUSTOM_LOGIN_ADMIN . '/settings-admin.php' );

/**
 * Load the settings from the database.
 * @since 0.3
 */
	$custom_login = get_option( 'custom_login_settings' );

 /**
 * Load the stylesheet
 * @since 0.4
 */   
function custom_login_admin_init() {
	wp_register_style( 'farbtastic', CUSTOM_LOGIN_CSS . '/farbtastic.css' );
	wp_register_style( 'custom-login-tabs', CUSTOM_LOGIN_CSS . '/tabs.css' );
	wp_register_style( 'custom-login-dock', CUSTOM_LOGIN_CSS . '/dock.css' );
}

/**
 * Function to add the settings page
 * @since 0.3
 * @modified 0.4
 */
function custom_login_add_pages() {
	if ( function_exists( 'add_options_page' ) ) 
		$page = add_options_page( 'Custom Login Settings', 'Custom Login', 10, 'custom-login.php', custom_login_page );
			add_action( 'admin_print_styles-' . $page, 'custom_login_admin_style' );
			add_action( 'admin_print_scripts-' . $page, 'custom_login_admin_script' );
}

/**
 * Function to add the style to the settings page
 * @since 0.4
 */
function custom_login_admin_style() {
	wp_enqueue_style( 'farbtastic' );
	wp_enqueue_style( 'custom-login-tabs' );
	wp_enqueue_style( 'custom-login-dock' );
}

/**
 * Function to add the script to the settings page
 * @since 0.4
 */
function custom_login_admin_script() {
	wp_enqueue_script( 'farbtastic', CUSTOM_LOGIN_JS . '/farbtastic.js', array( 'jquery' ), '1.2', false );
	wp_enqueue_script( 'custom-login', CUSTOM_LOGIN_JS . '/custom-login.js', array( 'jquery' ), '0.1', false );
	wp_enqueue_script( 'custom-login-dock', CUSTOM_LOGIN_JS . '/dock.js', array( 'jquery' ), '0.1', false );
}


/**
 * Add stylesheet to the login head
 *
 * @since 0.3
 */
function custom_login() {
	global $custom_login;
	
	if ( $custom_login[ 'use_custom' ] != true ) :
		
		echo '<!-- Start Custom Login by Austin Passy -->' . "\n\n";
		echo '<link rel="stylesheet" type="text/css" href="' . CUSTOM_LOGIN_CSS . '/custom-login.css" />' . "\n\n";
		echo '<!-- End Custom Login by Austin Passy - @link: http://austinpassy.com -->' . "\n\n";
	
	else :
	
		echo '<!-- Start Custom Login by Austin Passy -->' . "\n\n";
		
		echo '<style type="text/css">' . "\n";
		echo 'html {' . "\n";
		/* html background */
		if ( $custom_login[ 'cl_html_background_color' ] != '' ) 
			echo 'background:' . $custom_login[ 'cl_html_background_color' ] . ' url( \'' . $custom_login[ 'cl_html_background_url' ] . '\' ) left top '. $custom_login[ 'cl_html_background_repeat' ] . '; }' . "\n\n";
		else 
			echo 'background: transparent url( \'' . $custom_login[ 'cl_html_background_url' ] . '\' ) left top '. $custom_login[ 'cl_html_background_repeat' ] . '; }' . "\n\n";
		
		echo '/* Diplays the custom graphics for the login screen*/' . "\n";
		echo '#login form {' . "\n";
		
		if ( $custom_login[ 'cl_login_form_background_color' ] != '' ) 
			echo 'background:' . $custom_login[ 'cl_login_form_background_color' ] . ' url( \'' . $custom_login[ 'cl_login_form_background' ] . '\' ) center top no-repeat;' . "\n";
		else 
			echo 'background: transparent url( \'' . $custom_login[ 'cl_login_form_background' ] . '\' ) center top no-repeat;' . "\n";
		
		echo 'padding-top:100px; }' . "\n\n";
		
		echo '/* Hides the default Wordpress Login content*/' . "\n";
		echo '#login form {' . "\n";
		/* border radius */
		echo '-moz-border-radius: ' . $custom_login[ 'cl_login_form_border_radius' ] . 'px;' . "\n";
		echo '-khtml-border-radius: ' . $custom_login[ 'cl_login_form_border_radius' ] . 'px;' . "\n";
		echo '-webkit-border-radius: ' . $custom_login[ 'cl_login_form_border_radius' ] . 'px;' . "\n";
		echo 'border-radius: ' . $custom_login[ 'cl_login_form_border_radius' ] . 'px;' . "\n";
		/* border */
		echo 'border: ' . $custom_login[ 'cl_login_form_border' ] . 'px solid ' . $custom_login[ 'cl_login_form_border_color' ] . ';' . "\n";
		/* box shadow */
		echo '-moz-box-shadow: ' . $custom_login[ 'cl_login_form_box_shadow_1' ] . 'px ' . $custom_login[ 'cl_login_form_box_shadow_2' ] . 'px ' . $custom_login[ 'cl_login_form_box_shadow_3' ] . 'px ' . $custom_login[ 'cl_login_form_box_shadow_4' ] . ';' . "\n";
		echo '-webkit-box-shadow: ' . $custom_login[ 'cl_login_form_box_shadow_1' ] . 'px ' . $custom_login[ 'cl_login_form_box_shadow_2' ] . 'px ' . $custom_login[ 'cl_login_form_box_shadow_3' ] . 'px ' . $custom_login[ 'cl_login_form_box_shadow_4' ] . ';' . "\n";
		echo '-khtml-box-shadow: ' . $custom_login[ 'cl_login_form_box_shadow_1' ] . 'px ' . $custom_login[ 'cl_login_form_box_shadow_2' ] . 'px ' . $custom_login[ 'cl_login_form_box_shadow_3' ] . 'px ' . $custom_login[ 'cl_login_form_box_shadow_4' ] . ';' . "\n";
		echo 'box-shadow: ' . $custom_login[ 'cl_login_form_box_shadow_1' ] . 'px ' . $custom_login[ 'cl_login_form_box_shadow_2' ] . 'px ' . $custom_login[ 'cl_login_form_box_shadow_3' ] . 'px ' . $custom_login[ 'cl_login_form_box_shadow_4' ] . ';' . "\n";
		echo '}' . "\n\n";
		
		echo '#login h1 {' . "\n";
		echo 'display: none; }' . "\n";
		
		echo 'label {' . "\n";
		echo 'color: ' . $custom_login[ 'cl_label_color' ] . ' !important; }' . "\n";
		echo '</style>' . "\n\n";
		
		echo '<!-- End Custom Login by Austin Passy - @link: http://austinpassy.com -->' . "\n\n";
	
	endif;

}

/**
 * RSS WPCult Feed
 * @since 0.3
 * @package Admin
 */
if ( !function_exists( 'wpcult_feed' ) ) :
	function wpcult_feed( $attr, $count ) {
		
		global $wpdb;
		
		include_once( ABSPATH . WPINC . '/rss.php' );
		
		$rss = fetch_rss( $attr );
		
		$items = array_slice( $rss->items, 0, 3 );
		
		echo '<div class="tab-content t' . $count . ' postbox open feed">';
		
		echo '<ul>';
		
		if ( empty( $items ) ) echo '<li>No items</li>';
		
		else
		
		foreach ( $items as $item ) : ?>
		
		<li>
		
		<a href='<?php echo $item[ 'link' ]; ?>' title='<?php echo $item[ 'description' ]; ?>'><?php echo $item[ 'title' ]; ?></a><br /> 
		
		<span style="font-size:10px; color:#aaa;"><?php echo date( 'F, j Y', strtotime( $item[ 'pubdate' ] ) ); ?></span>
		
		</li>
		
		<?php endforeach;
		
		echo '</ul>';
		
		echo '</div>';
		
	}
endif;

function custom_login_plugin_actions( $links, $file ) {
 	if( $file == 'custom-login/custom-login.php' && function_exists( "admin_url" ) ) {
		$settings_link = '<a href="' . admin_url( 'options-general.php?page=custom-login.php' ) . '">' . __('Settings') . '</a>';
		array_unshift( $links, $settings_link ); // before other links
	}
	return $links;
}

?>