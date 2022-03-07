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


// custom user field


add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );

function extra_user_profile_fields( $user ) {
 $buisness  = get_user_meta( $user->ID, 'typeOfBuisness', true );
 ?>
    <h3><?php _e("Extra profile information", "blank"); ?></h3>

    <table class="form-table">
    <tr>
        <th><label for="Type Of Business"><?php _e("Type Of Business"); ?></label></th>
        <td>
           
            <span class="description"><?php _e("Type Of Business."); ?></span>
			 <select id="typeOfBuisness" name="typeOfBuisness" size="">
                    <option value="retail" <?php selected( $buisness, 'retail' ) ?>>Retail</option>
                    <option value="entertainment" <?php selected( $buisness, 'entertainment' ) ?>>Entertainment</option>
				  <option value="food_and_beverage" <?php selected( $buisness, 'food_and_beverage' ) ?>>Food And Beverage</option>
				  <option value="barber_and_beautician" <?php selected( $buisness, 'barber_and_beautician' ) ?>>Barber And Beautician</option>
                </select>
        </td>
    </tr>
    
    </table>
<?php }


add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

function save_extra_user_profile_fields( $user_id ) {
    if ( empty( $_POST['_wpnonce'] ) || ! wp_verify_nonce( $_POST['_wpnonce'], 'update-user_' . $user_id ) ) {
        return;
    }
    
    if ( !current_user_can( 'edit_user', $user_id ) ) { 
        return false; 
    }
    update_user_meta( $user_id, 'typeOfBuisness', $_POST['typeOfBuisness'] );
   
}


require_once( LOGIN_FORM__PLUGIN_DIR . 'class.login-form.php' );

require_once( LOGIN_FORM__PLUGIN_DIR . 'class.register-validation.php' );

require_once( LOGIN_FORM__PLUGIN_DIR . 'class.user-handel.php' );

require_once( LOGIN_FORM__PLUGIN_DIR . 'class.form-build.php' );

require_once( LOGIN_FORM__PLUGIN_DIR . 'class.send-mail.php' );






require_once( LOGIN_FORM__PLUGIN_DIR . 'class.custom-post.php' );

// Register a new shortcode: [custom_registration_login]
add_shortcode( 'custom_registration_login', 'custom_registration_shortcode' );
 
// The callback function that will replace [book]
function custom_registration_shortcode() {
	require_once( LOGIN_FORM__PLUGIN_DIR . 'class.ui.php' );
    ob_start();
    custom_registration_function();
    return ob_get_clean();
}


// custom post data collection





// test





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


  $extra_fields =  array( 
	//   add custom field here
		array( 'phone', __( 'What is your primary contact number?', 'rc_cucm' ), true )
);


add_filter( 'user_contactmethods', 'rc_add_user_contactmethods' );



function rc_add_user_contactmethods( $user_contactmethods ) {

	// Get fields
	global $extra_fields;
	
	// Display each fields
	foreach( $extra_fields as $field ) {
		if ( !isset( $contactmethods[ $field[0] ] ) )
    		$user_contactmethods[ $field[0] ] = $field[1];
	}

    // Returns the contact methods
    return $user_contactmethods;
}

add_action( 'wp_ajax_verify_username', 'check_username' );
add_action( 'wp_ajax_nopriv_verify_username', 'check_username' );
function check_username(){
    $username = $_POST['username'];
    if( username_exists( $username ) ) {
        echo $username . ' already taken.';
    }else {
        echo $username . ' is available.';
    }

    exit;
}


add_action( 'wp_ajax_verify_email', 'check_email' );
add_action( 'wp_ajax_nopriv_verify_email', 'check_email' );
function check_email(){
	 global $reg_errors;
	$reg_errors = new WP_Error;
	
    $email = $_POST['email'];
	
	
    if ( !is_email( $email ) ) {
   $reg_errors->add( 'email_invalid', 'Email is not valid' );
    }


    if ( email_exists( $email ) ) {
        $reg_errors->add( 'email', 'Email Already in use' );
    }
	
	if (!email_exists( $email )) {
        $mssg = $email . ' is available.';
		$reg_errors->add( 'email', $mssg );
    }
 	if ( is_wp_error( $reg_errors ) ) {
 
        foreach ( $reg_errors->get_error_messages() as $error ) {
         

         echo $error;

             
        }
	}
	
//     if( email_exists( $email ) ) {
//         echo $email . ' already taken.';
//     }else {
//         echo $email . ' is available.';
//     }

    exit;
}




// add_action( 'register_form', 'rc_register_form_display_extra_fields' );
// add_action( 'user_register', 'rc_user_register_save_extra_fields', 100 );
?>