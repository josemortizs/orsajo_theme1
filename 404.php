<?php
    /*
    ** 404.php
	** Esta página define todo lo que se mostará en caso
	** de que un usuario intente acceder a una página que
	** no exista, o a la que no tenga permiso.
    */

get_header();
?>

	<section id="primary" class="content-area p-4">
		<main id="main" class="site-main">

			<div class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title">!La página que buscas no existe!</h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p>Ejecuta una búsqueda, ¡seguro que encuentras lo que estás buscando!</p>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</div><!-- .error-404 -->

		</main><!-- #main -->
	</section><!-- #primary -->

	<div class="mt-2 mb-2"></div>

	</div> <!-- Div creado en Header -->

	<div class="clearfix"></div>
<?php
	if (is_404()) get_footer( '404' );
	else get_footer();
?>
