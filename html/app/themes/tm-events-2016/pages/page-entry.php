<?php
/**
 * Template Name: Entry
 *
 * @package tm-events-2016
 */

/**
 * Check user is logged in
if ( ! is_user_logged_in() ) {
	wp_redirect( home_url( $path = 'login' ) );
	exit;
}
 */

$entry = get_query_var( 'entry' );
$object_id = ( get_query_var( 'entry' ) !== '' ? $entry : 0 );

// Check to see if the current entry was made by the current user.
global $current_user;
get_currentuserinfo();

if ( get_post_field( 'post_author', $object_id ) !== $current_user->ID  && ( 0 !== $object_id ) ) {
		remove_query_arg( 'entry' );
		wp_redirect( home_url( $path = 'nominate/entry' ) );
}


get_header(); ?>

<main id="main" class="content__main ss1-ss4 ms1-ms6 ls1-ls12 cf">

<?php while ( have_posts() ) : the_post(); // Start the loop.

	// Include the page content template.
	get_template_part( 'content-parts/content', 'entry' );

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}

endwhile; // End of the loop. ?>

</main>

<?php get_footer();
