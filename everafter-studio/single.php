<?php
/**
 * The template for displaying all single blog posts
 *
 * @package Everafter_Studio
 */

get_header();
?>

<main id="primary" class="site-main">

	<div class="page-banner" style="background-color: var(--color-charcoal); color: var(--color-ivory); padding: 9rem 0 5rem 0; text-align: center;">
		<div class="container container-narrow">
			<?php everafter_breadcrumbs(); ?>
			<div style="font-size: 0.8rem; letter-spacing: 0.15em; text-transform: uppercase; color: var(--color-champagne); margin-top: 1rem;">
				<?php everafter_posted_on(); ?>
				<span style="margin: 0 0.5rem;">·</span>
				<?php printf( esc_html__( '%d min read', 'everafter-studio' ), everafter_reading_time() ); ?>
			</div>
			<h1 style="color: var(--color-ivory); margin: 1rem 0;"><?php the_title(); ?></h1>
			<div style="color: rgba(247, 244, 239, 0.7); font-size: 0.9rem;">
				<?php everafter_posted_by(); ?>
			</div>
		</div>
	</div>

	<div class="single-post-wrap" style="background-color: var(--color-ivory); padding: 5rem 0;">
		<div class="container container-narrow">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="post-featured-image" style="margin-bottom: 3.5rem;">
							<?php the_post_thumbnail( 'full', array( 'style' => 'width:100%; border-radius:2px;' ) ); ?>
						</div>
					<?php endif; ?>

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

					<footer class="entry-footer" style="margin-top: 4rem; padding-top: 2rem; border-top: 1px solid var(--color-border); font-size: 0.85rem; color: var(--color-muted);">
						<?php
						$categories_list = get_the_category_list( esc_html__( ', ', 'everafter-studio' ) );
						if ( $categories_list ) {
							/* translators: 1: list of categories. */
							printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'everafter-studio' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						}

						$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'everafter-studio' ) );
						if ( $tags_list ) {
							/* translators: 1: list of tags. */
							printf( '<span class="tags-links" style="margin-left: 1.5rem;">' . esc_html__( 'Tagged %1$s', 'everafter-studio' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						}
						?>
					</footer>

					<nav class="navigation post-navigation" style="margin-top: 3rem; display: flex; justify-content: space-between;">
						<div class="nav-previous">
							<?php previous_post_link( '%link', '&larr; %title' ); ?>
						</div>
						<div class="nav-next">
							<?php next_post_link( '%link', '%title &rarr;' ); ?>
						</div>
					</nav>

					<?php
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>
				</article>
				<?php
			endwhile;
			?>
		</div>
	</div>

</main>

<?php
get_footer();
