<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package tm-events-2016
 */

get_header(); ?>

<div class="content-area box__large wrapper__sub cf">
	<main id="main" class="content__main ss1-ss4 ms1-ms6 ls1-ls8 separator">

	<?php while ( have_posts() ) : the_post();

		get_template_part( 'content-parts/content', 'page' );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop. ?>

	</main>

	<aside id="secondary" class="content__aside widget-area ss1-ss4 ms1-ms6 ls9-ls12">
		<?php get_sidebar(); ?>
	</aside>

</div>

<?php

get_footer();
