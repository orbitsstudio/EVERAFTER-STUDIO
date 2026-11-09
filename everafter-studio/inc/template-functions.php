<?php
/**
 * Functions and template tags for Everafter Studio
 *
 * @package Everafter_Studio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Returns a fallback image URL from the theme's assets directory.
 *
 * @param string $type Image key identifier.
 * @return string Asset image URL.
 */
function everafter_get_fallback_image( $type = 'hero' ) {
	$theme_uri = get_template_directory_uri();
	$images    = array(
		'hero'        => $theme_uri . '/assets/images/hero.jpg',
		'portfolio-1' => $theme_uri . '/assets/images/portfolio-1.jpg',
		'destination' => $theme_uri . '/assets/images/destination.jpg',
		'film'        => $theme_uri . '/assets/images/film.jpg',
	);

	if ( isset( $images[ $type ] ) ) {
		return $images[ $type ];
	}

	return $theme_uri . '/assets/images/hero.jpg';
}

/**
 * Prints HTML with meta information for the current post-date/time.
 */
function everafter_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	}

	$time_string = sprintf(
		$time_string,
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() )
	);

	echo '<span class="posted-on">' . $time_string . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Prints HTML with meta information for the current author.
 */
function everafter_posted_by() {
	$byline = sprintf(
		/* translators: %s: post author. */
		esc_html_x( 'By %s', 'post author', 'everafter-studio' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Calculate estimated reading time in minutes.
 *
 * @param int|null $post_id Post ID.
 * @return int Minutes.
 */
function everafter_reading_time( $post_id = null ) {
	$content    = get_post_field( 'post_content', $post_id );
	$word_count = str_word_count( wp_strip_all_tags( $content ) );
	$minutes    = ceil( $word_count / 200 );
	return max( 1, (int) $minutes );
}

/**
 * Displays an elegant pagination bar for archives and loops.
 */
function everafter_pagination() {
	the_posts_pagination(
		array(
			'mid_size'  => 2,
			'prev_text' => sprintf(
				'%s <span class="nav-prev-text">%s</span>',
				'&larr;',
				esc_html__( 'Previous', 'everafter-studio' )
			),
			'next_text' => sprintf(
				'<span class="nav-next-text">%s</span> %s',
				esc_html__( 'Next', 'everafter-studio' ),
				'&rarr;'
			),
		)
	);
}

/**
 * Breadcrumb navigation for luxury editorial hierarchy.
 */
function everafter_breadcrumbs() {
	if ( is_front_page() ) {
		return;
	}

	echo '<nav class="everafter-breadcrumbs" aria-label="' . esc_attr__( 'Breadcrumbs', 'everafter-studio' ) . '">';
	echo '<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'everafter-studio' ) . '</a>';
	echo '<span class="sep"> / </span>';

	if ( is_singular( 'wedding_story' ) ) {
		$stories_page = get_page_by_path( 'wedding-stories' );
		if ( $stories_page ) {
			echo '<a href="' . esc_url( get_permalink( $stories_page->ID ) ) . '">' . esc_html( get_the_title( $stories_page->ID ) ) . '</a>';
			echo '<span class="sep"> / </span>';
		}
		echo '<span class="current">' . esc_html( get_the_title() ) . '</span>';
	} elseif ( is_singular( 'portfolio_item' ) ) {
		$portfolio_page = get_page_by_path( 'portfolio' );
		if ( $portfolio_page ) {
			echo '<a href="' . esc_url( get_permalink( $portfolio_page->ID ) ) . '">' . esc_html( get_the_title( $portfolio_page->ID ) ) . '</a>';
			echo '<span class="sep"> / </span>';
		}
		echo '<span class="current">' . esc_html( get_the_title() ) . '</span>';
	} elseif ( is_page() ) {
		echo '<span class="current">' . esc_html( get_the_title() ) . '</span>';
	} elseif ( is_archive() ) {
		the_archive_title( '<span class="current">', '</span>' );
	} elseif ( is_search() ) {
		/* translators: %s: search query */
		printf( '<span class="current">' . esc_html__( 'Search: %s', 'everafter-studio' ) . '</span>', esc_html( get_search_query() ) );
	} elseif ( is_404() ) {
		echo '<span class="current">' . esc_html__( 'Page Not Found', 'everafter-studio' ) . '</span>';
	}

	echo '</nav>';
}
