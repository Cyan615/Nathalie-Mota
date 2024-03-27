<?php
/**
 * The template for displaying all single posts
 
 */

get_header();

?>
	<main id="primary" class="site-main container">
		<?php

		/* Start the Loop */
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'page' );
		
			// If comments are open or there is at least one comment, 		load up the comment template.
			// if ( comments_open() || get_comments_number() ) {
			// 	comments_template();
			// }
		endwhile; // End of the loop.
		?>

</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
