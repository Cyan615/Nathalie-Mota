<?php
/**
 * The template for displaying single posts
 *
 * @package Nathalie-Mota
 */

get_header();
?>

	<main class="main-single container">

		<?php
		if (have_posts()) :
		while ( have_posts() ) : the_post();

			get_template_part( 'templates-part/content', get_post_type() );

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'nathalie-mota' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'nathalie-mota' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; 
		endif;// End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
