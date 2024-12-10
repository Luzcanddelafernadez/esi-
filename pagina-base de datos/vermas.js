function verMas(button) {
    // Encuentra el contenedor de la tarjeta (card-body)
    const cardBody = button.parentElement;

    // Obtén el título de la tarjeta y el contenido adicional
    const title = cardBody.querySelector('.card-title').textContent;
    const content = cardBody.querySelector('.contenido-adicional').innerHTML;

    // Asigna el título al modal
    document.getElementById('modal-title').textContent = title;

    // Asigna el contenido adicional al modal respetando el formato
    document.getElementById('modal-content').innerHTML = content;

    // Muestra el modal
    document.getElementById('infoModal').style.display = 'block';
}

function cerrarModal() {
    // Oculta el modal
    document.getElementById('infoModal').style.display = 'none';
}

// Cerrar modal al hacer clic fuera de él
window.onclick = function (event) {
    const modal = document.getElementById('infoModal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
};
