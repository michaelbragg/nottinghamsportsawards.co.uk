<?php
/**
 * Template Name: Entry
 *
 * @package tm-nsa-2016
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
// Check if the login failed.
$entry_status = ( get_query_var( 'status' ) === 'saved' ? true : false );

// Check to see if the current entry was made by the current user.
global $current_user;
get_currentuserinfo();

if ( get_post_field( 'post_author', $object_id ) !== $current_user->ID  && ( 0 !== $object_id ) ) {
		remove_query_arg( 'entry' );
		wp_redirect( home_url( $path = 'nominate/entry' ) );
}


get_header(); ?>

<div id="primary" class="content-area">

<main id="main" class="content__main wrapper cf" role="main">
	<div class="wrapper__sub">
	<article class="ss1-ss4 ms1-ms6 ls1-ls12">

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post(); ?>

		<article id="entry-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<?php the_title( '<h1 class="gamma heading--main entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php if ( true === $entry_status ) : ?>
					<section class="alert alert--message alert--positive alert--type box" role="alert">
						<p>
						<?php printf(
							'<strong>%1$s!</strong> %2$s</p>',
							esc_html__( 'Saved', 'csa-2016' ),
							esc_html__( 'Your entry has been saved. Feel free to come back and edited it before submitting.', 'csa-2016' )
						); ?>
						</p>

					</section>
				<?php endif; ?>

				<?php the_content(); ?>

		<?php

		echo '<form class="cmb-form" method="post" id="entries-form" enctype="multipart/form-data">
					<input type="hidden" name="object_id" value="'. esc_attr( $object_id ) .'">';

		$args = array(
			'form_format' => '%3$s',
			'save_fields' => false,
		);

		cmb2_metabox_form( '_nsa_entries_2016_', $object_id, $args );

		?>

		<div class="submit-button">
		<input type="submit" name="submit-cmb" value="Submit" class="btn btn--primary">
		</div>
		</form>

			</div><!-- .entry-content -->

			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
						get_the_title()
					),
					'<footer class="entry-footer"><span class="edit-link">',
					'</span></footer><!-- .entry-footer -->'
				);
			?>

		</article><!-- #entry-<?php the_ID(); ?> -->

		<section id="entry-alert" class="alert alert--message alert--type box" role="alert" data-state="hidden">
			<p>
			<?php printf(
				'<strong>%1$s</strong> %2$s</p>',
				esc_html__( 'Info', 'csa-2016' ),
				esc_html__( 'Entry&rsquo;s are limited to 3 categories.', 'csa-2016' )
			); ?>
			</p>

		</section>

		<?php	// End of the loop.
		endwhile;
		?>
	</article>
	</div>
</main>

</div><!-- .content-area -->

<?php get_footer(); ?>
