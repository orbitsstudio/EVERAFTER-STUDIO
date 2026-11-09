<?php
/**
 * The template for displaying all regular pages
 *
 * @package Everafter_Studio
 */

get_header();
?>

<main id="primary" class="site-main">

	<div class="page-banner" style="background-color: var(--color-charcoal); color: var(--color-ivory); padding: 9rem 0 5rem 0; text-align: center;">
		<div class="container container-narrow">
			<?php everafter_breadcrumbs(); ?>
			<h1 style="color: var(--color-ivory); margin-top: 1rem;"><?php the_title(); ?></h1>
		</div>
	</div>

	<div class="page-content-wrap" style="background-color: var(--color-ivory); padding: 5rem 0;">
		<div class="container container-narrow">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
