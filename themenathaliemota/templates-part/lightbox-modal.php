<?php   if  (have_posts()) : 
		 while ( have_posts() ) :
			the_post();  

			// -- on charge la référence de la photo -->
		$reference = get_post_meta($post->ID, 'reference', true);	

         endwhile;
        endif;     
?>

<?php
// -- URL du post --
$url_post = get_permalink();
// -- Chemin url template --
$template_uri = get_template_directory_uri();
// -- Afficher le texte alternatif de la photographie --
$photo_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);  
// -- Chercher la référence, le titre et cathegorie de la photo --
$title = get_the_title();
$reference = get_field('reference');
// $categories = get_the_terms(get_the_ID(), 'categorie'); 
// 						foreach ( (array) $categories as $categorie ) {
// 						$nameCategorie = $categorie->name ; 
// 					} 
?>


<section id="motalightbox" role="dialog">

    <article class="lightbox">
        <button class="lightbox__close" ></button> 
        
        <button class="lightbox__prev" ><img class="arrowImg" src="<?php echo $template_uri; ?>/assets/images/fleche-prev.svg') " alt="flèche photo précédente">Précédente</button>
        
        <button class="lightbox__next" name="suivant">Suivante<img class="arrowImg" src="<?php echo $template_uri; ?>/assets/images/fleche-next.svg') " alt="flèche photo suivante"></button>
        
        <div class="img-container">
            <img src="" alt="photographie sélectionné" class="lightbox__image">
        </div>   
        
        <span class="lightbox__refPhoto"></span>
        <span class="lightbox__catPhoto"></span>
        
    </article>
</section>