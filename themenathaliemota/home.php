
<?php
/**
 * Template Name: Home
 
 */

 get_header();

 ?>
<main id="primary" class="site-main container">
<section class="banner">
    <img class="banner__img" src="<?php echo get_theme_file_uri().'./assets/images/nathalie-0.jpeg'; ?>" alt="">
    <h1 class="banner__slogan hero-slogan">photographe event</h1>

</section>
<section class="catalogPhoto">
    <article class="catalogPhoto__filters" >
        
        <div class="col1">
        <!-- Filtre par cathegorie -->
            <select onchange="updated(this)" class="filter" name="filterCategorie"  id="filterCategorie">

                <option value="all">categorie</option>
            <?php
            $terms = get_terms('categorie'); ?>
            <?php foreach ($terms as $term) { ?>
                    <option value="<?php echo $term->slug;  ?>"><?php echo $term->name;  ?></option>
                <?php } ?> 
            
            </select>
        
        <!-- Filtre par format -->
        
            <select class="filter"  name="filterFormat" onchange="updated(this)"    id="filterFormat">
                <option value="all">format</option>    
            <?php  
            $terms = get_terms('format');
            foreach ($terms as $term) { ?>

                    <option value="<?php echo $term->slug;  ?>"><?php echo $term->name;  ?></option>
            <?php } ?>

            </select>
        </div>
        <div class="col2">
        <!-- filtre par date -->
            <select name="filterDate" onchange="updated(this)" id="filterDate"  class="filter">
                
                <option value="all">trié à partir</option>
                <option value="DESC">du plus récent</option>
                <option value="ASC">du plus ancien</option>
                
            </select>
        </div>
    </article>

<!-- Affichage gallerie photos -->
    <article class="column-gallery" >
     <?php
        $page =  1 ;
		$homeGallery = new WP_Query([
			'post_type' => 'photographie',
			'posts_per_page' => 8,
			'paged' => $page,
			'post__not_in' => array(get_the_ID()),
			// affichage de 8 photos au hasard par ordre décroissant par page 
		]);
 // boucle wp_jquery 
    if ($homeGallery->have_posts()) {
			while ($homeGallery->have_posts()) : $homeGallery->the_post();
			
				
			get_template_part('templates-part/content-photo', 'post'); 
				
			endwhile;
		};
        		// réinisialisé la requête wp_query
		wp_reset_postdata();
    ?>
    </article>

    <button id="loadMore" class="loadMore btn-more "
            data-postId="<?php echo get_the_ID(); ?>",
            data-ajaxurl="<?php echo admin_url( 'admin-ajax.php' ); ?>"
            data-action="mota_load_more"
            data-nonce="<?php echo wp_create_nonce('mota_load_more'); ?>"
        >Charger plus</button>

</section>

</main><!-- #main -->


<?php get_footer(); ?>