<?php
/**
 * The template for displaying the luxury editorial homepage
 *
 * @package Everafter_Studio
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php
	// 1. Hero Section
	get_template_part( 'template-parts/hero' );

	// 2. Introduction & Philosophy
	get_template_part( 'template-parts/intro' );

	// 3. Featured Portfolio
	get_template_part( 'template-parts/portfolio' );
	?>

	<!-- 4. Featured Wedding Stories -->
	<section class="stories-section" id="stories">
		<div class="container">
			<div class="section-header">
				<span class="kicker"><?php esc_html_e( 'Real Celebrations', 'everafter-studio' ); ?></span>
				<h2><?php esc_html_e( 'Selected Wedding Stories', 'everafter-studio' ); ?></h2>
				<p>
					<?php esc_html_e( 'Deeply personal narratives captured through analog medium format and cinematic visual storytelling.', 'everafter-studio' ); ?>
				</p>
			</div>

			<?php
			$stories_query = new WP_Query(
				array(
					'post_type'      => 'wedding_story',
					'posts_per_page' => 3,
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
					$thumb    = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : everafter_get_fallback_image( 'destination' );
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
								<?php esc_html_e( 'View Full Story Gallery &rarr;', 'everafter-studio' ); ?>
							</a>
						</div>
					</div>
					<?php
				endwhile;
				wp_reset_postdata();
			else :
				// Curated fallback stories matching demo luxury content
				?>
				<!-- Fallback Story 1 -->
				<div class="story-row">
					<div class="story-image-wrap">
						<img src="<?php echo esc_url( everafter_get_fallback_image( 'hero' ) ); ?>" alt="Elena & Matteo" loading="lazy" style="width:100%; height:480px; object-fit:cover; border-radius:2px;" />
					</div>
					<div class="story-text">
						<div class="story-meta">
							<span><?php esc_html_e( 'Lake Como, Italy', 'everafter-studio' ); ?></span>
							<span class="separator">·</span>
							<span><?php esc_html_e( 'September Season', 'everafter-studio' ); ?></span>
						</div>
						<h3 style="font-size: clamp(2rem, 3.5vw, 2.75rem); margin-bottom: 1.25rem;">
							Elena &amp; Matteo — Villa Balbiano
						</h3>
						<p style="margin-bottom: 1.5rem; color: var(--color-charcoal-light);">
							<?php esc_html_e( 'An intimate dusk celebration overlooking the alpine calm of Lake Como. From quiet veil adjustments in neoclassical suites to a champagne toast beneath century-old cypress trees, every frame embraced analog romance.', 'everafter-studio' ); ?>
						</p>
						<div style="font-size: 0.8rem; color: var(--color-soft-gold); letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 1.75rem;">
							<?php esc_html_e( 'Medium: Contax 645 · Kodak Portra 400 · Arri 35', 'everafter-studio' ); ?>
						</div>
						<a href="#inquire" class="btn-luxury btn-outline-dark">
							<?php esc_html_e( 'Inquire For Lake Como Dates &rarr;', 'everafter-studio' ); ?>
						</a>
					</div>
				</div>

				<!-- Fallback Story 2 -->
				<div class="story-row">
					<div class="story-image-wrap">
						<img src="<?php echo esc_url( everafter_get_fallback_image( 'destination' ) ); ?>" alt="Camille & Alexandre" loading="lazy" style="width:100%; height:480px; object-fit:cover; border-radius:2px;" />
					</div>
					<div class="story-text">
						<div class="story-meta">
							<span><?php esc_html_e( 'Provence, France', 'everafter-studio' ); ?></span>
							<span class="separator">·</span>
							<span><?php esc_html_e( 'Summer Celebration', 'everafter-studio' ); ?></span>
						</div>
						<h3 style="font-size: clamp(2rem, 3.5vw, 2.75rem); margin-bottom: 1.25rem;">
							Camille &amp; Alexandre — Château de Tourreau
						</h3>
						<p style="margin-bottom: 1.5rem; color: var(--color-charcoal-light);">
							<?php esc_html_e( 'Sun-drenched limestone courtyards, olive branch bouquets, and candlelit courtyard toasts lasting deep into the warm Provencal evening. A masterclass in relaxed French elegance.', 'everafter-studio' ); ?>
						</p>
						<div style="font-size: 0.8rem; color: var(--color-soft-gold); letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 1.75rem;">
							<?php esc_html_e( 'Medium: Leica M11 · 35mm Summilux · Tri-X 400', 'everafter-studio' ); ?>
						</div>
						<a href="#inquire" class="btn-luxury btn-outline-dark">
							<?php esc_html_e( 'Inquire For French Riviera Dates &rarr;', 'everafter-studio' ); ?>
						</a>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>

	<?php
	// 5. Services Section
	get_template_part( 'template-parts/services' );

	// 6. Testimonials Section
	get_template_part( 'template-parts/testimonials' );
	?>

	<!-- 7. Inquiries & Date Reservation Form -->
	<section class="contact-form-section" id="inquire">
		<div class="container container-narrow">
			<div class="section-header" style="margin-bottom: 3rem;">
				<span class="kicker"><?php esc_html_e( 'Reserve Your Date', 'everafter-studio' ); ?></span>
				<h2><?php esc_html_e( 'Inquire for Your Celebration', 'everafter-studio' ); ?></h2>
				<p>
					<?php esc_html_e( 'Tell us about your wedding date, destination, and visual vision. Our studio director will review our calendar and reply within 24 to 48 hours.', 'everafter-studio' ); ?>
				</p>
			</div>

			<form id="everafter-inquiry-form" method="post" action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>">
				<?php wp_nonce_field( 'everafter_submit_inquiry_action', 'everafter_inquiry_nonce' ); ?>
				<input type="hidden" name="action" value="everafter_submit_inquiry" />

				<div class="form-grid">
					<div class="form-group">
						<label for="field-full-name"><?php esc_html_e( 'Your Full Names *', 'everafter-studio' ); ?></label>
						<input type="text" id="field-full-name" name="full_name" class="form-control" required placeholder="<?php esc_attr_e( 'Elena Rossi & Matteo Bianchi', 'everafter-studio' ); ?>" />
					</div>

					<div class="form-group">
						<label for="field-email"><?php esc_html_e( 'Email Address *', 'everafter-studio' ); ?></label>
						<input type="email" id="field-email" name="email" class="form-control" required placeholder="<?php esc_attr_e( 'elena@example.com', 'everafter-studio' ); ?>" />
					</div>

					<div class="form-group">
						<label for="field-phone"><?php esc_html_e( 'Phone / WhatsApp', 'everafter-studio' ); ?></label>
						<input type="tel" id="field-phone" name="phone" class="form-control" placeholder="<?php esc_attr_e( '+1 (555) 000-0000', 'everafter-studio' ); ?>" />
					</div>

					<div class="form-group">
						<label for="field-date"><?php esc_html_e( 'Wedding Date / Season *', 'everafter-studio' ); ?></label>
						<input type="text" id="field-date" name="wedding_date" class="form-control" required placeholder="<?php esc_attr_e( 'September 18, 2026', 'everafter-studio' ); ?>" />
					</div>

					<div class="form-group">
						<label for="field-location"><?php esc_html_e( 'Wedding Destination / Venue *', 'everafter-studio' ); ?></label>
						<input type="text" id="field-location" name="wedding_location" class="form-control" required placeholder="<?php esc_attr_e( 'Villa Balbiano, Lake Como, Italy', 'everafter-studio' ); ?>" />
					</div>

					<div class="form-group">
						<label for="field-event-type"><?php esc_html_e( 'Event Type / Coverage', 'everafter-studio' ); ?></label>
						<select id="field-event-type" name="event_type" class="form-control">
							<option value="Multi-Day Destination Wedding"><?php esc_html_e( 'Multi-Day Destination Wedding', 'everafter-studio' ); ?></option>
							<option value="Full Day Wedding & Cinematic Film"><?php esc_html_e( 'Full Day Wedding & Cinematic Film', 'everafter-studio' ); ?></option>
							<option value="Wedding Photography Only"><?php esc_html_e( 'Wedding Photography Only', 'everafter-studio' ); ?></option>
							<option value="Intimate Elopement"><?php esc_html_e( 'Intimate Elopement', 'everafter-studio' ); ?></option>
							<option value="Pre-Wedding / Editorial Session"><?php esc_html_e( 'Pre-Wedding / Editorial Session', 'everafter-studio' ); ?></option>
						</select>
					</div>

					<div class="form-group full-width">
						<label for="field-guests"><?php esc_html_e( 'Estimated Guest Count', 'everafter-studio' ); ?></label>
						<input type="number" id="field-guests" name="guest_count" class="form-control" min="1" max="1000" placeholder="<?php esc_attr_e( 'e.g. 120', 'everafter-studio' ); ?>" />
					</div>

					<div class="form-group full-width">
						<label for="field-message"><?php esc_html_e( 'Tell Us About Your Vision *', 'everafter-studio' ); ?></label>
						<textarea id="field-message" name="message" class="form-control" required placeholder="<?php esc_attr_e( 'Share details regarding your celebration, aesthetic preferences, planner, and any questions you have for our studio...', 'everafter-studio' ); ?>"></textarea>
					</div>
				</div>

				<div style="margin-top: 2rem; text-align: center;">
					<button type="submit" class="btn-luxury btn-primary" style="min-width: 260px;">
						<?php esc_html_e( 'Submit Studio Inquiry', 'everafter-studio' ); ?>
					</button>
				</div>

				<div id="form-feedback" class="form-feedback" role="alert"></div>
			</form>
		</div>
	</section>

	<?php
	// 8. Final Call to Action
	get_template_part( 'template-parts/cta' );
	?>

</main>

<?php
get_footer();
