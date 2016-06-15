<?php
/**
 * BuddyPress - Members Activate
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>

<div>

	<?php

	/**
	 * Fires before the display of the member activation page.
	 *
	 * @since 1.1.0
	 */
	do_action( 'bp_before_activation_page' ); ?>

	<div class="page" id="activate-page">

		<?php

		/** This action is documented in bp-templates/bp-legacy/buddypress/activity/index.php */
		do_action( 'template_notices' ); ?>

		<?php

		/**
		 * Fires before the display of the member activation page content.
		 *
		 * @since 1.1.0
		 */
		do_action( 'bp_before_activate_content' ); ?>

		<?php if ( bp_account_was_activated() ) : ?>

			<?php if ( isset( $_GET['e'] ) ) : ?>
				<p><?php esc_html_e( 'Your account was activated successfully! Your account details have been sent to you in a separate email.', 'buddypress' ); ?></p>
			<?php else : ?>
				<p><?php printf( __( 'Your account was activated successfully! You can now <strong><a href="%s">log in</a></strong> with the username and password you provided when you signed up.', 'buddypress' ), home_url( $path = 'login' ) ); ?></p>
			<?php endif; ?>

		<?php else : ?>

			<p><?php esc_html_e( 'Please provide a valid activation key.', 'buddypress' ); ?></p>

			<form action="" method="get" class="standard-form" id="activation-form">

				<label for="key"><?php esc_html_e( 'Activation Key:', 'buddypress' ); ?></label>
				<input type="text" name="key" id="key" value="" />


				<button class="btn btn__large btn--primary" type="submit" name="submit" id="submit"><?php esc_attr_e( 'Activate', 'buddypress' ); ?></button>

			</form>

		<?php endif; ?>

		<?php

		/**
		 * Fires after the display of the member activation page content.
		 *
		 * @since 1.1.0
		 */
		do_action( 'bp_after_activate_content' ); ?>

	</div><!-- .page -->

	<?php

	/**
	 * Fires after the display of the member activation page.
	 *
	 * @since 1.1.0
	 */
	do_action( 'bp_after_activation_page' ); ?>

</div><!-- #buddypress -->
