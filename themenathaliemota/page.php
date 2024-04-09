<?php
/**
 * Template Name: page
 
 */

get_header();
/* Start the Loop */
		while ( have_posts() ) :
			the_post();
?>
<main id="primary" class="site-main container">
	<section class="banner">
    	<img class="banner__img" src="<?php echo get_theme_file_uri().'./assets/images/nathalie-0.jpeg'; ?>" alt="">
    	<p class="banner__slogan hero-slogan">photographe event</p>

	</section>

	<section class="page-content">
		<h1><?php get_the_title(); ?></h1>
		
		<?php the_content(); ?>
	
		<?php
		endwhile; // End of the loop.
		?>
	</section>
</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
?>