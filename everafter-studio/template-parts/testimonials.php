<?php
/**
 * Template part for Testimonials Carousel
 *
 * @package Everafter_Studio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Sample testimonials clearly identified as demonstration content
$testimonials = array(
	array(
		'quote'    => __( '“Everafter Studio captured our Lake Como celebration with a breathtaking poetry that surpassed every expectation. Looking through our heirloom gallery feels like reliving our wedding inside a high-fashion editorial film.”', 'everafter-studio' ),
		'couple'   => 'Victoria & Alexander',
		'location' => __( 'Villa Balbiano, Lake Como (Sample Client Review)', 'everafter-studio' ),
	),
	array(
		'quote'    => __( '“Their presence during our Provence celebration was calm, discreet, and deeply intuitive. They caught glances and stolen tears we never knew occurred. Truly world-class visual artists.”', 'everafter-studio' ),
		'couple'   => 'Sophia & Christian',
		'location' => __( 'Château Saint-Martin, French Riviera (Sample Client Review)', 'everafter-studio' ),
	),
	array(
		'quote'    => __( '“Our wedding film is a masterpiece of cinema. The color grading, the soundtrack choices, and the rhythm of the edit brought our families to tears. Worth every single investment.”', 'everafter-studio' ),
		'couple'   => 'Genevieve & Liam',
		'location' => __( 'Amalfi Coast, Italy (Sample Client Review)', 'everafter-studio' ),
	),
);
?>

<section class="testimonials-section" id="testimonials">
	<div class="container">
		<div class="section-header" style="margin-bottom: 2.5rem;">
			<span class="kicker"><?php esc_html_e( 'Words of Praise', 'everafter-studio' ); ?></span>
			<h2><?php esc_html_e( 'Kind Notes from Cherished Couples', 'everafter-studio' ); ?></h2>
		</div>

		<div class="testimonial-track">
			<?php foreach ( $testimonials as $index => $item ) : ?>
				<div class="testimonial-item <?php echo ( 0 === $index ) ? 'active' : ''; ?>">
					<blockquote class="testimonial-quote">
						<?php echo esc_html( $item['quote'] ); ?>
					</blockquote>
					<div class="testimonial-author"><?php echo esc_html( $item['couple'] ); ?></div>
					<div class="testimonial-location"><?php echo esc_html( $item['location'] ); ?></div>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="carousel-nav">
			<button class="carousel-arrow carousel-prev" aria-label="<?php esc_attr_e( 'Previous Testimonial', 'everafter-studio' ); ?>">
				&larr;
			</button>
			<button class="carousel-arrow carousel-next" aria-label="<?php esc_attr_e( 'Next Testimonial', 'everafter-studio' ); ?>">
				&rarr;
			</button>
		</div>
	</div>
</section>
