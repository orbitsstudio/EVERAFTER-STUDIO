<?php
/**
 * The blog posts index template
 *
 * @package Everafter_Studio
 */

get_header();
?>

<main id="primary" class="site-main">

	<div class="page-banner" style="background-color: var(--color-charcoal); color: var(--color-ivory); padding: 9rem 0 5rem 0; text-align: center;">
		<div class="container container-narrow">
			<span class="kicker" style="color: var(--color-champagne);"><?php esc_html_e( 'The Journal', 'everafter-studio' ); ?></span>
			<h1 style="color: var(--color-ivory); margin: 1rem 0;"><?php esc_html_e( 'Wedding Journal & Musings', 'everafter-studio' ); ?></h1>
			<p style="color: rgba(247, 244, 239, 0.8); font-size: 1.1rem; max-width: 600px; margin: 0 auto;">
				<?php esc_html_e( 'Photographic notes, venue scouting perspectives, and wedding planning advice from our creative directors.', 'everafter-studio' ); ?>
			</p>
		</div>
	</div>

	<div class="journal-index-wrap" style="background-color: var(--color-ivory); padding: 6rem 0;">
		<div class="container container-narrow">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', get_post_type() );
				endwhile;

				everafter_pagination();
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>
		</div>
	</div>

</main>

<?php
get_footer();
