<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Justread
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function justread_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'justread_body_classes' );

/**
 * Change output of adjacent post links.
 *
 * @param  string  $output        The adjacent post link.
 * @param  string  $format        Link anchor format.
 * @param  string  $link          Link permalink format.
 * @param  WP_Post $adjacent_post The adjacent post.
 * @return string
 */
function justread_adjacent_post_link( $output, $format, $link, $adjacent_post ) {
	if ( empty( $adjacent_post ) ) {
		return $output;
	}
	global $post;
	$post = $adjacent_post;
	setup_postdata( $post );

	ob_start();

	add_filter( 'excerpt_length', 'justread_adjacent_excerpt_length' );
	add_filter( 'excerpt_more', 'justread_adjacent_excerpt_more' );

	get_template_part( 'template-parts/content', 'adjacent' );

	remove_filter( 'excerpt_length', 'justread_adjacent_excerpt_length' );
	remove_filter( 'excerpt_more', 'justread_adjacent_excerpt_more' );

	wp_reset_postdata();

	return ob_get_clean();
}
add_filter( 'previous_post_link', 'justread_adjacent_post_link', 10, 4 );
add_filter( 'next_post_link', 'justread_adjacent_post_link', 10, 4 );

/**
 * Change excerpt length for adjacent posts.
 * @return int
 */
function justread_adjacent_excerpt_length() {
	return 20;
}

/**
 * Change excerpt more for adjacent posts.
 * @return int
 */
function justread_adjacent_excerpt_more() {
	return '&hellip;';
}

/**
 * Change more link text.
 * @return string
 */
function justread_more_link() {
	// translators: %s - Continue reading.
	$text = wp_kses_post( sprintf( __( 'Continue reading &rarr; %s', 'justread' ), '<span class="screen-reader-text">' . get_the_title() . '</span>' ) );
	$more = sprintf( '<p class="link-more"><a class="button" href="%s#more-%d" class="more-link">%s</a></p>', esc_url( get_permalink() ), get_the_ID(), $text );

	return $more;
}
// add_filter( 'the_content_more_link', 'justread_more_link' );
// add_filter( 'excerpt_more', 'justread_more_link' );

add_action( 'wp_footer', 'justread_load_svg' );
function justread_load_svg() {
	include get_parent_theme_file_path( 'images/symbol-defs.svg' );
}