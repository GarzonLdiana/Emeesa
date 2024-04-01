<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <main class="content">
        <section class="content-header">
            <!-- ... (sin cambios) ... -->
        </section>

        <!-- Formulario de Contacto -->
        <article class="card">
            <header class="card-header">
                <!-- ... (sin cambios) ... -->
            </header>

            <section class="card-body">
                <form id="contactForm">
                    <div class="form-group">
                        <label for="nombre">Nombres - Apellidos:</label>
                        <textarea class="form-control" id="nombres" name="nombres" rows="1" required></textarea>
                        
                        <label for="email">Correo Electrónico:</label>
                        <textarea class="form-control" id="email" name="email" rows="1" required></textarea>
                        
                        <label for="phone">Celular:</label>
                        <textarea class="form-control" id="celular" name="celular" rows="1" required></textarea>
                        <p></p>
                        <label for="asunto">Asunto:</label>
                        <textarea class="form-control" id="asunto" name="asunto" rows="1" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="mensaje">Mensaje:</label>
                        <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
                <div id="mensaje-enviado-exito" style="display: none;">
                    <h3>¡Enviado exitosamente!</h3>
                    <!-- Aquí podrías mostrar más información o redirigir al usuario -->
                </div>
            </section>
            <!-- /.card-body -->

            <!-- /.card-footer-->
        </article>
        <!-- /.card -->
    </main>
    <!-- /.content -->

    <script>
        document.getElementById('pqrsForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Evitar el envío del formulario por defecto
            // Aquí puedes agregar la lógica para enviar los datos a un servidor o procesarlos

            // Mostrar mensaje de éxito o redirigir al usuario
            const pqrExito = document.getElementById('mensaje-enviado-exito');
            pqrExito.style.display = 'block';
        });
    </script>
</div> <!-- /.content-wrapper -->
