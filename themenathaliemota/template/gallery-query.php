<?php  
// *** Fonction pour le bouton charger plus ***

add_action('wp_ajax_loadmorephotobutton', 'motaphoto_loadmore_ajax_handler');
add_action('wp_ajax_nopriv_loadmorephotobutton', 'motaphoto_loadmore_ajax_handler');

function motaphoto_loadmore_ajax_handler (){

    $args = json_decode( stripslashes( $_POST['query'] ), true );
    $args['paged'] = $_POST['paged'] + 1;
    $args['post_status'] = 'publish';
	$args["post_type"] = 'photographie';
    // $args["posts_per_page"] = 8;
    query_posts( $args );
    global $wp_query;
    if ($query->have_posts()) {
        while ($query->have_posts()) : $query->the_post();
        
            
        get_template_part('templates-part/content-photo', 'post'); 
            
        endwhile;

    };
    die;
    
}

add_action('wp_ajax_motaphotofilter', 'motaphoto_filter_function'); 
add_action('wp_ajax_nopriv_motaphotofilter', 'motaphoto_filter_function');

function motaphoto_filter_function(){

    if( isset( $_POST['allCategory'] ) && isset ($_POST['allFormat']) )
    	$termsCat = get_terms( array( 'taxonomy' => 'categorie' ) );
        $termsFor = get_terms( array( 'taxonomy' => 'format' ) );
            $args['tax_query'] = array(
                 
                'relation'=> 'AND',
                array(
                    'taxonomy' => 'categorie',
                    'field' => 'term_id',
                    'terms' => $termsCat,
                    "posts_per_page" => 8,
                ),
                array(
                    'taxonomy' => 'format',
                    'field' => 'term_id',
                    'terms' => $termsFor,
                    "posts_per_page" => 8,
                ),
                
            );

        $args["post_type"] = 'photographie';
            $args['tax_query'] = array(

                'relation'=> 'AND',
                array(
                    'taxonomy' => 'categorie',
                    'field' => 'term_id',
                    'terms' => $_POST['filterCategorie'],
                    "posts_per_page" => 8
                ),
                array(
                    'taxonomy' => 'format',
                    'field' => 'term_id',
                    'terms' => $_POST['filterFormat'],
                    "posts_per_page" => 8
                ),
            );        


    $query = new WP_Query($args);
    if( $query->have_post( )) :
        ob_start();
        while($query->have_post() ): $query->the_post();
            get_template_part('templates-part/content-photo', 'post'); 
				
		endwhile;
        $post_html = ob_get_contents();
        ob_end_clean();
    else:
        $posts_html = '<p>Aucun résultat.</p>';
    endif;
    echo json_encode( array(
        'posts' => json_encode ($query->query_vars) ,
        'max_page' => $query->max_num_pages,
        'found_posts' => $query->found_posts,
        'content' => $posts_html,
    ));
    die();
};










function mota_load_more(){
    $page = $_POST['paged'];
    $post_per_page ='8';
    
    $ajaxphotos = new WP_Query(array(
        'post_type'     => 'Photographie',
        'order'         => 'ASC',
        'orderby'       => 'rand',
        'post_per_page' => $post_per_page,
        'paged'         => $page,
        'post_status'   => 'publish',
    ));

    $response= "";
    $has_more_photos = false;
    if($ajaxphotos->have_posts()){
        ob_start();  //start output buffering
        while ($ajaxphotos->have_posts()): $ajaxphotos->the_posts();
        get_template_part('templates-part/content-photo', 'post');
    endwhile;

    $response .= ob_get_clean();
    //Check if there are more posts beyond the current page
    $has_more_photos = $ajaxphotos->max_num_pages > $page; 

    wp_reset_postdata();
    }

     echo json_encode(array('html' => $response, 'has_more_photos' => $has_more_photos));
    wp_die();
}

add_action('wp_ajax_mota_load_more', 'mota_load_more');
add_action('wp_ajax_nopriv_mota_load_more', 'mota_load_more');



