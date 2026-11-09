<?php
/**
 * Template Name: Destination Weddings
 *
 * @package Everafter_Studio
 */

get_header();

$destinations = array(
	array(
		'title' => __( 'Lake Como & Northern Italy', 'everafter-studio' ),
		'desc'  => __( 'Villa Balbiano, Villa del Balbianello, Villa d’Este. Deep alpine waters, historical Italian gardens, and classic wooden Riva boat cruises at golden hour.', 'everafter-studio' ),
		'img'   => everafter_get_fallback_image( 'hero' ),
	),
	array(
		'title' => __( 'Provence & French Riviera', 'everafter-studio' ),
		'desc'  => __( 'Château Saint-Martin, Château de Tourreau, Cap d’Antibes. Limestone terraces, fragrant lavender fields, and timeless Mediterranean glamour.', 'everafter-studio' ),
		'img'   => everafter_get_fallback_image( 'destination' ),
	),
	array(
		'title' => __( 'Amalfi Coast & Capri', 'everafter-studio' ),
		'desc'  => __( 'Villa Cimbrone, Ravello cliffside gardens, Positano cliff villas. Dramatic azure seascapes, antique convertible drives, and moonlit seaside banquets.', 'everafter-studio' ),
		'img'   => everafter_get_fallback_image( 'film' ),
	),
);
?>

<main id="primary" class="site-main">

	<div class="page-banner" style="background-color: var(--color-charcoal); color: var(--color-ivory); padding: 9rem 0 5rem 0; text-align: center;">
		<div class="container container-narrow">
			<?php everafter_breadcrumbs(); ?>
			<span class="kicker" style="color: var(--color-champagne); margin-top: 1rem;"><?php esc_html_e( 'Global Commissions', 'everafter-studio' ); ?></span>
			<h1 style="color: var(--color-ivory); margin-bottom: 1.5rem;"><?php the_title(); ?></h1>
			<p style="color: rgba(247, 244, 239, 0.8); font-size: 1.15rem; max-width: 680px; margin: 0 auto;">
				<?php esc_html_e( 'Specializing in multi-day European destination weddings. Seamless global production with zero logistical burden on our couples.', 'everafter-studio' ); ?>
			</p>
		</div>
	</div>

	<section style="background-color: var(--color-ivory); padding: 6rem 0;">
		<div class="container">
			<div class="section-header" style="margin-bottom: 5rem;">
				<span class="kicker"><?php esc_html_e( 'Signature Territories', 'everafter-studio' ); ?></span>
				<h2><?php esc_html_e( 'Iconic Landscapes Where We Frequently Document', 'everafter-studio' ); ?></h2>
			</div>

			<div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 2.5rem; margin-bottom: 6rem;">
				<?php foreach ( $destinations as $dest ) : ?>
					<div style="background: #fff; border: 1px solid var(--color-border); overflow: hidden;">
						<div style="height: 280px; overflow: hidden;">
							<img src="<?php echo esc_url( $dest['img'] ); ?>" alt="<?php echo esc_attr( $dest['title'] ); ?>" style="width: 100%; height: 100%; object-fit: cover;" loading="lazy" />
						</div>
						<div style="padding: 2.5rem 2rem;">
							<h3 style="font-size: 1.5rem; margin-bottom: 1rem;"><?php echo esc_html( $dest['title'] ); ?></h3>
							<p style="font-size: 0.95rem; color: var(--color-charcoal-light); line-height: 1.7;">
								<?php echo esc_html( $dest['desc'] ); ?>
							</p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

			<div style="background: #F1ECE3; border-left: 4px solid var(--color-soft-gold); padding: 3rem; max-width: 900px; margin: 0 auto;">
				<h3 style="font-size: 1.6rem; margin-bottom: 1rem;"><?php esc_html_e( 'Destination Travel & Production Policies', 'everafter-studio' ); ?></h3>
				<p style="color: var(--color-charcoal-light); margin-bottom: 1rem;">
					<?php esc_html_e( 'For all European and international destination weddings, our commission quotes include all crew airfares, local transfers, lodging, and required equipment carnets. There are no hidden travel fees or unexpected surprise surcharges.', 'everafter-studio' ); ?>
				</p>
				<p style="color: var(--color-charcoal-light);">
					<?php esc_html_e( 'Our directors arrive 48 hours prior to wedding festivities to conduct on-site lighting reconnaissance, meet your wedding planning team, and scout secluded sunset frames.', 'everafter-studio' ); ?>
				</p>
			</div>
		</div>
	</section>

	<?php get_template_part( 'template-parts/cta' ); ?>

</main>

<?php
get_footer();
