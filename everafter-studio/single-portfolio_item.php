<?php
/**
 * The template for displaying single Portfolio Items
 *
 * @package Everafter_Studio
 */

get_header();

$location  = get_post_meta( get_the_ID(), '_everafter_location', true );
$film_gear = get_post_meta( get_the_ID(), '_everafter_film_gear', true );
$img_url   = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : everafter_get_fallback_image( 'portfolio-1' );
?>

<main id="primary" class="site-main">

	<div class="page-banner" style="background-color: var(--color-charcoal); color: var(--color-ivory); padding: 9rem 0 5rem 0; text-align: center;">
		<div class="container container-narrow">
			<?php everafter_breadcrumbs(); ?>
			<?php if ( $location ) : ?>
				<span class="kicker" style="color: var(--color-champagne); margin-top: 1rem;"><?php echo esc_html( $location ); ?></span>
			<?php endif; ?>
			<h1 style="color: var(--color-ivory); margin-bottom: 1rem;"><?php the_title(); ?></h1>
			<?php if ( $film_gear ) : ?>
				<div style="font-size: 0.85rem; letter-spacing: 0.15em; text-transform: uppercase; color: rgba(247, 244, 239, 0.75);">
					<?php echo esc_html( $film_gear ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="background-color: var(--color-ivory); padding: 5rem 0;">
		<div class="container container-narrow">
			<div data-lightbox="true" data-full-img="<?php echo esc_url( $img_url ); ?>" data-title="<?php the_title_attribute(); ?>" style="margin-bottom: 3.5rem; cursor: pointer;">
				<img src="<?php echo esc_url( $img_url ); ?>" alt="<?php the_title_attribute(); ?>" style="width: 100%; border-radius: 2px; box-shadow: 0 15px 40px rgba(0,0,0,0.06);" />
			</div>

			<div class="entry-content" style="font-size: 1.15rem; line-height: 1.9; color: var(--color-charcoal-light);">
				<?php the_content(); ?>
			</div>

			<div style="margin-top: 4rem; text-align: center; border-top: 1px solid var(--color-border); padding-top: 3rem;">
				<a href="<?php echo esc_url( home_url( '/#portfolio' ) ); ?>" class="btn-luxury btn-outline-dark">
					<?php esc_html_e( '&larr; Back to Portfolio Gallery', 'everafter-studio' ); ?>
				</a>
			</div>
		</div>
	</article>

	<?php get_template_part( 'template-parts/cta' ); ?>

</main>

<?php
get_footer();
