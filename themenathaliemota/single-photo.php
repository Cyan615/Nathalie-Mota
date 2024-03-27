<?php
/**
 * The template for displaying all single photo-posts
 
 */

 get_header();
 ?>
 
	 <main id="primary" class="site-main container">
 
<?php   if  (have_posts()) : 
		 while ( have_posts() ) :
			the_post();  ?>

		<section class="single-postPhoto" id="photo-<?php the_ID(); ?>">
			<article class="postPhoto">
				<div class="positionLeft">
				
					<h2 class="postPhoto__title"><?php  the_title()  ?></h2>
					<p class="postPhoto__ref">référence: <span class="ref"><?php echo get_post_meta($post->ID, 	'reference', true); ?></span></p>
					<p class="postPhoto__ref">catégorie: <span class="ref">
						<?php 
						$categories = get_the_terms(get_the_ID(), 'categorie'); 
							foreach ( (array) $categories as $categorie ) {
							echo $categorie->name . ' '; 
						} 
						?></span></p>
					<p class="postPhoto__ref">format: <span class="ref">
						<?php 
						$formats = get_the_terms(get_the_ID(), 'format'); 
							foreach ( (array) $formats as $format ) {
								echo $format->name . ' ';
							}
							?>
					</span></p>
					<p class="postPhoto__ref">type: <span class="ref">
						<?php
						$types = get_post_meta($post->ID, 'type', true);

						foreach ($types as $key => $value) {
							echo $value ;
						}
					
					?>
					</span></p>
					<p class="postPhoto__ref">année: <span class="ref"><?php echo get_post_meta($post->ID, 	'annee', true); ?></span></p>	
					<span class="postPhoto--line"></span>
				</div>
			

				<aside class="postPhoto__photo" >
					<img src="<?php the_post_thumbnail_url();  ?>" alt="">
				</aside>
			</article>
			<article class="contactPhoto">
				<p>Cette photo vous intéresse ?</p>
				<button class="open-popup">Contact</button>
				<?php 
				$next_post = get_next_post();
				$prev_post = get_previous_post();
				 
				if ( $next_post || $prev_post ) : ?>
				 
					<div class="wpb-posts-nav">
						<div>
							<?php if ( ! empty( $prev_post ) ) : ?>
								<a href="<?php echo get_permalink( $prev_post ); ?>">
									<div>
										<div class="wpb-posts-nav__thumbnail wpb-posts-nav__prev">
											<?php echo get_the_post_thumbnail( $prev_post, [ 100, 100 ] ); ?>
										</div>
									</div>
									<div>
										<strong>
											<svg viewBox="0 0 24 24" width="24" height="24"><path d="M13.775,18.707,8.482,13.414a2,2,0,0,1,0-2.828l5.293-5.293,1.414,1.414L9.9,12l5.293,5.293Z"/></svg>
											<?php _e( 'Previous article', 'textdomain' ) ?>
										</strong>
										
									</div>
								</a>
							<?php endif; ?>
						</div>
						<div>
							<?php if ( ! empty( $next_post ) ) : ?>
								<a href="<?php echo get_permalink( $next_post ); ?>">
									<div>
										<strong>
											<?php _e( 'Next article', 'textdomain' ) ?>
											<svg viewBox="0 0 24 24" width="24" height="24"><path d="M10.811,18.707,9.4,17.293,14.689,12,9.4,6.707l1.415-1.414L16.1,10.586a2,2,0,0,1,0,2.828Z"/></svg>
										</strong>
										
									</div>
									<div>
										<div class="wpb-posts-nav__thumbnail wpb-posts-nav__next">
											<?php echo get_the_post_thumbnail( $next_post, [ 100, 100 ] ); ?>
										</div>
									</div>
								</a>
							<?php endif; ?>
						</div>
					</div> <!-- .wpb-posts-nav -->
				 
				<?php endif;
			 ?>
			</article>
		
		
 		</section>

	<?php	 endwhile; // End of the loop. 
	endif;   ?>

		
 
	 </main><!-- #main -->
 
 <?php
//  get_sidebar();
 get_footer();
 