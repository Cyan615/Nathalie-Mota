
<?php
/**
 * Template Name: Home
 
 */

 get_header();

 ?>
<main id="primary" class="site-main container">
    <!-- *********** banière ************** -->
<section class="banner">
    <img class="banner__img" src="<?php echo get_theme_file_uri().'./assets/images/nathalie-0.jpeg'; ?>" alt="">
    <h1 class="banner__slogan hero-slogan">photographe event</h1>

</section>
<!-- ************ section catalogue photos avec filtres de tri */ -->
<section class="catalogPhoto">
    <article  >
    <?php 
        get_template_part('templates-part/filters', 'post');
    ?>
    </article>
<!-- // $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; -->
<!-- Affichage gallerie photos -->
    <article class="column-gallery" id="galleryPhoto" >
<!-- ma boucle qui me ramène tous les custom post type "photographie" -->
<?php 
$displayed_posts = array();
$argsgallery = array(      // affichage de 8 photos au hasard par ordre décroissant par page
	'post_type' => 'photographie',
	'posts_per_page' => 8,
    'order_by' => 'rand',
    // 'post_not_in' => $displayed_posts,
);
$query = new WP_Query( $argsgallery );  

 // boucle wp_jquery 
    if ($query->have_posts()) {
			while ($query->have_posts()) : $query->the_post();
			
			$displayed_posts[] = get_the_ID();	
			get_template_part('templates-part/content-photo', 'post'); 
				
			endwhile;
            wp_reset_postdata();    // réinisialisé la requête wp_query
		}else{
            echo"Il n'y a pas de photoghaphie";
        };
    
        		
		
        
?>      
			
			 
    </article>

    <button id="loadMore" class="loadMore btn-more ">Charger plus</button>

<!-- **** on retire le bouton charger plus si il n'y a plus de post**** -->
    <!-- <?php	
				 
		if (  $query->max_num_pages > 1 ) {
            echo '<button id="loadMore" class="loadMore btn-more ">Charger plus</button>';
        }else{
            echo '<button id="loadMore" class="loadMore btn-more " type="hiden">fin</button>';
        };
	?> -->
   

</section>

</main><!-- #main -->
<!-- variable pour le maintient du bouton charger plus -->
<!-- <script>
    var photo_myajax = '<?php echo serialize($query->query_vars )  ?>',
    current_page_myajax = 1,
    max_page_myajax = <?php echo $query->max_num_pages  ?>
</script> -->

<?php get_footer(); ?>