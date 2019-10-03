<?php
    /*
    ** single.php
    ** Plantilla que se usa para mostrar los post individualmente. Cuando tenemos una lista de entradas y pulsamos sobre
    ** la que queremos visualizar es ésta la página que se muestra.
    */
?>

<?php get_header(); ?>

        <div class="row">

            <?php if ( is_active_sidebar( 'widgets-derecha' ) ) : ?>
                <div class="col-lg-9">
            <?php else : ?>
                <div class="col-lg-12">
            <?php endif; ?>

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <!-- ENTRADA -->
                    <div class="card-body">
                        <h2><?php the_title(); ?></h2>
                        <p class="small mb-0">Fecha: <?php the_date('F j, Y'); ?> a las <?php the_time('g:i a'); ?></p>
                        <p class="small mb-0">Autor: <?php the_author(); ?></p>
                        <p class="small">
                            Categorías: <?php the_category(' | '); ?> 
                            Etiquetas: <?php the_tags('', ' | ', '') ?>
                        </p>
                        <?php
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail('post-thumbnails', array(
                                    'class' => 'img-fluid mb-3'
                                ));
                            }
                        ?>
                        <?php the_content(); ?>

                        <?php
                            // Si los comentarios están habilitados o tenemos al menos un comentario, carga la plantilla de comentarios.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;
                        ?>

                    </div>
                    <!-- ENTRADA -->
                <?php endwhile; endif; ?>
            </div>
            <!-- ASIDE -->
            
            <?php get_sidebar(); ?>

            <!-- ASIDE -->
        </div>
        <div class="clearfix"></div>
            <div>
                <!-- ASIDE ABAJO: Bajo entradas -->
                <?php get_sidebar('down'); ?>
                <!-- ASIDE ABAJO: Bajo entradas -->
            </div>
    <!-- BLOG -->
    </div>




<?php get_footer(); ?>