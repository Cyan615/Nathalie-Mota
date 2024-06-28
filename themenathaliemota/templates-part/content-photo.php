<?php
// -- URL du post --
$url_post = get_permalink();
// -- Chemin url template --
$template_uri = get_template_directory_uri();
$photoUrl = get_the_post_thumbnail_url();
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
    
    
    <div class="frame-Overlay">
        
        <div class="frame-Overlay__fullscreen lightboxIcon"  data-lightboxRef="<?php echo $reference ?>" data-lightboxCat="<?php echo $nameCategorie ?>" data-photoUrl="<?php echo $photoUrl ?>">
            <div class="iconfullscreen" href="#motalightbox"><img src="<?php echo $template_uri?>/assets/images/fullscreen-icon.png" alt="icone pleine écran"></div>
        </div>
        <!-- accés aux info de la photo avec l'icone oeil -->
        <a class="frame-Overlay__eye" href="<?php echo $url_post ?>"><img src="<?php echo $template_uri?>/assets/images/oeil.svg" alt="icone oeil pour accéder aux informations de la photo"></a>
        <div class="frame-Overlay__text">
            <p class="--title"><?php echo $title; ?></p>
            <p class="--reference"><?php $reference; ?></p>
            <p class="--categorie"><?php echo $nameCategorie; ?></p>
        </div>
        
    </div>
</div>