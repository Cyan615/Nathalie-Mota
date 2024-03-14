    </main>
    <footer class="footer">
        <nav class="navFooter">
        <?php wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'container' => 'ul',
                    'menu_class' => 'footerNav__menu'
                ));  ?>
  
        </nav>
    
    <?php wp_footer();  ?>

    </footer>


</body>
</html>

