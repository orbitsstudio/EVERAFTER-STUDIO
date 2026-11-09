<?php
/**
 * Template part for displaying posts in blog/archive loop
 *
 * @package Everafter_Studio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'journal-card' ); ?> style="background:#fff; border:1px solid var(--color-border); margin-bottom: 3.5rem; overflow:hidden;">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="journal-thumb" style="max-height: 440px; overflow:hidden;">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'everafter-card', array( 'style' => 'width:100%; height:100%; object-fit:cover;' ) ); ?>
			</a>
		</div>
	<?php endif; ?>

	<div style="padding: 2.5rem;">
		<div style="font-size: 0.8rem; color: var(--color-muted); letter-spacing: 0.14em; text-transform: uppercase; margin-bottom: 0.75rem;">
			<?php everafter_posted_on(); ?>
			<span style="color: var(--color-champagne); margin: 0 0.5rem;">·</span>
			<span><?php printf( esc_html__( '%d min read', 'everafter-studio' ), everafter_reading_time() ); ?></span>
		</div>

		<h2 style="font-size: 2rem; margin-bottom: 1rem;">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h2>

		<div class="entry-summary" style="margin-bottom: 1.5rem; color: var(--color-charcoal-light);">
			<?php the_excerpt(); ?>
		</div>

		<a href="<?php the_permalink(); ?>" class="btn-luxury btn-outline-dark" style="padding: 0.65rem 1.4rem; font-size: 0.75rem;">
			<?php esc_html_e( 'Read Editorial &rarr;', 'everafter-studio' ); ?>
		</a>
	</div>
</article>
