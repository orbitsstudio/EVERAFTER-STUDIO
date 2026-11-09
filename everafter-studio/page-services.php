<?php
/**
 * Template Name: Services
 *
 * @package Everafter_Studio
 */

get_header();
?>

<main id="primary" class="site-main">

	<div class="page-banner" style="background-color: var(--color-charcoal); color: var(--color-ivory); padding: 9rem 0 5rem 0; text-align: center;">
		<div class="container container-narrow">
			<?php everafter_breadcrumbs(); ?>
			<span class="kicker" style="color: var(--color-champagne); margin-top: 1rem;"><?php esc_html_e( 'Commissions & Coverage', 'everafter-studio' ); ?></span>
			<h1 style="color: var(--color-ivory); margin-bottom: 1.5rem;"><?php the_title(); ?></h1>
			<p style="color: rgba(247, 244, 239, 0.8); font-size: 1.15rem; max-width: 680px; margin: 0 auto;">
				<?php esc_html_e( 'Bespoke photographic collections and cinematic films crafted with timeless devotion, discretion, and fine-art mastery.', 'everafter-studio' ); ?>
			</p>
		</div>
	</div>

	<?php get_template_part( 'template-parts/services' ); ?>

	<!-- Detailed Deliverables & Standards -->
	<section style="background-color: var(--color-ivory); padding: 7rem 0;">
		<div class="container">
			<div class="section-header" style="text-align: center; margin-bottom: 5rem;">
				<span class="kicker"><?php esc_html_e( 'The Everafter Standard', 'everafter-studio' ); ?></span>
				<h2><?php esc_html_e( 'What Every Commission Encompasses', 'everafter-studio' ); ?></h2>
			</div>

			<div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 3rem;">
				<div style="border-top: 1px solid var(--color-border); padding-top: 2rem;">
					<h3 style="font-size: 1.4rem; margin-bottom: 1rem;"><?php esc_html_e( 'Analog Film & Digital Harmony', 'everafter-studio' ); ?></h3>
					<p style="font-size: 0.95rem; color: var(--color-charcoal-light);">
						<?php esc_html_e( 'We pair the irreplaceable luminosity and skin tones of medium-format color negative film with the precision of modern low-light cinema cameras.', 'everafter-studio' ); ?>
					</p>
				</div>

				<div style="border-top: 1px solid var(--color-border); padding-top: 2rem;">
					<h3 style="font-size: 1.4rem; margin-bottom: 1rem;"><?php esc_html_e( 'Seamless Production Logistics', 'everafter-studio' ); ?></h3>
					<p style="font-size: 0.95rem; color: var(--color-charcoal-light);">
						<?php esc_html_e( 'All international travel itineraries, visa compliances, and drone airspace permits are coordinated directly with your wedding planning team.', 'everafter-studio' ); ?>
					</p>
				</div>

				<div style="border-top: 1px solid var(--color-border); padding-top: 2rem;">
					<h3 style="font-size: 1.4rem; margin-bottom: 1rem;"><?php esc_html_e( 'Private Digital Archive & Prints', 'everafter-studio' ); ?></h3>
					<p style="font-size: 0.95rem; color: var(--color-charcoal-light);">
						<?php esc_html_e( 'High-resolution, unwatermarked digital masters hosted in a password-protected online viewing vault with permanent cloud backup redundancy.', 'everafter-studio' ); ?>
					</p>
				</div>
			</div>
		</div>
	</section>

	<?php get_template_part( 'template-parts/cta' ); ?>

</main>

<?php
get_footer();
