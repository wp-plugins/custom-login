<?php
/**
 * Version 3.0 checker
 * @since 0.7.2
 */
 	global $wp_db_version;
	$version = 'false';
	if ( $wp_db_version > 13000 ) {
		$version = 'true'; //Version 3.0 or greater!
	}
	
if ( $version3 == 'false' ) { //If it's less than version 3 ?>
<html>
<head>
<title>Custom Login Uninstall Script</title>
</head>
<body>
<?php
/* Include the bootstrap for setting up WordPress environment */
include( '../../../wp-load.php' );

if ( !is_user_logged_in() )
	wp_die( 'You must be logged in to run this script.' );

if ( !current_user_can( 'install_plugins' ) )
	wp_die( 'You do not have permission to run this script.' );

if ( defined( 'UNINSTALL_CUSTOMLOGIN' ) )
	wp_die( 'UNINSTALL_CUSTOMLOGIN set somewhere else! It must only be set in uninstall.php' );

define( 'UNINSTALL_CUSTOMLOGIN', '' );

if ( !defined( 'UNINSTALL_CUSTOMLOGIN' ) || constant( 'UNINSTALL_CUSTOMLOGIN' ) == '' ) 
	wp_die( 'UNINSTALL_CUSTOMLOGIN must be set to a non-blank value in uninstall.php on line 29' );

?>
<p>This script will uninstall all options created by the <a href='http://austinpassy.com/wordpress-plugins/custom-login/'>Custom Login</a> plugin.</p>
<?php
if ( $_POST[ 'uninstall' ] ) {
	$plugins = (array)get_option( 'active_plugins' );
	$key = array_search( 'custom-login/custom-login.php', $plugins );
	if ( $key !== false ) {
		unset( $plugins[ $key ] );
		delete_option( 'custom_login_settings' ); //Delete options!!
		update_option( 'active_plugins', $plugins );
		echo "Disabled Custom Login plugin : <strong>DONE</strong><br />";
	}

	if ( in_array( 'custom-login/custom-login.php', get_option( 'active_plugins' ) ) )
		wp_die( 'Custom Login is still active. Please disable it on your plugins page first.' );
	echo "<p><strong>Please comment out the UNINSTALL_CUSTOMLOGIN <em>define()</em> on line 29 in this file!</strong></p>";
	wp_mail( $current_user->user_email, 'Custom Login Uninstalled', '' );
} else {
	?>
	<form action='uninstall.php' method='POST'>
	<p>Click UNINSTALL to delete the following options:
	<ol>
	<li>get_option( 'custom_login_settings' )</li>
	</ol>
	<input type='hidden' name='uninstall' value='1' />
	<input type='submit' value='UNINSTALL' />
	</form>
	<?php
}

?>
</body>
</html>
<?php } ?>