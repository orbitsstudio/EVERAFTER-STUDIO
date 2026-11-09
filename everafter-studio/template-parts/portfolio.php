<?php
/**
 * Template part for Featured Portfolio Gallery
 *
 * @package Everafter_Studio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Fetch categories for filtering
$terms = get_terms(
	array(
		'taxonomy'   => 'portfolio_category',
		'hide_empty' => false,
	)
);

// Fetch custom portfolio items if published
$portfolio_query = new WP_Query(
	array(
		'post_type'      => 'portfolio_item',
		'posts_per_page' => 6,
		'post_status'    => 'publish',
	)
);
?>

<section class="portfolio-section" id="portfolio">
	<div class="container">
		<div class="section-header">
			<span class="kicker"><?php esc_html_e( 'Selected Works', 'everafter-studio' ); ?></span>
			<h2><?php esc_html_e( 'A Curated Portfolio of Love & Light', 'everafter-studio' ); ?></h2>
			<p>
				<?php esc_html_e( 'Captured across private villas, historic estates, and coastal sanctuaries worldwide.', 'everafter-studio' ); ?>
			</p>
		</div>

		<!-- Interactive Category Filter -->
		<div class="portfolio-filter">
			<button class="filter-btn active" data-filter="all"><?php esc_html_e( 'All Works', 'everafter-studio' ); ?></button>
			<button class="filter-btn" data-filter="destination"><?php esc_html_e( 'Destination', 'everafter-studio' ); ?></button>
			<button class="filter-btn" data-filter="editorial"><?php esc_html_e( 'Editorial Bridal', 'everafter-studio' ); ?></button>
			<button class="filter-btn" data-filter="cinema"><?php esc_html_e( 'Cinematic Films', 'everafter-studio' ); ?></button>
		</div>

		<!-- Portfolio Grid -->
		<div class="portfolio-grid">
			<?php
			if ( $portfolio_query->have_posts() ) :
				$index = 0;
				$col_classes = array( 'col-8', 'col-4', 'col-4', 'col-8', 'col-6', 'col-6' );
				while ( $portfolio_query->have_posts() ) :
					$portfolio_query->the_post();
					$col_class = isset( $col_classes[ $index % count( $col_classes ) ] ) ? $col_classes[ $index % count( $col_classes ) ] : 'col-6';
					$location  = get_post_meta( get_the_ID(), '_everafter_location', true );
					$img_url   = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : everafter_get_fallback_image( 'portfolio-1' );
					?>
					<div class="portfolio-card <?php echo esc_attr( $col_class ); ?>" data-category="destination editorial" data-lightbox="true" data-full-img="<?php echo esc_url( $img_url ); ?>" data-title="<?php the_title_attribute(); ?>">
						<div class="portfolio-thumb-wrapper">
							<img src="<?php echo esc_url( $img_url ); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" />
							<div class="portfolio-info">
								<?php if ( $location ) : ?>
									<span class="portfolio-location"><?php echo esc_html( $location ); ?></span>
								<?php endif; ?>
								<h3 class="portfolio-title"><?php the_title(); ?></h3>
							</div>
						</div>
					</div>
					<?php
					$index++;
				endwhile;
				wp_reset_postdata();
			else :
				// Curated fallback showcase ensuring immediate luxury visual presentation
				?>
				<!-- Card 1 (Large 8-col) -->
				<div class="portfolio-card col-8" data-category="destination cinema" data-lightbox="true" data-full-img="<?php echo esc_url( everafter_get_fallback_image( 'hero' ) ); ?>" data-title="Sunset Balustrade Over Lake Como">
					<div class="portfolio-thumb-wrapper">
						<img src="<?php echo esc_url( everafter_get_fallback_image( 'hero' ) ); ?>" alt="Sunset Balustrade Over Lake Como" loading="lazy" />
						<div class="portfolio-info">
							<span class="portfolio-location"><?php esc_html_e( 'Lake Como, Italy', 'everafter-studio' ); ?></span>
							<h3 class="portfolio-title"><?php esc_html_e( 'Elena & Matteo — Villa Balbiano', 'everafter-studio' ); ?></h3>
						</div>
					</div>
				</div>

				<!-- Card 2 (4-col) -->
				<div class="portfolio-card col-4" data-category="editorial" data-lightbox="true" data-full-img="<?php echo esc_url( everafter_get_fallback_image( 'portfolio-1' ) ); ?>" data-title="Haute Couture Bridal Portrait, Florence">
					<div class="portfolio-thumb-wrapper">
						<img src="<?php echo esc_url( everafter_get_fallback_image( 'portfolio-1' ) ); ?>" alt="Haute Couture Bridal Portrait" loading="lazy" />
						<div class="portfolio-info">
							<span class="portfolio-location"><?php esc_html_e( 'Florence, Italy', 'everafter-studio' ); ?></span>
							<h3 class="portfolio-title"><?php esc_html_e( 'Bridal Couture in Neoclassical Light', 'everafter-studio' ); ?></h3>
						</div>
					</div>
				</div>

				<!-- Card 3 (4-col) -->
				<div class="portfolio-card col-4" data-category="destination" data-lightbox="true" data-full-img="<?php echo esc_url( everafter_get_fallback_image( 'destination' ) ); ?>" data-title="Provencal Stone Courtyard Nuptials">
					<div class="portfolio-thumb-wrapper">
						<img src="<?php echo esc_url( everafter_get_fallback_image( 'destination' ) ); ?>" alt="Provencal Stone Courtyard" loading="lazy" />
						<div class="portfolio-info">
							<span class="portfolio-location"><?php esc_html_e( 'Provence, France', 'everafter-studio' ); ?></span>
							<h3 class="portfolio-title"><?php esc_html_e( 'Camille & Alexandre — Château Romance', 'everafter-studio' ); ?></h3>
						</div>
					</div>
				</div>

				<!-- Card 4 (8-col) -->
				<div class="portfolio-card col-8" data-category="cinema destination" data-lightbox="true" data-full-img="<?php echo esc_url( everafter_get_fallback_image( 'film' ) ); ?>" data-title="Vintage Convertible Along Amalfi Coast">
					<div class="portfolio-thumb-wrapper">
						<img src="<?php echo esc_url( everafter_get_fallback_image( 'film' ) ); ?>" alt="Vintage Convertible Along Amalfi Coast" loading="lazy" />
						<div class="portfolio-info">
							<span class="portfolio-location"><?php esc_html_e( 'Amalfi Coast, Italy', 'everafter-studio' ); ?></span>
							<h3 class="portfolio-title"><?php esc_html_e( 'Cinematic Nuptial Film — Positano Road', 'everafter-studio' ); ?></h3>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
