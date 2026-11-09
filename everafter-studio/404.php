<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Everafter_Studio
 */

get_header();
?>

<main id="primary" class="site-main">

	<section class="error-404 not-found" style="background-color: var(--color-charcoal); color: var(--color-ivory); min-height: 80vh; display: flex; align-items: center; justify-content: center; text-align: center; padding: 6rem 0;">
		<div class="container container-narrow">
			<span class="kicker" style="color: var(--color-champagne); letter-spacing: 0.3em;"><?php esc_html_e( 'Error 404', 'everafter-studio' ); ?></span>
			<h1 style="color: var(--color-ivory); font-size: clamp(3rem, 7vw, 6rem); margin-bottom: 1.5rem; font-style: italic;">
				<?php esc_html_e( 'The Page Has Vanished into Light.', 'everafter-studio' ); ?>
			</h1>
			<p style="color: rgba(247, 244, 239, 0.8); font-size: 1.15rem; max-width: 580px; margin: 0 auto 3rem auto; line-height: 1.8;">
				<?php esc_html_e( 'The story or page you are seeking may have been renamed or relocated. Return to our main sanctuary or explore our featured wedding stories.', 'everafter-studio' ); ?>
			</p>
			<div class="hero-buttons">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-luxury btn-primary">
					<?php esc_html_e( 'Return to Atelier Home', 'everafter-studio' ); ?>
				</a>
				<a href="<?php echo esc_url( home_url( '/#stories' ) ); ?>" class="btn-luxury btn-outline-light">
					<?php esc_html_e( 'Browse Featured Stories', 'everafter-studio' ); ?>
				</a>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
