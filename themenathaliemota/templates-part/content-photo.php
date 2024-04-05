<?php
// -- Afficher le texte alternatif de la photographie --
 
$photo_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);  
$reference = get_field('reference');
$categories = get_the_terms(get_the_ID(), 'categorie'); 
						foreach ( (array) $categories as $categorie ) {
						 $categorie->name . ' '; 
					} 


?>

    <div class="frame-photo">
        <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php echo $photo_alt; ?>"></img>
    </div>
    
    <div class="frame-refOverlay">
        <span class="reference"><?php $reference; ?></span>
        <span class="categorie"><?php $categories; ?></span>
    </div>
