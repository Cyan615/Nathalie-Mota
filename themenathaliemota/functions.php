<?php
// Déclaration des fonctions
function mota_setup(){
    add_theme_support('title-tag');
    add_theme_support('custom-logo', array(
		'flex-height' => true,
		'flex-width'  => true,
	));
    add_theme_support( 'post-thumbnails' );

};

// Les menus du theme
function mota_register_menu(){
    register_nav_menu( 'main-menu', 'Menu Principal');
    register_nav_menu( 'footer', 'Bas de page');
}

function mota_register_scripts(){
    // Déclarer le js
    wp_enqueue_script('theme_js', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true);

    // Déclarer le css compilé sass
    wp_enqueue_style('theme_style', get_template_directory_uri() . '/css/style.css');
    
    
}

// affichage du lien 'Contact' dans le menu header
function contact_modal_add($items, $args){
    if(is_user_logged_in() && $args->theme_location == 'main-menu'){
        $contactItemMenu = '<li id="menu-item-20" class="open-popup menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-8 current_page_item menu-item-20">
        <a href="'.get_site_url().'/wp-content/theme/themenathaliemota/templates-part/modalcontact.php/"  aria-current="page" itemprop="url">
        contact</a></li>';
        $items .= $contactItemMenu;
    }
    return $items;
};



add_action('after_setup_theme', 'mota_setup');
add_action( 'init', 'mota_register_menu' );
add_action('wp_enqueue_scripts', 'mota_register_scripts');
add_filter('wp_nav_menu_items', 'contact_modal_add', 10, 2);



