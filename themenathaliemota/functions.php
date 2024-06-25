<?php

function mota_add_admin_pages() {
    add_menu_page(__('Paramètres du thème Nathalie-Mota', 'nathaliemota'), __('Nathalie-Mota', 'nathaliemota'), 'manage_options', 'nathaliemota-settings', 'nathaliemota_theme_settings', 'dashicons-admin-settings', 60);
    }
    
    function nathaliemota_theme_settings() {
    echo '<h1>'.get_admin_page_title().'</h1>';
    }
    
    add_action('admin_menu', 'mota_add_admin_pages', 10);


// ********* Déclaration des fonctions ***********
// logo 
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

// script css et JS
function mota_register_scripts(){
    // Déclarer le js
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('lightbox_js', get_template_directory_uri() . '/assets/js/lightbox.js', array('jquery'), '1.0.0', true);

    wp_enqueue_script('filters', get_template_directory_uri() . '/assets/js/filters.js', array('jquery'), '1.0.0', true);

    // url pour requète Ajax
    $url = admin_url('admin-ajax.php');
    wp_localize_script('filters', 'ajaxurl', $url);

     // Déclarer le jquery
    wp_enqueue_script('jquery');


    // Déclarer le css compilé sass
    wp_enqueue_style('theme_style', get_template_directory_uri() . '/css/style.css');
    
   
}

// affichage du lien 'Contact' dans le menu header
function contact_modal_add($items){
    
        $contactItemMenu = '<li id="menu-item-20" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-8 current_page_item menu-item-20">
        <a href="'.get_site_url().'/wp-content/theme/themenathaliemota/templates-part/modalcontact.php/"  aria-current="page" itemprop="url">contact</a></li>';
        
        $items .= $contactItemMenu;
    
    return $items;
};

// ******* ACTION *******
add_action('after_setup_theme', 'mota_setup');
add_action( 'init', 'mota_register_menu' );
add_action('wp_enqueue_scripts', 'mota_register_scripts');
add_filter('wp_nav_menu_items', 'contact_modal_add', 10, 2);


/**
 * * Gallery query
 * 
 */

 require get_template_directory() . '/template/gallery-query.php';





