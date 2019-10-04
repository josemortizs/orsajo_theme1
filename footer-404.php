<?php
    /*
    ** footer-404.php
    ** Esta página define todo lo que se mostará en la sección 
    ** Footer de la página 404.php
    */
?>

    <div class="clearfix"></div>
    <footer class="container-fluid py-4 text-center text-light bg-dark position-absolute fixed-bottom">
      <hr>
      <!-- 
        Recupero la información agregada por el usuario en:
        Apariencia / Personalizar / Footer / Modificar footer
      -->
      <?php echo get_theme_mod('footer-textarea'); ?>
    </footer>

    <!-- Ficheros JavaScript -->
    <?php wp_footer(); ?>
  </body>
</html>