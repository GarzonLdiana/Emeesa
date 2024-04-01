<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>PQRS - Peticiones, Quejas, Reclamos o Sugerencias</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Ingresa tu PQRS</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                   
                </div>
            </div>
            <div class="card-body">
                <form id="pqrsForm">
                    <div class="form-group">
                        <label for="tipoPqrs">Tipo:</label>
                        <select class="form-control" id="tipoPqrs" name="tipoPqrs" required>
                            <option value="">Selecciona la opción que deseas</option>
                            <option value="Peticion">Petición</option>
                            <option value="Queja">Queja</option>
                            <option value="Reclamo">Reclamo</option>
                            <option value="Sugerencia">Sugerencia</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="mensaje">Mensaje:</label>
                        <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
                <div id="pqrs-exito" style="display: none;">
                    <h3>¡Enviado exitosamente!</h3>
                    <!-- Aquí podrías mostrar más información o redirigir al usuario -->
                </div>
            </div>
            <!-- /.card-body -->

            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
    <script>
        document.getElementById('pqrsForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Evitar el envío del formulario por defecto
            // Aquí puedes agregar la lógica para enviar los datos a un servidor o procesarlos

            // Mostrar mensaje de éxito o redirigir al usuario
            const pqrExito = document.getElementById('pqrs-exito');
            pqrExito.style.display = 'block';
        });
    </script>

</div> <!-- /.content-wrapper -->
