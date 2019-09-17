<?php get_header(); ?>

        <div class="row">
            <div class="col-lg-12">
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
                    </div>
                    <!-- ENTRADA -->
                <?php endwhile; endif; ?>
            </div>
        </div>
    </div>
    <!-- BLOG -->

<?php get_footer(); ?>