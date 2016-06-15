<?php
/**
 * Template Name: Nominate
 *
 * @package tm-events-2016
 */

/**
 * Check user is logged in
if ( ! is_user_logged_in() ) {
	wp_redirect( home_url( $path = 'login' ) );
	exit;
} else {
	wp_redirect( home_url( $path = 'nominate/dashboard' ) );
	exit;
}
 */

wp_redirect( home_url( $path = 'nominate/entry/' ) );
exit;
