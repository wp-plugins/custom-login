<?php
/*
 * Plugin Name: Custom Login
 * Plugin URI: http://austinpassy.com//wordpress-plugins/custom-login
 * Description: A simple way to customize your WordPress login screen! Use the built in and easy to use <a href="./options-general.php?page=custom-login.php">settings</a> page to do the work for you. So simple a caveboy can do it! Now featuring a HTML &amp; CSS box for advanced users. Sweet! Share you logins via the <a href="http://flickr.com/groups/custom-login/">Flickr</a> group!! <a href="../wp-content/plugins/custom-login/uninstall.php" title="Uninstall the Custom Login plugin with this script">Uninstall script</a>
 * Version: 0.7
 * Author: Austin Passy
 * Author URI: http://frostywebdesigns.com
 *
 * @copyright 2009 - 2010
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
 * Version 3.0 checker
 * @since 0.7
 */
 	global $wp_db_version;
	$version = 'false';
	if ( $wp_db_version > 13000 ) {
		$version = 'true'; //Version 3.0 or greater!
	}

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
	//add_action( 'init', 'custom_login_admin_warnings' );
	add_action( 'admin_init', 'custom_login_admin_init' );
	add_action( 'admin_menu', 'custom_login_add_pages' );
	add_action( 'login_head', 'custom_login' );
	add_action( 'login_head', 'custom_login_html' );
	
/**
 * Add jquery if using custom html
 * @since 0.4.6
 */
	add_action( 'login_head', 'custom_login_jquery', 1 );

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
		require_once( CUSTOM_LOGIN_ADMIN . '/dashboard.php' );

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
	//wp_register_style( 'custom-login-dock', CUSTOM_LOGIN_CSS . '/dock.css' );
	wp_register_style( 'custom-login-admin', CUSTOM_LOGIN_CSS . '/custom-login-admin.css' );
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
	wp_enqueue_style( 'thickbox' );
	//wp_enqueue_style( 'farbtastic' );
	wp_enqueue_style( 'custom-login-tabs' );
	//wp_enqueue_style( 'custom-login-dock' );
	wp_enqueue_style( 'custom-login-admin' );
}

/**
 * Function to add the script to the settings page
 * @since 0.4
 * @modified 0.7
 */
function custom_login_admin_script() {
	wp_enqueue_script( 'thickbox' );
	wp_enqueue_script( 'theme-preview' );
	//wp_enqueue_script( 'farbtastic', CUSTOM_LOGIN_JS . '/farbtastic.js', array( 'jquery' ), '1.2', false );
	wp_enqueue_script( 'autoresize', CUSTOM_LOGIN_JS . '/autoresize.min.js', array( 'jquery' ), '1.04', false );
	wp_enqueue_script( 'custom-login', CUSTOM_LOGIN_JS . '/custom-login.js', array( 'jquery' ), '0.1', false );
	//wp_enqueue_script( 'custom-login-dock', CUSTOM_LOGIN_JS . '/dock.js', array( 'jquery' ), '0.1', false );
	wp_enqueue_script( 'jscolor', CUSTOM_LOGIN_JS . '/jscolor.js', false, '1.3.1', false );
	
 	if ( $version3 == 'false' ) //If it's less than version 3
	wp_enqueue_script( 'shake', CUSTOM_LOGIN_JS . '/shake.js', false, '0.1', false );
}


/**
 * Add stylesheet to the login head
 * @since 0.3
 */
