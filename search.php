<?php get_header(); ?>

        <div class="row">
            <!-- ENTRADAS -->
            <div class="col-lg-9">

            <h3 class="bg-primary text-white py-3 mb-5 text-center">Resultados de la búsqueda...</h3>

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <!-- ENTRADA -->
                    <div class="card-body">
                        <a href="<?php the_permalink(); ?>">
                            <h2><?php the_title(); ?></h2>
                        </a>
                    </div>
                    <!-- ENTRADA -->
                <?php endwhile; ?>

                <?php else: ?>

                    <h5>
                        No se encontraron resultados para su búsqueda: <?php printf(esc_html('%s'), get_search_query()); ?>
                    </h5>

                <?php endif; ?>

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
    </div>
    <!-- BLOG -->

<?php get_footer(); ?>