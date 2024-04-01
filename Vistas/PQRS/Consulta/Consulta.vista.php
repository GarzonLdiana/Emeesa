<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Historico de PQRS</h1>
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
                <h3 class="card-title">Consulta de PQRS Registradas</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tipo</th>
                            <th>Requerimiento</th>
                            <th>Consultar</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Petición</td>
                            <td>Cambio del cableado electrico.</td>
                            <td><button onclick="consultar">Respuesta</button></td>

                        </tr>
                        <tr>
                            <td>Queja</td>
                            <td>Falla en el suministro eléctrico.</td>
                            <td><button onclick="consultar">Respuesta</button></td>
                        </tr>
                        <tr>
                            <td>Reclamo</td>
                            <td>Consumo no reconocido.</td>
                            <td><button onclick="consultar">Respuesta</button></td>
                        </tr>
                        <tr>
                            <td>Sugerencia</td>
                            <td>Ampliación del horario de atención en el CA.</td>
                            <td><button onclick="consultar">Respuesta</button></td>
                        </tr>
                        <!-- Puedes agregar más filas con información ficticia -->
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->

            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->

</div> <!-- /.content-wrapper -->
