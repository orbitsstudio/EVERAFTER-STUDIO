<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @package Everafter_Studio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="no-results not-found" style="text-align: center; padding: 5rem 0;">
	<header class="page-header" style="margin-bottom: 2rem;">
		<span class="kicker"><?php esc_html_e( 'No Entries Found', 'everafter-studio' ); ?></span>
		<h1 class="page-title" style="font-size: 2.5rem;"><?php esc_html_e( 'Nothing Was Discovered', 'everafter-studio' ); ?></h1>
	</header>

	<div class="page-content" style="max-width: 600px; margin: 0 auto;">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			<p>
				<?php
				printf(
					wp_kses(
						/* translators: 1: link to WP admin new post page. */
						__( 'Ready to publish your first editorial wedding story? <a href="%1$s">Get started here</a>.', 'everafter-studio' ),
						array(
							'a' => array(
								'href' => array(),
							),
						)
					),
					esc_url( admin_url( 'post-new.php' ) )
				);
				?>
			</p>
		<?php elseif ( is_search() ) : ?>
			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'everafter-studio' ); ?></p>
			<div style="margin-top: 2rem;">
				<?php get_search_form(); ?>
			</div>
		<?php else : ?>
			<p><?php esc_html_e( 'It seems we cannot find what you are looking for. Perhaps searching can help.', 'everafter-studio' ); ?></p>
			<div style="margin-top: 2rem;">
				<?php get_search_form(); ?>
			</div>
		<?php endif; ?>
	</div>
</section>
