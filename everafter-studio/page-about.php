<?php
/**
 * Template Name: About Us
 *
 * @package Everafter_Studio
 */

get_header();
?>

<main id="primary" class="site-main">

	<div class="page-banner" style="background-color: var(--color-charcoal); color: var(--color-ivory); padding: 9rem 0 5rem 0; text-align: center;">
		<div class="container container-narrow">
			<?php everafter_breadcrumbs(); ?>
			<span class="kicker" style="color: var(--color-champagne); margin-top: 1rem;"><?php esc_html_e( 'The Atelier', 'everafter-studio' ); ?></span>
			<h1 style="color: var(--color-ivory); margin-bottom: 1.5rem;"><?php the_title(); ?></h1>
			<p style="color: rgba(247, 244, 239, 0.8); font-size: 1.15rem; max-width: 680px; margin: 0 auto;">
				<?php esc_html_e( 'We document transcendent celebrations of love with the refined eye of high-fashion editorial and the profound heart of fine art cinema.', 'everafter-studio' ); ?>
			</p>
		</div>
	</div>

	<section class="about-narrative" style="background-color: var(--color-ivory);">
		<div class="container">
			<div class="intro-grid" style="margin-bottom: 6rem;">
				<div class="intro-text">
					<span class="kicker"><?php esc_html_e( 'Our Foundation', 'everafter-studio' ); ?></span>
					<h2><?php esc_html_e( 'Ten Years of Preserving Intimate European Legacies', 'everafter-studio' ); ?></h2>
					<p class="lead">
						<?php esc_html_e( 'We believe a wedding photograph is not merely a record of how things looked—it is an indelible vessel of how it felt to be there.', 'everafter-studio' ); ?>
					</p>
					<p>
						<?php esc_html_e( 'Founded in 2016 by international fine art photographer Julian Vance, Everafter Studio has grown into a boutique atelier of master cinematographers and analog film purists. We partner with discerning couples and global wedding planners to produce imagery of rare quiet grace and unmistakable luxury.', 'everafter-studio' ); ?>
					</p>
					<p>
						<?php esc_html_e( 'Our aesthetic is defined by architectural composition, authentic natural light, and the organic grain of Kodak Portra film. We shun artificial posing in favor of intuitive, responsive connection.', 'everafter-studio' ); ?>
					</p>
				</div>
				<div class="intro-image-frame">
					<img src="<?php echo esc_url( everafter_get_fallback_image( 'portfolio-1' ) ); ?>" alt="<?php esc_attr_e( 'Everafter Studio Creative Direction', 'everafter-studio' ); ?>" loading="lazy" />
				</div>
			</div>

			<!-- Team Section -->
			<div class="section-header" style="text-align: center; margin-bottom: 4rem;">
				<span class="kicker"><?php esc_html_e( 'The Artists', 'everafter-studio' ); ?></span>
				<h2><?php esc_html_e( 'Our Creative Directors', 'everafter-studio' ); ?></h2>
			</div>

			<div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 2.5rem; margin-bottom: 6rem;">
				<!-- Artist 1 -->
				<div style="background: #fff; border: 1px solid var(--color-border); padding: 2rem; text-align: center;">
					<div style="width: 140px; height: 140px; margin: 0 auto 1.5rem auto; border-radius: 50%; overflow: hidden;">
						<img src="<?php echo esc_url( everafter_get_fallback_image( 'destination' ) ); ?>" alt="Julian Vance" style="width: 100%; height: 100%; object-fit: cover;" />
					</div>
					<h3 style="font-size: 1.4rem; margin-bottom: 0.35rem;">Julian Vance</h3>
					<div style="font-size: 0.8rem; color: var(--color-soft-gold); letter-spacing: 0.15em; text-transform: uppercase; margin-bottom: 1rem;">
						<?php esc_html_e( 'Founder & Lead Photographer', 'everafter-studio' ); ?>
					</div>
					<p style="font-size: 0.95rem; color: var(--color-charcoal-light);">
						<?php esc_html_e( 'Trained in Milanese fashion editorial and analog photographic chemistry, Julian oversees principal wedding commissions worldwide.', 'everafter-studio' ); ?>
					</p>
				</div>

				<!-- Artist 2 -->
				<div style="background: #fff; border: 1px solid var(--color-border); padding: 2rem; text-align: center;">
					<div style="width: 140px; height: 140px; margin: 0 auto 1.5rem auto; border-radius: 50%; overflow: hidden;">
						<img src="<?php echo esc_url( everafter_get_fallback_image( 'hero' ) ); ?>" alt="Sofia Marchetti" style="width: 100%; height: 100%; object-fit: cover;" />
					</div>
					<h3 style="font-size: 1.4rem; margin-bottom: 0.35rem;">Sofia Marchetti</h3>
					<div style="font-size: 0.8rem; color: var(--color-soft-gold); letter-spacing: 0.15em; text-transform: uppercase; margin-bottom: 1rem;">
						<?php esc_html_e( 'Director of Cinematography', 'everafter-studio' ); ?>
					</div>
					<p style="font-size: 0.95rem; color: var(--color-charcoal-light);">
						<?php esc_html_e( 'Former narrative filmmaker with festival credits, crafting cinematic wedding films shot exclusively on prime cinema glass.', 'everafter-studio' ); ?>
					</p>
				</div>

				<!-- Artist 3 -->
				<div style="background: #fff; border: 1px solid var(--color-border); padding: 2rem; text-align: center;">
					<div style="width: 140px; height: 140px; margin: 0 auto 1.5rem auto; border-radius: 50%; overflow: hidden;">
						<img src="<?php echo esc_url( everafter_get_fallback_image( 'film' ) ); ?>" alt="Henri Delacroix" style="width: 100%; height: 100%; object-fit: cover;" />
					</div>
					<h3 style="font-size: 1.4rem; margin-bottom: 0.35rem;">Henri Delacroix</h3>
					<div style="font-size: 0.8rem; color: var(--color-soft-gold); letter-spacing: 0.15em; text-transform: uppercase; margin-bottom: 1rem;">
						<?php esc_html_e( 'Master Colorist & Printmaker', 'everafter-studio' ); ?>
					</div>
					<p style="font-size: 0.95rem; color: var(--color-charcoal-light);">
						<?php esc_html_e( 'Dedicated fine-art master curator who hand-tunes individual frames and supervises custom Italian leather bookbinding.', 'everafter-studio' ); ?>
					</p>
				</div>
			</div>

			<!-- Core Principles Strip -->
			<div style="background: var(--color-charcoal); color: var(--color-ivory); padding: 4rem; display: grid; grid-template-columns: repeat(3, 1fr); gap: 3rem; text-align: center;">
				<div>
					<div style="font-family: var(--font-serif); font-size: 2.5rem; color: var(--color-champagne); margin-bottom: 0.5rem;">25</div>
					<div style="font-size: 0.75rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--color-soft-gold); margin-bottom: 0.5rem;"><?php esc_html_e( 'Annual Limit', 'everafter-studio' ); ?></div>
					<p style="font-size: 0.9rem; color: rgba(247, 244, 239, 0.7);"><?php esc_html_e( 'Strictly limited commissions to ensure uncompromising devotion to every story.', 'everafter-studio' ); ?></p>
				</div>
				<div>
					<div style="font-family: var(--font-serif); font-size: 2.5rem; color: var(--color-champagne); margin-bottom: 0.5rem;">100%</div>
					<div style="font-size: 0.75rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--color-soft-gold); margin-bottom: 0.5rem;"><?php esc_html_e( 'Archival Integrity', 'everafter-studio' ); ?></div>
					<p style="font-size: 0.9rem; color: rgba(247, 244, 239, 0.7);"><?php esc_html_e( 'Master color science and museum-grade hand-bound print production.', 'everafter-studio' ); ?></p>
				</div>
				<div>
					<div style="font-family: var(--font-serif); font-size: 2.5rem; color: var(--color-champagne); margin-bottom: 0.5rem;">14+</div>
					<div style="font-size: 0.75rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--color-soft-gold); margin-bottom: 0.5rem;"><?php esc_html_e( 'Countries', 'everafter-studio' ); ?></div>
					<p style="font-size: 0.9rem; color: rgba(247, 244, 239, 0.7);"><?php esc_html_e( 'Seamless destination production experience across Europe and beyond.', 'everafter-studio' ); ?></p>
				</div>
			</div>
		</div>
	</section>

	<?php get_template_part( 'template-parts/cta' ); ?>

</main>

<?php
get_footer();
