    </main>
    <footer class="footer">
        <nav class="footerNav">
        <?php wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'container' => 'ul',
                    'menu_class' => 'footerNav__menu'
                ));  ?>
  
        </nav>
<!-- accroche de la modale de contacte -->
    <?php get_template_part('templates-part/modalcontact'); ?>  

<!-- accroche de la lightbox -->
    <?php get_template_part('templates-part/lightbox-modal'); ?>           

    <?php wp_footer();  ?>

    </footer>


</body>
</html>

