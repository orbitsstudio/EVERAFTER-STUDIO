<?php
/**
 * Template Name: Wedding Stories
 *
 * @package Everafter_Studio
 */

get_header();
?>

<main id="primary" class="site-main">

	<div class="page-banner" style="background-color: var(--color-charcoal); color: var(--color-ivory); padding: 9rem 0 5rem 0; text-align: center;">
		<div class="container container-narrow">
			<?php everafter_breadcrumbs(); ?>
			<span class="kicker" style="color: var(--color-champagne); margin-top: 1rem;"><?php esc_html_e( 'Journal & Retrospectives', 'everafter-studio' ); ?></span>
			<h1 style="color: var(--color-ivory); margin-bottom: 1.5rem;"><?php the_title(); ?></h1>
			<p style="color: rgba(247, 244, 239, 0.8); font-size: 1.15rem; max-width: 680px; margin: 0 auto;">
				<?php esc_html_e( 'Every celebration is a private universe. Explore our full editorial story monographs from across Europe and the world.', 'everafter-studio' ); ?>
			</p>
		</div>
	</div>

	<section class="stories-archive" style="background-color: var(--color-ivory); padding: 6rem 0;">
		<div class="container">
			<?php
			$paged         = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$stories_query = new WP_Query(
				array(
					'post_type'      => 'wedding_story',
					'posts_per_page' => 6,
					'paged'          => $paged,
					'post_status'    => 'publish',
				)
			);

			if ( $stories_query->have_posts() ) :
				while ( $stories_query->have_posts() ) :
					$stories_query->the_post();
					$couple   = get_post_meta( get_the_ID(), '_everafter_couple_names', true );
					$location = get_post_meta( get_the_ID(), '_everafter_location', true );
					$season   = get_post_meta( get_the_ID(), '_everafter_wedding_date', true );
					$gear     = get_post_meta( get_the_ID(), '_everafter_film_gear', true );
					$thumb    = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : everafter_get_fallback_image( 'hero' );
					?>
					<div class="story-row">
						<div class="story-image-wrap">
							<a href="<?php the_permalink(); ?>">
								<img src="<?php echo esc_url( $thumb ); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" style="width:100%; height:480px; object-fit:cover; border-radius:2px;" />
							</a>
						</div>
						<div class="story-text">
							<div class="story-meta">
								<span><?php echo esc_html( $location ? $location : 'Destination' ); ?></span>
								<span class="separator">·</span>
								<span><?php echo esc_html( $season ? $season : 'Season' ); ?></span>
							</div>
							<h3 style="font-size: clamp(2rem, 3.5vw, 2.75rem); margin-bottom: 1.25rem;">
								<a href="<?php the_permalink(); ?>">
									<?php echo esc_html( $couple ? $couple : get_the_title() ); ?>
								</a>
							</h3>
							<div style="margin-bottom: 1.75rem; color: var(--color-charcoal-light); font-size: 1.05rem;">
								<?php the_excerpt(); ?>
							</div>
							<?php if ( $gear ) : ?>
								<div style="font-size: 0.8rem; color: var(--color-soft-gold); letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 1.75rem;">
									<?php esc_html_e( 'Medium:', 'everafter-studio' ); ?> <?php echo esc_html( $gear ); ?>
								</div>
							<?php endif; ?>
							<a href="<?php the_permalink(); ?>" class="btn-luxury btn-outline-dark">
								<?php esc_html_e( 'Read Complete Story &rarr;', 'everafter-studio' ); ?>
							</a>
						</div>
					</div>
					<?php
				endwhile;

				echo '<div style="margin-top: 4rem; text-align: center;">';
				everafter_pagination();
				echo '</div>';

				wp_reset_postdata();
			else :
				?>
				<!-- Sample Curated Stories -->
				<div class="story-row">
					<div class="story-image-wrap">
						<img src="<?php echo esc_url( everafter_get_fallback_image( 'hero' ) ); ?>" alt="Elena & Matteo" loading="lazy" style="width:100%; height:480px; object-fit:cover;" />
					</div>
					<div class="story-text">
						<div class="story-meta">
							<span><?php esc_html_e( 'Lake Como, Italy', 'everafter-studio' ); ?></span>
							<span class="separator">·</span>
							<span><?php esc_html_e( 'Autumn Celebration', 'everafter-studio' ); ?></span>
						</div>
						<h3 style="font-size: 2.5rem; margin-bottom: 1.25rem;">Elena &amp; Matteo — Villa Balbiano</h3>
						<p style="margin-bottom: 1.5rem; color: var(--color-charcoal-light);">
							<?php esc_html_e( 'An intimate dusk celebration overlooking the alpine calm of Lake Como. From quiet veil adjustments in neoclassical suites to a champagne toast beneath century-old cypress trees, every frame embraced analog romance.', 'everafter-studio' ); ?>
						</p>
						<div style="font-size: 0.8rem; color: var(--color-soft-gold); margin-bottom: 1.5rem;">
							<?php esc_html_e( 'Medium: Contax 645 · Kodak Portra 400 · Arri 35', 'everafter-studio' ); ?>
						</div>
						<a href="<?php echo esc_url( home_url( '/#inquire' ) ); ?>" class="btn-luxury btn-outline-dark">
							<?php esc_html_e( 'Inquire for Similar Dates &rarr;', 'everafter-studio' ); ?>
						</a>
					</div>
				</div>

				<div class="story-row">
					<div class="story-image-wrap">
						<img src="<?php echo esc_url( everafter_get_fallback_image( 'destination' ) ); ?>" alt="Camille & Alexandre" loading="lazy" style="width:100%; height:480px; object-fit:cover;" />
					</div>
					<div class="story-text">
						<div class="story-meta">
							<span><?php esc_html_e( 'Provence, France', 'everafter-studio' ); ?></span>
							<span class="separator">·</span>
							<span><?php esc_html_e( 'Summer Celebration', 'everafter-studio' ); ?></span>
						</div>
						<h3 style="font-size: 2.5rem; margin-bottom: 1.25rem;">Camille &amp; Alexandre — Château de Tourreau</h3>
						<p style="margin-bottom: 1.5rem; color: var(--color-charcoal-light);">
							<?php esc_html_e( 'Sun-drenched limestone courtyards, olive branch bouquets, and candlelit courtyard toasts lasting deep into the warm Provencal evening. A masterclass in relaxed French elegance.', 'everafter-studio' ); ?>
						</p>
						<div style="font-size: 0.8rem; color: var(--color-soft-gold); margin-bottom: 1.5rem;">
							<?php esc_html_e( 'Medium: Leica M11 · 35mm Summilux · Tri-X 400', 'everafter-studio' ); ?>
						</div>
						<a href="<?php echo esc_url( home_url( '/#inquire' ) ); ?>" class="btn-luxury btn-outline-dark">
							<?php esc_html_e( 'Inquire for Similar Dates &rarr;', 'everafter-studio' ); ?>
						</a>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>

	<?php get_template_part( 'template-parts/cta' ); ?>

</main>

<?php
get_footer();
