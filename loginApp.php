<?php
/*
  Plugin Name: Custom Registration login
  Plugin URI: No Custom
  Description: Updates user rating based on number of posts.
  Version: 1.0
  Author: Manoj Singh Rawat
  Author URI: No Uri
 */

if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

define( 'LOGIN_FORM_version', '1' );
define( 'LOGIN_FORM__MINIMUM_WP_VERSION', '4.0' );
define( 'LOGIN_FORM__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'LOGIN_FORM_DELETE_LIMIT', 100000 );


require_once( LOGIN_FORM__PLUGIN_DIR . 'class.login-form.php' );

require_once( LOGIN_FORM__PLUGIN_DIR . 'class.register-validation.php' );

require_once( LOGIN_FORM__PLUGIN_DIR . 'class.user-handel.php' );

require_once( LOGIN_FORM__PLUGIN_DIR . 'class.form-build.php' );

require_once( LOGIN_FORM__PLUGIN_DIR . 'class.send-mail.php' );


require_once( LOGIN_FORM__PLUGIN_DIR . 'class.ui.php' );



require_once( LOGIN_FORM__PLUGIN_DIR . 'class.custom-post.php' );

// Register a new shortcode: [custom_registration_login]
add_shortcode( 'custom_registration_login', 'custom_registration_shortcode' );
 
// The callback function that will replace [book]
function custom_registration_shortcode() {
    ob_start();
    custom_registration_function();
    return ob_get_clean();
}


// custom post data collection





// test




function html_form_code() {
	echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
	echo '<p>';
	echo 'Your Name (required) <br/>';
	echo '<input type="text" name="cf-name" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["cf-name"] ) ? esc_attr( $_POST["cf-name"] ) : '' ) . '" size="40" />';
	echo '</p>';
	echo '<p>';
	echo 'Your Email (required) <br/>';
	echo '<input type="email" name="cf-email" value="' . ( isset( $_POST["cf-email"] ) ? esc_attr( $_POST["cf-email"] ) : '' ) . '" size="40" />';
	echo '</p>';
	echo '<p>';
	echo 'Subject (required) <br/>';
	echo '<input type="text" name="cf-subject" pattern="[a-zA-Z ]+" value="' . ( isset( $_POST["cf-subject"] ) ? esc_attr( $_POST["cf-subject"] ) : '' ) . '" size="40" />';
	echo '</p>';
	echo '<p>';
	echo 'Your Message (required) <br/>';
	echo '<textarea rows="10" cols="35" name="cf-message">' . ( isset( $_POST["cf-message"] ) ? esc_attr( $_POST["cf-message"] ) : '' ) . '</textarea>';
	echo '</p>';
	echo '<p><input type="submit" name="cf-submitted" value="Send"></p>';
	echo '</form>';
}

// function deliver_mail() {

// 	// if the submit button is clicked, send the email
// 	if ( isset( $_POST['cf-submitted'] ) ) {

// 		// sanitize form values
// 		$name    = sanitize_text_field( $_POST["cf-name"] );
// 		$email   = sanitize_email( $_POST["cf-email"] );
// 		$subject = sanitize_text_field( $_POST["cf-subject"] );
// 		$message = esc_textarea( $_POST["cf-message"] );

// 		// get the blog administrator's email address
// 		$to = get_option( 'admin_email' );

// 		$headers = "From: $name <$email>" . "\r\n";

// 		// If email has been process for sending, display a success message
// 		if ( wp_mail( $to, $subject, $message, $headers ) ) {
// 			echo '<div>';
// 			echo '<p>Thanks for contacting me, expect a response soon.</p>';
// 			echo '</div>';
// 		} else {
// 			echo 'An unexpected error occurred';
// 		}
// 	}
// }

// function cf_shortcode() {
// 	ob_start();
// 	deliver_mail();
// 	html_form_code();

// 	return ob_get_clean();
// }


// [custom_contact_form]


// add_shortcode( 'custom_contact_form', 'cf_shortcode' );



//custom user Role


add_role(
  'custom_editor',
  __( 'Custom Editor' ),
  array(
  'read'         => true,  // true allows this capability
  'edit_posts'   => false,
  )
  );







?>