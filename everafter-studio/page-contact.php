<?php
/**
 * Template Name: Contact
 *
 * @package Everafter_Studio
 */

get_header();

$phone     = get_theme_mod( 'everafter_contact_phone', '+1 (800) 482-9104' );
$locations = get_theme_mod( 'everafter_contact_address', __( 'Offices in Milan · Paris · New York', 'everafter-studio' ) );
$email     = get_theme_mod( 'everafter_inquiry_recipient', get_option( 'admin_email' ) );
?>

<main id="primary" class="site-main">

	<div class="page-banner" style="background-color: var(--color-charcoal); color: var(--color-ivory); padding: 9rem 0 5rem 0; text-align: center;">
		<div class="container container-narrow">
			<?php everafter_breadcrumbs(); ?>
			<span class="kicker" style="color: var(--color-champagne); margin-top: 1rem;"><?php esc_html_e( 'Reservations & Commissions', 'everafter-studio' ); ?></span>
			<h1 style="color: var(--color-ivory); margin-bottom: 1.5rem;"><?php the_title(); ?></h1>
			<p style="color: rgba(247, 244, 239, 0.8); font-size: 1.15rem; max-width: 680px; margin: 0 auto;">
				<?php esc_html_e( 'We accept a strictly limited number of wedding photography and film commissions each year. Please share your date and celebration details below.', 'everafter-studio' ); ?>
			</p>
		</div>
	</div>

	<section style="background-color: var(--color-ivory); padding: 6rem 0;">
		<div class="container">
			<div style="display: grid; grid-template-columns: 1fr 1.6fr; gap: 5rem;">
				<!-- Contact Sidebar -->
				<div>
					<span class="kicker"><?php esc_html_e( 'Direct Coordinates', 'everafter-studio' ); ?></span>
					<h2 style="font-size: 2.2rem; margin-bottom: 1.5rem;"><?php esc_html_e( 'Connect with Our Atelier', 'everafter-studio' ); ?></h2>
					<p style="margin-bottom: 2.5rem; color: var(--color-charcoal-light);">
						<?php esc_html_e( 'Whether you are in early concept planning or working with an established European event planner, we would be delighted to hear from you.', 'everafter-studio' ); ?>
					</p>

					<div style="margin-bottom: 2rem;">
						<h4 style="font-size: 0.8rem; letter-spacing: 0.18em; text-transform: uppercase; color: var(--color-soft-gold); margin-bottom: 0.5rem;"><?php esc_html_e( 'Studio Locations', 'everafter-studio' ); ?></h4>
						<p style="font-size: 1rem; color: var(--color-charcoal); font-weight: 500;"><?php echo esc_html( $locations ); ?></p>
					</div>

					<div style="margin-bottom: 2rem;">
						<h4 style="font-size: 0.8rem; letter-spacing: 0.18em; text-transform: uppercase; color: var(--color-soft-gold); margin-bottom: 0.5rem;"><?php esc_html_e( 'Inquiry Email', 'everafter-studio' ); ?></h4>
						<p style="font-size: 1rem;"><a href="mailto:<?php echo esc_attr( $email ); ?>" style="color: var(--color-charcoal); text-decoration: underline;"><?php echo esc_html( $email ); ?></a></p>
					</div>

					<div style="margin-bottom: 2rem;">
						<h4 style="font-size: 0.8rem; letter-spacing: 0.18em; text-transform: uppercase; color: var(--color-soft-gold); margin-bottom: 0.5rem;"><?php esc_html_e( 'Studio Telephone', 'everafter-studio' ); ?></h4>
						<p style="font-size: 1rem;"><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>" style="color: var(--color-charcoal);"><?php echo esc_html( $phone ); ?></a></p>
					</div>

					<div style="background: #F1ECE3; padding: 1.75rem; border: 1px solid var(--color-border); margin-top: 3rem;">
						<h4 style="font-size: 0.9rem; margin-bottom: 0.5rem; font-family: var(--font-sans); text-transform: uppercase; letter-spacing: 0.1em;"><?php esc_html_e( 'Response Time Guarantee', 'everafter-studio' ); ?></h4>
						<p style="font-size: 0.88rem; color: var(--color-charcoal-light); margin: 0;">
							<?php esc_html_e( 'All couple inquiries are personally reviewed by our lead photographer and answered within 24 to 48 hours with current calendar availability.', 'everafter-studio' ); ?>
						</p>
					</div>
				</div>

				<!-- Form Column -->
				<div style="background: #fff; padding: 3.5rem; border: 1px solid var(--color-border); box-shadow: 0 15px 35px rgba(0,0,0,0.03);">
					<span class="kicker"><?php esc_html_e( 'Inquiry Submission', 'everafter-studio' ); ?></span>
					<h3 style="font-size: 1.8rem; margin-bottom: 2rem;"><?php esc_html_e( 'Tell Us About Your Celebration', 'everafter-studio' ); ?></h3>

					<form id="everafter-inquiry-form" method="post" action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>">
						<?php wp_nonce_field( 'everafter_submit_inquiry_action', 'everafter_inquiry_nonce' ); ?>
						<input type="hidden" name="action" value="everafter_submit_inquiry" />

						<div class="form-grid">
							<div class="form-group">
								<label for="field-full-name"><?php esc_html_e( 'Your Full Names *', 'everafter-studio' ); ?></label>
								<input type="text" id="field-full-name" name="full_name" class="form-control" required placeholder="<?php esc_attr_e( 'Elena Rossi & Matteo Bianchi', 'everafter-studio' ); ?>" />
							</div>

							<div class="form-group">
								<label for="field-email"><?php esc_html_e( 'Email Address *', 'everafter-studio' ); ?></label>
								<input type="email" id="field-email" name="email" class="form-control" required placeholder="<?php esc_attr_e( 'elena@example.com', 'everafter-studio' ); ?>" />
							</div>

							<div class="form-group">
								<label for="field-phone"><?php esc_html_e( 'Phone / WhatsApp', 'everafter-studio' ); ?></label>
								<input type="tel" id="field-phone" name="phone" class="form-control" placeholder="<?php esc_attr_e( '+1 (555) 000-0000', 'everafter-studio' ); ?>" />
							</div>

							<div class="form-group">
								<label for="field-date"><?php esc_html_e( 'Wedding Date / Season *', 'everafter-studio' ); ?></label>
								<input type="text" id="field-date" name="wedding_date" class="form-control" required placeholder="<?php esc_attr_e( 'September 18, 2026', 'everafter-studio' ); ?>" />
							</div>

							<div class="form-group">
								<label for="field-location"><?php esc_html_e( 'Wedding Destination / Venue *', 'everafter-studio' ); ?></label>
								<input type="text" id="field-location" name="wedding_location" class="form-control" required placeholder="<?php esc_attr_e( 'Villa Balbiano, Lake Como, Italy', 'everafter-studio' ); ?>" />
							</div>

							<div class="form-group">
								<label for="field-event-type"><?php esc_html_e( 'Event Type / Coverage', 'everafter-studio' ); ?></label>
								<select id="field-event-type" name="event_type" class="form-control">
									<option value="Multi-Day Destination Wedding"><?php esc_html_e( 'Multi-Day Destination Wedding', 'everafter-studio' ); ?></option>
									<option value="Full Day Wedding & Cinematic Film"><?php esc_html_e( 'Full Day Wedding & Cinematic Film', 'everafter-studio' ); ?></option>
									<option value="Wedding Photography Only"><?php esc_html_e( 'Wedding Photography Only', 'everafter-studio' ); ?></option>
									<option value="Intimate Elopement"><?php esc_html_e( 'Intimate Elopement', 'everafter-studio' ); ?></option>
									<option value="Pre-Wedding / Editorial Session"><?php esc_html_e( 'Pre-Wedding / Editorial Session', 'everafter-studio' ); ?></option>
								</select>
							</div>

							<div class="form-group full-width">
								<label for="field-guests"><?php esc_html_e( 'Estimated Guest Count', 'everafter-studio' ); ?></label>
								<input type="number" id="field-guests" name="guest_count" class="form-control" min="1" max="1000" placeholder="<?php esc_attr_e( 'e.g. 120', 'everafter-studio' ); ?>" />
							</div>

							<div class="form-group full-width">
								<label for="field-message"><?php esc_html_e( 'Tell Us About Your Vision *', 'everafter-studio' ); ?></label>
								<textarea id="field-message" name="message" class="form-control" required placeholder="<?php esc_attr_e( 'Share details regarding your celebration, aesthetic preferences, planner, and any questions you have for our studio...', 'everafter-studio' ); ?>"></textarea>
							</div>
						</div>

						<div style="margin-top: 2rem;">
							<button type="submit" class="btn-luxury btn-primary" style="width: 100%;">
								<?php esc_html_e( 'Transmit Inquiries & Check Calendar Availability', 'everafter-studio' ); ?>
							</button>
						</div>

						<div id="form-feedback" class="form-feedback" role="alert"></div>
					</form>
				</div>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
