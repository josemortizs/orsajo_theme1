<?php

    // Register Custom Navigation Walker
    // Desde: https://github.com/wp-bootstrap/wp-bootstrap-navwalker
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


    // Habilitar la opción de logo:

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

    //

    function orsajo_theme1_setup() 
    {
        // Permitir que el tema soporte imágenes destacadas:
        if ( function_exists( 'add_theme_support' ) ) 
        {
            add_theme_support( 'post-thumbnails' );
        }

        add_theme_support( 'title-tag' );

    }

    add_action( 'after_setup_theme', 'orsajo_theme1_setup' );

    // Agregar Sidebar

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

    // Registrar menús

    function orsajo_theme1_register_my_menus() {
        register_nav_menus(
            array(
            'menu-principal' => __( 'Menú Superior' )
            )
        );
    }
    add_action( 'init', 'orsajo_theme1_register_my_menus' );


    // Agregar modificación de Footer mediante Apariencia / Personalizar
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

    // Agregamos y registramos los campos personalizados para la sección de Trabajos

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
     
        // We'll use this nonce field later on when saving.  
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

        $allowed = array(   
            'a' => array( // on allow a tags  
                'href' => array() // and those anchors can only have href attribute  
            )  
        );

        if( isset( $_POST['orsajo_theme1_url'] ) )  
            update_post_meta( $post_id, 'orsajo_theme1_url', wp_kses( $_POST['orsajo_theme1_url'], $allowed ) ); 

        if( isset( $_POST['orsajo_theme1_leng'] ) )  
            update_post_meta( $post_id, 'orsajo_theme1_leng', wp_kses( $_POST['orsajo_theme1_leng'], $allowed ) ); 

    }

    add_action('save_post', 'orsajo_theme1_save_info_trabajos')


?>