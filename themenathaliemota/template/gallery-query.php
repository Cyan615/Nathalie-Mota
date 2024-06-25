<?php  
/**
 * * handler Ajax pour la fonction 'charger plus'
 * 
 */
function loadMore_photographie() {
    $displayed_posts = array();
    $paged = isset($_POST['page'])? sanitize_text_field($_POST['page']):1;
    $offset = ($paged - 1) * 8; //calcul de l'offset en fonction du num°de page
    $arg= array(
        'post_type'     => 'photographie',
        'post_per_page' => 8,
        'paged'         => $paged,
        // 'offset'        => $offset,
        // 'post__not_in' => $displayed_posts,
    );

    $myquery = new WP_Query($arg);

    if ($myquery->have_posts()) :
        while ($myquery->have_posts()):$myquery->the_post() ; 
        $displayed_posts[] = get_the_ID();   
            get_template_part('templates-part/content-photo', 'post');
        endwhile;
    else:
        echo'';
    endif;
    $displayed_posts[] = 
    wp_reset_postdata();
    die();
    
}
   
add_action('wp_ajax_load_more', 'loadMore_photographie');
add_action('wp_ajax_nopriv_load_more', 'loadMore_photographie');


