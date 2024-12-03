document.addEventListener('DOMContentLoaded', function() {
    const botonMenu = document.querySelector('.boton-menu');
    const menuDesplegable = document.querySelector('.menu-desplegable ul');

    botonMenu.addEventListener('click', function() {
        menuDesplegable.style.display = menuDesplegable.style.display === 'flex' ? 'none' : 'flex';
    });
});