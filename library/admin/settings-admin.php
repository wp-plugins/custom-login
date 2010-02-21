<?php
/**
 * Custom Login administration settings
 * These are the functions that allow users to select options
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @package CustomLogin
 */

/**
 * Returns an array of all the settings defaults
 * Other admin functions can grab this to use
 *
 * @since 0.3
 */
function custom_login_settings_args() {
	$settings_arr = array(
		/* Use CSS */
		'use_custom' => false,
		'cl_login_hide_ad' => false,
		
		/* Use Error Javascript */
		'cl_error' => true,
		
		/* Custom Code */		
		'cl_login_custom_code' => '',
		
		/* Custom HTML Code */	
		'cl_USE_custom_html_code' => false,	
		'cl_login_custom_html_code' => '',
		
		/* html */
		'cl_html_border_top_color' => '',
		'cl_html_background_color' => '',
		'cl_html_background_url' => '',
		'cl_html_background_repeat' => 'repeat-x',
		
		/* Login form */
		'cl_login_form_border_top_color' => '',
		'cl_login_form_background_color' => '',
		'cl_login_form_background' => '',
		'cl_login_form_border_radius' => '11',
		'cl_login_form_border' => '1',
		'cl_login_form_border_color' => '',
			
			/* Box Shadows */
			'cl_login_form_box_shadow_1' => '5',
			'cl_login_form_box_shadow_2' => '5',
			'cl_login_form_box_shadow_3' => '18',
			'cl_login_form_box_shadow_4' => '#464646',
		
		/* Label color */
		'cl_label_color' => '#ffffff',
		
	);
	
	return $settings_arr;
}

/**
 * Handles the main plugin settings
 *
 * @since 0.3
 */
function custom_login_page() {
	echo '<style type="text/css">' . "\n";
	echo 'input.swg_warning:hover {background:#ce0000; color:#fff!important; text-shadow:none; }' . "\n";
	echo '.colorwell { border: 1px solid; cursor: pointer; }' . "\n";
	echo 'body .colorwell-selected { border: 2px solid #000; font-weight: bold;	}'  . "\n";
	echo '.farbtastic { margin:0 auto; }' . "\n";
	echo '#dock h3 span { display: none; }' . "\n";
	echo '#dock h3:hover span { color: #aaa; display: inline-block; float: right; }' . "\n";
	echo '#dock h3:hover { cursor: pointer;	cursor: n-resize; }' . "\n";
	echo '</style>' . "\n";

	/*
	* Main settings variables
	*/
	$plugin_name = 'Custom Login';
	$settings_page_title = 'Custom Login Settings';
	$hidden_field_name = 'custom_login_submit_hidden';
	$plugin_data = get_plugin_data( CUSTOM_LOGIN . '/custom-login.php');

	/*
	* Grabs the default plugin settings
	*/
	$settings_arr = custom_login_settings_args();

	/*
	* Add a new option to the database
	*/
	add_option( 'custom_login_settings', $settings_arr );

	/*
	* Set form data IDs the same as settings keys
	* Loop through each
	*/
	$settings_keys = array_keys( $settings_arr );
	foreach ( $settings_keys as $key ) :
		$data[$key] = $key;
	endforeach;

	/*
	* Get existing options from database
	*/
	$settings = get_option( 'custom_login_settings' );

	foreach ( $settings_arr as $key => $value ) :
		$val[$key] = $settings[$key];
	endforeach;

	/*
	* If any information has been posted, we need
	* to update the options in the database
	*/
	if ( $_POST[$hidden_field_name] == 'Y' ) :

		/*
		* Loops through each option and sets it if needed
		*/
		foreach ( $settings_arr as $key => $value ) :
			$settings[$key] = $val[$key] = $_POST[$data[$key]];
		endforeach;

		/*
		* Update plugin settings
		*/
		update_option( 'custom_login_settings', $settings );
		
		/*
		* Output the settings page
		*/
        echo '<div class="wrap">';
		if ( function_exists('screen_icon') ) screen_icon();
		echo '<h2>' . $settings_page_title . '</h2>';
		echo '<div class="updated" style="margin:15px 0;">';
		echo '<p><strong>Don&prime;t you feel good. You just saved me!</strong></p>';
		echo '</div>';
		
	
	elseif ( $_POST[$hidden_field_name] == 'R') :

		foreach($settings_arr as $key => $value) :
			$settings[$key] = $val[$key] = $_POST[$data[$key]];
		endforeach;

		delete_option( 'custom_login_settings', $settings );
		
		/*
		* Output the settings page
		*/
        echo '<div class="wrap">';
		if ( function_exists('screen_icon') ) screen_icon();
		echo '<h2>' . $settings_page_title . '</h2>';
		echo '<div class="updated" style="margin:15px 0;">';
		echo '<p><strong>Oh no! I&prime;ve been reset.</strong></p>';
		echo '</div>';

	else :

		echo '<div class="wrap">';
		if ( function_exists('screen_icon') ) screen_icon();
		echo '<h2>' . $settings_page_title . '</h2>';
		
	endif;
?>

			<div id="poststuff">

				<form name="form0" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI'] ); ?>" style="border:none;background:transparent;">

					<?php require_once( CUSTOM_LOGIN_ADMIN . '/settings.php' ); ?>

					<p class="submit" style="float:left;">
						<input type="submit" name="Submit"  class="button-primary" value="Save Changes" />
						<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y" />
					</p>

				</form>
                
                <form name="form0" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" style="border:none;background:transparent;">
                
                    <p class="submit" style="float:left; margin-left:10px;">
                        <input type="submit" name="Reset" class="swg_warning" value="Delete/Reset" onclick="return confirm('Do you really want to delete/reset the plugin settings?');" />
                        <input type="hidden" name="<?php echo $hidden_field_name; ?>" value="R" />
                    </p>
            
                </form>

			</div>
            
			<br style="clear:both;" />

		</div>
<?php
}

?>