<?php
    /*
    ** sidebar.php
    ** Código relativo al sidebar de la derecha, en caso de activarlo es
    ** el contenido de esta página el que se muestra.
    */
?>

<div class="col-lg-3">
    <?php if ( is_active_sidebar( 'widgets-derecha' ) ) : ?>
        <?php dynamic_sidebar( 'widgets-derecha' ); ?>
    <?php else : ?>
        <!-- Time to add some widgets! -->
    <?php endif; ?>
</div>