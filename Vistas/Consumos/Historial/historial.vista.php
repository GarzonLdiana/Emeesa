<?php
require_once "./controladores/Consumos/historial.controller.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Historial de Consumo</title>
    <!-- Incluye DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css" />
    <!-- Estilos adicionales -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Historial de Consumo</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <!-- Breadcrumbs -->
                            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                            <li class="breadcrumb-item active">Historial de Consumo</li>
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
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <p>En esta sección, podrás ver el comportamiento de los consumos.</p>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Botón Añadir -->
                            <div class="mb-3">
                                <a href="index.php?ruta=Consumos/Historial/historial.crear" class="btn btn-success">
                                    <i class="fa fa-plus"></i> Ingresar Consumo
                                </a>
                            </div>
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="datatables" class="table table-sm table-striped table-bordered table-hover datatable">
                                            <thead class="table-header">
                                                <tr>
                                                    <th width="20%">Código Interno</th>
                                                    <th width="30%">Periodos de Consumo</th>
                                                    <th width="30%">Periodos de Facturación</th>
                                                    <th width="20%">Consumo kWh</th>
                                                    <th width="20%">Descargar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Llamar al controlador para recuperar los registros de la tabla de base de datos
                                                $Historiales = HistorialController::index();
                                                foreach ($Historiales as $Historial) {
                                                    echo '<tr>
                                                            <td>' . htmlspecialchars($Historial["id_consumo"]) . '</td>
                                                            <td>' . htmlspecialchars($Historial["periodo_consumo"]) . '</td>
                                                            <td>' . htmlspecialchars($Historial["rango_facturas"]) . '</td>
                                                            <td>' . htmlspecialchars($Historial["total_consumo"]) . '</td>
                                                            <td> <a href="assets/Docs/' . htmlspecialchars($Historial["pdf_path"]) . '" class="btn btn-warning btn-sm" target="_blank">
                                                                    <i class="fa fa-download nav-icon"></i> <span>Descargar</span>
                                                                </a>
                                                            </td>
                                                        </tr>';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <div id="consumo-consultado" style="display: none;">
                                            <h3>Consumo Consultado</h3>
                                            <iframe id="consumo-iframe" width="100%" height="500" frameborder="0"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="plantilla.js"></script>

    <script>
        $(document).ready(function() {
            $('#datatables').DataTable();
        });

        function ConsultarConsumo(rutaConsumo) {
            const consumoConsulta = document.getElementById('consumo-consultado');
            const consumoIframe = document.getElementById('consumo-iframe');
            consumoIframe.src = rutaConsumo;
            consumoConsulta.style.display = 'block';
        }
    </script>
</body>

</html>
