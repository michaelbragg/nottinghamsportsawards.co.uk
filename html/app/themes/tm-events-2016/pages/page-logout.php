<?php
/**
 * Template Name: Logout
 *
 * @package tm-events-2016
 */

if ( ! is_user_logged_in() ) {
	wp_redirect( home_url() );
	exit;
} else {
	wp_logout();
	wp_redirect( home_url() );
	exit;
}
