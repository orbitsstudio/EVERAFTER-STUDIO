<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 *
 * @package Everafter_Studio
 */

get_header();
?>

<main id="primary" class="site-main">

	<div class="page-banner" style="background-color: var(--color-charcoal); color: var(--color-ivory); padding: 9rem 0 5rem 0; text-align: center;">
		<div class="container container-narrow">
			<?php everafter_breadcrumbs(); ?>
			<h1 style="color: var(--color-ivory); margin-top: 1rem;">
				<?php
				if ( is_home() && ! is_front_page() ) :
					single_post_title();
				else :
					bloginfo( 'name' );
				endif;
				?>
			</h1>
		</div>
	</div>

	<div class="index-content-wrap" style="background-color: var(--color-ivory); padding: 5rem 0;">
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