function custom_login() {
	global $custom_login;
	
	if ( $custom_login[ 'use_custom' ] != true ) :
		
		echo '<!-- Start Custom Login by Austin Passy -->' . "\n\n";
		echo '<link rel="stylesheet" type="text/css" href="' . CUSTOM_LOGIN_CSS . '/custom-login.css" />' . "\n\n";
		
			echo '<script type="text/javascript">' . "\n";
			echo 'jQuery(document).ready(' . "\n";
			echo '	function() {' . "\n";
			
			echo '		jQuery(\'html body.login h1 a\').removeAttr(\'href\').attr(\'href\',\'' . get_bloginfo('url') . '\');' . "\n";
			
			echo '		jQuery(\'html body.login p#nav\').append(\'<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7431290" title="Like this plugin? Please help me out, and donate">Dontate $1</a>\');' . "\n";
			
			echo '		jQuery(\'html body.login p#backtoblog\').append(\'<span class="byauthor"><a href="http://austinpassy.com/wordpress-plugin/custom-login/" title="Custom Login">Custom Login</a> by <a href="http://austinpassy.com/" title="Austin Passy">Austin Passy</a></span>\');' . "\n";
			
			//echo '		jQuery(\'html meta\').removeAttr(\'content\').attr(\'content\',\'index,follow\');' . "\n";
			
			echo '	}' . "\n";
			echo ');' . "\n";
			echo '</script>' . "\n";			
		
		echo '<!-- End Custom Login by Austin Passy - @link: http://austinpassy.com -->' . "\n\n";
	
	else :
	
		echo '<!-- Start Custom Login by Austin Passy -->' . "\n\n";
		
		/** Error handling
		 * @since 0.6
		 * @modified 0.7 //No longer valid
		 */
		if ( $custom_login[ 'cl_error' ] != false && $version3 == 'false' ) : //If it's less than version 3
			echo '<!-- START Error Handling javascript -->' ."\n";
			echo '<script type="text/javascript" src="' . CUSTOM_LOGIN_JS . '/jquery.easing.1.3.js?ver=0.1"></script>' . "\n";
			echo '<script type="text/javascript" src="' . CUSTOM_LOGIN_JS . '/shake.js?ver=0.1"></script>' . "\n";
			
			if ( isset($_POST[ 'log' ] ) && isset( $_POST[ 'pwd' ] ) ) {
				echo '<script type="text/javascript">' . "\n";
				echo 'jQuery(document).ready(' . "\n\t";
				echo 'function() {' . "\n\t\t";
				echo 'jQuery("div#login").shake(3,20,500);' . "\n\t";
				echo '}' . "\n";
				echo ');' . "\n";
				echo '</script>' . "\n\n";
			}
				
			echo '<!-- END Error Handling javascript -->' ."\n";
		endif;
		
		//echo $custom_login[ 'cl_login_form_border_radius' ] . "\n\n"; //Don't know why this is here? On accident I moved it?
		
		echo '<style type="text/css">' . "\n";
		
		/* Custom user CSS - hand coded */
		echo $custom_login[ 'cl_login_custom_code' ] . "\n\n";
		/* End custom */
		
		echo 'html {' . "\n";
		/* html background */
		if ( $custom_login[ 'cl_html_background_color' ] != '' ) 
			echo 'background:' . $custom_login[ 'cl_html_background_color' ] . ' url( \'' . $custom_login[ 'cl_html_background_url' ] . '\' ) left top '. $custom_login[ 'cl_html_background_repeat' ] . '; }' . "\n\n";
		else 
			echo 'background: transparent url( \'' . $custom_login[ 'cl_html_background_url' ] . '\' ) left top '. $custom_login[ 'cl_html_background_repeat' ] . '; }' . "\n\n";
		
		if ( $custom_login[ 'cl_html_border_top_color' ] != '' && $version3 == 'false' ) :
			echo 'body.login {' . "\n"; 
			echo 'border-top-color:' . $custom_login[ 'cl_html_border_top_color' ] . '; }' . "\n\n";
		endif;
		
		if ( $custom_login[ 'cl_html_border_top_background' ] != '' && $version3 == 'true' ) :
			echo 'body.login {' . "\n"; 
			echo 'background: transparent url( \'' . $custom_login[ 'cl_html_border_top_background' ] . '\' ) left top repeat-x; }' . "\n\n";
		endif;
		
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
 * Load jQuery if "USE_custom_html_code" checkbox is checked
 * @since 0.4.6
 */   
function custom_login_jquery() {
	global $custom_login;
	
	if ( $custom_login[ 'cl_USE_custom_html_code' ] != false || $custom_login[ 'use_custom' ] != true ) 
		echo '<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js?ver=1.4.1"></script>' . "\n";
}

/**
 * Add html after the body class
 * @since 0.4.6
 */
function custom_login_html() {
	global $custom_login;
	
	if ( $custom_login[ 'cl_USE_custom_html_code' ] != false ) :
		echo '<script type="text/javascript">' . "\n";
		echo 'jQuery(document).ready(' . "\n";
		echo '	function() {' . "\n";
				/* Custom user HTML - hand coded */
		echo '		jQuery(\'html body.login\').append(\'' . $custom_login[ 'cl_login_custom_html_code' ] . '\');' . "\n";
				/* End custom */
		echo '	}' . "\n";
		echo ');' . "\n";
		echo '</script>' . "\n";
	endif;

}

/**
 * RSS WPCult Feed
 * @since 0.3
 * @package Admin
 */
if ( !function_exists( 'thefrosty_network_feed' ) ) :
	function thefrosty_network_feed( $attr, $count ) {
		
		global $wpdb;
		
		include_once( ABSPATH . WPINC . '/rss.php' );
		
		$rss = fetch_rss( $attr );
		
		$items = array_slice( $rss->items, 0, '3' );
		
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

/**
 * Plugin Action /Settings on plugins page
 * @since 0.4.2
 * @package plugin
 */
function custom_login_plugin_actions( $links, $file ) {
 	if( $file == 'custom-login/custom-login.php' && function_exists( "admin_url" ) ) {
		$settings_link = '<a href="' . admin_url( 'options-general.php?page=custom-login.php' ) . '">' . __('Settings') . '</a>';
		array_unshift( $links, $settings_link ); // before other links
	}
	return $links;
}

/**
 * Warnings
 * @since 0.5
 * @package admin
 */
function custom_login_admin_warnings() {
	global $custom_login;
		
		function custom_login_warning() {
			global $custom_login;

			if ( $custom_login[ 'use_custom' ] != true )
				echo '<div id="custom-login-warning" class="updated fade"><p><strong>Custom Login plugin is not configured yet.</strong> It will use the defualt theme unless you configure the <a href="options-general.php?page=custom-login.php">options</a>.</p></div>';
		}

		function custom_login_wrong_settings() {
			global $custom_login;

			if ( $custom_login[ 'cl_login_hide_ad' ] != false )
				echo '<div id="custom-login-warning" class="updated fade"><p><strong>You&prime;ve just hid the ad.</strong> Thanks for <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7329157" title="Donate on PayPal" class="external">donating</a>!</p></div>';
		}

		add_action( 'admin_notices', 'custom_login_warning' );
		add_action( 'admin_notices', 'custom_login_wrong_settings' );

return;
}

?>