
//---------- popup --------------
var abrirpopup = document.getElementById('abrir'),
    overlay=document.getElementById('overlay'),
    popup=document.getElementById('popup'),
    solicitar=document.getElementById('solicitar'),
    btncerrar=document.getElementById('btn-cerrar-popup'),
    abrirycerrar=document.getElementById('cerabri');
    if(abrirpopup && btncerrar){
            btncerrar.addEventListener('click', function(e){
            e.preventDefault();
            overlay.classList.remove('active');
            popup.classList.remove('active');
            });
            abrirpopup.addEventListener('click', function(){
            overlay.classList.add('active');
            popup.classList.add('active');
            });
    }
/*-----------registrar cliente----------*/
var overlayr=document.getElementById('overlays'),
    popupr=document.getElementById('popups'),
    btncerrarr=document.getElementById('btn-cerrar-popups'),
    registro=document.getElementById('opens');
    if(registro && btncerrar){
        registro.addEventListener('click', function(){
            overlayr.classList.add('active');
            popupr.classList.add('active');
        });
        btncerrarr.addEventListener('click', function(e){
            e.preventDefault();
            overlayr.classList.remove('active');
            popupr.classList.remove('active');
        });
    }
    
/*-------------editar--------------*/

var openpop = document.getElementById('btn'),
    overlays=document.getElementById('overlay2'),
    popups=document.getElementById('popup2'),
    closes=document.getElementById('btn-cerrar-popup2');
    if(closes && openpop){
        closes.addEventListener('click', function(u){
            u.preventDefault();
            overlays.classList.remove('active');
            popups.classList.remove('active');
        });
        
        openpop.addEventListener('click', function(){
            overlays.classList.add('active');
            popups.classList.add('active');
        });
    }



//------- transicion de entrada ------------
$(function(){
	$("body").hide().fadeIn(400);
});