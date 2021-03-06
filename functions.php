<?php
    /*
    ** Archivo: functions.php
    ** Tema: Orsajo_theme1
    ** Autor: José Manuel Ortiz Sánchez
    ** Descripción: Definimos funciones que usará nuestro tema, 
    ** habilitamos opciones, definimos qué librerías va a cargar, etc.
    */
    
    /*
    ** Clase: WP_Bootstrap_Navwalker
    ** Contributors: https://github.com/wp-bootstrap/wp-bootstrap-navwalker/graphs/contributors
    ** Clase creada para extender la funcionalidad de los menús de WordPress aplicando
    ** funcionalidades y diseños de Bootstrap.
    ** Desde: https://github.com/wp-bootstrap/wp-bootstrap-navwalker
    */

    require_once get_template_directory() . '/template-parts/navbar.php';


    /*
    ** Agregamos las hojas de estilo y ficheros JavaScript que usará nuestro tema
    */

    function orsajo_theme1_agregar_css_js() 
    {
        wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css');
        wp_enqueue_style('style', get_stylesheet_uri());

        wp_enqueue_script('popper', get_template_directory_uri().'/js/popper.min.js', array('jquery'), '1.14', true);
        wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/js/bootstrap.min.js', array('popper'), '4.3', true);
        wp_enqueue_script('app', get_template_directory_uri().'/js/app.js', array('bootstrap-js'), '1.0', true);
    }

    add_action('wp_enqueue_scripts', 'orsajo_theme1_agregar_css_js');


    /*
    ** Agregamos las hojas de estilo y ficheros JavaScript que queramos usar en el panel de administración WordPress
    */

    function orsajo_theme1_agregar_css_js_admin() 
    {
        wp_enqueue_style('css-admin', get_template_directory_uri().'/css/css-admin.css');
    }

    add_action('admin_enqueue_scripts', 'orsajo_theme1_agregar_css_js_admin');


    /*
    ** Habilitamos la opción de agregar un logo en nuestro Theme
    ** Esto hará que podamos agregarlo desde el menú de Apariencia
    */

    function orsajo_theme1_habilitar_logo() {
        
        add_theme_support( 'custom-logo', array(
            'height'      => 100,
            'width'       => 150,
            'flex-height' => true,
            'flex-width'  => false,
            'header-text' => array( 'site-logo' ),
            ) 
        );
    }

    add_action( 'after_setup_theme', 'orsajo_theme1_habilitar_logo' );


    /*
    ** Habilitamos la opción de agregar imágenes destacadas a nuestros
    ** post y páginas. 
    */

    function orsajo_theme1_setup() 
    {

        if ( function_exists( 'add_theme_support' ) ) 
        {
            add_theme_support( 'post-thumbnails' );
        }

        add_theme_support( 'title-tag' );

    }

    add_action( 'after_setup_theme', 'orsajo_theme1_setup' );


    /*
    ** Habilitamos las áreas de Widgets.
    ** En nuestro tema: un área de widget que se mostraría a la derecha
    ** y otro en la parte inferior. Los dos son opcionales.
    */

    function orsajo_theme1_widgets()
    {
        register_sidebar(array(
            'id' => 'widgets-derecha',
            'name' => __( 'Widgets Derecha' ),
            'description'   => __( 'Arrastra lo que quieras ver a la derecha de las entradas...' ),
            'before_widget' => '<div class="card-body widg-dere">',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title' => '</h4><hr>'
        ));

        register_sidebar(array(
            'id' => 'widgets-down',
            'name' => __( 'Widgets Abajo' ),
            'description'   => __( 'Arrastra lo que quieras ver bajo las entradas...' ),
            'before_widget' => '<div class="card-body widg-dere widg-down">',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title' => '</h4><hr>'
        ));
    }

    add_action('widgets_init', 'orsajo_theme1_widgets');


    /*
    ** Habilitamos la opción de menús para nuestro tema.
    ** Creamos el 'Menú Superior' para que podamos gestionar
    ** desde el Panel de Administración qué enlaces debe mostrar
    ** nuestra área de navegación.
    */

    function orsajo_theme1_register_my_menus() {
        register_nav_menus(
            array(
            'menu-principal' => __( 'Menú Superior' )
            )
        );
    }
    add_action( 'init', 'orsajo_theme1_register_my_menus' );


    /*
    ** Mediante esta función creamos una caja de texto donde el usuario
    ** de nuestro tema podrá modificar el foooter de su sitio web. 
    ** Se crea, en el menú de Apariencia, una nueva pestaña que, a su vez, 
    ** agrega un text-area donde agregar el mensaje, título, etc, que 
    ** el cliente quiera mostrar.
    */

    function orsajo_theme1_customize_register( $wp_customize ) {
        
        // Agregamos el panel correspondiente
        $wp_customize->add_panel( 'panel-footer', array(
            'title'          =>  __( 'Footer', 'textdomain' ),
            'description'    => __( 'Modificación del footer', 'textdomain' ),   
            'priority'       => 160,
            'capability'     => 'edit_theme_options',
        ));

        // Agregamos la sección donde agregar los controles posteriormente
        $wp_customize->add_section( 'section-footer' , array(
            'title' => __( 'Modificar footer', 'textdomain' ),
            'panel' => 'panel-footer',
            'priority' => 1,
            'capability' => 'edit_theme_options',
        ));

        // Agrego el textarea donde el cliente pueda modificar el footer
        $wp_customize->add_setting( 'footer-textarea', array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
        ));
        
        $wp_customize->add_control('footer-textarea', array(
            'label' => __( 'Agregue aquí su texto personalizado...', 'textdomain' ),
            'section' => 'section-footer',
            'priority' => 1,
            'type' => 'textarea',
        ));

    }
    add_action( 'customize_register', 'orsajo_theme1_customize_register' );


    /*
    ** Sección Trabajos:
    ** orsajo_theme1_cp_trabajos() - Crea el menú, la pestaña dentro del Administrador de WordPress
    ** orsajo_theme1_add_metabox() - Crea la "caja" donde se almacenarán los campos de texto adicionales (URL y Lenguajes)
    ** orsajo_theme1_callback_trabajos($post) - Función que agrega los campos de texto para su inserción o modificación.
    ** orsajo_theme1_save_info_trabajos($post_id) - Función que se llama al guardar un nuevo trabajo o modificar uno existente.
    */

    function orsajo_theme1_cp_trabajos() {

        register_post_type( 'trabajos',
            array(
                'labels' => array( 
                    'name' => 'Trabajos',
                    'add_new' => 'Agregar trabajo',
                    'edit_item' => 'Editar trabajo',
                    'new_item' => 'Nuevo trabajo',
                    'all_items' => 'Todos los trabajos',
                    'view_item' => 'Ver trabajo',
                    'search_items' => 'Buscar trabajos',
                    'rewrite' => array( 'slug' => 'trabajos' ),
                    'menu_name' => 'Trabajos'
                ),
                'public' => true,
                'supports' => array( 'title', 'editor', 'thumbnail' ),
                'menu_position' => 6,
                'menu_icon' => 'dashicons-paperclip',
                'has_archive' => true
            )
        );

    }

    add_action('init', 'orsajo_theme1_cp_trabajos');


    function orsajo_theme1_add_metabox() {

        add_meta_box( 'meta-box-url', 'Datos adicionales del trabajo', 'orsajo_theme1_callback_trabajos', 'trabajos', 'normal', 'high' );

    }

    add_action('add_meta_boxes', 'orsajo_theme1_add_metabox');


    function orsajo_theme1_callback_trabajos($post) {

        $values = get_post_custom( $post->ID );
        $url = isset( $values['orsajo_theme1_url'] ) ? esc_attr( $values['orsajo_theme1_url'][0] ) : '';
        $leng = isset( $values['orsajo_theme1_leng'] ) ? esc_attr( $values['orsajo_theme1_leng'][0] ) : '';
     
        wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

        ?>
            <div>
                <label for="orsajo_theme1_url" style="float:left;width:30%">URL</label>
                <input type="text" style="float:left;width:69%" name="orsajo_theme1_url" id="orsajo_theme1_url" value="<?php echo $url; ?>">
            </div>
            <div>
                <label for="orsajo_theme1_leng" style="float:left;width:30%">Lenguajes (JavaScript, PHP...)</label>
                <input type="text" style="float:left;width:69%" name="orsajo_theme1_leng" id="orsajo_theme1_leng" value="<?php echo $leng; ?>">
            </div>
        <?php

    }

    function orsajo_theme1_save_info_trabajos($post_id) {

        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 

        if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return; 

        if( !current_user_can( 'edit_post' ) ) return;  

        // Defino la lista de elementos HTML permitidos y lo paso como parámetro a wp_kses();
        $allowed = array(   
            'a' => array( 
                'href' => array() 
            ) 
        );

        if( isset( $_POST['orsajo_theme1_url'] ) )  
            update_post_meta( $post_id, 'orsajo_theme1_url', wp_kses( $_POST['orsajo_theme1_url'], $allowed ) ); 

        if( isset( $_POST['orsajo_theme1_leng'] ) )  
            update_post_meta( $post_id, 'orsajo_theme1_leng', wp_kses( $_POST['orsajo_theme1_leng'], $allowed ) ); 

    }

    add_action('save_post', 'orsajo_theme1_save_info_trabajos')


?>