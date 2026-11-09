<?php
/**
 * The template for displaying comments
 *
 * @package Everafter_Studio
 */

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area" style="margin-top: 4rem; padding-top: 3rem; border-top: 1px solid var(--color-border);">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title" style="font-size: 1.8rem; margin-bottom: 2rem;">
			<?php
			$everafter_comment_count = get_comments_number();
			if ( '1' === $everafter_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One Note on &ldquo;%1$s&rdquo;', 'everafter-studio' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf(
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s Note on &ldquo;%2$s&rdquo;', '%1$s Notes on &ldquo;%2$s&rdquo;', $everafter_comment_count, 'comments title', 'everafter-studio' ) ),
					number_format_i18n( $everafter_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h2>

		<ol class="comment-list" style="list-style: none; padding: 0; margin-bottom: 3rem;">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size' => 48,
				)
			);
			?>
		</ol>

		<?php
		the_comments_navigation();

		if ( ! comments_open() ) :
			?>
			<p class="no-comments" style="font-style: italic; color: var(--color-muted);"><?php esc_html_e( 'Comments are closed for this entry.', 'everafter-studio' ); ?></p>
			<?php
		endif;

	endif;

	comment_form(
		array(
			'class_submit'  => 'btn-luxury btn-primary',
			'title_reply'   => esc_html__( 'Leave a Note', 'everafter-studio' ),
			'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun', 'everafter-studio' ) . '</label> <textarea id="comment" name="comment" cols="45" rows="5" class="form-control" required></textarea></p>',
		)
	);
	?>

</div><!-- #comments -->
