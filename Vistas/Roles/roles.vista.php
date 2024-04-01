<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Registro de Usuarios</h1>
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
                <h3 class="card-title">Registra un Nuevo Usuario</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    
                </div>
            </div>
            <div class="card-body">
                <form id="registroForm">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrar Usuario</button>
                </form>
                <div id="registro-exito" style="display: none;">
                    <h3>¡Usuario registrado exitosamente!</h3>
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
        document.getElementById('registroForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Evitar el envío del formulario por defecto
            // Aquí puedes agregar la lógica para enviar los datos a un servidor o procesarlos

            // Mostrar mensaje de éxito o redirigir al usuario
            const registroExito = document.getElementById('registro-exito');
            registroExito.style.display = 'block';
        });
    </script>

</div> <!-- /.content-wrapper -->
