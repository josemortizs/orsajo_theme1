<?php
    /*
    ** Template Name: Trabajos (Muestra los trabajos)
    ** Description: Esta página será la usada para visualizar los "Trabajos",
    ** Post-Type agregado en el Tema "Orsajo_theme1".
    */
?>

<?php get_header(); ?>

        <div class="row">
            <!-- TRABAJOS -->

                <?php 
                
                    $args = array(
                        'posts_per_page' => '-1',
                        'post_type' => 'trabajos'
                    );

                    $trabajos = new WP_QUERY($args);

                    while ( $trabajos->have_posts() ) : $trabajos->the_post();
                
                ?>
                    <!-- TRABAJO -->

                    <div class="card card-trabajos mb-3">
                        <?php
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail('post-thumbnails', array(
                                'class' => 'card-img-top img-trabajos'
                                ));
                            }
                        ?>
                        <div class="card-body">
                            <h5 class="titulo-trabajos card-title bg-dark opacity-70 text-white p-1 text-center font-weight-bold"><?php the_title(); ?></h5>
                            <p class="card-text"><?php the_content(); ?></p>
                            <p class="card-text text-center">Desarrollado en: <?php echo '<b>' . get_post_meta(get_the_ID(), 'orsajo_theme1_leng', true) . '</b>'; ?></p>
                            <p class="card-text text-center"><small class="text-muted"><a href="<?php echo get_post_meta(get_the_ID(), 'orsajo_theme1_url', true); ?>"><?php echo get_post_meta(get_the_ID(), 'orsajo_theme1_url', true); ?></a></small></p>
                        </div>
                    </div>

                    <!-- /TRABAJO -->
                <?php endwhile; ?>

                <?php wp_reset_postdata(); ?>

                <!-- PAGINACIÓN -->
                <div class="card-body">
                    <?php get_template_part('template-parts/content', 'pagination'); ?>
                </div>
            </div>
            <!-- /TRABAJOS -->

        </div>
        <div class="clearfix"></div>
        <div>
            <!-- ASIDE ABAJO: Bajo entradas -->
            <?php get_sidebar('down'); ?>
            <!-- ASIDE ABAJO: Bajo entradas -->
        </div>
    </div>

<?php get_footer(); ?>