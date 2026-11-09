<?php
/**
 * Template Name: Portfolio Gallery
 *
 * @package Everafter_Studio
 */

get_header();
?>

<main id="primary" class="site-main">

	<div class="page-banner" style="background-color: var(--color-charcoal); color: var(--color-ivory); padding: 9rem 0 5rem 0; text-align: center;">
		<div class="container container-narrow">
			<?php everafter_breadcrumbs(); ?>
			<span class="kicker" style="color: var(--color-champagne); margin-top: 1rem;"><?php esc_html_e( 'Visual Archives', 'everafter-studio' ); ?></span>
			<h1 style="color: var(--color-ivory); margin-bottom: 1.5rem;"><?php the_title(); ?></h1>
			<p style="color: rgba(247, 244, 239, 0.8); font-size: 1.15rem; max-width: 680px; margin: 0 auto;">
				<?php esc_html_e( 'An expansive curation of destination weddings, bridal couture, intimate elopements, and cinematic film frames.', 'everafter-studio' ); ?>
			</p>
		</div>
	</div>

	<?php get_template_part( 'template-parts/portfolio' ); ?>

	<section style="background-color: var(--color-ivory); padding: 4rem 0 7rem 0; text-align: center;">
		<div class="container container-narrow">
			<h3 style="font-size: 2rem; margin-bottom: 1rem;"><?php esc_html_e( 'Commissioning Everafter Studio', 'everafter-studio' ); ?></h3>
			<p style="margin-bottom: 2.5rem;">
				<?php esc_html_e( 'Looking for custom portfolio decks tailored to your specific wedding venue or destination? Inquire with our studio team for private unlisted galleries.', 'everafter-studio' ); ?>
			</p>
			<a href="<?php echo esc_url( home_url( '/#inquire' ) ); ?>" class="btn-luxury btn-primary">
				<?php esc_html_e( 'Request Private Gallery Deck &rarr;', 'everafter-studio' ); ?>
			</a>
		</div>
	</section>

</main>

<?php
get_footer();
