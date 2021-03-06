<?php
/**
 * Template Name: Login
 *
 * @package tm-events-2016
 */

if ( is_user_logged_in() ) {
	wp_redirect( home_url( '/' ) );
	exit;
}

// Check if the login failed.
$login_status = ( get_query_var( 'status' ) === 'failed' ? true : false );

get_header(); ?>

<main id="main" class="content__main ss1-ss4 ms1-ms6 ls1-ls12 cf module login-form">

	<?php the_title( '<h1 class="gamma heading--main page-title">', '</h1>' ); ?>

	<p>
	<?php printf(
		'%1$s <a href="%2$s">%3$s</a>.',
		esc_html__( 'Not got an account?', 'tm-events-2016' ),
		esc_url( home_url( 'register/' ) ),
		esc_html__( 'Click here to register', 'tm-events-2016' )
	); ?>
	</p>

	<?php if ( true === $login_status ) : ?>
	<section class="alert alert--message alert--warning alert--type box" role="alert">
		<p>
		<?php printf(
			'<strong>%1$s</strong> %2$s</p>',
			esc_html__( 'Ooops', 'tm-events-2016' ),
			esc_html__( 'Incorrect username or password. Please try again.', 'tm-events-2016' )
		); ?>
		</p>

	</section>
	<?php endif; ?>

	<form id="member-login" action="<?php echo esc_url( home_url( 'wp-login.php' ) ); ?>" method="POST" enctype="multipart/form-data">

		<fieldset id="account-details">

			<label for="log"><?php esc_html_e( 'Username', 'tm-events-2016' ); ?></label>
			<input type="text" name="log" id="log" required>

			<label for="pwd"><?php esc_html_e( 'Password', 'tm-events-2016' ); ?></label>
			<input type="password" name="pwd" id="pwd" required>

			<label class="checkbox">
				<input type="checkbox" name="rememberme" value="forever"> <?php esc_html_e( 'Remember Me', 'tm-events-2016' ); ?>
			</label>

			<input type="hidden" name="redirect_to" value="<?php echo esc_url( home_url( 'nominate/' ) ); ?>">

			<button class="btn btn__large" type="submit" name="submit" id="submit"><?php esc_html_e( 'Login', 'tm-events-2016' ); ?></button>

		</fieldset>

	</form>

</main>

<?php get_footer();
