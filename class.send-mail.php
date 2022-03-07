<?php

function deliver_mail() {

	// if the submit button is clicked, send the email
	if ( isset( $_POST['submit'] ) ) {

		// sanitize form values
		$name    = sanitize_text_field( $_POST["username"] );
		$email   = sanitize_email( $_POST["email"] );
		$subject = sanitize_text_field( $_POST["website"] );
		$message = esc_textarea( $_POST["bio"] );

		// get the blog administrator's email address
		$to = get_option( 'admin_email' );

		$headers = "From: $name <$email>" . "\r\n";

		// If email has been process for sending, display a success message
		if ( wp_mail( $to, $subject, $message, $headers ) ) {
			echo '<div>';
			echo '<p>Thanks for contacting me, expect a response soon.</p>';
			echo '</div>';
		} else {
			echo 'An unexpected error occurred';
		}
	}
}