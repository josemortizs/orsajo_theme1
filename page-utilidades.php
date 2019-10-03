<?php
    /*
    ** page-utilidades.php
    ** Página de muestra, para que el usuario del Tema tenga un ejemplo de cómo realizar una página con contenido
    ** personalizado a su gusto y necesidad. Para mostrar el contenido de esta página solo tiene que acceder al 
    ** Panel de Administración WordPress y crear una página cuyo "slug" sea "utilidades".
    */
?>

<?php get_header(); ?>

        <div class="row">
            <div class="col-lg-12">

                <!-- CONTENIDO PERSONALIZADO: UTILIDADES -->    

                <div class="container p-4">
                    <div class="card-deck">
                        <div class="card text-center">
                            <img src="http://localhost/ortizsanchezdev/wp-content/uploads/2019/02/bootstrap-1.png" 
                            alt="Logotipo de Bootstrap, morado, con una B mayúscula en el centro" class="card-img-top p-3">
                            <h4 class="card-title">Bootstrap</h4>
                            <p class="card-text">Librería CSS y JavaScipt</p>
                            <a href="https://getbootstrap.com/" class="btn btn-primary w-75 p-3 text-white mx-auto mb-3">Download</a>
                        </div>
                        <div class="card text-center">
                            <img src="http://localhost/ortizsanchezdev/wp-content/uploads/2019/02/jQuery.gif" 
                            alt="Logotipo de jQuery, morado, jQuery en letra con dibujos azules encima" class="card-img-top p-3">
                            <h4 class="card-title">jQuery</h4>
                            <p class="card-text">Librería JavaScript</p>
                            <a href="https://jquery.com/" class="btn btn-primary w-75 p-3 text-white mx-auto mb-3">Download</a>
                        </div>
                        <div class="card text-center">
                            <img src="http://localhost/ortizsanchezdev/wp-content/uploads/2019/04/webpack.png" 
                            alt="Logotipo de WebPack, cuadrado azul" class="card-img-top p-3">
                            <h4 class="card-title">WebPack</h4>
                            <p class="card-text">Empaquetador de módulos</p>
                            <a href="https://webpack.js.org/" class="btn btn-primary w-75 p-3 text-white mx-auto mb-3">Download</a>
                        </div>
                    </div>
                    <div class="card-deck">
                        <div class="card text-center mt-1">
                            <img src="http://localhost/ortizsanchezdev/wp-content/uploads/2019/04/fonts.jpg" 
                            alt="Logotipo de Google Fonts, F mayúscula blanca sobre fondo rojo circular" class="card-img-top p-3">
                            <h4 class="card-title">Google Fonts</h4>
                            <p class="card-text">Directorio de tipografías</p>
                            <a href="https://fonts.google.com/" class="btn btn-primary w-75 p-3 text-white mx-auto mb-3">Download</a>
                        </div>
                        <div class="card text-center mt-1">
                            <img src="http://localhost/ortizsanchezdev/wp-content/uploads/2019/05/uigradients.png" 
                            alt="uigradients en letra, texto escrito en cursiva" class="card-img-top p-3">
                            <h4 class="card-title">uiGradients</h4>
                            <p class="card-text">Web para la generación y descarga de fondos con degradado</p>
                            <a href="https://uigradients.com" class="btn btn-primary w-75 p-3 text-white mx-auto mb-3">Download</a>
                        </div>
                    </div>
                </div>

                <!-- !CONTENIDO PERSONALIZADO: UTILIDADES -->    

            </div>
        </div>

    </div><!-- Este DIV se abre en el header -->

<?php get_footer(); ?>