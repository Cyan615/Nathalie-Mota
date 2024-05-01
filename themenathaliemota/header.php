<!DOCTYPE html>
<html  <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php wp_head(); ?>

</head>
<body>
<?php wp_body_open();  ?>

    <header id="header" class="header"> 

        
        <nav id="nav" class="navbar">
            <!-- logo -->
            <div class="navbar__logo">
                <?php  if("has_custom_logo()"): ?>
                <?php the_custom_logo(); ?>
                <?php  else: ?>
                <h2><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h2>
                <?php endif; ?>    
            </div>
            <!-- menu de navigation -->
            <?php wp_nav_menu(array(
                    'theme_location' => 'main-menu',
                    'container' => 'ul',
                    'menu_class' => 'navbar__menu '
                ));  ?>
                
        <!-- bouton ouverture/fermeture menu burger -->
            <div id="icones"></div>
        </nav>

        

    </header>

    