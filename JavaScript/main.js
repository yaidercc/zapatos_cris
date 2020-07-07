/* ------- funcion del menu hamburguesa*/
const contenedor= document.querySelector('#contenedor');// accede al contenedor
document.querySelector('#boton-menu').addEventListener('click',()=>{// accede al boton-menu(menu hamburguesa)
    //evento  addEventListener es para detectar cuando se de click
    contenedor.classList.toggle('activate'); // y le va a poner la clase active al contenedor
});
//---------- popup --------------
var abrirpopup = document.getElementById('abrir'),
    overlay=document.getElementById('overlay'),
    popup=document.getElementById('popup'),
    solicitar=document.getElementById('solicitar'),
    btncerrar=document.getElementById('btn-cerrar-popup'),
    abrirycerrar=document.getElementById('cerabri');

btncerrar.addEventListener('click', function(e){
    e.preventDefault();
    overlay.classList.remove('active');
    popup.classList.remove('active');
});


abrirpopup.addEventListener('click', function(){
    overlay.classList.add('active');
    popup.classList.add('active');
});

/*-------------editar--------------*/
/*
var openpop = document.getElementById('open'),
    overlays=document.getElementById('overlay2'),
    popups=document.getElementById('popup2'),
    close=document.getElementById('btn-cerrar-popup2');

close.addEventListener('click', function(e){
    e.preventDefault();
    overlays.classList.remove('active');
    popups.classList.remove('active');
});

openpop.addEventListener('click', function(){
    overlays.classList.add('active');
    popups.classList.add('active');
});*/

/*-----------registrar cliente----------*/
var overlayr=document.getElementById('overlays'),
    popupr=document.getElementById('popups'),
    btncerrarr=document.getElementById('btn-cerrar-popups'),
    registro=document.getElementById('opens');

    registro.addEventListener('click', function(){
        overlayr.classList.add('active');
        popupr.classList.add('active');
    });
    btncerrarr.addEventListener('click', function(e){
        e.preventDefault();
        overlayr.classList.remove('active');
        popupr.classList.remove('active');
    });
//------- transicion de entrada ------------
$(function(){
	$("body").hide().fadeIn(400);
});