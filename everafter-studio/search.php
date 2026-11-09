<?php
/**
 * The template for displaying search results pages
 *
 * @package Everafter_Studio
 */

get_header();
?>

<main id="primary" class="site-main">

	<div class="page-banner" style="background-color: var(--color-charcoal); color: var(--color-ivory); padding: 9rem 0 5rem 0; text-align: center;">
		<div class="container container-narrow">
			<?php everafter_breadcrumbs(); ?>
			<span class="kicker" style="color: var(--color-champagne); margin-top: 1rem;"><?php esc_html_e( 'Search Inquiries', 'everafter-studio' ); ?></span>
			<h1 style="color: var(--color-ivory); margin: 0.5rem 0 1rem 0;">
				<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Results for: %s', 'everafter-studio' ), '<span>' . esc_html( get_search_query() ) . '</span>' );
				?>
			</h1>
		</div>
	</div>

	<div class="search-results-wrap" style="background-color: var(--color-ivory); padding: 6rem 0;">
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
