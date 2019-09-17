<?php
    /*
    ** Template Name: Con Sidebar (Página)
    */
?>

<?php get_header(); ?>

        <div class="row">
            <!-- ENTRADA -->

            <?php if ( is_active_sidebar( 'widgets-derecha' ) ) : ?>
                <div class="col-lg-9">
            <?php else : ?>
                <div class="col-lg-12">
            <?php endif; ?>

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <!-- ENTRADA -->
                    <div class="card-body">
                        <h2><?php the_title(); ?></h2>
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

            <!-- /ENTRADA -->

        </div>


        <!-- ASIDE -->
        
        <?php get_sidebar(); ?>

        <!-- ASIDE -->


    </div>
    <!-- BLOG -->

    <div class="clearfix"></div>
    <div>
        <!-- ASIDE ABAJO: Bajo entradas -->
        <?php get_sidebar('down'); ?>
        <!-- ASIDE ABAJO: Bajo entradas -->
    </div>

<?php get_footer(); ?>