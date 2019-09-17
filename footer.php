    <div class="clearfix"></div>
    <footer class="container-fluid py-4 text-center text-light bg-dark">
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