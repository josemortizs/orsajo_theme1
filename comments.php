<?php
    /*
    ** comments.php
    ** Desde esta página se define el diseño de los comentarios, 
    ** tanto en entradas como en páginas.
    */
?>

<h5>Comentarios: <?php comments_number( '0', '1', '%' ); ?></h5>
<hr>

<?php 
  wp_list_comments(array(
    'callback' => function ($comment, $args, $depth) {
    ?>
      <div class="media">
        <div class="mr-3 mb-2">
          <?php
            if ( $args['avatar_size'] != 0 ) {
              echo get_avatar( $comment, $args['avatar_size'] ); 
            } 
          ?>
        </div>
        <div class="media-body">
          <h5 class="mt-0 mb-2">
            <?php
              printf( __( '<cite>%s</cite><span>:</span>' ), get_comment_author_link() );
            ?>
          </h5>

          <?php 
            if ( $comment->comment_approved == '0' ) { ?>
                <em><?php _e( 'Tu comentario se encuentra a la espera de ser aprobado por un moderador.' ); ?></em><br/><?php 
            } 
          ?>
          
          <?php comment_text(); ?>

          <!-- Permitir réplicas al comentario... -->
          <span>
            <?php 
              comment_reply_link( 
                  array_merge( 
                      $args, 
                      array( 
                          'reply_text' => 'Responder', 
                          'depth'     => $depth, 
                          'max_depth' => $args['max_depth'] 
                      ) 
                  ) 
              ); 
            ?>
          </span>
          <span>
            <?php 
              edit_comment_link( __( 'Editar' ), '  ', '' ); 
            ?>
          </span>
        </div>
      </div>
    <?php
    }
  )); 
?>


<hr>
<!-- Muestra un formulario de inserción de comentario: -->
<?php
    comment_form();
?>
<hr>