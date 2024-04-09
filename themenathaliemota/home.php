
<?php
/**
 * Template Name: Home
 
 */

 get_header();

 ?>

<section class="banner">
    <img class="banner__img" src="<?php echo get_theme_file_uri().'./assets/images/nathalie-0.jpeg'; ?>" alt="">
    <h1 class="banner__slogan hero-slogan">photographe event</h1>

</section>
<section class="catalogPhoto">
    <label for="filterCategorie">categorie</label>
    <select class="catalogPhoto__filters" name="filterCategorie">
        <optgroup>
            <option value=""></option>
    <?php
    $terms = get_terms('categorie'); ?>
    <?php foreach ($terms as $term) { ?>
            <option value=""><?php echo $term->name;  ?></option>
    <?php } ?> 
        </optgroup>
    
    </select>
    <label for="filterFormat">format</label>
    <select class="catalogPhoto__filters"  name="filterFormat">
        <optgroup>
            <option value=""></option>
    <?php  
    $terms = get_terms('format');
    foreach ($terms as $term) { ?>
        
            <option value=""><?php echo $term->name;  ?></option>
        </optgroup > 
    
    <?php } ?>
        
    </select>
     <?php
		$query = new WP_Query([
			'post_type' => 'photographie',
			'posts_per_page' => 8,
			'paged' => 1,
			'orderby' => 'rand',
			'order' => 'DESC',
			
			
		]);
    if ($query->have_posts()) {
			while ($query->have_posts()) : $query->the_post();
			
				
			get_template_part('templates-part/content-photo', 'post'); 
				
			endwhile;
		};
        		// réinisialisé la requête wp_query
		wp_reset_postdata();
    ?>
    <button class="btn-more">Charger plus</button>

</section>




<?php get_footer(); ?>