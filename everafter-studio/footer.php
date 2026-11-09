<?php
/**
 * The template for displaying the footer
 *
 * @package Everafter_Studio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$phone        = get_theme_mod( 'everafter_contact_phone', '+1 (800) 482-9104' );
$locations    = get_theme_mod( 'everafter_contact_address', __( 'Offices in Milan · Paris · New York', 'everafter-studio' ) );
$email        = get_theme_mod( 'everafter_inquiry_recipient', get_option( 'admin_email' ) );
$instagram    = get_theme_mod( 'everafter_instagram_url', 'https://instagram.com/everafterstudio' );
$vimeo        = get_theme_mod( 'everafter_vimeo_url', 'https://vimeo.com/everafterstudio' );
$copyright    = get_theme_mod( 'everafter_footer_copyright', sprintf( __( '© %s Everafter Studio. All Rights Reserved. Luxury Wedding Photography & Cinematic Films.', 'everafter-studio' ), gmdate( 'Y' ) ) );
?>

</div><!-- #content -->

<footer id="colophon" class="site-footer">
	<div class="container">
		<div class="footer-top">
			<!-- Col 1: Studio Statement -->
			<div class="footer-branding">
				<div class="footer-logo"><?php bloginfo( 'name' ); ?></div>
				<p style="font-size: 0.95rem; line-height: 1.7; max-width: 320px; color: rgba(247, 244, 239, 0.7);">
					<?php esc_html_e( 'Luxury editorial wedding photography and cinematic wedding films for timeless celebrations worldwide.', 'everafter-studio' ); ?>
				</p>
				<p style="font-size: 0.85rem; color: var(--color-champagne); margin-top: 1rem;">
					<?php echo esc_html( $locations ); ?>
				</p>
			</div>

			<!-- Col 2: Navigation -->
			<div class="footer-column">
				<h4><?php esc_html_e( 'Navigation', 'everafter-studio' ); ?></h4>
				<?php
				if ( has_nav_menu( 'footer' ) ) {
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'depth'          => 1,
							'container'      => false,
						)
					);
				} else {
					?>
					<ul>
						<li><a href="<?php echo esc_url( home_url( '/#stories' ) ); ?>"><?php esc_html_e( 'Featured Stories', 'everafter-studio' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/#portfolio' ) ); ?>"><?php esc_html_e( 'Portfolio Gallery', 'everafter-studio' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/#services' ) ); ?>"><?php esc_html_e( 'Services & Cinema', 'everafter-studio' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/#philosophy' ) ); ?>"><?php esc_html_e( 'Our Philosophy', 'everafter-studio' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/#inquire' ) ); ?>"><?php esc_html_e( 'Client Inquiries', 'everafter-studio' ); ?></a></li>
					</ul>
					<?php
				}
				?>
			</div>

			<!-- Col 3: Services List -->
			<div class="footer-column">
				<h4><?php esc_html_e( 'Expertise', 'everafter-studio' ); ?></h4>
				<ul>
					<li><a href="<?php echo esc_url( home_url( '/#services' ) ); ?>"><?php esc_html_e( 'Destination Weddings', 'everafter-studio' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/#services' ) ); ?>"><?php esc_html_e( 'Cinematic Films', 'everafter-studio' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/#services' ) ); ?>"><?php esc_html_e( 'Haute Couture Bridal', 'everafter-studio' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/#services' ) ); ?>"><?php esc_html_e( 'Pre-Wedding & Editorial', 'everafter-studio' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/#services' ) ); ?>"><?php esc_html_e( 'Private Heirloom Albums', 'everafter-studio' ); ?></a></li>
				</ul>
			</div>

			<!-- Col 4: Contact & Socials -->
			<div class="footer-column">
				<h4><?php esc_html_e( 'Inquiries', 'everafter-studio' ); ?></h4>
				<ul style="margin-bottom: 1.5rem;">
					<li><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></li>
					<li><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a></li>
				</ul>
				<h4><?php esc_html_e( 'Follow', 'everafter-studio' ); ?></h4>
				<ul style="display: flex; gap: 1.25rem;">
					<?php if ( $instagram ) : ?>
						<li><a href="<?php echo esc_url( $instagram ); ?>" target="_blank" rel="noopener noreferrer">Instagram</a></li>
					<?php endif; ?>
					<?php if ( $vimeo ) : ?>
						<li><a href="<?php echo esc_url( $vimeo ); ?>" target="_blank" rel="noopener noreferrer">Vimeo</a></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="copyright">
				<?php echo wp_kses_post( $copyright ); ?>
			</div>
			<div class="back-to-top">
				<a href="#masthead" style="font-size: 0.75rem; letter-spacing: 0.15em; text-transform: uppercase;">
					<?php esc_html_e( 'Back to Top &uarr;', 'everafter-studio' ); ?>
				</a>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
