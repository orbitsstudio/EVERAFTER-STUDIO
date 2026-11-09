<?php
/**
 * Template part for Introduction & Photography Philosophy
 *
 * @package Everafter_Studio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$intro_heading = get_theme_mod( 'everafter_intro_heading', __( 'Poetic imagery rooted in candid emotion and enduring beauty.', 'everafter-studio' ) );
$intro_body    = get_theme_mod( 'everafter_intro_body', __( 'At Everafter Studio, we view weddings not merely as sequences of scheduled events, but as deeply emotional tapestries of human connection. Our approach blends editorial high-fashion aesthetics with quiet, unobtrusive documentary storytelling. Every frame is composed with intentionality, honoring authentic light, intimate glances, and the rare elegance of your celebration.', 'everafter-studio' ) );
$intro_image   = everafter_get_fallback_image( 'destination' );
?>

<section class="intro-section" id="philosophy">
	<div class="container">
		<div class="intro-grid">
			<div class="intro-text">
				<span class="kicker"><?php esc_html_e( 'Our Philosophy', 'everafter-studio' ); ?></span>
				<h2><?php esc_html_e( 'Artistry in Every Sacred Second', 'everafter-studio' ); ?></h2>
				<p class="lead">
					<?php echo esc_html( $intro_heading ); ?>
				</p>
				<p>
					<?php echo esc_html( $intro_body ); ?>
				</p>
				<p style="margin-top: 1.5rem;">
					<?php esc_html_e( 'Whether walking down a sunlit cypress aisle in Tuscany or dancing beneath crystalline chandeliers in a Parisian salon, our lenses observe without intruding—preserving the authentic soul of your day for generations.', 'everafter-studio' ); ?>
				</p>
				<div style="margin-top: 2.5rem;">
					<a href="<?php echo esc_url( home_url( '/#services' ) ); ?>" class="btn-luxury btn-outline-dark">
						<?php esc_html_e( 'Explore Studio Capabilities &rarr;', 'everafter-studio' ); ?>
					</a>
				</div>
			</div>

			<div class="intro-image-frame">
				<img src="<?php echo esc_url( $intro_image ); ?>" alt="<?php esc_attr_e( 'Everafter Studio Wedding Photography Philosophy', 'everafter-studio' ); ?>" loading="lazy" />
				<div class="intro-image-badge">
					<span><?php esc_html_e( 'Editorial · Analog · Timeless', 'everafter-studio' ); ?></span>
				</div>
			</div>
		</div>
	</div>
</section>
