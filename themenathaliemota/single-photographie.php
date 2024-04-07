<?php
/**
 * Template Name: single-photographie
 * Template Post Type: photographie
 
 */

 get_header();
 ?>
 
	 <main class="main-photo container">
 
<?php   if  (have_posts()) : 
		 while ( have_posts() ) :
			the_post();  ?>

		<section class="single-postPhoto" id="photo-<?php the_ID(); ?>">
			<article class="left-blockInfo ">
				<h2 class="left-blockInfo__title"><?php  the_title()  ?></h2>
	<!-- Afficher les informations de la photographie en cours  --> 
				<p class="left-blockInfo__ref">référence: <span class="ref">
			<?php echo get_post_meta($post->ID, 'reference', true); ?></span></p>
				<p class="left-blockInfo__ref">catégorie: <span class="ref">
					<?php 
					$categories = get_the_terms(get_the_ID(), 'categorie'); 
						foreach ( (array) $categories as $categorie ) {
						echo $categorie->name . ' '; 
					} 
					?></span></p>
				<p class="left-blockInfo__ref">format: <span class="ref">
					<?php 
					$formats = get_the_terms(get_the_ID(), 'format'); 
						foreach ( (array) $formats as $format ) {
							echo $format->name . ' ';
						}
						?>
				</span></p>
				<p class="left-blockInfo__ref">type: <span class="ref">
					<?php
					$types = get_post_meta($post->ID, 'type', true);
					foreach ($types as $key => $value) {
						echo $value ;
					}
				
				?>
				</span></p>
				<p class="left-blockInfo__ref">année: <span class="ref">
					<?php echo get_post_meta($post->ID, 'annee', true); ?></span></p>	
				<span class="left-blockInfo--line"></span>
			</article>
	
	<!-- Afficher le texte alternatif de la photographie -->
			<?php $photo_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);  ?>
	<!-- Afficher la photographie -->
			<aside class="single-postPhoto__photoInRight" >
				<img src="<?php the_post_thumbnail_url();  ?>" alt="<?php echo $photo_alt; ?>">
				
			</aside>
			<!-- bloque navigation photo et contacte -->
			<article class="single-postPhoto__contactPhoto">
    			<p>Cette photo vous intéresse ?</p>
    			<button class="open-popup">Contact</button>
    			<div class="photo-navigation">
    			    <?php 
					$next_post = get_next_post();
					$prev_post = get_previous_post();
    			    ?>
    			    <div class="photo-navigation__prev-post">
						<?php
    			        if ( ! empty( $prev_post ) ) : ?>
    			        <a href="<?php echo get_permalink( $prev_post ); ?>">
    			        <img class="arrow arrowLeft"src="<?= get_template_directory_uri(); ?>/		assets/	images/fléche-avant.svg" alt="fléche précédente" ></a>
    			        <?php endif; ?>
    			    </div>
					<div class="miniature">
						<div id="prev-miniature" class="hide-miniature miniatureSize">
							<?php echo get_the_post_thumbnail( $prev_post); ?>
						</div>
						<div id='next-miniature' class="hide-miniature miniatureSize">
							<?php echo get_the_post_thumbnail( $next_post); ?>
						</div>
    			    </div>
    			    <div class="photo-navigation__next-post">
						
    			        <?php
    			        if ( ! empty( $next_post )) : ?>
    			        <a href="<?php echo get_permalink( $next_post ); ?>">
    			        <img class="arrow arrowRight"src="<?= get_template_directory_uri(); ?>/assets/images/fléche-suivant.svg"alt="fléche suivante" ></a>
    			        <?php endif; ?>
    			    </div>
						
    			</div>
			</article>
 		</section>
		<!-- Section photo apparentées -->
		<section class="relatedPicture">
			<h3 class="relatedPicture__title">vous aimerez aussi</h3>

			<article class="relatedPicture__gallery">
	<?php	
	// requete wp_query pour afficher 2 photos de la même catéguorie
		$categorie = array_map(function ($term) {
			return $term->term_id;
		}, get_the_terms(get_post(), 'categorie'));
		
		$query = new WP_Query([
			'post_type' => 'photographie',
			'posts_per_page' => 2,
			'post__not_in' => array($post->ID),
			'orderby' => 'rand',
			'order' => 'DESC',
			'tax_query' => [
				[
					'taxonomy' => 'categorie',
					'terms'    => $categorie,
				]
			]
		]);
			// var_dump($query);    die;

		if ($query->have_posts()) {
			while ($query->have_posts()) : $query->the_post();
			?>	
				
			<?php get_template_part('templates-part/content-photo', 'post'); ?>
				
		<?php	endwhile;
		};
		// endif;
		// réinisialisé la requête wp_query
		wp_reset_postdata();
		
	?>					
			</article>
		</section>
 
	 
 
 <?php
 	 endwhile; // End of the loop. 
	endif;   
	
//  get_sidebar();
 get_footer();
 ?>
