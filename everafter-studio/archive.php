<?php
/**
 * The template for displaying archive pages
 *
 * @package Everafter_Studio
 */

get_header();
?>

<main id="primary" class="site-main">

	<div class="page-banner" style="background-color: var(--color-charcoal); color: var(--color-ivory); padding: 9rem 0 5rem 0; text-align: center;">
		<div class="container container-narrow">
			<?php everafter_breadcrumbs(); ?>
			<span class="kicker" style="color: var(--color-champagne); margin-top: 1rem;"><?php esc_html_e( 'Archive Collection', 'everafter-studio' ); ?></span>
			<?php
			the_archive_title( '<h1 style="color: var(--color-ivory); margin: 0.5rem 0 1rem 0;">', '</h1>' );
			the_archive_description( '<div class="archive-description" style="color: rgba(247, 244, 239, 0.8); font-size: 1.05rem;">', '</div>' );
			?>
		</div>
	</div>

	<div class="archive-content-wrap" style="background-color: var(--color-ivory); padding: 6rem 0;">
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
