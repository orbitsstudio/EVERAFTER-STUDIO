<?php
/**
 * Template part for Services & Capabilities
 *
 * @package Everafter_Studio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$services = array(
	array(
		'num'   => '01',
		'title' => __( 'Destination Weddings', 'everafter-studio' ),
		'desc'  => __( 'Multi-day European and global wedding coverage. We handle complete travel logistics, pre-event rehearsals, and full wedding day storytelling with an unobtrusive editorial eye.', 'everafter-studio' ),
	),
	array(
		'num'   => '02',
		'title' => __( 'Cinematic Wedding Films', 'everafter-studio' ),
		'desc'  => __( 'Shot on 35mm cinema motion cameras and vintage prime lenses. Directed with poetic rhythm, natural audio soundscapes, and bespoke color grading reminiscent of classic cinema.', 'everafter-studio' ),
	),
	array(
		'num'   => '03',
		'title' => __( 'Fine Art Photography', 'everafter-studio' ),
		'desc'  => __( 'A harmonious blend of medium-format analog film and modern high-resolution digital cameras, delivering rich skin tones, ethereal highlights, and authentic candid portraiture.', 'everafter-studio' ),
	),
	array(
		'num'   => '04',
		'title' => __( 'Haute Couture Bridal', 'everafter-studio' ),
		'desc'  => __( 'Dedicated pre-ceremony editorial portraiture capturing the architectural drape of your couture gown, heirloom jewelry, and quiet anticipation before guests arrive.', 'everafter-studio' ),
	),
	array(
		'num'   => '05',
		'title' => __( 'Pre-Wedding & Engagement', 'everafter-studio' ),
		'desc'  => __( 'Editorial fashion sessions set in picturesque European landmarks—from the canals of Venice and Parisian boulevards to secluded coastal coves in the Greek Isles.', 'everafter-studio' ),
	),
	array(
		'num'   => '06',
		'title' => __( 'Heirloom Albums & Prints', 'everafter-studio' ),
		'desc'  => __( 'Hand-bound Italian leather and Japanese linen keepsake albums printed on archival museum cotton paper, designed to preserve your memories for centuries.', 'everafter-studio' ),
	),
);
?>

<section class="services-section" id="services">
	<div class="container">
		<div class="section-header">
			<span class="kicker" style="color: var(--color-champagne);"><?php esc_html_e( 'Bespoke Services', 'everafter-studio' ); ?></span>
			<h2><?php esc_html_e( 'Artisanal Craftsmanship for Sacred Celebrations', 'everafter-studio' ); ?></h2>
			<p style="color: rgba(247, 244, 239, 0.8);">
				<?php esc_html_e( 'Every commission is tailored to the rhythm, scale, and distinct aesthetic of your celebration.', 'everafter-studio' ); ?>
			</p>
		</div>

		<div class="services-grid">
			<?php foreach ( $services as $service ) : ?>
				<div class="service-card">
					<div class="service-number"><?php echo esc_html( $service['num'] ); ?></div>
					<h3 class="service-title"><?php echo esc_html( $service['title'] ); ?></h3>
					<p><?php echo esc_html( $service['desc'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
