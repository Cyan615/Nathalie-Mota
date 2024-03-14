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
    
    // Déclarer le css compilé sass
    wp_enqueue_style('theme_style', get_template_directory_uri() . '/css/style.css');
    
}


add_action('after_setup_theme', 'mota_setup');
add_action( 'init', 'mota_register_menu' );
add_action('wp_enqueue_scripts', 'mota_register_scripts');


