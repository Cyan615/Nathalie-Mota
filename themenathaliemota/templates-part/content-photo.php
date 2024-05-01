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
$categories = get_the_terms(get_the_ID(), 'categorie'); 
						foreach ( (array) $categories as $categorie ) {
						$nameCategorie = $categorie->name ; 
					} 


?>

<div class="photoCard">
<!-- afficher la photo -->
    <div class="frame-photo">
        <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php echo $photo_alt; ?>"></img>
    </div>
    
    <!-- accés aux info de la photo avec l'icone oeil -->
    <div class="frame-Overlay">
        
        <div class="frame-Overlay__fullscreen lightboxAjax" data-lightbox-postId="<?php echo get_the_ID() ?>">
            <img src="<?php echo $template_uri?>/assets/images/fullscreen-icon.png" alt="icone pleine écran">
        </div>
        
        <a class="frame-Overlay__eye" href="<?php echo $url_post ?>"><img src="<?php echo $template_uri?>/assets/images/oeil.svg" alt="icone oeil pour accéder aux informations de la photo"></a>
        <div class="frame-Overlay__text">
            <p class="--title"><?php echo $title; ?></p>
            <p class="--reference"><?php $reference; ?></p>
            <p class="--categorie"><?php echo $nameCategorie; ?></p>
        </div>
        
    </div>
</div>