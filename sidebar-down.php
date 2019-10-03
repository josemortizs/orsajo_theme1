<?php
    /*
    ** sidebar-down.php
    ** Código relativo al sidebar inferior, en caso de activarlo es
    ** el contenido de esta página el que se muestra.
    */
?>

<div class="col-xs-12">
    <?php if ( is_active_sidebar( 'widgets-down' ) ) : ?>
        <?php dynamic_sidebar( 'widgets-down' ); ?>
    <?php else : ?>
        <!-- Time to add some widgets! -->
    <?php endif; ?>
</div>