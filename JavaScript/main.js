/* ------- funcion del menu hamburguesa*/
const contenedor= document.querySelector('#contenedor');// accede al contenedor
document.querySelector('#boton-menu').addEventListener('click',()=>{// accede al boton-menu(menu hamburguesa)
    //evento  addEventListener es para detectar cuando se de click
    contenedor.classList.toggle('activate'); // y le va a poner la clase active al contenedor
});
