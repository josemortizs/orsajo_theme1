/*
** Theme: Orsajo_theme1
** app.js - Este archivo se carga en todas las partes del tema.
*/

const formularioBuscar = document.querySelector('#searchform #s');
const listaEntradas = document.querySelector('.widg-dere ul');


/*
** En caso de existir el formulario cuyo id sea #searchform le agrega
** las clases form-control y mb-2 (Bootstrap). Al existir formularioBuscar
** ha de existir el botón #searchsubim, por lo que le agrega las clases
** btn btn-primry y btn-block.
*/

if(formularioBuscar) {
    formularioBuscar.className += ' form-control mb-2';
    const botonBuscar = document.querySelector('#searchsubmit');
    botonBuscar.className += ' btn btn-primary btn-block';
}


/*
** En caso de existir una lista de entradas, mediante un forEach,
** les agrega la clase list-group-item.
*/

if(listaEntradas) {
    listaEntradas.className += ' list-group';

    listaEntradas.querySelectorAll('li').forEach(item => {
        item.className += ' list-group-item';
    }); 
}


/*
** En caso de existir la opción de comentarios, agregamos al botón de éstos
** la clase btn btn-primary.
*/

const botonComentarios = document.querySelector('.form-submit #submit');
if(botonComentarios){
  botonComentarios.className = 'btn btn-primary';
}


/*
** En caso de existir la opción de comentarios, agregamos al text-area de éstos
** la clase form-control y el atributo "placeholder" con el valor: "Ingresa aquí tu comentario"
*/

const inputTextArea = document.querySelector('.comment-form-comment textarea');
if(inputTextArea){
  inputTextArea.className = 'form-control';
  inputTextArea.setAttribute('placeholder', 'Ingresa aquí tu comentario*');
}


/*
** Ocultamos las etiquetas, agregamos a los campos input la clase 
** de Bootstrap form-control y al input o textarea un placeholder que
** sustituya la información que ofrecía dicha etiqueta.
*/

const comentariosNuevos = document.querySelector('#commentform');
if(comentariosNuevos
  && comentariosNuevos.querySelector('.comment-form-author label')
  && comentariosNuevos.querySelector('.comment-form-author input')
  && comentariosNuevos.querySelector('.comment-form-email label')
  && comentariosNuevos.querySelector('.comment-form-email input')
  && comentariosNuevos.querySelector('.comment-form-url label')
  && comentariosNuevos.querySelector('.comment-form-url input')
  ){

  comentariosNuevos.querySelector('.comment-form-author label').className = 'd-none';
  comentariosNuevos.querySelector('.comment-form-author input').className = 'form-control';
  comentariosNuevos.querySelector('.comment-form-author input').setAttribute('placeholder', 'Nombre*');

  comentariosNuevos.querySelector('.comment-form-email label').className = 'd-none';
  comentariosNuevos.querySelector('.comment-form-email input').className = 'form-control';
  comentariosNuevos.querySelector('.comment-form-email input').setAttribute('placeholder', 'Email*');

  comentariosNuevos.querySelector('.comment-form-url label').className = 'd-none';
  comentariosNuevos.querySelector('.comment-form-url input').className = 'form-control';
  comentariosNuevos.querySelector('.comment-form-url input').setAttribute('placeholder', 'Sitio web');

}


/*
** En caso de existir la opción de editar comentarios, agregamos al botón de éstos
** las clases btn btn-outline-warning btn-sm mb-2.
*/

const botonEditarComentarios = document.querySelectorAll('.comment-edit-link');
if(botonEditarComentarios){
  botonEditarComentarios.forEach(boton => {
    boton.className = 'btn btn-outline-warning btn-sm mb-2'
  })
}


/*
** En caso de existir la opción de responder a un comentario, agregamos al botón de éstos
** las clases btn btn-outline-primary btn-sm mb-2.
*/

const botonResponderComentarios = document.querySelectorAll('.comment-reply-link');
if(botonResponderComentarios){
  botonResponderComentarios.forEach(boton => {
    boton.className = 'btn btn-outline-primary btn-sm mb-2'
  })
}