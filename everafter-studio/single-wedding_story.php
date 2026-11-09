<?php
/**
 * The template for displaying a single Wedding Story post
 *
 * @package Everafter_Studio
 */

get_header();

$couple_names = get_post_meta( get_the_ID(), '_everafter_couple_names', true );
$location     = get_post_meta( get_the_ID(), '_everafter_location', true );
$wedding_date = get_post_meta( get_the_ID(), '_everafter_wedding_date', true );
$film_gear    = get_post_meta( get_the_ID(), '_everafter_film_gear', true );
$video_url    = get_post_meta( get_the_ID(), '_everafter_video_url', true );
$hero_img     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : everafter_get_fallback_image( 'hero' );
?>

<main id="primary" class="site-main">

	<div class="single-story-hero" style="position: relative; min-height: 80vh; display: flex; align-items: flex-end; padding: 6rem 0; background-color: var(--color-charcoal);">
		<img src="<?php echo esc_url( $hero_img ); ?>" alt="<?php the_title_attribute(); ?>" style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; filter: brightness(0.65);" />
		<div style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(24,22,20,0.3) 0%, rgba(24,22,20,0.85) 100%);"></div>

		<div class="container" style="position: relative; z-index: 2; color: var(--color-ivory);">
			<?php everafter_breadcrumbs(); ?>
			<div class="story-meta" style="color: var(--color-champagne); margin-top: 1rem;">
				<span><?php echo esc_html( $location ? $location : 'Destination' ); ?></span>
				<span class="separator">·</span>
				<span><?php echo esc_html( $wedding_date ? $wedding_date : 'Season Celebration' ); ?></span>
			</div>
			<h1 style="color: var(--color-ivory); font-size: clamp(2.5rem, 5vw, 4.5rem); margin-bottom: 1rem;">
				<?php echo esc_html( $couple_names ? $couple_names : get_the_title() ); ?>
			</h1>
			<?php if ( $film_gear ) : ?>
				<div style="font-size: 0.85rem; letter-spacing: 0.15em; text-transform: uppercase; color: rgba(247, 244, 239, 0.75);">
					<?php esc_html_e( 'Visual Medium:', 'everafter-studio' ); ?> <?php echo esc_html( $film_gear ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-story-content' ); ?> style="background-color: var(--color-ivory); padding: 6rem 0;">
		<div class="container container-narrow">
			<div class="entry-content" style="font-size: 1.15rem; line-height: 1.9; color: var(--color-charcoal-light);">
				<?php
				the_content();

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'everafter-studio' ),
						'after'  => '</div>',
					)
				);
				?>
			</div>

			<?php if ( $video_url ) : ?>
				<div style="margin: 4rem 0;">
					<span class="kicker"><?php esc_html_e( 'Cinematic Film', 'everafter-studio' ); ?></span>
					<h3 style="font-size: 1.8rem; margin-bottom: 1.5rem;"><?php esc_html_e( 'The Wedding Film Retrospective', 'everafter-studio' ); ?></h3>
					<div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; background: #000;">
						<?php echo wp_oembed_get( $video_url ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</div>
				</div>
			<?php endif; ?>

			<!-- Story Gallery Lightbox Preview -->
			<div style="margin-top: 5rem; border-top: 1px solid var(--color-border); padding-top: 4rem;">
				<span class="kicker"><?php esc_html_e( 'Visual Anthology', 'everafter-studio' ); ?></span>
				<h3 style="font-size: 2rem; margin-bottom: 2.5rem;"><?php esc_html_e( 'Selected Frames from the Day', 'everafter-studio' ); ?></h3>

				<div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.5rem;">
					<div data-lightbox="true" data-full-img="<?php echo esc_url( everafter_get_fallback_image( 'hero' ) ); ?>" data-title="<?php echo esc_attr( $couple_names ? $couple_names : get_the_title() ); ?> — Ceremony" style="cursor: pointer; overflow: hidden;">
						<img src="<?php echo esc_url( everafter_get_fallback_image( 'hero' ) ); ?>" alt="Ceremony Balustrade" style="width: 100%; height: 320px; object-fit: cover; transition: transform 0.4s ease;" loading="lazy" />
					</div>
					<div data-lightbox="true" data-full-img="<?php echo esc_url( everafter_get_fallback_image( 'portfolio-1' ) ); ?>" data-title="<?php echo esc_attr( $couple_names ? $couple_names : get_the_title() ); ?> — Couture Portrait" style="cursor: pointer; overflow: hidden;">
						<img src="<?php echo esc_url( everafter_get_fallback_image( 'portfolio-1' ) ); ?>" alt="Couture Portrait" style="width: 100%; height: 320px; object-fit: cover; transition: transform 0.4s ease;" loading="lazy" />
					</div>
					<div data-lightbox="true" data-full-img="<?php echo esc_url( everafter_get_fallback_image( 'destination' ) ); ?>" data-title="<?php echo esc_attr( $couple_names ? $couple_names : get_the_title() ); ?> — Candid Sunset" style="cursor: pointer; overflow: hidden;">
						<img src="<?php echo esc_url( everafter_get_fallback_image( 'destination' ) ); ?>" alt="Candid Sunset" style="width: 100%; height: 320px; object-fit: cover; transition: transform 0.4s ease;" loading="lazy" />
					</div>
					<div data-lightbox="true" data-full-img="<?php echo esc_url( everafter_get_fallback_image( 'film' ) ); ?>" data-title="<?php echo esc_attr( $couple_names ? $couple_names : get_the_title() ); ?> — Send-off Drive" style="cursor: pointer; overflow: hidden;">
						<img src="<?php echo esc_url( everafter_get_fallback_image( 'film' ) ); ?>" alt="Send-off Drive" style="width: 100%; height: 320px; object-fit: cover; transition: transform 0.4s ease;" loading="lazy" />
					</div>
				</div>
			</div>

			<!-- Navigation Between Stories -->
			<nav class="navigation post-navigation" style="margin-top: 5rem; padding-top: 2rem; border-top: 1px solid var(--color-border); display: flex; justify-content: space-between;">
				<div class="nav-previous">
					<?php previous_post_link( '%link', '&larr; %title' ); ?>
				</div>
				<div class="nav-next">
					<?php next_post_link( '%link', '%title &rarr;' ); ?>
				</div>
			</nav>
		</div>
	</article>

	<?php get_template_part( 'template-parts/cta' ); ?>

</main>

<?php
get_footer();
