// assets/script.js

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contactForm');
    if (form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Evita el envío del formulario por defecto
            alert('Formulario enviado con éxito'); // Aquí puedes agregar lógica para enviar datos
        });
    } else {
        console.error('El formulario no se encontró en el DOM.');
    }
});