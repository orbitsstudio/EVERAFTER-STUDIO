<?php
/**
 * Template part for displaying the fullscreen cinematic Hero section
 *
 * @package Everafter_Studio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$kicker    = get_theme_mod( 'everafter_hero_kicker', __( 'International Luxury Wedding Photography', 'everafter-studio' ) );
$heading   = get_theme_mod( 'everafter_hero_heading', 'Your Story. <em>Beautifully Remembered.</em>' );
$desc      = get_theme_mod( 'everafter_hero_description', __( 'Editorial wedding imagery and cinematic films for couples celebrating love in the world’s most breathtaking destinations. Crafted with timeless fine-art sensibility.', 'everafter-studio' ) );
$bg_image  = get_theme_mod( 'everafter_hero_bg_image', '' );
$btn1_lbl  = get_theme_mod( 'everafter_hero_btn1_label', __( 'Explore Our Stories', 'everafter-studio' ) );
$btn1_url  = get_theme_mod( 'everafter_hero_btn1_url', '#stories' );
$btn2_lbl  = get_theme_mod( 'everafter_hero_btn2_label', __( 'Book Your Date', 'everafter-studio' ) );
$btn2_url  = get_theme_mod( 'everafter_hero_btn2_url', '#inquire' );

if ( empty( $bg_image ) ) {
	$bg_image = everafter_get_fallback_image( 'hero' );
}
?>

<section class="hero-section" id="hero">
	<img src="<?php echo esc_url( $bg_image ); ?>" alt="<?php echo esc_attr( wp_strip_all_tags( $heading ) ); ?>" class="hero-bg" loading="eager" />
	<div class="hero-overlay"></div>

	<div class="hero-content">
		<?php if ( $kicker ) : ?>
			<span class="kicker" style="color: var(--color-champagne); letter-spacing: 0.28em;"><?php echo esc_html( $kicker ); ?></span>
		<?php endif; ?>

		<h1 class="hero-title">
			<?php echo wp_kses_post( $heading ); ?>
		</h1>

		<?php if ( $desc ) : ?>
			<p class="hero-desc">
				<?php echo esc_html( $desc ); ?>
			</p>
		<?php endif; ?>

		<div class="hero-buttons">
			<?php if ( $btn1_lbl ) : ?>
				<a href="<?php echo esc_url( $btn1_url ); ?>" class="btn-luxury btn-primary">
					<?php echo esc_html( $btn1_lbl ); ?>
				</a>
			<?php endif; ?>

			<?php if ( $btn2_lbl ) : ?>
				<a href="<?php echo esc_url( $btn2_url ); ?>" class="btn-luxury btn-outline-light">
					<?php echo esc_html( $btn2_lbl ); ?>
				</a>
			<?php endif; ?>
		</div>
	</div>

	<div class="hero-scroll-indicator">
		<span><?php esc_html_e( 'Scroll', 'everafter-studio' ); ?></span>
		<div class="hero-scroll-line"></div>
	</div>
</section>
