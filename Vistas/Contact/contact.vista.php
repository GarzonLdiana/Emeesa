<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="assets/css/styles.css"> <!-- Ruta correcta para el CSS -->
    <script src="assets/temas/adminlte/dist/js/script.js" defer></script> <!-- Ruta correcta para el JS -->
</head>
<body>
    <h1>Formulario de Contacto</h1>
    
    <form id="contactForm" method="POST" action="procesar_contacto.php">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required>
        
        <label for="correo">Correo Electrónico:</label>
        <input type="email" id="correo" name="correo" placeholder="Tu correo" required>
        
        <label for="mensaje">Mensaje:</label>
        <textarea id="mensaje" name="mensaje" placeholder="Tu mensaje" required></textarea>
        
        <input type="submit" value="Enviar">
    </form>

    <script>
        // Si necesitas agregar algún código JavaScript adicional aquí
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('contactForm');
            if (form) {
                form.addEventListener('submit', function(event) {
                    event.preventDefault(); // Evita el envío del formulario por defecto
                    alert('Formulario enviado con éxito'); // Aquí puedes agregar lógica para enviar datos
                });
            }
        });
    </script>
</body>
</html>