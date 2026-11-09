<?php
/**
 * Everafter Studio Inquiry & Contact Form Processing
 *
 * @package Everafter_Studio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Handle AJAX contact form submission with sanitization and validation.
 */
function everafter_handle_inquiry_submission() {
	// Verify nonce for CSRF protection
	if ( ! isset( $_POST['everafter_inquiry_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['everafter_inquiry_nonce'] ) ), 'everafter_submit_inquiry_action' ) ) {
		wp_send_json_error(
			array(
				'message' => esc_html__( 'Security token expired or invalid. Please refresh the page and try again.', 'everafter-studio' ),
			),
			403
		);
	}

	// Sanitize and collect fields
	$full_name    = isset( $_POST['full_name'] ) ? sanitize_text_field( wp_unslash( $_POST['full_name'] ) ) : '';
	$email        = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$phone        = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
	$wedding_date = isset( $_POST['wedding_date'] ) ? sanitize_text_field( wp_unslash( $_POST['wedding_date'] ) ) : '';
	$location     = isset( $_POST['wedding_location'] ) ? sanitize_text_field( wp_unslash( $_POST['wedding_location'] ) ) : '';
	$event_type   = isset( $_POST['event_type'] ) ? sanitize_text_field( wp_unslash( $_POST['event_type'] ) ) : '';
	$guest_count  = isset( $_POST['guest_count'] ) ? absint( wp_unslash( $_POST['guest_count'] ) ) : 0;
	$message      = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

	// Strict Validation
	$errors = array();

	if ( empty( $full_name ) ) {
		$errors[] = __( 'Full Name is required.', 'everafter-studio' );
	}

	if ( empty( $email ) || ! is_email( $email ) ) {
		$errors[] = __( 'A valid email address is required so our studio team can reply.', 'everafter-studio' );
	}

	if ( empty( $wedding_date ) ) {
		$errors[] = __( 'Wedding Date / Season is required.', 'everafter-studio' );
	}

	if ( empty( $location ) ) {
		$errors[] = __( 'Wedding Location / Venue is required.', 'everafter-studio' );
	}

	if ( empty( $message ) ) {
		$errors[] = __( 'Please share a brief note about your wedding vision.', 'everafter-studio' );
	}

	if ( ! empty( $errors ) ) {
		wp_send_json_error(
			array(
				'message' => implode( '<br>', array_map( 'esc_html', $errors ) ),
			),
			400
		);
	}

	// Destination recipient from Customizer or admin email
	$to = get_theme_mod( 'everafter_inquiry_recipient', get_option( 'admin_email' ) );
	if ( ! is_email( $to ) ) {
		$to = get_option( 'admin_email' );
	}

	$subject = sprintf(
		/* translators: 1: Couple/Client name, 2: Wedding Location */
		__( '[Everafter Inquiry] %1$s — %2$s', 'everafter-studio' ),
		$full_name,
		$location
	);

	// Email body composition
	$body  = "NEW LUXURY WEDDING INQUIRY\n";
	$body .= "===========================================\n\n";
	$body .= "Client Name:       " . $full_name . "\n";
	$body .= "Email Address:     " . $email . "\n";
	$body .= "Phone Number:      " . ( $phone ? $phone : 'Not provided' ) . "\n";
	$body .= "Wedding Date:      " . $wedding_date . "\n";
	$body .= "Wedding Location:  " . $location . "\n";
	$body .= "Event Type:        " . ( $event_type ? $event_type : 'Wedding Celebration' ) . "\n";
	$body .= "Est. Guest Count:  " . ( $guest_count > 0 ? $guest_count : 'Not specified' ) . "\n\n";
	$body .= "Vision & Message:\n";
	$body .= "-------------------------------------------\n";
	$body .= $message . "\n\n";
	$body .= "-------------------------------------------\n";
	$body .= "Submitted via Everafter Studio Theme Inquiry Form\n";
	$body .= "Site: " . esc_url( home_url( '/' ) ) . "\n";
	$body .= "IP: " . ( isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : 'Unknown' ) . "\n";

	$headers = array(
		'From: ' . get_bloginfo( 'name' ) . ' <' . $to . '>',
		'Reply-To: ' . $full_name . ' <' . $email . '>',
		'Content-Type: text/plain; charset=UTF-8',
	);

	// Dispatch email via WordPress native wp_mail()
	$mail_sent = wp_mail( $to, $subject, $body, $headers );

	if ( $mail_sent ) {
		wp_send_json_success(
			array(
				'message' => esc_html__( 'Thank you. Your wedding inquiry has been received. Our studio team will review your date and reply within 24 to 48 hours.', 'everafter-studio' ),
			)
		);
	} else {
		// Honest failure notice - NEVER fake success when delivery fails
		wp_send_json_error(
			array(
				'message' => esc_html__( 'The inquiry could not be delivered through the server mail gateway. Please ensure your WordPress site has an active SMTP plugin configured, or contact our studio directly via phone or email.', 'everafter-studio' ),
			),
			500
		);
	}
}
add_action( 'wp_ajax_everafter_submit_inquiry', 'everafter_handle_inquiry_submission' );
add_action( 'wp_ajax_nopriv_everafter_submit_inquiry', 'everafter_handle_inquiry_submission' );
