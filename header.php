<!doctype html>
<html <?php language_attributes(); ?>> 
  <head>
    <!-- Required meta tags -->
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sitio Web de José Manuel Ortiz Sánchez, Desarrollador Web. Encontrarás contenido relacionado con la programación y el desarrollo web"/>
    <meta name="keywords" content="WordPress, ortizsanchezdev, desarrollo, programación, daw "/>

    <!-- Estilos CSS -->
    <?php wp_head(); ?>

  </head>
  <body  <?php body_class(); ?>>
    <!-- HEADER -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php if ( function_exists( 'the_custom_logo' ) ) { the_custom_logo(); } ?></a>
          <button 
            class="navbar-toggler"
            type="button" 
            data-toggle="collapse" 
            data-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" 
            aria-expanded="false" 
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          

            <?php
              wp_nav_menu( array(
                'theme_location'    => 'menu-principal',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'navbarSupportedContent',
                'menu_class'        => 'nav navbar-nav ml-auto',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                'walker'            => new WP_Bootstrap_Navwalker(),
              ) );
            ?>

        </div>
    </nav>
    <!-- HEADER -->

    <!-- CONTENEDOR PRINCIPAL -->
    <div class="container">
