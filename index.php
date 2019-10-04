<?php
    /*
    ** index.php
    ** Esta página define los datos y el diseño que muestran, por omisión,
    ** el listado de POST. Muestra las últimas entradas con la información
    ** contenida en éstas.
    */
?>

<?php get_header(); ?>

        <div class="row">
            <!-- ENTRADAS -->

            <?php if ( is_active_sidebar( 'widgets-derecha' ) ) : ?>
                <div class="col-lg-9">
            <?php else : ?>
                <div class="col-lg-12">
            <?php endif; ?>

            <h2 class="titulo-blog mt-4"><?php echo get_bloginfo('name'); ?></h2>
            <h5 class="descripcion-blog"><?php echo get_bloginfo('description'); ?></h5>

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <!-- ENTRADA -->
                    <div class="card-body">
                        <a href="<?php the_permalink(); ?>">
                            <h2><?php the_title(); ?></h2>
                        </a>
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
                        <!-- <img src="./img/1200.jpg" alt="" class="img-fluid mb-3"> -->
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">Más info...</a>
                    </div>
                    <!-- ENTRADA -->
                <?php endwhile; endif; ?>

                <!-- PAGINACIÓN -->
                <div class="card-body">
                    <?php get_template_part('template-parts/content', 'pagination'); ?>
                </div>
            </div>
            <!-- ENTRADAS -->

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
    </div>
    <!-- BLOG -->

<?php get_footer(); ?>