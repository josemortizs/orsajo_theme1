<!-- PÁGINA DE PRUEBAS -->
<?php get_header(); ?>

        <div class="row">
            <div class="col-lg-12">

                <?php

                    $post3 = new WP_Query('posts_per_page=3');

                    while($post3->have_posts()) : $post3->the_post();
                ?>

                <!-- Renderizamos lo que necesitemos del post, título, contenido, etc -->
                <!-- Ejemplo: Mostrar títulos de los posts -->
                <?php the_title('<h1>', '</h1>'); ?>

                <?php endwhile; ?>

            </div>
        </div>
    </div>
    <!-- BLOG -->

<?php get_footer(); ?>