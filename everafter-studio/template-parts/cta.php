<?php
/**
 * Template part for the Final Call to Action
 *
 * @package Everafter_Studio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="cta-section">
	<img src="<?php echo esc_url( everafter_get_fallback_image( 'film' ) ); ?>" alt="" class="cta-bg" loading="lazy" />

	<div class="container">
		<div class="cta-content">
			<span class="kicker" style="color: var(--color-champagne);"><?php esc_html_e( 'Begin Your Journey', 'everafter-studio' ); ?></span>
			<h2><?php esc_html_e( 'Let’s Create Something Timeless.', 'everafter-studio' ); ?></h2>
			<p>
				<?php esc_html_e( 'We accept a strictly limited collection of wedding and cinema commissions each calendar year. Reach out early to reserve your date and receive our private studio commission catalog.', 'everafter-studio' ); ?>
			</p>
			<div class="hero-buttons">
				<a href="#inquire" class="btn-luxury btn-primary">
					<?php esc_html_e( 'Schedule a Consultation', 'everafter-studio' ); ?>
				</a>
				<a href="<?php echo esc_url( home_url( '/#philosophy' ) ); ?>" class="btn-luxury btn-outline-light">
					<?php esc_html_e( 'Discover Our Story', 'everafter-studio' ); ?>
				</a>
			</div>
		</div>
	</div>
</section>
